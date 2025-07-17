<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregunta de Actividad Semanal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
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

        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 40px;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
            position: relative;
        }
        .auth-button {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            z-index: 1000;
            font-weight: 500;
        }
        .login-btn {
            background-color: #28a745;
            color: white;
        }
        .dashboard-btn {
            background-color: #007bff;
            color: white;
        }
        .auth-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .auth-button:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-size: 1.2em;
        }
        select {
            width: 80%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1em;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%204%205%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M2%200L0%202h4zm0%205L0%203h4z%22%2F%3E%3C%2Fsvg%3E');
            background-repeat: no-repeat;
            background-position: right 0.7em top 50%, 0 0;
            background-size: 0.65em auto, 100%;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 80%;
            margin-top: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }
        @media (max-width: 768px) {
            .auth-button {
                top: 10px;
                right: 10px;
                padding: 10px 20px;
                font-size: 14px;
            }
            .container {
                margin-top: 60px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="top-bar">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>
    @auth
        <a href="{{ route('dashboard') }}" class="auth-button dashboard-btn">Panel de Control</a>
    @else
        <a href="{{ route('login') }}" class="auth-button login-btn">Iniciar Sesión</a>
    @endauth

    <div class="main-content">
        <div class="container">
            <h1>¿Realizará alguna actividad en la semana?</h1>

            @if (session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        console.log('SweetAlert success script loaded in pregunta_actividad');
                        Swal.fire({
                            icon: 'success',
                            title: '¡Éxito!',
                            text: '{{ session('success') }}',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
                </script>
            @endif

            @if (session('error'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        console.log('SweetAlert error script loaded in pregunta_actividad');
                        Swal.fire({
                            icon: 'error',
                            title: '¡Error!',
                            text: '{{ session('error') }}',
                            showConfirmButton: true
                        });
                    });
                </script>
            @endif

            <form action="{{ route('formulario.process_question') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="realiza_actividad">Seleccione su respuesta:</label>
                    <select id="realiza_actividad" name="realiza_actividad" required>
                        <option value="">-- Seleccione --</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
</body>
</html>
