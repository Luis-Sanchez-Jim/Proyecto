<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Política de Privacidad - {{ config('app.name', 'SecureSys') }}</title>
    <!-- Carga los estilos compilados de Tailwind / Vite de tu proyecto -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans">

    <!-- Barra superior sencilla -->
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-4xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="text-xl font-bold text-indigo-600 tracking-tight">
                {{ config('app.name', 'SecureSys') }}
            </a>
            <a href="{{ url('/') }}" class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition">
                &larr; Volver al inicio
            </a>
        </div>
    </header>

    <!-- Contenedor principal amplio y legible -->
    <main class="max-w-4xl mx-auto px-6 py-12">
        <article class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 md:p-12 space-y-8">
            
            <!-- Encabezado del documento -->
            <div class="border-b border-slate-200 pb-6">
                <span class="inline-block px-3 py-1 text-xs font-semibold text-indigo-700 bg-indigo-50 rounded-full mb-3">
                    Normativa Colombiana • Ley 1581 de 2012
                </span>
                <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Política de Tratamiento de Datos Personales
                </h1>
                <p class="mt-3 text-base text-slate-500">
                    En cumplimiento de la Ley Estatutaria 1581 de 2012 y el Decreto 1377 de 2013 de la República de Colombia.
                </p>
            </div>

            <!-- Sección 1 -->
            <section class="space-y-3">
                <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                    <span class="flex items-center justify-center w-7 h-7 rounded-lg bg-indigo-100 text-indigo-700 text-sm font-bold">1</span>
                    Identificación del Responsable del Tratamiento
                </h2>
                <div class="bg-slate-50 rounded-xl p-5 border border-slate-100 text-base text-slate-700 leading-relaxed space-y-1">
                    <p><strong class="text-slate-900">Responsable:</strong> Plataforma SecureSys (ygtnw.website)</p>
                    <p><strong class="text-slate-900">Domicilio:</strong> República de Colombia</p>
                    <p><strong class="text-slate-900">Correo electrónico de contacto:</strong> <a href="mailto:soporte@ygtnw.website" class="text-indigo-600 font-medium hover:underline">soporte@ygtnw.website</a></p>
                </div>
            </section>

            <!-- Sección 2 -->
            <section class="space-y-3">
                <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                    <span class="flex items-center justify-center w-7 h-7 rounded-lg bg-indigo-100 text-indigo-700 text-sm font-bold">2</span>
                    Finalidad del Tratamiento de los Datos
                </h2>
                <p class="text-base text-slate-600 leading-relaxed">
                    Los datos personales recopilados en nuestra plataforma (nombre completo, correo electrónico, dirección IP y registros técnicos de acceso) serán tratados bajo estricta confidencialidad y utilizados exclusivamente para las siguientes finalidades:
                </p>
                <ul class="list-disc pl-6 space-y-2 text-base text-slate-600 leading-relaxed">
                    <li>Gestionar el registro, la autenticación y el control de acceso seguro de los usuarios en el sistema.</li>
                    <li>Enviar comunicaciones transaccionales esenciales, tales como verificación de identidad y recuperación de contraseñas.</li>
                    <li>Mantener registros de auditoría, prevención de fraudes y monitoreo de disponibilidad e integridad informática.</li>
                </ul>
            </section>

            <!-- Sección 3 -->
            <section class="space-y-3">
                <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                    <span class="flex items-center justify-center w-7 h-7 rounded-lg bg-indigo-100 text-indigo-700 text-sm font-bold">3</span>
                    Derechos del Titular (Derechos ARCO)
                </h2>
                <p class="text-base text-slate-600 leading-relaxed">
                    De conformidad con el artículo 8 de la Ley 1581 de 2012, como titular de sus datos personales usted tiene derecho a:
                </p>
                <ul class="list-disc pl-6 space-y-2 text-base text-slate-600 leading-relaxed">
                    <li><strong class="text-slate-800">Conocer, actualizar y rectificar</strong> sus datos personales frente a datos parciales, inexactos o incompletos.</li>
                    <li><strong class="text-slate-800">Solicitar prueba de la autorización</strong> otorgada al responsable del tratamiento.</li>
                    <li><strong class="text-slate-800">Revocar la autorización y/o solicitar la supresión</strong> de sus datos cuando no se respeten los principios y garantías legales, o cuando ya no exista un deber legal o contractual de permanecer en la base de datos.</li>
                </ul>
            </section>

            <!-- Sección 4 -->
            <section class="space-y-3">
                <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                    <span class="flex items-center justify-center w-7 h-7 rounded-lg bg-indigo-100 text-indigo-700 text-sm font-bold">4</span>
                    Canales para Ejercer sus Derechos
                </h2>
                <p class="text-base text-slate-600 leading-relaxed">
                    Para presentar consultas, reclamos, solicitudes de actualización o eliminación de su información personal, puede comunicarse directamente a través de nuestro canal oficial de atención:
                </p>
                <div class="p-4 bg-indigo-50/60 border border-indigo-100 rounded-xl text-base text-slate-700">
                    Envíe su solicitud al correo <a href="mailto:soporte@ygtnw.website" class="font-semibold text-indigo-700 hover:underline">soporte@ygtnw.website</a> indicando su nombre completo, el correo asociado a su cuenta y una descripción clara de su petición.
                </div>
            </section>

            <!-- Sección 5 -->
            <section class="space-y-3">
                <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                    <span class="flex items-center justify-center w-7 h-7 rounded-lg bg-indigo-100 text-indigo-700 text-sm font-bold">5</span>
                    Medidas Razonables de Seguridad
                </h2>
                <p class="text-base text-slate-600 leading-relaxed">
                    Para proteger la información almacenada contra pérdida, adulteración o acceso no autorizado, la plataforma implementa estándares técnicos de seguridad que incluyen: cifrado de comunicaciones en tránsito mediante certificados TLS/HTTPS, almacenamiento de contraseñas mediante algoritmos criptográficos de resumen (hash), custodia de archivos en almacenamiento externo privado con cifrado en reposo y monitoreo continuo de incidentes.
                </p>
            </section>

            <!-- Pie del documento -->
            <div class="pt-8 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-slate-500">
                <p>Última actualización: {{ date('Y') }}</p>
                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition">
                    Ir al registro de usuario
                </a>
            </div>

        </article>
    </main>

</body>
</html>
