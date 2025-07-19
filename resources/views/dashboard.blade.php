<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestión Comunicacional</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            flex-direction: column;
            padding-top: 30px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            position: relative;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            margin-top: 35px;
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header h1 {
            margin: 0;
            color: #333;
        }

        .header-buttons {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .btn {
            padding: 8px 20px;
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
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .formularios-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        .formulario-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s;
            display: flex;
            flex-direction: column;
            position: relative;
        }
        .formulario-card:hover {
            transform: translateY(-5px);
        }

        /* Estilos para la vista de lista */
        .formularios-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-top: 15px;
        }

        .formularios-list .formulario-card {
            width: 100%;
            margin-bottom: 0;
            box-sizing: border-box;
        }
        .formulario-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 8px;
            margin-bottom: 10px;
        }
        .formulario-header h3 {
            margin: 0;
            color: #333;
            font-size: 1.1em;
            margin-bottom: 3px;
        }
        .formulario-header small {
            color: #666;
            font-size: 0.9em;
        }
        .formulario-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin: 8px 0;
        }

        .formulario-content .info-container {
            flex: 1;
            display: flex;
            gap: 20px;
        }

        .formulario-content p {
            margin: 3px 0;
            color: #666;
            font-size: 0.95em;
            white-space: nowrap;
        }

        .formulario-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 15px;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #eee;
        }
        .empty-state {
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 8px;
            margin-top: 20px;
        }
        .empty-state h2 {
            color: #666;
            margin-bottom: 10px;
        }
        .empty-state p {
            color: #999;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .pagination a {
            padding: 8px 12px;
            background: white;
            border-radius: 4px;
            text-decoration: none;
            color: #007bff;
            transition: background-color 0.2s;
        }
        .pagination a:hover {
            background-color: #f8f9fa;
        }
        .pagination .active {
            background-color: #007bff;
            color: white;
        }

        .notifications-icon {
            position: relative;
            cursor: pointer;
            padding: 8px;
            color: #495057;
            transition: color 0.3s ease;
            font-size: 20px;
        }

        .notifications-icon:hover {
            color: #007bff;
        }

        .notifications-icon i {
            transition: transform 0.3s ease;
        }

        .notifications-icon:hover i {
            transform: scale(1.1);
        }

        .notifications-count {
            position: absolute;
            top: 2px;
            right: 2px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
            min-width: 18px;
            text-align: center;
            animation: notification-bounce 0.5s cubic-bezier(0.12, 0.84, 0.50, 1.5);
        }

        @keyframes notification-bounce {
            0% { transform: scale(0); }
            80% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .notifications-panel {
            display: none;
            position: fixed;
            top: 80px;
            right: 20px;
            width: 350px;
            max-height: 500px;
            overflow-y: auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            z-index: 1000;
            padding: 15px 0;
            border: 1px solid rgba(0,0,0,0.1);
        }

        .notifications-header {
            padding: 0 20px 15px 20px;
            border-bottom: 1px solid #eee;
            font-weight: bold;
            color: #333;
            font-size: 1.1em;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notifications-header .title {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .notifications-header .close-panel {
            cursor: pointer;
            padding: 5px;
            color: #6c757d;
            transition: color 0.3s ease;
            font-size: 1.2em;
        }

        .notifications-header .close-panel:hover {
            color: #dc3545;
        }

        .notifications-header .clear-all {
            font-size: 0.8em;
            color: #6c757d;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .notifications-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            z-index: 999;
        }

        .notification-item {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-item:hover {
            background-color: #f8f9fa;
        }

        .notification-item.unread {
            background-color: #f0f7ff;
        }

        .notification-item.unread:hover {
            background-color: #e6f2ff;
        }

        .notification-item .notification-dot {
            width: 8px;
            height: 8px;
            background-color: #007bff;
            border-radius: 50%;
            margin-top: 6px;
        }

        .notification-item .content {
            flex-grow: 1;
        }

        .notification-item .message {
            color: #333;
            margin: 0;
            font-size: 0.95em;
            line-height: 1.4;
        }

        .notification-item .time {
            font-size: 0.8em;
            color: #6c757d;
            margin-top: 5px;
        }

        .no-notifications {
            padding: 30px 20px;
            text-align: center;
            color: #6c757d;
        }

        .no-notifications i {
            font-size: 2em;
            margin-bottom: 10px;
            opacity: 0.5;
        }

        .no-notifications p {
            margin: 0;
            font-size: 0.95em;
        }

        /* Animaciones para las notificaciones */
        @keyframes notification-slide-in {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .notification-new {
            animation: notification-slide-in 0.3s ease-out;
        }

        /* Estilo para el scroll del panel de notificaciones */
        .notifications-panel::-webkit-scrollbar {
            width: 8px;
        }

        .notifications-panel::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .notifications-panel::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        .notifications-panel::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
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
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
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

        .formulario-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }

        .estado-actividad {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .estado-texto {
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: bold;
        }

        .estado-texto.atendida {
            background-color: #d4edda;
            color: #155724;
        }

        .estado-texto.pendiente {
            background-color: #fff3cd;
            color: #856404;
        }

        .formulario-card {
            position: relative;
        }

        .estado-print {
            display: none;
            position: absolute;
            top: 15px;
            right: 20px;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: bold;
        }

        .estado-print.atendida {
            background-color: #d4edda;
            color: #155724;
        }

        .estado-print.pendiente {
            background-color: #fff3cd;
            color: #856404;
        }

        @keyframes notification-fade-in {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .new-notification {
            animation: notification-fade-in 0.3s ease-out;
        }

        .no-actividad {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            padding: 10px;
        }

        .no-actividad-text {
            color: #6c757d;
            font-style: italic;
            text-align: center;
            margin: 8px 0;
        }

        .no-actividad .formulario-header {
            border-bottom-color: #e9ecef;
            padding-bottom: 6px;
            margin-bottom: 6px;
        }

        .acciones {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-ver-detalles {
            padding: 8px 15px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            transition: background-color 0.2s;
        }

        .btn-ver-detalles:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .header {
                margin-left: 0;
                margin-top: 120px; /* Aumentado para móviles */
            }

            .top-bar {
                position: absolute;
                top: 10px;
                left: 50%;
                transform: translateX(-50%);
            }
        }

        @media print {
            body {
                background-color: white;
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
                width: 100%;
            }

            .header,
            .notifications-icon,
            .btn-primary,
            .pagination,
            .switch,
            .notifications-panel,
            .notifications-overlay,
            .btn-ver-detalles,
            .estado-actividad {
                display: none !important;
            }

            .top-bar {
                position: relative;
                margin: 20px 0;
                width: 180px;
                padding: 0 40px;
                box-sizing: border-box;
            }

            .top-bar img {
                width: 180px;
                height: auto;
                display: block;
            }

            .main-content {
                padding: 0;
                width: 100%;
            }

            .container {
                width: 100%;
                max-width: none;
                padding: 0;
                margin: 0;
            }

            .titulo-imprimir {
                text-align: center;
                font-size: 24px;
                margin: 10px 0 30px 0;
                font-weight: bold;
                width: 100%;
            }

            .formularios-list {
                padding: 0 40px;
                width: calc(100% - 80px);
                margin: 0 auto;
            }

            .formulario-card {
                page-break-inside: avoid;
                break-inside: avoid;
                margin-bottom: 20px;
                border: 2px solid #000;
                padding: 15px 20px;
                border-radius: 8px;
                background-color: white;
                box-shadow: none;
                width: 100%;
                box-sizing: border-box;
            }

            .formulario-header {
                border-bottom: 1px solid #000;
                margin-bottom: 10px;
                padding-bottom: 8px;
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .formulario-header-content {
                flex: 1;
            }

            .formulario-header h3 {
                font-size: 16px;
                margin: 0 0 3px 0;
                color: #000;
            }

            .formulario-header small {
                font-size: 13px;
                color: #333;
                display: block;
            }

            .estado-actividad {
                display: block !important;
                font-size: 13px;
                color: #333;
                text-align: right;
                margin-left: 15px;
            }

            .estado-actividad span {
                padding: 3px 8px;
                border-radius: 4px;
                background-color: #e9ecef;
                font-weight: bold;
            }

            .estado-actividad span.atendida {
                background-color: #d4edda;
                color: #155724;
            }

            .estado-actividad span.pendiente {
                background-color: #fff3cd;
                color: #856404;
            }

            .formulario-content {
                display: block;
                width: 100%;
            }

            .info-container {
                display: flex;
                justify-content: flex-start;
                gap: 30px;
                margin: 8px 0;
                width: 100%;
            }

            .info-container p {
                margin: 0;
                font-size: 13px;
                color: #000;
                white-space: normal;
            }

            .info-container p strong {
                font-weight: bold;
                margin-right: 5px;
            }

            .no-actividad {
                background-color: #f8f9fa;
                border: 2px solid #000;
                width: 100%;
                box-sizing: border-box;
            }

            .no-actividad-text {
                text-align: center;
                font-style: italic;
                color: #666;
                margin: 10px 0;
                font-size: 13px;
            }

            @page {
                margin: 0;
                size: A4;
            }

            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-impresion">
    </div>
    <div class="main-content">
        <div class="container">
            <div class="header">
                <h1>Panel de Control</h1>
                <div class="header-buttons">
                    <div class="notifications-icon" onclick="toggleNotifications()" id="notificationsIcon">
                        <i class="fas fa-bell"></i>
                        <span class="notifications-count" id="notificationsCount" style="display: none;"></span>
                    </div>
                    <button onclick="imprimir()" class="btn btn-success">Imprimir Lista</button>
                    <a href="{{ route('formulario.question') }}" class="btn btn-primary">Nuevo Formulario</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                    </form>
                </div>
            </div>

            <div class="notificaciones">
                <div class="notifications-overlay" id="notificationsOverlay" onclick="closeNotifications()"></div>
                <div class="notifications-panel" id="notificationsPanel">
                    <div class="notifications-header">
                        <div class="title">
                            <i class="fas fa-bell"></i>
                            <span>Notificaciones</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <span class="clear-all" onclick="markAllAsRead()">Marcar todas como leídas</span>
                            <i class="fas fa-times close-panel" onclick="closeNotifications()"></i>
                        </div>
                    </div>
                    <div id="notificationsContainer"></div>
                </div>
            </div>

            <h1 class="titulo-imprimir">Actividades pautadas</h1>

            @if($combinedItems->isEmpty())
                <div class="empty-state">
                    <h2>No hay registros</h2>
                    <p>Los registros que se creen aparecerán aquí.</p>
                </div>
            @else
                <div class="formularios-list" id="printableArea">
                    @foreach($combinedItems as $item)
                        @if(isset($item->nombre_gerencia))
                            {{-- Es una actividad no realizada --}}
                            <div class="formulario-card no-actividad">
                                <div class="formulario-header">
                                    <h3>{{ $item->nombre_gerencia }}</h3>
                                    <small>{{ $item->created_at->format('d/m/Y - H:i') }}</small>
                                </div>
                                <div class="formulario-content">
                                    <p class="no-actividad-text">No realizará actividades esta semana</p>
                                </div>
                            </div>
                        @else
                            {{-- Es un formulario --}}
                            <div class="formulario-card">
                                <span class="estado-print {{ $item->atendido ? 'atendida' : 'pendiente' }}">
                                    {{ $item->atendido ? 'Atendida' : 'Pendiente' }}
                                </span>
                                <div class="formulario-header">
                                    <div class="formulario-header-content">
                                        <h3>{{ $item->gerencia }}</h3>
                                        <small>
                                            @if($item->fecha_actividad)
                                                {{ $item->fecha_actividad->format('d/m/Y') }}
                                            @else
                                                Fecha no disponible
                                            @endif
                                            - {{ $item->hora_actividad }}
                                        </small>
                                    </div>
                                </div>
                                <div class="formulario-content">
                                    <div class="info-container">
                                        <p><strong>Lugar:</strong> {{ $item->lugar }}</p>
                                        <p><strong>Responsable:</strong> {{ $item->responsable }}</p>
                                        <p><strong>Participantes:</strong> {{ $item->cantidad_personas }}</p>
                                    </div>
                                    <div class="estado-actividad">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-atendido"
                                                   data-id="{{ $item->id }}"
                                                   {{ $item->atendido ? 'checked' : '' }}>
                                            <span class="slider"></span>
                                        </label>
                                        <span class="estado-texto {{ $item->atendido ? 'atendida' : 'pendiente' }}">
                                            {{ $item->atendido ? 'Atendida' : 'Pendiente' }}
                                        </span>
                                        <a href="{{ route('formulario.show', $item->id) }}" class="btn btn-primary btn-ver-detalles">Ver Detalles</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="pagination">
                    {{ $combinedItems->links() }}
                </div>
            @endif
        </div>
    </div>

    <audio id="notificationSound" src="https://assets.mixkit.co/active_storage/sfx/2869/2869-preview.mp3" preload="auto" loop></audio>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        let lastNotificationId = 0;
        let isNotificationPlaying = false;
        const notificationSound = document.getElementById('notificationSound');
        let hasUnreadNotifications = false;
        let unreadCount = 0;

        function toggleNotifications() {
            const panel = document.getElementById('notificationsPanel');
            const overlay = document.getElementById('notificationsOverlay');
            const isOpening = panel.style.display === 'none' || !panel.style.display;

            if (isOpening) {
                panel.style.display = 'block';
                overlay.style.display = 'block';
                stopNotificationSound();
                hasUnreadNotifications = false;
                updateNotificationCount(0);
            } else {
                closeNotifications();
            }

            loadNotifications();
        }

        function closeNotifications() {
            const panel = document.getElementById('notificationsPanel');
            const overlay = document.getElementById('notificationsOverlay');
            panel.style.display = 'none';
            overlay.style.display = 'none';
        }

        function startNotificationSound() {
            if (!isNotificationPlaying && document.getElementById('notificationsPanel').style.display !== 'block') {
                notificationSound.play();
                isNotificationPlaying = true;
            }
        }

        function stopNotificationSound() {
            notificationSound.pause();
            notificationSound.currentTime = 0;
            isNotificationPlaying = false;
        }

        function updateNotificationCount(count) {
            const countElement = document.getElementById('notificationsCount');
            if (count > 0) {
                countElement.textContent = count;
                countElement.style.display = 'block';
            } else {
                countElement.style.display = 'none';
            }
            unreadCount = count;
        }

        function markAllAsRead() {
            const unreadNotifications = document.querySelectorAll('.notification-item.unread');
            unreadNotifications.forEach(notification => {
                const id = notification.dataset.id;
                markAsRead(id, false);
            });
            updateNotificationCount(0);
        }

        function loadNotifications() {
            fetch('{{ route("notifications.get") }}')
                .then(response => response.json())
                .then(notifications => {
                    const container = document.getElementById('notificationsContainer');
                    container.innerHTML = '';
                    let newUnreadCount = 0;

                    if (notifications.length === 0) {
                        container.innerHTML = `
                            <div class="no-notifications">
                                <i class="fas fa-bell-slash"></i>
                                <p>No hay notificaciones</p>
                            </div>
                        `;
                        return;
                    }

                    notifications.forEach(notification => {
                        if (!notification.read) {
                            newUnreadCount++;
                        }

                        const div = document.createElement('div');
                        div.className = `notification-item ${!notification.read ? 'unread' : ''}`;
                        div.dataset.id = notification.id;
                        div.innerHTML = `
                            ${!notification.read ? '<div class="notification-dot"></div>' : ''}
                            <div class="content">
                                <div class="message">${notification.message}</div>
                                <div class="time">${formatDate(notification.created_at)}</div>
                            </div>
                        `;
                        div.onclick = () => markAsRead(notification.id);

                        if (notification.id > lastNotificationId) {
                            div.classList.add('notification-new');
                        }

                        container.appendChild(div);
                    });

                    // Actualizar contador y sonido solo si hay nuevas notificaciones
                    if (newUnreadCount > unreadCount) {
                        startNotificationSound();
                    }
                    updateNotificationCount(newUnreadCount);

                    // Actualizar último ID
                    if (notifications.length > 0) {
                        lastNotificationId = Math.max(...notifications.map(n => n.id));
                    }
                })
                .catch(error => {
                    console.error('Error al cargar notificaciones:', error);
                });
        }

        function markAsRead(id, updateUI = true) {
            fetch(`/notifications/${id}/read`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success && updateUI) {
                    const notification = document.querySelector(`.notification-item[data-id="${id}"]`);
                    if (notification) {
                        notification.classList.remove('unread');
                        notification.querySelector('.notification-dot')?.remove();
                        updateNotificationCount(Math.max(0, unreadCount - 1));
                    }
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diff = now - date;
            const minutes = Math.floor(diff / 60000);
            const hours = Math.floor(minutes / 60);
            const days = Math.floor(hours / 24);

            if (minutes < 1) {
                return 'Hace un momento';
            } else if (minutes < 60) {
                return `Hace ${minutes} minuto${minutes !== 1 ? 's' : ''}`;
            } else if (hours < 24) {
                return `Hace ${hours} hora${hours !== 1 ? 's' : ''}`;
            } else if (days < 7) {
                return `Hace ${days} día${days !== 1 ? 's' : ''}`;
            } else {
                return date.toLocaleDateString('es-ES', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
            }
        }

        // Verificar nuevas notificaciones cada 30 segundos
        setInterval(loadNotifications, 30000);

        // Carga inicial
        document.addEventListener('DOMContentLoaded', function() {
            loadNotifications();
        });

        // Manejar cambios en los switches de atendido
        document.querySelectorAll('.switch-atendido').forEach(switchEl => {
            switchEl.addEventListener('change', function() {
                const formId = this.dataset.id;
                const switchElement = this;
                const formularioCard = this.closest('.formulario-card');
                const estadoTexto = formularioCard.querySelector('.estado-texto');
                const estadoPrint = formularioCard.querySelector('.estado-print');

                // Actualizar visualmente antes de la petición
                const nuevoEstado = this.checked;
                actualizarEstadoVisual(estadoTexto, estadoPrint, nuevoEstado);

                fetch(`/formularios/${formId}/toggle-atendido`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        // Si hay error, revertir los cambios visuales
                        actualizarEstadoVisual(estadoTexto, estadoPrint, !nuevoEstado);
                        switchElement.checked = !nuevoEstado;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // En caso de error, revertir los cambios visuales
                    actualizarEstadoVisual(estadoTexto, estadoPrint, !nuevoEstado);
                    switchElement.checked = !nuevoEstado;
                });
            });
        });

        function actualizarEstadoVisual(estadoTexto, estadoPrint, atendido) {
            const nuevoTexto = atendido ? 'Atendida' : 'Pendiente';

            // Actualizar texto
            estadoTexto.textContent = nuevoTexto;
            if (estadoPrint) estadoPrint.textContent = nuevoTexto;

            // Actualizar clases
            if (atendido) {
                estadoTexto.classList.remove('pendiente');
                estadoTexto.classList.add('atendida');
                if (estadoPrint) {
                    estadoPrint.classList.remove('pendiente');
                    estadoPrint.classList.add('atendida');
                }
            } else {
                estadoTexto.classList.remove('atendida');
                estadoTexto.classList.add('pendiente');
                if (estadoPrint) {
                    estadoPrint.classList.remove('atendida');
                    estadoPrint.classList.add('pendiente');
                }
            }
        }

        // Cerrar notificaciones al hacer clic fuera o con la tecla Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeNotifications();
            }
        });

        function imprimir(){
            window.print();
        }

        /* function printList() {
            const printableArea = document.getElementById('printableArea');
            if (!printableArea) {
                console.error('Elemento con ID "printableArea" no encontrado.');
                return;
            }

            const clonedContent = printableArea.cloneNode(true);

            // Eliminar elementos interactivos y no deseados para la impresión
            clonedContent.querySelectorAll('.switch, .btn-primary, .btn-danger, .notifications-icon, .pagination').forEach(el => el.remove());
            clonedContent.querySelectorAll('.formulario-footer .estado-actividad').forEach(el => el.remove());

            // Crear una nueva ventana para la impresión
            const printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write(`
                <!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Lista de Formularios</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 20px;
                        }
                        .formulario-card {
                            border: 1px solid #ccc;
                            border-radius: 8px;
                            padding: 15px;
                            margin-bottom: 10px;
                            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                        }
                        .formulario-header {
                            border-bottom: 1px solid #eee;
                            padding-bottom: 10px;
                            margin-bottom: 10px;
                        }
                        .formulario-header h3 {
                            margin: 0;
                            font-size: 1.1em;
                        }
                        .formulario-header small {
                            color: #666;
                            font-size: 0.85em;
                        }
                        .formulario-content p {
                            margin: 5px 0;
                            font-size: 0.9em;
                        }
                        .no-actividad {
                            background-color: #f8f9fa;
                            border: 1px solid #e9ecef;
                        }
                        .no-actividad-text {
                            color: #6c757d;
                            font-style: italic;
                            text-align: center;
                            margin: 10px 0;
                        }
                        @media print {
                            body {
                                margin: 0;
                            }
                            .formulario-card {
                                page-break-inside: avoid;
                            }
                        }
                    </style>
                </head>
                <body>
                    <h1>Lista de Formularios de Gestión Comunicacional</h1>
                    ${clonedContent.innerHTML}
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        } */
    </script>

    @if(session('status'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: "{{ session('status') }}",
            confirmButtonColor: '#007bff'
        });
    </script>
    @endif
</body>
</html>
