<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Formulario - Gestión Comunicacional</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f4f4f4;
        }
        .header h1 {
            margin: 0;
            color: #333;
            font-size: 24px;
        }
        .btn {
            padding: 10px 20px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            transition: background-color 0.2s;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .detail-section {
            margin-bottom: 25px;
        }
        .detail-section h2 {
            color: #007bff;
            font-size: 18px;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid #eee;
        }
        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .detail-item {
            margin-bottom: 15px;
        }
        .detail-item label {
            display: block;
            font-weight: bold;
            color: #666;
            margin-bottom: 5px;
        }
        .detail-item p {
            margin: 0;
            color: #333;
        }
        .full-width {
            grid-column: 1 / -1;
        }
        .tag-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 5px;
        }
        .tag {
            background-color: #e9ecef;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 14px;
            color: #495057;
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
            margin-left: 10px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #28a745;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .estado-actividad {
            display: flex;
            align-items: center;
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .estado-actividad label {
            margin-right: 10px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Detalles del Formulario</h1>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver al Dashboard</a>
        </div>

        <div class="estado-actividad">
            <label>Estado de la Actividad:</label>
            <label class="switch">
                <input type="checkbox" id="switchAtendido" {{ $formulario->atendido ? 'checked' : '' }}>
                <span class="slider"></span>
            </label>
            <span id="estadoTexto" style="margin-left: 10px;">
                {{ $formulario->atendido ? 'Atendida' : 'Pendiente' }}
            </span>
        </div>

        <div class="detail-section">
            <h2>Información General</h2>
            <div class="detail-grid">
                <div class="detail-item">
                    <label>Gerencia</label>
                    <p>{{ $formulario->gerencia }}</p>
                </div>
                <div class="detail-item">
                    <label>Fecha y Hora de la Actividad</label>
                    <p>
                        @if($formulario->fecha_actividad)
                            {{ $formulario->fecha_actividad->format('d/m/Y') }}
                        @else
                            Fecha no disponible
                        @endif
                        - {{ $formulario->hora_actividad }}
                    </p>
                </div>
                <div class="detail-item">
                    <label>Fecha de Registro</label>
                    <p>{{ $formulario->created_at->format('d/m/Y H:i:s') }}</p>
                </div>
            </div>
        </div>

        <div class="detail-section">
            <h2>Ubicación</h2>
            <div class="detail-grid">
                <div class="detail-item">
                    <label>Estado</label>
                    <p>{{ $formulario->estado }}</p>
                </div>
                <div class="detail-item">
                    <label>Municipio</label>
                    <p>{{ $formulario->municipio }}</p>
                </div>
                <div class="detail-item">
                    <label>Parroquia</label>
                    <p>{{ $formulario->parroquia }}</p>
                </div>
                <div class="detail-item">
                    <label>Lugar Específico</label>
                    <p>{{ $formulario->lugar }}</p>
                </div>
            </div>
        </div>

        <div class="detail-section">
            <h2>Detalles de la Actividad</h2>
            <div class="detail-grid">
                <div class="detail-item">
                    <label>Institución o Entes Involucrados</label>
                    <p>{{ $formulario->institucion_entes }}</p>
                </div>
                <div class="detail-item">
                    <label>Responsable</label>
                    <p>{{ $formulario->responsable }}</p>
                </div>
                <div class="detail-item full-width">
                    <label>Temática o Asunto</label>
                    <p>{{ $formulario->tematica }}</p>
                </div>
                <div class="detail-item">
                    <label>Cantidad de Participantes</label>
                    <p>{{ $formulario->cantidad_personas }}</p>
                </div>
            </div>
        </div>

        <div class="detail-section">
            <h2>Requerimientos</h2>
            <div class="detail-grid">
                <div class="detail-item">
                    <label>Requiere Cobertura</label>
                    <p>{{ ucfirst($formulario->requiere_cobertura) }}</p>
                </div>
                <div class="detail-item">
                    <label>Requiere Personal Protocolar</label>
                    <p>{{ ucfirst($formulario->requiere_protocolar) }}</p>
                </div>
                <div class="detail-item full-width">
                    <label>Apoyo Logístico</label>
                    <div class="tag-container">
                        @foreach(explode(',', $formulario->apoyo_logistico) as $apoyo)
                            <span class="tag">{{ ucfirst($apoyo) }}</span>
                        @endforeach
                    </div>
                </div>
                @if($formulario->otro_elemento)
                <div class="detail-item full-width">
                    <label>Otros Elementos Requeridos</label>
                    <p>{{ $formulario->otro_elemento }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.getElementById('switchAtendido').addEventListener('change', function() {
            const formId = {{ $formulario->id }};
            fetch(`/formularios/${formId}/toggle-atendido`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('estadoTexto').textContent =
                        data.atendido ? 'Atendida' : 'Pendiente';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                this.checked = !this.checked; // Revert the switch if there's an error
            });
        });
    </script>
</body>
</html>
