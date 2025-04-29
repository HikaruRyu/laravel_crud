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
