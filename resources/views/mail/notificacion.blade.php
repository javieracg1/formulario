<div>
    <h1>Notificación de solicitud de sala</h1>
    <p>Se ha recibido una nueva solicitud de sala para el evento: <strong>{{ $formulario->nombre_evento }}</strong></p>

    <p>Detalles del evento:</p>
    <ul>
        <li><strong>Ubicación del evento:</strong> {{ $formulario->ambiente }}</li>
        <li><strong>Solicitante (Gerencia):</strong> {{ $formulario->unidad_solicitante }}</li>
        <li><strong>Fecha del evento:</strong> {{ $formulario->fecha_evento }}</li>
        <li><strong>Hora de inicio:</strong> {{ $formulario->hora_desde }}</li>
        <li><strong>Hora de fin:</strong> {{ $formulario->hora_hasta }}</li>
        <li><strong>Objetivo del evento:</strong> {{ $formulario->objetivo_evento }}</li>
        <li><strong>Notas adicionales:</strong> {{ $formulario->notas_adicionales ?? 'Sin notas' }}</li>
    </ul>
</div>
