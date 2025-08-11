<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Registros - Gestión Comunicacional</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
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
            margin-left: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-print {
            background-color: #28a745;
            color: white;
        }
        .btn-view {
            background-color: #6c757d;
            color: white;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .registros-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .registros-table th,
        .registros-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
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
        @media print {
            .no-print {
                display: none;
            }
            body {
                padding: 0;
                background: white;
            }
            .container {
                box-shadow: none;
                padding: 0;
            }
            .registros-table {
                page-break-inside: auto;
            }
            .registros-table tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
            .registros-table th {
                background-color: #f8f9fa !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Lista de Registros</h1>
            <div>
                <button onclick="window.print()" class="btn btn-print no-print">
                    <i class="fas fa-print"></i> Imprimir Lista
                </button>
                <a href="{{ route('formulario.show', ['id' => $formulario->id, 'view' => 'card']) }}" class="btn btn-view no-print">
                    <i class="fas fa-th-large"></i> Ver como Tarjetas
                </a>
                <a href="{{ route('dashboard') }}" class="btn btn-primary no-print">Volver al Dashboard</a>
            </div>
        </div>

        <table class="registros-table">
            <thead>
                <tr>
                    <th>Fecha Actividad</th>
                    <th>Gerencia</th>
                    <th>Lugar</th>
                    <th>Responsable</th>
                    <th>Participantes</th>
                    <th>Estado</th>
                    <th class="no-print">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formularios as $form)
                <tr>
                    <td>{{ $form->fecha_actividad ? $form->fecha_actividad->format('d/m/Y') : 'N/A' }} {{ $form->hora_actividad }}</td>
                    <td>{{ $form->gerencia }}</td>
                    <td>{{ $form->lugar }}</td>
                    <td>{{ $form->responsable }}</td>
                    <td>{{ $form->cantidad_personas }}</td>
                    <td>
                        <span class="estado-badge {{ $form->atendido ? 'estado-atendido' : 'estado-pendiente' }}">
                            {{ $form->atendido ? 'Atendida' : 'Pendiente' }}
                        </span>
                    </td>
                    <td class="no-print">
                        <a href="{{ route('formulario.show', ['id' => $form->id, 'view' => 'card']) }}" class="btn btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html> 