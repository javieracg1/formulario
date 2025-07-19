<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActividadSemanal;
use App\Models\Formulario;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class FormularioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Aplicar middleware de autenticación solo a estas rutas
        $this->middleware('auth', ['only' => ['dashboard', 'show', 'getNotifications', 'markNotificationAsRead']]);
    }

    public function showQuestion()
    {
        return view('pregunta_actividad');
    }

    public function processQuestion(Request $request)
    {
        $request->validate([
            'realiza_actividad' => 'required|boolean',
        ]);

        ActividadSemanal::create([
            'realiza_actividad' => $request->realiza_actividad,
        ]);

        if ($request->realiza_actividad) {
            return redirect()->route('formulario.create');
        } else {
            return redirect()->route('formulario.ask_gerencia');
        }
    }

    public function askGerencia()
    {
        return view('pregunta_gerencia');
    }

    public function processGerencia(Request $request)
    {
        $request->validate([
            'nombre_gerencia' => 'required|string|max:255',
        ]);

        ActividadSemanal::create([
            'realiza_actividad' => false,
            'nombre_gerencia' => $request->nombre_gerencia,
        ]);

        return redirect()->route('formulario.question')->with('success', 'Gracias por tu respuesta. Se ha registrado que no realizarás actividades esta semana y el nombre de tu gerencia.');
    }

    public function storeForm(Request $request)
    {
        try {
            // Validación de los datos del formulario
            $request->validate([
                'gerencia' => 'required|string|max:255',
                'persona_gerencia' => 'required|string|max:255',
                'fecha_actividad' => 'required|date',
                'hora_actividad' => 'required',
                'estado' => 'required|string|max:255',
                'municipio' => 'required|string|max:255',
                'parroquia' => 'required|string|max:255',
                'lugar' => 'required|string|max:255',
                'institucion_entes' => 'required|string|max:255',
                'responsable' => 'required|string|max:255',
                'tematica' => 'required|string',
                'cantidad_personas' => 'required|integer|min:0',
                'requiere_cobertura' => 'required|in:si,no',
                'requiere_protocolar' => 'required|in:si,no',
                'requiere_material_pop' => 'required|in:si,no',
                'material_pop_detalles' => 'required_if:requiere_material_pop,si|nullable|string',
                'apoyo_logistico' => 'nullable|array',
                'otro_elemento' => 'nullable|string',
            ]);

            // Preparar los datos para guardar
            $data = $request->all();
            if ($request->has('apoyo_logistico')) {
                $data['apoyo_logistico'] = implode(',', $request->apoyo_logistico);
            }

            // Crear el registro
            $formulario = Formulario::create($data);

            // Crear notificación
            Notification::create([
                'type' => 'nuevo_formulario',
                'gerencia' => $formulario->gerencia,
                'message' => "Nuevo formulario registrado por la gerencia {$formulario->gerencia} para la fecha {$formulario->fecha_actividad->format('d/m/Y')}",
            ]);

            // Redireccionar con mensaje de éxito
            return redirect()
                ->route('formulario.question')
                ->with('success', 'El registro del formulario se ha efectuado correctamente.');

        } catch (\Exception $e) {
            // En caso de error, redireccionar con mensaje de error
            return redirect()
                ->back()
                ->with('error', 'Hubo un error al procesar el formulario. Por favor, inténtelo de nuevo.')
                ->withInput();
        }
    }

    public function showForm()
    {
        return view('formulario');
    }

    public function dashboard()
    {
        $formularios = Formulario::select('id', 'gerencia', 'fecha_actividad', 'hora_actividad', 'lugar', 'responsable', 'cantidad_personas', 'atendido', 'created_at')
                                ->get();

        $actividadesNoRealizadas = ActividadSemanal::where('realiza_actividad', false)
                                                  ->whereNotNull('nombre_gerencia')
                                                  ->select('id', 'nombre_gerencia', 'created_at')
                                                  ->get();

        // Combinar las colecciones y ordenarlas por fecha de creación
        $allItems = $formularios->concat($actividadesNoRealizadas)
                               ->sortByDesc('created_at')
                               ->values();

        // Paginar manualmente la colección combinada
        $perPage = 12;
        $currentPage = request()->get('page', 1);
        $currentPageItems = $allItems->forPage($currentPage, $perPage);
        $paginatedItems = new \Illuminate\Pagination\LengthAwarePaginator(
            $currentPageItems,
            $allItems->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url()]
        );

        $unreadNotifications = Notification::where('read', false)->count();

        return view('dashboard', [
            'combinedItems' => $paginatedItems,
            'unreadNotifications' => $unreadNotifications
        ]);
    }

    public function show($id)
    {
        $formulario = Formulario::findOrFail($id);
        return view('formulario.show', compact('formulario'));
    }

    public function getNotifications()
    {
        $notifications = Notification::orderBy('created_at', 'desc')
                                   ->take(10)
                                   ->get();

        return response()->json($notifications);
    }

    public function markNotificationAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['read' => true]);

        return response()->json(['success' => true]);
    }

    public function toggleAtendido($id)
    {
        $formulario = Formulario::findOrFail($id);
        $formulario->atendido = !$formulario->atendido;
        $formulario->save();

        return response()->json([
            'success' => true,
            'atendido' => $formulario->atendido
        ]);
    }
}
