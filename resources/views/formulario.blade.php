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
            <h1>Reporte de Actividades para el control de la Oficina de Gestión Comunicacional</h1>
            <p>El siguiente formulario se genera en aras de mantener la Oficina de Gestión Comunicacional informada sobre las actividades, si necesitan apoyo fotográfico y cobertura comunicacional, así como también agendar las reuniones que necesiten apoyo protocolar de la Fundación.</p>

            <form action="{{ route('formulario.store') }}" method="POST" id="formularioActividades">
                @csrf
                <div class="form-group">
                    <label for="gerencia">Gerencia</label>
                    <input type="text" id="gerencia" name="gerencia" required>
                </div>

                <div class="date-time-group">
                    <div class="form-group">
                        <label for="fecha_actividad">Fecha de actividad</label>
                        <input type="date" id="fecha_actividad" name="fecha_actividad" required>
                    </div>

                    <div class="form-group">
                        <label for="hora_actividad">Hora de actividad</label>
                        <input type="time" id="hora_actividad" name="hora_actividad" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" id="estado" name="estado" required>
                </div>

                <div class="form-group">
                    <label for="municipio">Municipio</label>
                    <input type="text" id="municipio" name="municipio" required>
                </div>

                <div class="form-group">
                    <label for="parroquia">Parroquia</label>
                    <input type="text" id="parroquia" name="parroquia" required>
                </div>

                <div class="form-group">
                    <label for="lugar">Lugar</label>
                    <input type="text" id="lugar" name="lugar" required>
                </div>

                <div class="form-group">
                    <label for="institucion_entes">Institución o entes involucrados</label>
                    <input type="text" id="institucion_entes" name="institucion_entes" required>
                </div>

                <div class="form-group">
                    <label for="responsable">Responsable de la reunión o actividad</label>
                    <input type="text" id="responsable" name="responsable" required>
                </div>

                <div class="form-group">
                    <label for="tematica">Temática o asunto de la actividad</label>
                    <textarea id="tematica" name="tematica" required></textarea>
                </div>

                <div class="form-group">
                    <label for="cantidad_personas">Cantidad de personas promedio que participarán en la actividad</label>
                    <input type="number" id="cantidad_personas" name="cantidad_personas" min="0" required>
                </div>

                <div class="form-group">
                    <label for="requiere_cobertura">Requiere cobertura de la oficina de gestión comunicacional</label>
                    <select id="requiere_cobertura" name="requiere_cobertura" required>
                        <option value="">Seleccione una opción</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="requiere_protocolar">Requiere de personal protocolar</label>
                    <select id="requiere_protocolar" name="requiere_protocolar" required>
                        <option value="">Seleccione una opción</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <span class="section-title">¿Requiere de apoyo logístico? Indique cuáles</span>
                    <div class="checkbox-group">
                        <div><input type="checkbox" id="apoyo_logistico_agua" name="apoyo_logistico[]" value="agua"><label for="apoyo_logistico_agua">Agua</label></div>
                        <div><input type="checkbox" id="apoyo_logistico_cafe" name="apoyo_logistico[]" value="cafe"><label for="apoyo_logistico_cafe">Café</label></div>
                        <div><input type="checkbox" id="apoyo_logistico_te" name="apoyo_logistico[]" value="te"><label for="apoyo_logistico_te">Té</label></div>
                        <div><input type="checkbox" id="apoyo_logistico_galletas" name="apoyo_logistico[]" value="galletas"><label for="apoyo_logistico_galletas">Galletas</label></div>
                        <div><input type="checkbox" id="apoyo_logistico_almuerzo" name="apoyo_logistico[]" value="almuerzo"><label for="apoyo_logistico_almuerzo">Almuerzo</label></div>
                        <div><input type="checkbox" id="apoyo_logistico_cena" name="apoyo_logistico[]" value="cena"><label for="apoyo_logistico_cena">Cena</label></div>
                        <div><input type="checkbox" id="apoyo_logistico_ninguna" name="apoyo_logistico[]" value="ninguna"><label for="apoyo_logistico_ninguna">Ninguna</label></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="otro_elemento">Requiere de apoyo de algún otro elemento</label>
                    <textarea id="otro_elemento" name="otro_elemento"></textarea>
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
        document.getElementById('formularioActividades').addEventListener('submit', function(e) {
            // Prevenir envío múltiple
            if (this.submitted) {
                e.preventDefault();
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
        });

        // Manejar la lógica de los checkboxes de apoyo logístico
        document.addEventListener('DOMContentLoaded', function() {
            const ningunaCheckbox = document.getElementById('apoyo_logistico_ninguna');
            const otrosCheckboxes = document.querySelectorAll('input[name="apoyo_logistico[]"]:not(#apoyo_logistico_ninguna)');

            // Función para actualizar el estado de los checkboxes
            function actualizarCheckboxes() {
                const ningunaSeleccionada = ningunaCheckbox.checked;

                otrosCheckboxes.forEach(checkbox => {
                    checkbox.disabled = ningunaSeleccionada;
                    if (ningunaSeleccionada) {
                        checkbox.checked = false;
                    }
                });
            }

            // Cuando se selecciona "ninguna de las anteriores"
            ningunaCheckbox.addEventListener('change', function() {
                actualizarCheckboxes();
            });

            // Cuando se selecciona cualquier otra opción
            otrosCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        ningunaCheckbox.checked = false;
                    }
                });
            });
        });
    </script>
</body>
</html>
