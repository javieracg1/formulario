<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Actividades</title>
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
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            border: 1px solid var(--border-color);
            position: relative;
        }

        h1 {
            color: var(--primary-color);
            font-size: 1.75rem;
            margin-bottom: 1rem;
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
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--secondary-color);
            font-weight: 500;
            font-size: 0.95rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 0.625rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 0.95rem;
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
            min-width: 200px;
            padding: 0.5rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 0.95rem;
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
            min-height: 100px;
        }

        button {
            background-color: var(--accent-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            width: 100%;
            margin-top: 1.5rem;
            transition: background-color 0.2s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .section-title {
            color: var(--primary-color);
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 1rem;
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
                padding: 1.5rem;
                margin: 1rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            .checkbox-group {
                grid-template-columns: 1fr;
            }
            .date-time-group {
                flex-direction: column;
                gap: 1rem;
            }

            input[type="date"],
            input[type="time"] {
                width: 100%;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="top-bar">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>
    <div class="main-content">
        <div class="container">
            <!-- Fecha y hora de registro -->
            <div style="display: flex; justify-content: flex-end; margin-bottom: 15px;">
                <div style="border: 1px solid #000; padding: 8px; background-color: #f8f8f8;">
                    <div style="font-size: 0.7rem; font-weight: bold; text-align: center; margin-bottom: 5px;">FECHA Y HORA DE REGISTRO</div>
                    <input type="datetime-local" id="fechaRegistro" name="fechaRegistro" readonly style="font-size: 0.7rem; text-align: center; border: none; background: transparent; width: 180px;">
                </div>
            </div>

            <!-- Título principal -->
            <div style="text-align: center; margin-bottom: 2rem;">
                <h1 style="font-size: 1.2rem; font-weight: bold; margin: 0; padding: 10px; border: 2px solid #000;">CONTROL DE PAUTA COMUNICACIONAL</h1>
            </div>

            <!-- Mostrar errores de validación -->
            @if ($errors->any())
                <div style="background-color: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                    <h4 style="margin: 0 0 10px 0; font-size: 1rem;">Errores en el formulario:</h4>
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('formulario.store') }}" method="POST" id="formularioActividades">
                @csrf
                <!-- UNIDAD SOLICITANTE -->
                <div style="border: 1px solid #000; margin-bottom: 10px;">
                    <div style="background-color: #f0f0f0; padding: 5px; border-bottom: 1px solid #000; font-weight: bold; font-size: 0.9rem;">UNIDAD SOLICITANTE</div>
                    <div style="padding: 10px;">
                        <select name="unidad_solicitante" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="">Elija un elemento</option>
                            <option value="OFICINA DE PLANIFICACIÓN Y PRESUPUESTO">OFICINA DE PLANIFICACIÓN Y PRESUPUESTO</option>
                            <option value="OFICINA DE GESTIÓN ADMINISTRATIVA">OFICINA DE GESTIÓN ADMINISTRATIVA</option>
                            <option value="OFICINA DE GESTIÓN COMUNICACIONAL">OFICINA DE GESTIÓN COMUNICACIONAL</option>
                            <option value="OFICINA DE GESTIÓN HUMANA">OFICINA DE GESTIÓN HUMANA</option>
                            <option value="OFICINA DE TECNOLOGÍAS DE LA INFORMACIÓN Y LA COMUNICACIÓN">OFICINA DE TECNOLOGÍAS DE LA INFORMACIÓN Y LA COMUNICACIÓN</option>
                            <option value="OFICINA DE PREVENCIÓN Y SEGURIDAD INTEGRAL">OFICINA DE PREVENCIÓN Y SEGURIDAD INTEGRAL</option>
                            <option value="GERENCIA GENERAL DEL OBSERVATORIO DEL TRANSPORTE">GERENCIA GENERAL DEL OBSERVATORIO DEL TRANSPORTE</option>
                            <option value="GERENCIA DE PROYECTOS ESTRATÉGICOS DE TRANSPORTE">GERENCIA DE PROYECTOS ESTRATÉGICOS DE TRANSPORTE</option>
                            <option value="PRESIDENCIA">PRESIDENCIA</option>
                        </select>
                    </div>
                </div>

                <!-- DATOS DEL EVENTO -->
                <div style="border: 1px solid #000; margin-bottom: 10px;">
                    <div style="background-color: #f0f0f0; padding: 5px; border-bottom: 1px solid #000; font-weight: bold; font-size: 0.9rem; text-align: center;">DATOS DEL EVENTO</div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; border-bottom: 1px solid #000;">
                        <div style="padding: 5px; border-right: 1px solid #000; font-weight: bold; font-size: 0.8rem; text-align: center;">DESCRIPCIÓN</div>
                        <div style="padding: 5px; border-right: 1px solid #000; font-weight: bold; font-size: 0.8rem; text-align: center;">FECHA</div>
                        <div style="padding: 5px; font-weight: bold; font-size: 0.8rem; text-align: center;">HORAS</div>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr;">
                        <div style="padding: 15px; border-right: 1px solid #000; display: flex; align-items: center;">
                            <input type="text" name="nombre_evento" placeholder="Descripción del evento" style="width: 100%; border: none; outline: none; font-size: 0.9rem;">
                        </div>
                        <div style="padding: 15px; border-right: 1px solid #000; display: flex; align-items: center;">
                            <input type="date" name="fecha_evento" style="width: 100%; border: none; outline: none; font-size: 0.9rem;">
                        </div>
                        <div style="padding: 10px; display: flex; flex-direction: column; gap: 8px;">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <div style="flex: 2;">
                                    <label style="font-size: 0.7rem; font-weight: bold; margin-bottom: 2px; display: block; color: #666;">DESDE:</label>
                                    <input type="time" name="hora_desde" style="width: 100%; border: none; outline: none; font-size: 0.8rem; padding: 2px;"><br>
                                    <label style="font-size: 0.7rem; font-weight: bold; margin-bottom: 2px; display: block; color: #666;">HASTA:</label>
                                    <input type="time" name="hora_hasta" style="width: 100%; border: none; outline: none; font-size: 0.8rem; padding: 2px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="border-top: 1px solid #000; padding: 10px;">
                        <div style="margin-bottom: 15px;">
                            <div style="font-weight: bold; font-size: 0.8rem; margin-bottom: 8px;">OBJETIVO PRINCIPAL DEL EVENTO:</div>
                            <input type="text" name="objetivo_evento" placeholder="Describa el objetivo principal del evento" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 0.9rem;">
                        </div>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <span style="font-size: 0.8rem; font-weight: bold; min-width: 100px;">TIPO DE EVENTO:</span>
                            <select name="tipo_evento" id="tipoEvento" style="flex: 1; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                                <option value="">Elija un elemento</option>
                                <option value="institucional">INSTITUCIONAL</option>
                                <option value="protocolar">PROTOCOLAR</option>
                                <option value="social">SOCIAL</option>
                                <option value="cultural">CULTURAL</option>
                                <option value="otro">OTRO</option>
                            </select>
                        </div>
                        <div id="otroTipoEvento" style="margin-top: 10px; display: none;">
                            <input type="text" name="tipo_evento_otro" placeholder="Especifique el tipo de evento" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px; font-size: 0.9rem;">
                        </div>
                    </div>
                </div>

                <!-- INSTITUCIÓN O ENTE RESPONSABLE -->
                <div style="border: 1px solid #000; margin-bottom: 10px;">
                    <div style="background-color: #f0f0f0; padding: 5px; border-bottom: 1px solid #000; font-weight: bold; font-size: 0.9rem;">INSTITUCIÓN O ENTE RESPONSABLE DEL EVENTO:</div>
                    <div style="padding: 10px;">
                        <input type="text" name="institucion_responsable" placeholder="Ingrese el nombre de la institución o ente responsable">
                    </div>
                </div>

                <!-- LUGAR DEL EVENTO -->
                <div style="border: 1px solid #000; margin-bottom: 10px;">
                    <div style="background-color: #f0f0f0; padding: 5px; border-bottom: 1px solid #000; font-weight: bold; font-size: 0.9rem;">LUGAR DEL EVENTO:</div>
                    <div style="padding: 10px;">
                                            <div style="margin-bottom: 15px;">
                        <label style="font-size: 0.8rem; font-weight: bold; margin-bottom: 5px; display: block;">AMBIENTE:</label>
                        <select name="ambiente" id="ambiente" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="">Elija un elemento</option>
                            <option value="AUDITORIO">AUDITORIO</option>
                            <option value="SALA DE USOS MÚLTIPLES">SALA DE USOS MÚLTIPLES</option>
                            <option value="OTRO">OTRO</option>
                        </select>
                        <div id="otroAmbiente" style="margin-top: 10px; display: none;">
                            <input type="text" name="ambiente_otro" placeholder="Especifique el ambiente" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px; font-size: 0.9rem;">
                        </div>
                    </div>
                        <div style="margin-top: 15px;">
                            <label style="font-size: 0.8rem; font-weight: bold; margin-bottom: 5px; display: block;">LUGAR DEL EVENTO:</label>
                            <input type="text" name="descripcion_lugar" placeholder="Describa el lugar específico del evento (dirección, sala, etc.)" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        </div>
                    </div>
                </div>

                                <!-- INSTITUCIONES O ENTES PARTICIPANTES -->
                                <div style="border: 1px solid #000; margin-bottom: 10px;">
                                    <div style="background-color: #f0f0f0; padding: 5px; border-bottom: 1px solid #000; font-weight: bold; font-size: 0.9rem; text-align: center;">INSTITUCIONES O ENTES PARTICIPANTES</div>
                                    <div id="participantes-container">
                                        <!-- Fila inicial de participantes -->
                                        <div class="participante-row" style="display: grid; grid-template-columns: 1fr 1fr 1fr auto; border-bottom: 1px solid #eee; padding: 10px 0;">
                                            <div style="padding: 0 10px; border-right: 1px solid #eee;">
                                                <input type="text" name="instituciones_participantes[]" placeholder="Institución o Ente" style="width: 100%; border: none; outline: none; font-size: 0.8rem;">
                                            </div>
                                            <div style="padding: 0 10px; border-right: 1px solid #eee;">
                                                <input type="text" name="responsables_participantes[]" placeholder="Responsable" style="width: 100%; border: none; outline: none; font-size: 0.8rem;">
                                            </div>
                                            <div style="padding: 0 10px;">
                                                <input type="number" name="cantidades_participantes[]" placeholder="Cantidad" min="0" style="width: 100%; border: none; outline: none; font-size: 0.8rem; text-align: center;">
                                            </div>
                                            <div style="display: flex; align-items: center; padding: 0 10px;">
                                                <button type="button" class="remove-participante" style="background-color: #dc3545; color: white; border: none; border-radius: 4px; padding: 5px 8px; cursor: pointer; font-size: 0.7rem; width: auto; margin-top: 0;">-</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding: 10px; text-align: center; border-top: 1px solid #000;">
                                        <button type="button" id="add-participante" style="background-color: #28a745; color: white; border: none; border-radius: 4px; padding: 8px 12px; cursor: pointer; font-size: 0.8rem; width: auto; margin-top: 0;">Añadir Participante</button>
                                    </div>
                                </div>

                <!-- REQUERIMIENTO PARA EL EVENTO -->
                <div style="border: 1px solid #000; margin-bottom: 10px;">
                    <div style="background-color: #f0f0f0; padding: 5px; border-bottom: 1px solid #000; font-weight: bold; font-size: 0.9rem; text-align: center;">REQUERIMIENTO PARA EL EVENTO</div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; border-bottom: 1px solid #000;">
                        <div style="padding: 5px; border-right: 1px solid #000; font-weight: bold; font-size: 0.8rem; text-align: center;">SERVICIO DE CATERING</div>
                        <div style="padding: 5px; border-right: 1px solid #000; font-weight: bold; font-size: 0.8rem; text-align: center;">ELEMENTO COMUNICACIONAL</div>
                        <div style="padding: 5px; font-weight: bold; font-size: 0.8rem; text-align: center;">EQUIPO DE TECNOLOGÍAS</div>
                </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr;">
                        <div style="padding: 10px; border-right: 1px solid #000;">
                            <select name="servicio_catering_nuevo" id="servicioCartering" style="width: 100%; margin-bottom: 10px; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                                <option value="">Elija un elemento</option>
                                <option value="CATERING DE BUFFET">CATERING DE BUFFET</option>
                                <option value="CATERING DE PLATO SERVIDO">CATERING DE PLATO SERVIDO</option>
                                <option value="OTRO">OTRO</option>
                                <option value="NINGUNO">NINGUNO</option>
                            </select>
                            <div id="otroCatering" style="display: none;">
                                <input type="text" name="servicio_catering_otro" placeholder="Especifique el tipo de catering" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                </div>
                        <div style="padding: 10px; border-right: 1px solid #000;">
                            <select name="comunicacion_1" style="width: 100%; margin-bottom: 5px; padding: 4px; border: 1px solid #ccc; border-radius: 4px;">
                                <option value="">Elija un elemento</option>
                                <option value="MARKETING INSTITUCIONAL">MARKETING INSTITUCIONAL</option>
                                <option value="MARKETING EDUCATIVO">MARKETING EDUCATIVO</option>
                                <option value="MATERIAL P.O.P">MATERIAL P.O.P</option>
                                <option value="PERSONAL PROTOCOLAR">PERSONAL PROTOCOLAR</option>
                                <option value="NINGUNO">NINGUNO</option>
                            </select>
                            <select name="comunicacion_2" style="width: 100%; margin-bottom: 5px; padding: 4px; border: 1px solid #ccc; border-radius: 4px;">
                                <option value="">Elija un elemento</option>
                                <option value="MARKETING INSTITUCIONAL">MARKETING INSTITUCIONAL</option>
                                <option value="MARKETING EDUCATIVO">MARKETING EDUCATIVO</option>
                                <option value="MATERIAL P.O.P">MATERIAL P.O.P</option>
                                <option value="PERSONAL PROTOCOLAR">PERSONAL PROTOCOLAR</option>
                                <option value="NINGUNO">NINGUNO</option>
                            </select>
                            <select name="comunicacion_3" style="width: 100%; margin-bottom: 5px; padding: 4px; border: 1px solid #ccc; border-radius: 4px;">
                                <option value="">Elija un elemento</option>
                                <option value="MARKETING INSTITUCIONAL">MARKETING INSTITUCIONAL</option>
                                <option value="MARKETING EDUCATIVO">MARKETING EDUCATIVO</option>
                                <option value="MATERIAL P.O.P">MATERIAL P.O.P</option>
                                <option value="PERSONAL PROTOCOLAR">PERSONAL PROTOCOLAR</option>
                                <option value="NINGUNO">NINGUNO</option>
                            </select>
                            <select name="comunicacion_4" style="width: 100%; padding: 4px; border: 1px solid #ccc; border-radius: 4px;">
                                <option value="">Elija un elemento</option>
                                <option value="MARKETING INSTITUCIONAL">MARKETING INSTITUCIONAL</option>
                                <option value="MARKETING EDUCATIVO">MARKETING EDUCATIVO</option>
                                <option value="MATERIAL P.O.P">MATERIAL P.O.P</option>
                                <option value="PERSONAL PROTOCOLAR">PERSONAL PROTOCOLAR</option>
                                <option value="NINGUNO">NINGUNO</option>
                    </select>
                </div>
                        <div style="padding: 10px;">
                            <select name="tecnologia_1" style="width: 100%; margin-bottom: 5px; padding: 4px; border: 1px solid #ccc; border-radius: 4px;">
                                <option value="">Elija un elemento</option>
                                <option value="SONIDO">SONIDO</option>
                                <option value="PROYECCIÓN">PROYECCIÓN</option>
                                <option value="INTERNET">INTERNET</option>
                                <option value="NINGUNO">NINGUNO</option>
                            </select>
                            <select name="tecnologia_2" style="width: 100%; margin-bottom: 5px; padding: 4px; border: 1px solid #ccc; border-radius: 4px;">
                                <option value="">Elija un elemento</option>
                                <option value="SONIDO">SONIDO</option>
                                <option value="PROYECCIÓN">PROYECCIÓN</option>
                                <option value="INTERNET">INTERNET</option>
                                <option value="NINGUNO">NINGUNO</option>
                            </select>
                            <select name="tecnologia_3" style="width: 100%; margin-bottom: 5px; padding: 4px; border: 1px solid #ccc; border-radius: 4px;">
                                <option value="">Elija un elemento</option>
                                <option value="SONIDO">SONIDO</option>
                                <option value="PROYECCIÓN">PROYECCIÓN</option>
                                <option value="INTERNET">INTERNET</option>
                                <option value="NINGUNO">NINGUNO</option>
                            </select>
                            <select name="tecnologia_4" style="width: 100%; padding: 4px; border: 1px solid #ccc; border-radius: 4px;">
                                <option value="">Elija un elemento</option>
                                <option value="SONIDO">SONIDO</option>
                                <option value="PROYECCIÓN">PROYECCIÓN</option>
                                <option value="INTERNET">INTERNET</option>
                                <option value="NINGUNO">NINGUNO</option>
                    </select>
                        </div>
                    </div>
                </div>

                <!-- NOTAS ADICIONALES -->
                <div style="border: 1px solid #000; margin-bottom: 20px;">
                    <div style="background-color: #f0f0f0; padding: 5px; border-bottom: 1px solid #000; font-weight: bold; font-size: 0.9rem;">NOTAS ADICIONALES:</div>
                    <div style="padding: 10px; min-height: 100px;">
                        <textarea name="notas_adicionales" style="width: 100%; height: 80px; border: none; resize: vertical;" placeholder="Escriba aquí las notas adicionales..."></textarea>
                    </div>
                </div>

                <!-- SECCIÓN DE FIRMAS -->
                <div style="border: 1px solid #000; margin-bottom: 10px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; border-bottom: 1px solid #000;">
                        <div style="background-color: #f0f0f0; padding: 5px; border-right: 1px solid #000; font-weight: bold; font-size: 0.9rem; text-align: center;">UNIDAD SOLICITANTE</div>
                        <div style="background-color: #f0f0f0; padding: 5px; font-weight: bold; font-size: 0.9rem; text-align: center;">APROBACIÓN</div>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; border-bottom: 1px solid #000;">
                        <div style="padding: 5px; border-right: 1px solid #000; font-weight: bold; font-size: 0.8rem; text-align: center;">ELABORADO POR:</div>
                        <div style="padding: 5px; border-right: 1px solid #000; font-weight: bold; font-size: 0.8rem; text-align: center;">APROBADO POR:</div>
                        <div style="padding: 5px; border-right: 1px solid #000; font-weight: bold; font-size: 0.8rem; text-align: center;">VERIFICADO POR:</div>
                        <div style="padding: 5px; font-weight: bold; font-size: 0.8rem; text-align: center;">AUTORIZADO POR:</div>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; border-bottom: 1px solid #000;">
                        <div style="padding: 5px; border-right: 1px solid #000; font-weight: bold; font-size: 0.7rem; text-align: center;">NOMBRE Y APELLIDO:</div>
                        <div style="padding: 5px; border-right: 1px solid #000; font-weight: bold; font-size: 0.7rem; text-align: center;">NOMBRE Y APELLIDO:</div>
                        <div style="padding: 5px; border-right: 1px solid #000; font-weight: bold; font-size: 0.7rem; text-align: center;">NOMBRE Y APELLIDO:</div>
                        <div style="padding: 5px; font-weight: bold; font-size: 0.7rem; text-align: center;">NOMBRE Y APELLIDO:</div>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; border-bottom: 1px solid #000;">
                        <div style="padding: 20px; border-right: 1px solid #000;">
                            <input type="text" name="elaborado_nombre" style="width: 100%; border: none; border-bottom: 1px solid #000; font-size: 0.7rem;">
                        </div>
                        <div style="padding: 20px; border-right: 1px solid #000;">
                            <input type="text" name="aprobado_nombre" style="width: 100%; border: none; border-bottom: 1px solid #000; font-size: 0.7rem;">
                        </div>
                        <div style="padding: 20px; border-right: 1px solid #000;">
                            <input type="text" name="autorizado_nombre_2" value="LIC. CAROLINA GÓMEZ" style="width: 100%; border: none; border-bottom: 1px solid #000; font-size: 0.7rem;" disabled>
                        </div>
                        <div style="padding: 20px;">
                            <input type="text" name="autorizado_nombre" style="width: 100%; border: none; border-bottom: 1px solid #000; font-size: 0.7rem;" disabled>
                        </div>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr;">
                        <div style="padding: 5px; border-right: 1px solid #000; font-weight: bold; font-size: 0.7rem; text-align: center;">FIRMA Y SELLO:</div>
                        <div style="padding: 5px; border-right: 1px solid #000; font-weight: bold; font-size: 0.7rem; text-align: center;">FIRMA Y SELLO:</div>
                        <div style="padding: 5px; border-right: 1px solid #000; font-weight: bold; font-size: 0.7rem; text-align: center;">FIRMA Y SELLO:</div>
                        <div style="padding: 5px; font-weight: bold; font-size: 0.7rem; text-align: center;">FIRMA Y SELLO:</div>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr;">
                        <div style="padding: 40px; border-right: 1px solid #000;"></div>
                        <div style="padding: 40px; border-right: 1px solid #000;"></div>
                        <div style="padding: 40px; border-right: 1px solid #000;"></div>
                        <div style="padding: 40px;"></div>
                    </div>
                </div>

                <button type="submit">Enviar Reporte</button>
            </form>
        </div>
    </div>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#007bff',
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route('formulario.question') }}';
            }
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: "{{ session('error') }}",
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Entendido'
        });
    </script>
    @endif

    <script>
        // Variables para control de reintentos
        let intentos = 0;
        const maxIntentos = 3;
        const tiempoEntreIntentos = 2000; // 2 segundos
        let controller = null;
        let timeoutId = null;

        // Función para manejar errores
        function manejarError(mensaje) {
            console.error('Error:', mensaje);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: mensaje || 'Ha ocurrido un error al procesar el formulario',
                confirmButtonColor: '#dc3545',
                confirmButtonText: 'Entendido'
            });
        }

        // Función para intentar enviar el formulario
        function intentarEnvio() {
            const formulario = document.getElementById('formularioActividades');
            const formData = new FormData(formulario);
            const actionUrl = formulario.getAttribute('action');
            const formMethod = formulario.getAttribute('method') || 'POST';

            // Cancelar solicitud anterior si existe
            if (controller) {
                controller.abort();
            }

            // Crear nuevo controlador para esta solicitud
            controller = new AbortController();

            // Establecer timeout para la solicitud
            if (timeoutId) {
                clearTimeout(timeoutId);
            }

            timeoutId = setTimeout(() => {
                controller.abort();
                if (intentos < maxIntentos) {
                    intentos++;
                    console.log(`Reintento ${intentos} de ${maxIntentos}`);
                    intentarEnvio();
                } else {
                    manejarError('Tiempo de espera agotado. Por favor intente nuevamente más tarde.');
                }
            }, 30000); // 30 segundos de timeout

            fetch(actionUrl, {
                method: formMethod,
                body: formData,
                signal: controller.signal,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                clearTimeout(timeoutId);
                if (!response.ok) {
                    throw new Error(`Error de servidor: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: data.message || 'Formulario enviado correctamente',
                        confirmButtonColor: '#007bff',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = data.redirect || '/';
                        }
                    });
                } else {
                    manejarError(data.message || 'Error al procesar el formulario');
                }
            })
            .catch(error => {
                clearTimeout(timeoutId);
                if (error.name === 'AbortError') {
                    console.log('Solicitud abortada');
                    return; // No mostrar error si fue un abort controlado
                }

                if (intentos < maxIntentos) {
                    intentos++;
                    console.log(`Reintento ${intentos} de ${maxIntentos} debido a: ${error.message}`);
                    setTimeout(intentarEnvio, tiempoEntreIntentos);
                } else {
                    manejarError('Error de conexión. Por favor intente nuevamente más tarde.');
                }
            });
        }

        document.getElementById('formularioActividades').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevenir el envío tradicional del formulario

            // Debug: Verificar datos del formulario antes del envío
            const formData = new FormData(this);
            console.log('=== DATOS DEL FORMULARIO ===');
            for (let [key, value] of formData.entries()) {
                console.log(key + ': ' + value);
            }

            // Verificar campos requeridos específicos
            const camposRequeridos = [
                'unidad_solicitante',
                'nombre_evento',
                'fecha_evento',
                'hora_desde',
                'hora_hasta',
                'objetivo_evento',
                'tipo_evento',
                'institucion_responsable'
            ];

            let camposFaltantes = [];
            camposRequeridos.forEach(campo => {
                const valor = formData.get(campo);
                if (!valor || valor.trim() === '') {
                    camposFaltantes.push(campo);
                }
            });

            if (camposFaltantes.length > 0) {
                console.error('Campos requeridos faltantes:', camposFaltantes);
                Swal.fire({
                    icon: 'error',
                    title: 'Campos requeridos',
                    text: 'Por favor complete todos los campos requeridos: ' + camposFaltantes.join(', '),
                    confirmButtonColor: '#dc3545'
                });
                return;
            }

            // Prevenir envío múltiple
            if (this.submitted) {
                return;
            }
            this.submitted = true;

            // Mostrar loading mientras se procesa
            Swal.fire({
                title: 'Procesando...',
                text: 'Por favor espere mientras se envía el formulario',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Iniciar el proceso de envío
            intentos = 0;
            intentarEnvio();
        });

        // Funcionalidad de elementos específicos del formulario
        document.addEventListener('DOMContentLoaded', function() {
            // Verificar que los elementos existan antes de agregar eventos
            console.log('DOM loaded, inicializando eventos del formulario');
        });

        const fechaActual = new Date();
        const año = fechaActual.getFullYear();
        const mes = String(fechaActual.getMonth() + 1).padStart(2, '0');
        const dia = String(fechaActual.getDate()).padStart(2, '0');
        const horas = String(fechaActual.getHours()).padStart(2, '0');
        const minutos = String(fechaActual.getMinutes()).padStart(2, '0');

        const fechaHoraFormateada = `${año}-${mes}-${dia}T${horas}:${minutos}`;

        const fechaRegistroInput = document.getElementById("fechaRegistro");
        if (fechaRegistroInput) {
            fechaRegistroInput.value = fechaHoraFormateada;
            console.log('Fecha de registro establecida:', fechaHoraFormateada);
        } else {
            console.error('No se encontró el campo fechaRegistro');
        }

        // Manejar la funcionalidad del desplegable "OTRO" en tipo de evento
        const tipoEvento = document.getElementById('tipoEvento');
        if (tipoEvento) {
            tipoEvento.addEventListener('change', function() {
                const otroTipoEvento = document.getElementById('otroTipoEvento');
                const inputOtro = document.querySelector('input[name="tipo_evento_otro"]');

                if (otroTipoEvento && inputOtro) {
                    if (this.value === 'otro') {
                        otroTipoEvento.style.display = 'block';
                        inputOtro.required = true;
                    } else {
                        otroTipoEvento.style.display = 'none';
                        inputOtro.required = false;
                        inputOtro.value = '';
                    }
                    }
                });
            }

        // Manejar la funcionalidad del desplegable "OTRO" en Ambiente
        const ambiente = document.getElementById('ambiente');
        if (ambiente) {
            ambiente.addEventListener('change', function() {
                const otroAmbiente = document.getElementById('otroAmbiente');
                const inputOtro = document.querySelector('input[name="ambiente_otro"]');

                if (otroAmbiente && inputOtro) {
                    if (this.value === 'OTRO') {
                        otroAmbiente.style.display = 'block';
                        inputOtro.required = true;
                    } else {
                        otroAmbiente.style.display = 'none';
                        inputOtro.required = false;
                        inputOtro.value = '';
                    }
                    }
                });
            }

        // Manejar la funcionalidad del desplegable "OTRO" en servicio de catering
        const servicioCartering = document.getElementById('servicioCartering');
        if (servicioCartering) {
            servicioCartering.addEventListener('change', function() {
                const otroCatering = document.getElementById('otroCatering');
                const inputOtroCatering = document.querySelector('input[name="servicio_catering_otro"]');

                if (otroCatering && inputOtroCatering) {
                    if (this.value === 'OTRO') {
                        otroCatering.style.display = 'block';
                        inputOtroCatering.required = true;
                    } else {
                        otroCatering.style.display = 'none';
                        inputOtroCatering.required = false;
                        inputOtroCatering.value = '';
                    }
                }
            });
        }

        // Lógica para añadir y remover participantes dinámicamente
        const addParticipanteButton = document.getElementById('add-participante');
        const participantesContainer = document.getElementById('participantes-container');

        if (addParticipanteButton && participantesContainer) {
            addParticipanteButton.addEventListener('click', function() {
                const newRow = document.createElement('div');
                newRow.classList.add('participante-row');
                newRow.style.cssText = 'display: grid; grid-template-columns: 1fr 1fr 1fr auto; border-bottom: 1px solid #eee; padding: 10px 0;';
                newRow.innerHTML = `
                    <div style="padding: 0 10px; border-right: 1px solid #eee;">
                        <input type="text" name="instituciones_participantes[]" placeholder="Institución o Ente" style="width: 100%; border: none; outline: none; font-size: 0.8rem;">
                    </div>
                    <div style="padding: 0 10px; border-right: 1px solid #eee;">
                        <input type="text" name="responsables_participantes[]" placeholder="Responsable" style="width: 100%; border: none; outline: none; font-size: 0.8rem;">
                    </div>
                    <div style="padding: 0 10px;">
                        <input type="number" name="cantidades_participantes[]" placeholder="Cantidad" min="0" style="width: 100%; border: none; outline: none; font-size: 0.8rem; text-align: center;">
                    </div>
                    <div style="display: flex; align-items: center; padding: 0 10px;">
                        <button type="button" class="remove-participante" style="background-color: #dc3545; color: white; border: none; border-radius: 4px; padding: 5px 8px; cursor: pointer; font-size: 0.7rem; width: auto; margin-top: 0;">-</button>
                    </div>
                `;
                participantesContainer.appendChild(newRow);
            });

            participantesContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-participante')) {
                    if (participantesContainer.querySelectorAll('.participante-row').length > 1) {
                        e.target.closest('.participante-row').remove();
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Atención',
                            text: 'Debe haber al menos una fila de participantes.',
                            confirmButtonColor: '#ffc107'
                        });
                    }
                }
            });
        }
    </script>
</body>
</html>
