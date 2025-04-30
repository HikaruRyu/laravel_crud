<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Matèries del teu curs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-6">Matèries de {{ Auth::user()->alumne->grade }}</h3>

                    @if($materies->count())
                        <ul>
                            @foreach($materies as $materia)
                                <li class="mb-2">
                                    <span class="font-semibold">{{ $materia->name }}</span> - {{ $materia->day }} a les {{ $materia->hour }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No tens matèries assignades al teu curs.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
