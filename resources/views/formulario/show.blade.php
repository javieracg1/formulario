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
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f4f4f4;
        }
        .header h1 {
            margin: 0;
            color: #333;
            font-size: 24px;
        }
        .header-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
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
        .btn-success {
            background-color: rgb(17, 157, 17);
            color:white;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .detail-section {
            margin-bottom: 20px;
        }
        .detail-section h2 {
            color: #007bff;
            font-size: 16px;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #eee;
        }
        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        .detail-item {
            margin-bottom: 10px;
        }
        .detail-item label {
            display: block;
            font-weight: bold;
            color: #666;
            margin-bottom: 3px;
            font-size: 13px;
        }
        .detail-item p {
            margin: 0;
            color: #333;
            font-size: 13px;
        }
        .full-width {
            grid-column: 1 / -1;
        }
        .tag-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 3px;
        }
        .tag {
            background-color: #e9ecef;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 12px;
            color: #495057;
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 28px;
            margin-left: 8px;
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
            border-radius: 28px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
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
            transform: translateX(22px);
        }
        .estado-actividad {
            display: flex;
            align-items: center;
            margin-top: 15px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 6px;
            margin-bottom: 15px;
        }
        .estado-actividad label {
            margin-right: 8px;
            font-weight: bold;
            color: #333;
            font-size: 13px;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
                background: white;
            }
            .container {
                max-width: 100%;
                margin: 0;
                padding: 15px;
                box-shadow: none;
                border-radius: 0;
            }
            .header-buttons {
                display: none;
            }
            .header {
                margin-bottom: 15px;
                padding-bottom: 10px;
            }
            .header h1 {
                font-size: 22px;
            }
            .detail-section {
                margin-bottom: 15px;
                page-break-inside: avoid;
            }
            .detail-section h2 {
                font-size: 17px;
                margin-bottom: 8px;
                padding-bottom: 4px;
            }
            .detail-grid {
                gap: 10px;
            }
            .detail-item {
                margin-bottom: 8px;
            }
            .detail-item label {
                font-size: 14px;
                margin-bottom: 2px;
            }
            .detail-item p {
                font-size: 14px;
            }
            .estado-actividad {
                margin-top: 10px;
                padding: 8px;
                margin-bottom: 10px;
            }
            .estado-actividad label {
                font-size: 14px;
            }
            .switch {
                width: 40px;
                height: 24px;
            }
            .slider:before {
                height: 18px;
                width: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Detalles de la Actividad</h1>
            <div class="header-buttons">
                <button class="btn btn-success" onclick="window.print()">Imprimir</button>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Volver al Dashboard</a>
            </div>
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
                    <label>Formulario llenado por</label>
                    <p>{{ $formulario->persona_gerencia }}</p>
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
                <div class="detail-item">
                    <label>Requiere Material POP</label>
                    <p>{{ ucfirst($formulario->requiere_material_pop) }}</p>
                </div>
                @if($formulario->requiere_material_pop === 'si' && $formulario->material_pop_detalles)
                <div class="detail-item full-width">
                    <label>Detalles del Material POP</label>
                    <p>{{ $formulario->material_pop_detalles }}</p>
                </div>
                @endif
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
