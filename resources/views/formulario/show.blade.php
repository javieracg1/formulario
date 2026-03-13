<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTROL DE PAUTA COMUNICACIONAL - {{ $formulario->nombre_evento }}</title>
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --accent-color: #3498db;
            --border-color: #e0e0e0;
            --text-color: #333;
            --text-muted: #666;
            --background-color: #f8f9fa;
        }

        .top-bar {
            position: absolute;
            top: 20px;
            left: 20px;
            width: auto;
            height: auto;
            z-index: 100;
        }

        .top-bar img {
            width: 150px;
            height: auto;
            display: block;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: var(--background-color);
            margin: 0;
            padding: 20px;
            color: var(--text-color);
            line-height: 1.6;
            position: relative;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 40px;
        }

        .container {
            background-color: #fff;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            max-width: 7.5in;
            width: 100%;
            margin: 0 auto;
            border: 1px solid var(--border-color);
            position: relative;
        }

        h1 {
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-bottom: 0.75rem;
            font-weight: 600;
            text-align: center;
        }

        p {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 2rem;
            text-align: center;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.25rem;
            color: var(--secondary-color);
            font-weight: 500;
            font-size: 0.8rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 0.8rem;
            transition: all 0.2s ease;
            background-color: #fff;
        }

        /* Estilos específicos para input number */
        input[type="number"] {
            -moz-appearance: textfield;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            background: var(--accent-color);
            height: 45px;
            opacity: 1;
            position: relative;
            right: 4px;
            cursor: pointer;
        }

        input[type="number"]:hover::-webkit-outer-spin-button,
        input[type="number"]:hover::-webkit-inner-spin-button {
            opacity: 1;
        }

        input[type="date"],
        input[type="time"] {
            width: auto;
            min-width: 150px;
            padding: 0.4rem;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 0.8rem;
            transition: all 0.2s ease;
            background-color: #fff;
            color: var(--text-color);
            cursor: pointer;
        }

        input[type="date"]::-webkit-calendar-picker-indicator,
        input[type="time"]::-webkit-calendar-picker-indicator {
            cursor: pointer;
            padding: 0.25rem;
            margin-right: -0.25rem;
        }

        .date-time-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .date-time-group .form-group {
            margin-bottom: 0;
            flex: 1;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--accent-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 0.75rem;
            margin-top: 0.5rem;
        }

        .checkbox-group div {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkbox-group label {
            margin: 0;
            font-weight: normal;
            cursor: pointer;
        }

        .checkbox-group input[type="checkbox"] {
            width: 16px;
            height: 16px;
            margin: 0;
            accent-color: var(--accent-color);
        }

        textarea {
            resize: vertical;
            min-height: 10px;
        }

        button {
            background-color: var(--accent-color);
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 500;
            width: 100%;
            margin-top: 1rem;
            transition: background-color 0.2s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .section-title {
            color: var(--primary-color);
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            display: block;
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23333' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 2.5rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
                margin: 0.5rem;
            }

            h1 {
                font-size: 1.1rem;
            }

            .checkbox-group {
                grid-template-columns: 1fr;
            }
            .date-time-group {
                flex-direction: column;
                gap: 0.75rem;
            }

            input[type="date"],
            input[type="time"] {
                width: 100%;
            }
        }

        /* Estilos para mostrar datos en lugar de inputs */
        .data-display {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 0.4rem;
            font-size: 0.75rem;
            color: var(--text-color);
            min-height: 12px;
            display: flex;
            align-items: center;
        }

        .data-display.empty {
            color: var(--text-muted);
            font-style: italic;
        }

        /* Botones de acción */
        .action-buttons {
            position: fixed;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
            z-index: 1000;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-print {
            background-color: #28a745;
        }

        .btn-back {
            background-color: #6c757d;
        }

        .btn:hover {
            opacity: 0.9;
        }

        /* Estilos para impresión */
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background: white !important;
                font-size: 11px;
            }

            .container {
                max-width: none;
                padding: 0;
                margin: 0;
                box-shadow: none;
                border: none;
            }

            .main-content {
                padding: 15px;
                padding-top: 50px;
            }

            .action-buttons {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="action-buttons no-print">
        <button onclick="window.print()" class="btn btn-print">
            Imprimir
        </button>
        <a href="{{ route('dashboard') }}" class="btn btn-back">
            Volver
        </a>
    </div>

    <div class="top-bar">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>

    <div class="main-content">
        <div class="container">
            <!-- Fecha y hora de registro -->
            <div style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
                <div style="border: 1px solid #000; padding: 6px; background-color: #f8f8f8;">
                    <div style="font-size: 0.6rem; font-weight: bold; text-align: center; margin-bottom: 3px;">FECHA Y HORA DE REGISTRO</div>
                    <div style="font-size: 0.6rem; text-align: center; border: none; background: transparent; width: 140px;">
                        {{ $formulario->fechaRegistro ? $formulario->fechaRegistro->format('d/m/Y H:i') : $formulario->created_at->format('d/m/Y H:i') }}
                    </div>
                </div>
            </div>

            <!-- Título principal -->
            <div style="text-align: center; margin-bottom: 1.5rem;">
                <h1 style="font-size: 1rem; font-weight: bold; margin: 0; padding: 8px; border: 2px solid #000;">CONTROL DE PAUTA COMUNICACIONAL</h1>
            </div>

            <!-- UNIDAD SOLICITANTE -->
            <div style="border: 1px solid #000; margin-bottom: 8px;">
                <div style="background-color: #f0f0f0; padding: 4px; border-bottom: 1px solid #000; font-weight: bold; font-size: 0.75rem;">UNIDAD SOLICITANTE</div>
                <div style="padding: 8px;">
                    <div class="data-display {{ empty($formulario->unidad_solicitante) ? 'empty' : '' }}">
                        {{ $formulario->unidad_solicitante ?? 'No especificado' }}
                    </div>
                </div>
            </div>

            <!-- DATOS DEL EVENTO -->
            <div style="border: 1px solid #000; margin-bottom: 8px;">
                <div style="background-color: #f0f0f0; padding: 4px; border-bottom: 1px solid #000; font-weight: bold; font-size: 0.75rem; text-align: center;">DATOS DEL EVENTO</div>
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; border-bottom: 1px solid #000;">
                    <div style="padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.65rem; text-align: center;">NOMBRE</div>
                    <div style="padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.65rem; text-align: center;">FECHAS</div>
                    <div style="padding: 4px; font-weight: bold; font-size: 0.65rem; text-align: center;">HORAS</div>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr;">
                    <div style="padding: 10px; border-right: 1px solid #000; display: flex; align-items: center;">
                        <div class="data-display {{ empty($formulario->nombre_evento) ? 'empty' : '' }}" style="width: 100%; border: none; background: transparent; padding: 0;">
                            {{ $formulario->nombre_evento ?? 'No especificado' }}
                        </div>
                    </div>
                    <div style="padding: 10px; border-right: 1px solid #000; display: flex; align-items: center;">
                        <div class="data-display {{ empty($formulario->fecha_evento) ? 'empty' : '' }}" style="width: 100%; border: none; background: transparent; padding: 0;">
                            {{ $formulario->fecha_evento ? \Carbon\Carbon::parse($formulario->fecha_evento)->format('d/m/Y') : 'No especificado' }}
                        </div>
                    </div>
                    <div style="padding: 8px; display: flex; flex-direction: column; gap: 6px;">
                    <div style="display: flex; align-items: center; gap: 6px;">
                        <div style="flex: 1;">
                            <label style="font-size: 0.6rem; font-weight: bold; margin-bottom: 1px; display: block; color: #666;">DESDE:</label>
                            <div class="data-display {{ empty($formulario->hora_desde) ? 'empty' : '' }}" style="border: none; background: transparent; padding: 1px;">
                                {{ $formulario->hora_desde ? \Carbon\Carbon::parse($formulario->hora_desde)->format('H:i') : '--:--' }}
                            </div>
                        </div>
                        <div style="flex: 1;">
                            <label style="font-size: 0.6rem; font-weight: bold; margin-bottom: 1px; display: block; color: #666;">HASTA:</label>
                            <div class="data-display {{ empty($formulario->hora_hasta) ? 'empty' : '' }}" style="border: none; background: transparent; padding: 1px;">
                                {{ $formulario->hora_hasta ? \Carbon\Carbon::parse($formulario->hora_hasta)->format('H:i') : '--:--' }}
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div style="border-top: 1px solid #000; padding: 8px;">
                    <div style="margin-bottom: 10px;">
                        <div style="font-weight: bold; font-size: 0.65rem; margin-bottom: 5px;">OBJETIVO PRINCIPAL DEL EVENTO:</div>
                        <div class="data-display {{ empty($formulario->objetivo_evento) ? 'empty' : '' }}">
                            {{ $formulario->objetivo_evento ?? 'No especificado' }}
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="font-size: 0.65rem; font-weight: bold; min-width: 80px;">TIPO DE EVENTO:</span>
                        <div class="data-display {{ empty($formulario->tipo_evento) ? 'empty' : '' }}" style="flex: 1;">
                            {{ $formulario->tipo_evento ?? 'No especificado' }}
                        </div>
                    </div>
                    @if($formulario->tipo_evento === 'OTRO' && $formulario->tipo_evento_otro)
                    <div style="margin-top: 8px;">
                        <div class="data-display">
                            {{ $formulario->tipo_evento_otro }}
                        </div>
                    </div>
                    @endif
                    @if($formulario->ambiente === 'OTRO' && $formulario->ambiente_otro)
                    <div style="margin-top: 8px;">
                        <div class="data-display">
                            <strong>Especificación del Ambiente:</strong> {{ $formulario->ambiente_otro }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- INSTITUCIÓN O ENTE RESPONSABLE -->
            <div style="border: 1px solid #000; margin-bottom: 8px;">
                <div style="background-color: #f0f0f0; padding: 4px; border-bottom: 1px solid #000; font-weight: bold; font-size: 0.75rem;">INSTITUCIÓN O ENTE RESPONSABLE DEL EVENTO:</div>
                <div style="padding: 8px;">
                    <div class="data-display {{ empty($formulario->institucion_responsable) ? 'empty' : '' }}">
                        {{ $formulario->institucion_responsable ?? 'No especificada' }}
                    </div>
                </div>
            </div>

            <!-- LUGAR DEL EVENTO -->
            <div style="border: 1px solid #000; margin-bottom: 8px;">
                <div style="background-color: #f0f0f0; padding: 4px; border-bottom: 1px solid #000; font-weight: bold; font-size: 0.75rem;">LUGAR DEL EVENTO:</div>
                <div style="padding: 8px;">
                    <div style="margin-bottom: 12px;">
                        <label style="font-size: 0.65rem; font-weight: bold; margin-bottom: 3px; display: block;">AMBIENTE:</label>
                        <div class="data-display {{ empty($formulario->ambiente) ? 'empty' : '' }}">
                            {{ $formulario->ambiente ?? 'No especificado' }}
                        </div>
                    </div>
                    <div style="margin-top: 12px;">
                        <label style="font-size: 0.65rem; font-weight: bold; margin-bottom: 3px; display: block;">DESCRIPCIÓN DEL LUGAR:</label>
                        <div class="data-display {{ empty($formulario->descripcion_lugar) ? 'empty' : '' }}">
                            {{ $formulario->descripcion_lugar ?? 'No especificada' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- INSTITUCIONES O ENTES PARTICIPANTES -->
            <div style="border: 1px solid #000; margin-bottom: 8px;">
                <div style="background-color: #f0f0f0; padding: 4px; border-bottom: 1px solid #000; font-weight: bold; font-size: 0.75rem; text-align: center;">INSTITUCIONES O ENTES PARTICIPANTES</div>
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; border-bottom: 1px solid #000;">
                    <div style="padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.65rem; text-align: center;">INSTITUCIÓN O ENTE</div>
                    <div style="padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.65rem; text-align: center;">RESPONSABLE</div>
                    <div style="padding: 4px; font-weight: bold; font-size: 0.65rem; text-align: center;">CANTIDAD</div>
                </div>
                @if($formulario->instituciones_participantes && count($formulario->instituciones_participantes) > 0)
                    @foreach(array_map(null, $formulario->instituciones_participantes, $formulario->responsables_participantes, $formulario->cantidades_participantes) as $participante)
                        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr;">
                            <div style="padding: 8px; border-right: 1px solid #000;">
                                <div class="data-display {{ empty($participante[0]) ? 'empty' : '' }}">
                                    {{ $participante[0] ?? 'No especificado' }}
                                </div>
                            </div>
                            <div style="padding: 8px; border-right: 1px solid #000;">
                                <div class="data-display {{ empty($participante[1]) ? 'empty' : '' }}">
                                    {{ $participante[1] ?? 'No especificado' }}
                                </div>
                            </div>
                            <div style="padding: 8px;">
                                <div class="data-display {{ empty($participante[2]) ? 'empty' : '' }}">
                                    {{ $participante[2] ?? '0' }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr;">
                        <div style="padding: 8px; border-right: 1px solid #000;">
                            <div class="data-display empty">No especificado</div>
                        </div>
                        <div style="padding: 8px; border-right: 1px solid #000;">
                            <div class="data-display empty">No especificado</div>
                        </div>
                        <div style="padding: 8px;">
                            <div class="data-display empty">0</div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- REQUERIMIENTO PARA EL EVENTO -->
            <div style="border: 1px solid #000; margin-bottom: 8px;">
                <div style="background-color: #f0f0f0; padding: 4px; border-bottom: 1px solid #000; font-weight: bold; font-size: 0.75rem; text-align: center;">REQUERIMIENTO PARA EL EVENTO</div>
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; border-bottom: 1px solid #000;">
                    <div style="padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.65rem; text-align: center;">SERVICIO DE CATERING</div>
                    <div style="padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.65rem; text-align: center;">EQUIPO DE COMUNICACIONES</div>
                    <div style="padding: 4px; font-weight: bold; font-size: 0.65rem; text-align: center;">EQUIPO DE TECNOLOGÍAS</div>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr;">
                    <div style="padding: 8px; border-right: 1px solid #000;">
                        <div class="data-display {{ empty($formulario->servicio_catering_nuevo) ? 'empty' : '' }}" style="margin-bottom: 8px;">
                            {{ $formulario->servicio_catering_nuevo ?? 'NINGUNO' }}
                        </div>
                        @if($formulario->servicio_catering_nuevo === 'OTRO' && $formulario->servicio_catering_otro)
                        <div class="data-display">
                            <strong>Especificación:</strong> {{ $formulario->servicio_catering_otro }}
                        </div>
                        @endif
                    </div>
                    <div style="padding: 8px; border-right: 1px solid #000;">
                        <div class="data-display {{ empty($formulario->comunicacion_1) ? 'empty' : '' }}" style="margin-bottom: 4px;">
                            {{ $formulario->comunicacion_1 ?? 'NINGUNO' }}
                        </div>
                        <div class="data-display {{ empty($formulario->comunicacion_2) ? 'empty' : '' }}" style="margin-bottom: 4px;">
                            {{ $formulario->comunicacion_2 ?? 'NINGUNO' }}
                        </div>
                        <div class="data-display {{ empty($formulario->comunicacion_3) ? 'empty' : '' }}" style="margin-bottom: 4px;">
                            {{ $formulario->comunicacion_3 ?? 'NINGUNO' }}
                        </div>
                        <div class="data-display {{ empty($formulario->comunicacion_4) ? 'empty' : '' }}">
                            {{ $formulario->comunicacion_4 ?? 'NINGUNO' }}
                        </div>
                    </div>
                    <div style="padding: 8px;">
                        <div class="data-display {{ empty($formulario->tecnologia_1) ? 'empty' : '' }}" style="margin-bottom: 4px;">
                            {{ $formulario->tecnologia_1 ?? 'NINGUNO' }}
                        </div>
                        <div class="data-display {{ empty($formulario->tecnologia_2) ? 'empty' : '' }}" style="margin-bottom: 4px;">
                            {{ $formulario->tecnologia_2 ?? 'NINGUNO' }}
                        </div>
                        <div class="data-display {{ empty($formulario->tecnologia_3) ? 'empty' : '' }}" style="margin-bottom: 4px;">
                            {{ $formulario->tecnologia_3 ?? 'NINGUNO' }}
                        </div>
                        <div class="data-display {{ empty($formulario->tecnologia_4) ? 'empty' : '' }}">
                            {{ $formulario->tecnologia_4 ?? 'NINGUNO' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- NOTAS ADICIONALES -->
            <div style="border: 1px solid #000; margin-bottom: 15px;">
                <div style="background-color: #f0f0f0; padding: 4px; border-bottom: 1px solid #000; font-weight: bold; font-size: 0.75rem;">NOTAS ADICIONALES:</div>
                <div >
                    <div class="data-display {{ empty($formulario->notas_adicionales) ? 'empty' : '' }}" style="border: none; background: transparent; padding: 6px; line-height: 1.2em;">
                        {{ $formulario->notas_adicionales ?? 'Sin notas adicionales' }}
                    </div>
                </div>
            </div>

            <!-- SECCIÓN DE FIRMAS -->
            <div style="border: 1px solid #000; margin-bottom: 8px;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; border-bottom: 1px solid #000;">
                    <div style="background-color: #f0f0f0; padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.75rem; text-align: center;">UNIDAD SOLICITANTE</div>
                    <div style="background-color: #f0f0f0; padding: 4px; font-weight: bold; font-size: 0.75rem; text-align: center;">APROBACIÓN</div>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; border-bottom: 1px solid #000;">
                    <div style="padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.65rem; text-align: center;">ELABORADO POR:</div>
                    <div style="padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.65rem; text-align: center;">APROBADO POR:</div>
                    <div style="padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.65rem; text-align: center;">VERIFICADO POR:</div>
                    <div style="padding: 4px; font-weight: bold; font-size: 0.65rem; text-align: center;">AUTORIZADO POR:</div>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; border-bottom: 1px solid #000;">
                    <div style="padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.6rem; text-align: center;">NOMBRE Y APELLIDO:</div>
                    <div style="padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.6rem; text-align: center;">NOMBRE Y APELLIDO:</div>
                    <div style="padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.6rem; text-align: center;">NOMBRE Y APELLIDO:</div>
                    <div style="padding: 4px; font-weight: bold; font-size: 0.6rem; text-align: center;">NOMBRE Y APELLIDO:</div>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; border-bottom: 1px solid #000;">
                    <div style="padding: 15px; border-right: 1px solid #000;">
                        <div class="data-display {{ empty($formulario->elaborado_nombre) ? 'empty' : '' }}" style="border: none; border-bottom: 1px solid #000; background: transparent; font-size: 0.7rem;">
                            {{ $formulario->elaborado_nombre ?? '____________________' }}
                        </div>
                    </div>
                    <div style="padding: 15px; border-right: 1px solid #000;">
                        <div class="data-display {{ empty($formulario->aprobado_nombre) ? 'empty' : '' }}" style="border: none; border-bottom: 1px solid #000; background: transparent; font-size: 0.7rem;">
                            {{ $formulario->aprobado_nombre ?? '____________________' }}
                        </div>
                    </div>
                    <div style="padding: 15px;">
                        <div class="data-display {{ empty($formulario->autorizado_nombre_2) ? 'empty' : '' }}" style="border: none; border-bottom: 1px solid #000; background: transparent; font-size: 0.7rem;">
                            {{ $formulario->autorizado_nombre_2 ?? 'LIC. LILIBETH IBARRA' }}
                        </div>
                    </div>
                    <div style="padding: 15px; border-left: 1px solid #000;">
                        <select name="autorizado_nombre" style="width: 100%; border: none; border-bottom: 1px solid #000; background: transparent; font-size: 0.7rem; padding: 0.4rem 0; min-height: 28px;">
                            <option value="ING. LUIS LUNAR" {{ ($formulario->autorizado_nombre ?? '') == 'LIC. MARLYN ALVARADO' ? 'selected' : '' }}>LIC. MARLYN ALVARADO</option>
                            <option value="LIC. GERTRUDIS INFANTE" {{ ($formulario->autorizado_nombre ?? '') == 'LIC. GERTRUDIS INFANTE' ? 'selected' : '' }}>LIC. GERTRUDIS INFANTE</option>
                        </select>
                    </div>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr;">
                    <div style="padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.6rem; text-align: center;">FIRMA Y SELLO:</div>
                    <div style="padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.6rem; text-align: center;">FIRMA Y SELLO:</div>
                    <div style="padding: 4px; border-right: 1px solid #000; font-weight: bold; font-size: 0.6rem; text-align: center;">FIRMA Y SELLO:</div>
                    <div style="padding: 4px; font-weight: bold; font-size: 0.6rem; text-align: center;">FIRMA Y SELLO:</div>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr;">
                    <div style="padding: 30px; border-right: 1px solid #000;"></div>
                    <div style="padding: 30px; border-right: 1px solid #000;"></div>
                    <div style="padding: 30px; border-right: 1px solid #000;"></div>
                    <div style="padding: 30px;"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Función para imprimir
        window.onload = function() {
            // Auto-focus en la ventana para facilitar la impresión con Ctrl+P
            window.focus();
        };

        // Atajos de teclado
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.key === 'p') {
                e.preventDefault();
                window.print();
            }
        });
    </script>
</body>
</html>
