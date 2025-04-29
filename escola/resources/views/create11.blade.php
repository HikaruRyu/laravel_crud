<!-- welcome.blade.php (o home.blade.php) -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Llistat de Matèries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('success'))
                        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg shadow-md mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h3 class="text-2xl font-bold mb-6 text-gray-300">Llistat de Matèries</h3>

                    @if($materies->count())
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($materies as $materia)
                                <div class="bg-white dark:bg-gray-800 shadow-md rounded-2xl p-5 border border-gray-200 dark:border-gray-700">
                                    <h4 class="text-xl font-semibold text-indigo-600 mb-2">{{ $materia->name }}</h4>
                                    <p class="text-gray-700 dark:text-gray-300">
                                        <strong>Grau:</strong> {{ $materia->grade }}
                                    </p>
                                    <p class="text-gray-700 dark:text-gray-300">
                                        <strong>Dia:</strong> {{ $materia->day }}
                                    </p>
                                    <p class="text-gray-700 dark:text-gray-300">
                                        <strong>Hora:</strong> {{ $materia->hour }}
                                    </p>

                                    <div class="flex justify-between items-center mt-4">
                                        <a href="{{ route('materies.edit', $materia->id) }}" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-md flex items-center">
                                            Modificar
                                        </a>

                                        <form action="{{ route('materies.destroy', $materia->id) }}" method="POST" class="mt-4">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg shadow-md flex items-center">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded-lg shadow-md">
                            No hi ha matèries disponibles en aquest moment.
                        </div>
                    @endif

                    <div class="mt-6 text-center">
                        <a href="{{ route('dashboard') }}" class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg shadow-md">
                            Crear nova matèria
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
