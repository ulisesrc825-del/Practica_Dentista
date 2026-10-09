<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Dental | Tu sonrisa ideal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
    <nav class="bg-blue-600 text-white p-4 shadow-md flex justify-between items-center">
        <h1 class="text-2xl font-bold">Clínica Dental</h1>
        <a href="{{ route('login') }}" class="text-white hover:underline">Acceso Dra.</a>
    </nav>
    <header class="text-center py-20 px-4">
        <h2 class="text-5xl font-extrabold text-blue-900 mb-4">Recupera tu sonrisa hoy mismo</h2>
        <p class="text-lg mb-8 max-w-2xl mx-auto">Atención odontológica profesional, amable y sin dolor. Agenda tu cita y da el primer paso hacia una salud dental perfecta.</p>
        <a href="#contacto" class="bg-blue-600 text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-blue-700 transition">Agendar Cita Ahora</a>
    </header>
    <section id="contacto" class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg mb-20">
        <h3 class="text-2xl font-bold text-center mb-6">Contáctanos</h3>
        <p class="text-center text-gray-600 mb-4">Llámanos al <strong>555-019-2030</strong> o encuéntranos en Av. Principal #123.</p>
    </section>
</body>
</html>