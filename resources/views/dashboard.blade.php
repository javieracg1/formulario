<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestión Comunicacional</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            padding-top: 40px;
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
            margin-bottom: 30px;
            margin-top: 35px; /* Añadido margen superior para separación del logo */
            background-color: white;
            padding: 20px;
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
            gap: 20px;
            margin-top: 20px;
        }
        .formulario-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .formulario-card:hover {
            transform: translateY(-5px);
        }
        .formulario-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        .formulario-header h3 {
            margin: 0;
            color: #333;
            font-size: 1.2em;
            margin-bottom: 5px;
        }
        .formulario-header small {
            color: #666;
            font-size: 0.9em;
        }
        .formulario-content p {
            margin: 5px 0;
            color: #666;
            font-size: 0.95em;
        }
        .formulario-footer {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
            text-align: right;
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
        }

        .notifications-header {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f8f9fa;
            border-radius: 12px 12px 0 0;
        }

        .notifications-header .title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: bold;
            color: #333;
        }

        .notifications-header .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .notifications-header .clear-all {
            cursor: pointer;
            color: #6c757d;
            font-size: 14px;
            transition: color 0.2s;
        }

        .notifications-header .clear-all:hover {
            color: #495057;
        }

        .notifications-header .close-panel {
            cursor: pointer;
            color: #6c757d;
            transition: color 0.2s;
            padding: 5px;
        }

        .notifications-header .close-panel:hover {
            color: #495057;
        }

        #notificationsContainer {
            max-height: calc(500px - 60px);
            overflow-y: auto;
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
            width: 60px;
            height: 34px;
            margin-right: 10px;
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
            margin-bottom: 15px;
        }

        .estado-texto {
            font-size: 14px;
            color: #666;
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
        }

        .no-actividad-text {
            color: #6c757d;
            font-style: italic;
            text-align: center;
            margin: 10px 0;
        }

        .no-actividad .formulario-header {
            border-bottom-color: #e9ecef;
        }

        .btn-view {
            background-color: #6c757d;
            color: white;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .registros-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .registros-table th,
        .registros-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .registros-table th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #495057;
        }
        
        .registros-table tr:hover {
            background-color: #f5f5f5;
        }
        
        .estado-badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }
        
        .estado-pendiente {
            background-color: #ffeeba;
            color: #856404;
        }
        
        .estado-atendido {
            background-color: #d4edda;
            color: #155724;
        }
        
        .table-actions {
            display: flex;
            gap: 5px;
        }
        
        .table-actions .btn {
            padding: 5px 10px;
            font-size: 12px;
        }
        
        .sin-actividad {
            font-style: italic;
            color: #6c757d;
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

        .btn-print {
            background-color: #28a745;
            color: white;
            margin-right: 10px;
        }
        
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                padding: 0;
                background: white;
            }
            .container {
                max-width: 100%;
                margin: 0;
                padding: 0;
            }
            .registros-table {
                box-shadow: none;
                width: 100%;
            }
            .registros-table th {
                background-color: #f8f9fa !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .estado-badge {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .estado-pendiente {
                background-color: #ffeeba !important;
            }
            .estado-atendido {
                background-color: #d4edda !important;
            }
            .header {
                margin: 0;
                padding: 20px 0;
                border: none;
                box-shadow: none;
            }
            .top-bar {
                position: relative;
                text-align: center;
                margin-bottom: 20px;
            }
            .print-header {
                display: block !important;
                text-align: center;
                margin: 20px 0;
            }
            .print-header h2 {
                margin: 0;
                color: #333;
            }
            .print-header p {
                margin: 5px 0;
                color: #666;
            }
            .print-footer {
                display: block !important;
                text-align: center;
                margin-top: 20px;
                font-size: 12px;
                color: #666;
            }
        }
        
        .print-header, .print-footer {
            display: none;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>

    <div class="main-content">
        <div class="container">
            <div class="header">
                <h1>Panel de Control</h1>
                <div class="header-buttons">
                    @if($viewType === 'card')
                        <a href="{{ route('dashboard', ['view' => 'list']) }}" class="btn btn-view">
                            <i class="fas fa-list"></i> Ver como Lista
                        </a>
                    @else
                        <button onclick="window.print()" class="btn btn-print no-print">
                            <i class="fas fa-print"></i> Imprimir Lista
                        </button>
                        <a href="{{ route('dashboard', ['view' => 'card']) }}" class="btn btn-view">
                            <i class="fas fa-th-large"></i> Ver como Tarjetas
                        </a>
                    @endif
                    <div class="notifications-icon" id="notificationsIcon">
                        <i class="fas fa-bell"></i>
                        @if($unreadNotifications > 0)
                            <span class="notifications-count">{{ $unreadNotifications }}</span>
                        @endif
                    </div>
                    <a href="{{ route('formulario.question') }}" class="btn btn-primary">Nuevo Registro</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                    </form>
                </div>
            </div>

            @if($viewType === 'list')
                <div class="print-header">
                    <h2>Listado de Registros - Gestión Comunicacional</h2>
                </div>
            @endif

            @if($combinedItems->isEmpty())
                <div class="empty-state">
                    <h2>No hay registros disponibles</h2>
                    <p>Comienza creando un nuevo registro</p>
                </div>
            @else
                @if($viewType === 'card')
                    <div class="formularios-grid">
                        @foreach($combinedItems as $item)
                            @if(isset($item->unidad_solicitante))
                                <div class="formulario-card">
                                    <div class="formulario-header">
                                        <h3>{{ $item->nombre_evento ?? 'Evento sin nombre' }}</h3>
                                        <small>{{ $item->created_at->format('d/m/Y H:i') }}</small>
                                    </div>
                                    <div class="formulario-content">
                                        <p><strong>Unidad:</strong> {{ $item->unidad_solicitante }}</p>
                                        <p><strong>Fecha:</strong> {{ $item->fecha_evento ? \Carbon\Carbon::parse($item->fecha_evento)->format('d/m/Y') : 'N/A' }}</p>
                                        <p><strong>Hora:</strong> {{ $item->hora_desde ? \Carbon\Carbon::parse($item->hora_desde)->format('H:i') : '--:--' }} - {{ $item->hora_hasta ? \Carbon\Carbon::parse($item->hora_hasta)->format('H:i') : '--:--' }}</p>
                                        <p><strong>Tipo:</strong> {{ $item->tipo_evento ?? 'No especificado' }}</p>
                                        <p><strong>Institución:</strong> {{ $item->institucion_responsable ?? 'No especificada' }}</p>
                                    </div>
                                    <div class="formulario-footer">
                                        <div class="estado-actividad">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-atendido"
                                                       data-id="{{ $item->id }}"
                                                       {{ $item->atendido ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                            <span class="estado-texto">
                                                {{ $item->atendido ? 'Atendida' : 'Pendiente' }}
                                            </span>
                                        </div>
                                        <a href="{{ route('formulario.show', $item->id) }}" class="btn btn-primary">Ver Detalles</a>
                                    </div>
                                </div>
                            @else
                                <div class="formulario-card">
                                    <div class="formulario-header">
                                        <h3>{{ $item->nombre_gerencia }}</h3>
                                        <small>{{ $item->created_at->format('d/m/Y H:i') }}</small>
                                    </div>
                                    <div class="formulario-content">
                                        <p class="sin-actividad">Sin actividades programadas</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <table class="registros-table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Evento</th>
                                <th>Unidad Solicitante</th>
                                <th>Tipo</th>
                                <th>Institución</th>
                                <th>Objetivo</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($combinedItems as $item)
                                @if(isset($item->unidad_solicitante))
                                    <tr>
                                        <td>
                                            {{ $item->fecha_evento ? \Carbon\Carbon::parse($item->fecha_evento)->format('d/m/Y') : 'N/A' }}
                                            <br>
                                            <small>{{ $item->hora_desde ? \Carbon\Carbon::parse($item->hora_desde)->format('H:i') : '--:--' }} - {{ $item->hora_hasta ? \Carbon\Carbon::parse($item->hora_hasta)->format('H:i') : '--:--' }}</small>
                                        </td>
                                        <td>{{ $item->nombre_evento ?? 'Sin nombre' }}</td>
                                        <td>{{ $item->unidad_solicitante }}</td>
                                        <td>{{ $item->tipo_evento ?? 'N/A' }}</td>
                                        <td>{{ $item->institucion_responsable ?? 'N/A' }}</td>
                                        <td>{{ \Str::limit($item->objetivo_evento ?? 'Sin objetivo especificado', 50) }}</td>
                                        <td>
                                            <span class="estado-badge {{ $item->atendido ? 'estado-atendido' : 'estado-pendiente' }}">
                                                {{ $item->atendido ? 'Atendida' : 'Pendiente' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="{{ route('formulario.show', $item->id) }}" class="btn btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $item->nombre_gerencia }}</td>
                                        <td colspan="6" class="sin-actividad">Sin actividades programadas</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="print-footer">
                        <p>Documento generado el {{ now()->format('d/m/Y') }} a las {{ now()->format('H:i') }}</p>
                        <p>Total de registros: {{ $combinedItems->count() }}</p>
                    </div>
                @endif

                <div class="pagination no-print">
                    {{ $combinedItems->links() }}
                </div>
            @endif
        </div>
    </div>

    <audio id="notificationSound" src="https://assets.mixkit.co/active_storage/sfx/2869/2869-preview.mp3" preload="auto"></audio>

    <div class="notifications-overlay" id="notificationsOverlay"></div>
    <div class="notifications-panel" id="notificationsPanel">
        <div class="notifications-header">
            <div class="title">
                <i class="fas fa-bell"></i>
                <span>Notificaciones</span>
            </div>
            <div class="header-actions">
                <span class="clear-all" onclick="markAllAsRead()">Marcar todas como leídas</span>
                <i class="fas fa-times close-panel" onclick="closeNotifications()"></i>
            </div>
        </div>
        <div id="notificationsContainer"></div>
    </div>

    <script>
        let lastNotificationId = 0;
        let isNotificationPlaying = false;
        const notificationSound = document.getElementById('notificationSound');

        function toggleNotifications() {
            const panel = document.getElementById('notificationsPanel');
            const overlay = document.getElementById('notificationsOverlay');
            
            if (panel.style.display === 'block') {
                closeNotifications();
            } else {
                panel.style.display = 'block';
                overlay.style.display = 'block';
                stopNotificationSound();
                fetchNotifications();
            }
        }

        function closeNotifications() {
            const panel = document.getElementById('notificationsPanel');
            const overlay = document.getElementById('notificationsOverlay');
            panel.style.display = 'none';
            overlay.style.display = 'none';
        }

        function startNotificationSound() {
            if (!isNotificationPlaying && document.getElementById('notificationsPanel').style.display !== 'block') {
                notificationSound.play().catch(error => console.log('Error playing sound:', error));
                isNotificationPlaying = true;
            }
        }

        function stopNotificationSound() {
            notificationSound.pause();
            notificationSound.currentTime = 0;
            isNotificationPlaying = false;
        }

        function fetchNotifications() {
            fetch('{{ route("notifications.get") }}')
                .then(response => response.json())
                .then(notifications => {
                    const container = document.getElementById('notificationsContainer');
                    container.innerHTML = '';
                    let hasNewNotifications = false;

                    if (notifications.length === 0) {
                        container.innerHTML = '<div class="no-notifications">No hay notificaciones</div>';
                        return;
                    }

                    notifications.forEach(notification => {
                        const notificationElement = document.createElement('div');
                        notificationElement.className = 'notification-item' + (notification.read ? '' : ' unread');
                        notificationElement.dataset.notificationId = notification.id;
                        
                        // Verificar si hay notificaciones nuevas
                        if (notification.id > lastNotificationId) {
                            hasNewNotifications = true;
                        }

                        notificationElement.innerHTML = `
                            <div class="notification-content">
                                <div class="notification-message">${notification.message}</div>
                                <div class="notification-time">${formatTimeAgo(notification.created_at)}</div>
                            </div>
                        `;
                        
                        if (!notification.read) {
                            notificationElement.addEventListener('click', () => markAsRead(notification.id));
                        }
                        
                        container.appendChild(notificationElement);
                    });

                    // Actualizar el último ID y reproducir sonido si hay nuevas
                    if (notifications.length > 0) {
                        const maxId = Math.max(...notifications.map(n => n.id));
                        if (maxId > lastNotificationId) {
                            lastNotificationId = maxId;
                            if (hasNewNotifications) {
                                startNotificationSound();
                            }
                        }
                    }

                    // Actualizar el contador de notificaciones
                    updateNotificationCount(notifications.filter(n => !n.read).length);
                })
                .catch(error => console.error('Error fetching notifications:', error));
        }

        function updateNotificationCount(count) {
            const countElement = document.querySelector('.notifications-count');
            if (countElement) {
                if (count > 0) {
                    countElement.style.display = 'block';
                    countElement.textContent = count;
                } else {
                    countElement.style.display = 'none';
                }
            }
        }

        function markAsRead(notificationId) {
            fetch(`{{ url('/notifications') }}/${notificationId}/read`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const notification = document.querySelector(`[data-notification-id="${notificationId}"]`);
                    if (notification) {
                        notification.classList.remove('unread');
                        // Actualizar el contador
                        const unreadCount = document.querySelectorAll('.notification-item.unread').length;
                        updateNotificationCount(unreadCount);
                    }
                }
            })
            .catch(error => console.error('Error marking notification as read:', error));
        }

        function markAllAsRead() {
            const unreadNotifications = document.querySelectorAll('.notification-item.unread');
            unreadNotifications.forEach(notification => {
                const notificationId = notification.dataset.notificationId;
                if (notificationId) {
                    markAsRead(notificationId);
                }
            });
        }

        function formatTimeAgo(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diffInSeconds = Math.floor((now - date) / 1000);
            const diffInMinutes = Math.floor(diffInSeconds / 60);
            const diffInHours = Math.floor(diffInMinutes / 60);
            const diffInDays = Math.floor(diffInHours / 24);

            if (diffInSeconds < 60) {
                return 'Hace un momento';
            } else if (diffInMinutes < 60) {
                return diffInMinutes === 1 ? 'Hace 1 minuto' : `Hace ${diffInMinutes} minutos`;
            } else if (diffInHours < 24) {
                return diffInHours === 1 ? 'Hace 1 hora' : `Hace ${diffInHours} horas`;
            } else if (diffInDays < 7) {
                return diffInDays === 1 ? 'Hace 1 día' : `Hace ${diffInDays} días`;
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

        // Inicializar eventos
        document.addEventListener('DOMContentLoaded', function() {
            // Evento para el icono de notificaciones
            const notificationsIcon = document.getElementById('notificationsIcon');
            if (notificationsIcon) {
                notificationsIcon.addEventListener('click', toggleNotifications);
            }

            // Evento para cerrar con el overlay
            const overlay = document.getElementById('notificationsOverlay');
            if (overlay) {
                overlay.addEventListener('click', closeNotifications);
            }

            // Cargar notificaciones inicialmente
            fetchNotifications();

            // Verificar nuevas notificaciones cada 30 segundos
            setInterval(fetchNotifications, 30000);

            // Switches de atendido
            const switches = document.querySelectorAll('.switch-atendido');
            switches.forEach(switchEl => {
                switchEl.addEventListener('change', function() {
                    const formularioId = this.dataset.id;
                    const isChecked = this.checked;
                    const estadoTexto = this.closest('.estado-actividad').querySelector('.estado-texto');

                    fetch(`/formulario/${formularioId}/toggle-atendido`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            estadoTexto.textContent = isChecked ? 'Atendida' : 'Pendiente';
                            Swal.fire({
                                title: 'Estado Actualizado',
                                text: `La actividad ha sido marcada como ${isChecked ? 'atendida' : 'pendiente'}`,
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        this.checked = !isChecked; // Revertir el cambio
                        estadoTexto.textContent = !isChecked ? 'Atendida' : 'Pendiente';
                        Swal.fire({
                            title: 'Error',
                            text: 'No se pudo actualizar el estado',
                            icon: 'error'
                        });
                    });
                });
            });
        });

        // Cerrar notificaciones al hacer clic fuera o con la tecla Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeNotifications();
            }
        });
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
