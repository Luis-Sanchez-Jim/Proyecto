<x-app-layout>
    <div class="min-h-[calc(100vh-4rem)] bg-black text-white flex flex-col justify-between">
        
        <!-- Contenido Principal del Dashboard -->
        <div class="py-12 flex-1">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <!-- Encabezado de Bienvenida -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-white">Panel de Control | <span class="text-blue-500">SecureSys</span></h1>
                    <p class="text-gray-400 text-sm mt-1">Bienvenido de vuelta, {{ Auth::user()->name }}. Monitoreo de seguridad activo.</p>
                </div>

                <!-- Tarjetas de Estadísticas Principales (Grid) -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    
                    <!-- Tarjeta 1: Personal Activo -->
                    <div class="bg-neutral-900 border border-neutral-800 p-6 rounded-xl shadow-lg flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Personal Activo</p>
                            <h3 class="text-2xl font-bold mt-1 text-white">42 / 45</h3>
                            <p class="text-xs text-emerald-400 mt-2 flex items-center">
                                <span class="mr-1">●</span> En servicio ahora
                            </p>
                        </div>
                        <div class="p-3 bg-blue-600/10 rounded-lg text-blue-500">
                            <i class="bi bi-people-fill text-2xl"></i>
                        </div>
                    </div>

                    <!-- Tarjeta 2: Cámaras Operativas -->
                    <div class="bg-neutral-900 border border-neutral-800 p-6 rounded-xl shadow-lg flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Cámaras Monitoreadas</p>
                            <h3 class="text-2xl font-bold mt-1 text-white">128</h3>
                            <p class="text-xs text-emerald-400 mt-2 flex items-center">
                                <span class="mr-1">↑ 100%</span> Operatividad
                            </p>
                        </div>
                        <div class="p-3 bg-blue-600/10 rounded-lg text-blue-500">
                            <i class="bi bi-webcam-fill text-2xl"></i>
                        </div>
                    </div>

                    <!-- Tarjeta 3: Dispositivos GPS -->
                    <div class="bg-neutral-900 border border-neutral-800 p-6 rounded-xl shadow-lg flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Vehículos con GPS</p>
                            <h3 class="text-2xl font-bold mt-1 text-white">18</h3>
                            <p class="text-xs text-gray-400 mt-2">En movimiento constante</p>
                        </div>
                        <div class="p-3 bg-blue-600/10 rounded-lg text-blue-500">
                            <i class="bi bi-geo-alt-fill text-2xl"></i>
                        </div>
                    </div>

                    <!-- Tarjeta 4: Alertas del Sistema -->
                    <div class="bg-neutral-900 border border-neutral-800 p-6 rounded-xl shadow-lg flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Alertas Críticas</p>
                            <h3 class="text-2xl font-bold mt-1 text-amber-500">0</h3>
                            <p class="text-xs text-emerald-400 mt-2">Sistema sin novedades</p>
                        </div>
                        <div class="p-3 bg-amber-500/10 rounded-lg text-amber-500">
                            <i class="bi bi-shield-fill-check text-2xl"></i>
                        </div>
                    </div>

                </div>

                <!-- Sección Inferior: Reportes Recientes y Accesos Rápidos -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <!-- Historial de Novedades (Ocupa 2 columnas) -->
                    <div class="lg:col-span-2 bg-neutral-900 border border-neutral-800 rounded-xl p-6 shadow-lg">
                        <h3 class="text-lg font-bold mb-4 text-white">Últimos Eventos de Seguridad</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-start justify-between border-b border-neutral-800 pb-3">
                                <div>
                                    <h4 class="text-sm font-semibold text-white">Control de Ronda Completado</h4>
                                    <p class="text-xs text-gray-400 mt-0.5">Sede #1 - Guardia Central</p>
                                </div>
                                <span class="text-xs text-gray-500">Hace 5 min</span>
                            </div>

                            <div class="flex items-start justify-between border-b border-neutral-800 pb-3">
                                <div>
                                    <h4 class="text-sm font-semibold text-white">Actualización de Sistema GPS</h4>
                                    <p class="text-xs text-gray-400 mt-0.5">Flota vehicular sincronizada correctamente</p>
                                </div>
                                <span class="text-xs text-gray-500">Hace 45 min</span>
                            </div>

                            <div class="flex items-start justify-between pb-1">
                                <div>
                                    <h4 class="text-sm font-semibold text-white">Cámara de Vigilancia Añadida</h4>
                                    <p class="text-xs text-gray-400 mt-0.5">Punto Perimetral Oeste - Sede #2</p>
                                </div>
                                <span class="text-xs text-gray-500">Hace 2 horas</span>
                            </div>
                        </div>
                    </div>

                    <!-- Enlaces Rápidos de Administración -->
                    <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-6 shadow-lg">
                        <h3 class="text-lg font-bold mb-4 text-white">Acciones Rápidas</h3>
                        
                        <div class="flex flex-col gap-3">
                            <a href="{{ route('reports.create') }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-4 rounded-lg text-sm transition text-center block">
                                Registrar Nueva Novedad
                            </a>
                            <a href="{{ route('reports.userindex') }}" class="w-full bg-neutral-800 hover:bg-neutral-700 text-white font-semibold py-2.5 px-4 rounded-lg text-sm transition border border-neutral-700 text-center block">
                                Ver mis reportes
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Footer del Panel -->
        <footer class="bg-neutral-900/60 border-t border-neutral-800 py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-gray-400">
                <div class="flex items-center gap-2">
                    <span class="font-bold text-white">Secure<span class="text-blue-500">Sys</span></span>
                    <span>&copy; {{ date('Y') }}. Todos los derechos reservados.</span>
                </div>
                
                <div class="flex flex-wrap items-center gap-6">
                    <a href="{{ route('privacy') }}" class="hover:text-blue-400 transition underline">
                        Política de Tratamiento de Datos Personales (Ley 1581 de 2012)
                    </a>
                </div>
            </div>
        </footer>

    </div>
</x-app-layout>
