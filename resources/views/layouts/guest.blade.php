<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SecureSys | Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://bunny.net">
        <link href="https://bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900">
        
        <!-- Fondo negro global -->
        <div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0 bg-black">
            
            <!-- Tu logotipo -->
            <div>
                <a href="/">
                    <img src="{{ asset('img/logo.png') }}" alt="SecureSys Logo" class="w-auto h-20">
                </a>
            </div>

            <!-- Contenedor del formulario (Caja oscura) -->
            <div class="w-full px-6 py-4 mt-6 overflow-hidden shadow-md sm:max-w-md sm:rounded-lg bg-neutral-900 border border-neutral-800">
                {{ $slot }} <!-- ◄ Aquí es donde se inyectará el formulario de login de forma automática -->
            </div>
        </div>
    </body>
</html>
