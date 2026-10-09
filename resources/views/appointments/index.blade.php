<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Citas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-800 text-white p-4 shadow-md flex justify-between items-center">
        <h1 class="text-xl font-bold">Gestión de Citas (MVP)</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="hover:underline text-sm font-semibold">Cerrar Sesión</button>
        </form>
    </nav>
    <div class="max-w-7xl mx-auto py-8 px-4">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">{{ session('success') }}</div>
        @endif
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Formulario Nueva Cita -->
            <div class="bg-white p-6 rounded-lg shadow-md md:col-span-1 h-fit">
                <h3 class="text-lg font-bold mb-4 border-b pb-2">Agendar Nueva Cita</h3>
                <form method="POST" action="{{ route('appointments.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="text-sm font-bold text-gray-700">Paciente</label>
                        <input type="text" name="patient_name" class="w-full p-2 border rounded text-sm" required>
                    </div>
                    <div class="mb-3">
                        <label class="text-sm font-bold text-gray-700">Teléfono</label>
                        <input type="text" name="patient_phone" class="w-full p-2 border rounded text-sm" required>
                    </div>
                    <div class="mb-3">
                        <label class="text-sm font-bold text-gray-700">Fecha y Hora</label>
                        <input type="datetime-local" name="appointment_date" class="w-full p-2 border rounded text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label class="text-sm font-bold text-gray-700">Motivo</label>
                        <textarea name="reason" class="w-full p-2 border rounded text-sm"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded text-sm hover:bg-blue-700">Guardar Cita</button>
                </form>
            </div>

            <!-- Tabla de Citas -->
            <div class="bg-white p-6 rounded-lg shadow-md md:col-span-2 overflow-x-auto">
                <h3 class="text-lg font-bold mb-4 border-b pb-2">Próximas Citas</h3>
                <table class="min-w-full text-left text-sm whitespace-nowrap">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-4 py-3 text-gray-600">Fecha</th>
                            <th class="px-4 py-3 text-gray-600">Paciente</th>
                            <th class="px-4 py-3 text-gray-600">Teléfono</th>
                            <th class="px-4 py-3 text-gray-600">Estado</th>
                            <th class="px-4 py-3 text-gray-600">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $apt)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-semibold">{{ $apt->appointment_date->format('d/m/Y h:i A') }}</td>
                            <td class="px-4 py-3">{{ $apt->patient_name }}</td>
                            <td class="px-4 py-3">{{ $apt->patient_phone }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded text-xs text-white {{ $apt->status == 'pendiente' ? 'bg-yellow-500' : ($apt->status == 'completada' ? 'bg-green-500' : 'bg-red-500') }}">
                                    {{ ucfirst($apt->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <form method="POST" action="{{ route('appointments.update', $apt->id) }}">
                                    @csrf @method('PUT')
                                    <select name="status" onchange="this.form.submit()" class="border text-xs rounded p-1">
                                        <option value="pendiente" {{ $apt->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="completada" {{ $apt->status == 'completada' ? 'selected' : '' }}>Completada</option>
                                        <option value="cancelada" {{ $apt->status == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>