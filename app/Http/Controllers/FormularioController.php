<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActividadSemanal;
use App\Models\Formulario;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
                'unidad_solicitante' => 'required|string|max:255',
                'nombre_evento' => 'required|string|max:255',
                'fecha_evento' => 'required|date',
                'hora_desde' => 'required|date_format:H:i',
                'hora_hasta' => 'required|date_format:H:i',
                'objetivo_evento' => 'required|string',
                'tipo_evento' => 'required|string|max:255',
                'tipo_evento_otro' => 'nullable|string|max:255',
                'institucion_responsable' => 'required|string|max:255',
                'ambiente' => 'nullable|string|max:255',
                'descripcion_lugar' => 'nullable|string',
                'servicio_catering_nuevo' => 'nullable|string|max:255',
                'servicio_catering_otro' => 'nullable|string|max:255',
                'comunicacion_1' => 'nullable|string|max:255',
                'comunicacion_2' => 'nullable|string|max:255',
                'comunicacion_3' => 'nullable|string|max:255',
                'comunicacion_4' => 'nullable|string|max:255',
                'tecnologia_1' => 'nullable|string|max:255',
                'tecnologia_2' => 'nullable|string|max:255',
                'tecnologia_3' => 'nullable|string|max:255',
                'tecnologia_4' => 'nullable|string|max:255',
                'nombre_responsable' => 'nullable|string|max:255',
                'cargo_responsable' => 'nullable|string|max:255',
                'telefono_responsable' => 'nullable|string|max:255',
                'email_responsable' => 'nullable|string|max:255',
                'fechaRegistro' => 'nullable|date_format:Y-m-d\TH:i',
                'elaborado_nombre' => 'nullable|string|max:255',
                'aprobado_nombre' => 'nullable|string|max:255',
                'autorizado_nombre' => 'nullable|string|max:255', // Ya no es strtoupper
                'instituciones_participantes' => 'nullable|array',
                'instituciones_participantes.*' => 'nullable|string|max:255',
                'responsables_participantes' => 'nullable|array',
                'responsables_participantes.*' => 'nullable|string|max:255',
                'cantidades_participantes' => 'nullable|array',
                'cantidades_participantes.*' => 'nullable|integer|min:0',
                'notas_adicionales' => 'nullable|string|max:500'
            ]);

            // Procesar los campos dinámicos de participantes
            $instituciones = $request->input('instituciones_participantes', []);
            $responsables = $request->input('responsables_participantes', []);
            $cantidades = $request->input('cantidades_participantes', []);

            // Filtrar entradas vacías y asegurar que los arrays tengan la misma longitud
            $participantesData = [];
            $maxLength = max(count($instituciones), count($responsables), count($cantidades));

            for ($i = 0; $i < $maxLength; $i++) {
                $institucion = $instituciones[$i] ?? null;
                $responsable = $responsables[$i] ?? null;
                $cantidad = $cantidades[$i] ?? null;

                if (!empty($institucion) || !empty($responsable) || !empty($cantidad)) {
                    $participantesData['instituciones_participantes'][] = $institucion;
                    $participantesData['responsables_participantes'][] = $responsable;
                    $participantesData['cantidades_participantes'][] = $cantidad;
                }
            }

            // Preparar los datos para guardar
            $data = $request->except(['instituciones_participantes', 'responsables_participantes', 'cantidades_participantes']);
            $data = array_merge($data, $participantesData);

            // Preparar los datos para guardar
            $data = $request->all();
            Log::info('Datos preparados para guardar:', $data);

            // Crear el registro
            $formulario = Formulario::create($data);
            Log::info('Formulario creado con ID:', ['id' => $formulario->id]);

            // Crear notificación
            Notification::create([
                'type' => 'nuevo_formulario',
                'gerencia' => $formulario->unidad_solicitante,
                'message' => "Nuevo formulario registrado por {$formulario->unidad_solicitante} para el evento '{$formulario->nombre_evento}' en fecha {$formulario->fecha_evento}",
            ]);

            // Preparar respuesta según el tipo de solicitud
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'El registro del formulario se ha efectuado correctamente.',
                    'redirect' => route('formulario.question')
                ]);
            } else {
                // Redireccionar con mensaje de éxito para solicitudes tradicionales
                return redirect()
                    ->route('formulario.question')
                    ->with('success', 'El registro del formulario se ha efectuado correctamente.');
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Error de validación
            Log::error('Error de validación:', ['errors' => $e->errors()]);

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error de validación',
                    'errors' => $e->errors()
                ], 422);
            } else {
                return redirect()
                    ->back()
                    ->withErrors($e->validator)
                    ->withInput();
            }
        } catch (\Exception $e) {
            // En caso de error, registrar y responder adecuadamente
            Log::error('Error al procesar formulario:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Hubo un error al procesar el formulario: ' . $e->getMessage()
                ], 500);
            } else {
                return redirect()
                    ->back()
                    ->with('error', 'Hubo un error al procesar el formulario: ' . $e->getMessage())
                    ->withInput();
            }
        }
    }

    public function showForm()
    {
        return view('formulario');
    }

    public function dashboard()
    {
        $viewType = request()->get('view', 'card'); // 'card' o 'list'

        $formularios = Formulario::select('id', 'unidad_solicitante', 'nombre_evento', 'fecha_evento', 'hora_desde', 'hora_hasta', 'objetivo_evento', 'atendido', 'created_at', 'tipo_evento', 'institucion_responsable')
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
        $perPage = $viewType === 'list' ? 20 : 12; // Más items por página en vista de lista
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
            'unreadNotifications' => $unreadNotifications,
            'viewType' => $viewType
        ]);
    }

    public function show($id)
    {
        $formulario = Formulario::findOrFail($id);
        $viewType = request()->get('view', 'card'); // 'card' o 'list'

        if ($viewType === 'list') {
            $formularios = Formulario::orderBy('fecha_actividad', 'desc')->get();
            return view('formulario.show-list', compact('formularios', 'formulario'));
        }

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
