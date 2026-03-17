<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestión Comunicacional</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            position: sticky;
            top: 10px;
            z-index: 1100;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            max-height: min(520px, calc(100vh - 120px));
            overflow: hidden;
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
            position: sticky;
            top: 0;
            z-index: 1;
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
            max-height: calc(min(520px, calc(100vh - 120px)) - 60px);
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

        .notification-item .actions {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-left: auto;
            padding-left: 10px;
        }

        .notification-item .mark-read {
            border: 1px solid #dee2e6;
            background: #fff;
            color: #495057;
            border-radius: 999px;
            font-size: 12px;
            padding: 4px 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .notification-item .mark-read:hover {
            border-color: #007bff;
            color: #007bff;
        }

        .notification-item.read {
            opacity: 0.8;
        }

        .notification-item.unread .message {
            font-weight: 600;
        }

        @media (max-width: 480px) {
            .notifications-panel {
                width: calc(100vw - 24px);
                left: 12px !important;
                right: auto !important;
            }
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

        /* ----- NUEVOS ESTILOS DE PAGINACIÓN SIMPLIFICADA ----- */
        .custom-pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding: 15px 0;
            border-top: 1px solid #eee;
        }

        .per-page-form {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #666;
            font-size: 0.9em;
        }

        .per-page-form select {
            padding: 6px 12px;
            border-radius: 4px;
            border: 1px solid #ddd;
            outline: none;
            background-color: white;
            cursor: pointer;
            font-size: 14px;
        }

        .pagination-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-paginate {
            padding: 8px 16px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            text-decoration: none;
            color: #007bff;
            font-size: 0.9em;
            transition: all 0.2s;
            display: flex;
            align-items: center;
        }

        .btn-paginate:hover:not(.disabled) {
            background-color: #e9ecef;
            border-color: #0056b3;
            color: #0056b3;
        }

        .btn-paginate.disabled {
            background-color: #e9ecef;
            color: #6c757d;
            border-color: #dee2e6;
            cursor: not-allowed;
            opacity: 0.7;
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

                <div class="custom-pagination no-print">
                    <div class="pagination-buttons">
                        @if ($combinedItems->onFirstPage())
                            <span class="btn-paginate disabled">&laquo; Anterior</span>
                        @else
                            <a href="{{ $combinedItems->previousPageUrl() }}&per_page={{ request('per_page', 12) }}" class="btn-paginate">&laquo; Anterior</a>
                        @endif

                        @if ($combinedItems->hasMorePages())
                            <a href="{{ $combinedItems->nextPageUrl() }}&per_page={{ request('per_page', 12) }}" class="btn-paginate">Siguiente &raquo;</a>
                        @else
                            <span class="btn-paginate disabled">Siguiente &raquo;</span>
                        @endif
                    </div>
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

        function getCsrfToken() {
            const el = document.querySelector('meta[name="csrf-token"]');
            return el ? el.getAttribute('content') : '';
        }

        function bindAtendidoSwitches() {
            document.querySelectorAll('.switch-atendido').forEach((checkbox) => {
                checkbox.addEventListener('change', async (e) => {
                    const target = e.currentTarget;
                    const id = target.dataset.id;
                    if (!id) return;

                    const previousChecked = !target.checked;
                    target.disabled = true;

                    try {
                        const resp = await fetch(`{{ url('/formularios') }}/${id}/toggle-atendido`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': getCsrfToken(),
                                'Accept': 'application/json',
                            },
                            credentials: 'same-origin',
                        });

                        if (!resp.ok) {
                            throw new Error(`HTTP ${resp.status}`);
                        }

                        const data = await resp.json();
                        if (!data || !data.success) {
                            throw new Error('Respuesta inválida');
                        }

                        // Alinear UI con el estado real del backend
                        target.checked = !!data.atendido;
                        const card = target.closest('.formulario-card');
                        const estadoTexto = card ? card.querySelector('.estado-texto') : null;
                        if (estadoTexto) {
                            estadoTexto.textContent = data.atendido ? 'Atendida' : 'Pendiente';
                        }
                    } catch (err) {
                        // Revertir el switch si falló
                        target.checked = previousChecked;
                        Swal.fire({
                            icon: 'error',
                            title: 'No se pudo actualizar',
                            text: 'Verifica tu sesión o recarga la página e intenta de nuevo.',
                        });
                    } finally {
                        target.disabled = false;
                    }
                });
            });
        }

        function positionNotificationsPanel() {
            const icon = document.getElementById('notificationsIcon');
            const panel = document.getElementById('notificationsPanel');
            if (!icon || !panel) return;

            const rect = icon.getBoundingClientRect();
            const margin = 10;
            const exceptionalTop = 14;
            const exceptionalRight = 14;

            // Medimos el panel (asegurando que tenga tamaño)
            const prevDisplay = panel.style.display;
            if (prevDisplay !== 'block') {
                panel.style.visibility = 'hidden';
                panel.style.display = 'block';
            }
            const panelWidth = panel.offsetWidth || 350;
            const panelHeight = panel.offsetHeight || 500;

            const viewportW = window.innerWidth;
            const viewportH = window.innerHeight;

            const iconVisible = rect.bottom > 0 && rect.right > 0 && rect.top < viewportH && rect.left < viewportW;

            // Por defecto: debajo del icono y alineado a la derecha del icono
            let top = rect.bottom + margin;
            let left = rect.right - panelWidth;

            // Ajustes para no salirse del viewport
            left = Math.max(margin, Math.min(left, viewportW - panelWidth - margin));
            if (top + panelHeight > viewportH - margin) {
                // Si no cabe abajo, lo ponemos arriba del icono
                top = Math.max(margin, rect.top - panelHeight - margin);
            }

            // Modo "excepcional": si bajaste y la campana ya no se ve, fijamos el panel en una esquina
            if (!iconVisible) {
                top = exceptionalTop;
                left = Math.max(margin, viewportW - panelWidth - exceptionalRight);
            }

            panel.style.top = `${top}px`;
            panel.style.left = `${left}px`;
            panel.style.right = 'auto';

            if (prevDisplay !== 'block') {
                panel.style.display = prevDisplay || 'none';
                panel.style.visibility = '';
            }
        }

        function toggleNotifications() {
            const panel = document.getElementById('notificationsPanel');
            const overlay = document.getElementById('notificationsOverlay');

            if (panel.style.display === 'block') {
                closeNotifications();
            } else {
                positionNotificationsPanel();
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
                        container.innerHTML = '<div class="no-notifications"><i class="fas fa-bell-slash"></i><p>No hay notificaciones</p></div>';
                        return;
                    }

                    notifications.forEach(notification => {
                        const notificationElement = document.createElement('div');
                        notificationElement.className = 'notification-item ' + (notification.read ? 'read' : 'unread');
                        notificationElement.dataset.notificationId = notification.id;

                        // Verificar si hay notificaciones nuevas
                        if (notification.id > lastNotificationId) {
                            hasNewNotifications = true;
                        }

                        const createdAt = notification.created_at ? new Date(notification.created_at) : null;
                        const timeText = createdAt && !isNaN(createdAt.getTime())
                            ? createdAt.toLocaleString('es-VE', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' })
                            : '';

                        notificationElement.innerHTML = `
                            <div class="notification-dot" style="${notification.read ? 'opacity:0' : ''}"></div>
                            <div class="content">
                                <p class="message">${notification.message}</p>
                                ${timeText ? `<div class="time">${timeText}</div>` : ''}
                            </div>
                            <div class="actions">
                                ${notification.read ? '' : `<button class="mark-read" type="button" data-mark-read="${notification.id}">Marcar leída</button>`}
                            </div>
                        `;
                        container.appendChild(notificationElement);
                    });

                    // Delegación: marcar como leída
                    container.querySelectorAll('[data-mark-read]').forEach((btn) => {
                        btn.addEventListener('click', async (e) => {
                            e.stopPropagation();
                            const id = e.currentTarget.getAttribute('data-mark-read');
                            if (!id) return;
                            try {
                                const resp = await fetch(`{{ url('/notifications') }}/${id}/read`, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': getCsrfToken(),
                                        'Accept': 'application/json',
                                    },
                                    credentials: 'same-origin',
                                });
                                if (!resp.ok) throw new Error(`HTTP ${resp.status}`);
                                await resp.json();
                                fetchNotifications();
                            } catch (err) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'No se pudo actualizar',
                                    text: 'Intenta nuevamente.',
                                });
                            }
                        });
                    });
                });
        }

        async function markAllAsRead() {
            const container = document.getElementById('notificationsContainer');
            if (!container) return;
            const ids = Array.from(container.querySelectorAll('.notification-item.unread'))
                .map(el => el.dataset.notificationId)
                .filter(Boolean);

            if (ids.length === 0) return;

            try {
                await Promise.all(ids.map(id => fetch(`{{ url('/notifications') }}/${id}/read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': getCsrfToken(),
                        'Accept': 'application/json',
                    },
                    credentials: 'same-origin',
                })));
                fetchNotifications();
            } catch (err) {
                Swal.fire({
                    icon: 'error',
                    title: 'No se pudo marcar todo',
                    text: 'Intenta nuevamente.',
                });
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const icon = document.getElementById('notificationsIcon');
            if (icon) icon.addEventListener('click', toggleNotifications);
            bindAtendidoSwitches();
        });

        window.addEventListener('resize', () => {
            const panel = document.getElementById('notificationsPanel');
            if (panel && panel.style.display === 'block') {
                positionNotificationsPanel();
            }
        });

        window.addEventListener('scroll', () => {
            const panel = document.getElementById('notificationsPanel');
            if (panel && panel.style.display === 'block') {
                positionNotificationsPanel();
            }
        }, { passive: true });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeNotifications();
        });

        document.getElementById('notificationsOverlay')?.addEventListener('click', closeNotifications);
    </script>
</body>
</html>
