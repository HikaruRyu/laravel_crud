<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panell de control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">



                    <h3 class="text-2xl font-bold mb-6 text-gray-300">Crear Matèria</h3>
                    
                    <form action="{{ route('materies.store') }}" method="POST" class="mb-10">
                    @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nom de la matèria:</label>
                                <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" placeholder="Nom de la matèria" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nom del grau:</label>
                                <input type="text" name="grade" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" placeholder="Nom del grau" required>
                            </div>


                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Dia:</label>
                                <select name="day" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" required>
                                    <option value="">-- Selecciona el dia --</option>
                                    <option value="Dilluns">Dilluns</option>
                                    <option value="Dimarts">Dimarts</option>
                                    <option value="Dimecres">Dimecres</option>
                                    <option value="Dijous">Dijous</option>
                                    <option value="Divendres">Divendres</option>
                                    <option value="Dissabte">Dissabte</option>
                                    <option value="Diumenge">Diumenge</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Hora:</label>
                                <input type="time" name="hour" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white" required>
                            </div>
                        </div>

                        <div class="mt-6 text-center">
                            <button type="submit" class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg shadow-md">
                                Crear Matèria
                            </button>
                        </div>
                    </form>

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

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
