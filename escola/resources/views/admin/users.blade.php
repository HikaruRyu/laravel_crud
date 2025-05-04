<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Llistat d\'Usuaris') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-6 text-gray-300">Llistat d'Usuaris</h3>

                    @if(session('success'))
                        <div class="mb-4 bg-gray-800 border border-gray-400 text-white px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($users->count())
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($users as $user)
                                <div
                                    class="bg-white dark:bg-gray-800 shadow-md rounded-2xl p-5 border border-gray-200 dark:border-gray-700">
                                    <h4 class="text-xl font-semibold text-indigo-600 mb-2">{{ $user->name }}</h4>
                                    <p class="text-gray-700 dark:text-gray-300">
                                        <strong>Email:</strong> {{ $user->email }}
                                    </p>
                                    <p class="text-gray-700 dark:text-gray-300">
                                        <strong>Professor:</strong> {{ $user->is_professor ? 'Sí' : 'No' }}
                                    </p>

                                    @if($user->alumne)
                                        <p class="text-gray-700 dark:text-gray-300">
                                            <strong>Grau:</strong> {{ $user->alumne->grade }}
                                        </p>
                                    @else
                                        <p class="text-gray-700 dark:text-gray-300">
                                            <strong>Alumne:</strong> No assignat
                                        </p>
                                    @endif

                                    <div class="mt-4 flex gap-2">
                                        @if(!$user->alumne && !$user->is_professor)
                                            <a href="{{ route('admin.users.add.show', $user) }}"
                                                class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                                                Assignar com Alumne
                                            </a>


                                            <form action="{{ route('admin.users.assign-professor', $user) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700">
                                                    Assignar com a Professor
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-gray-100 text-white px-4 py-3 rounded-lg shadow-md">
                            No hi ha usuaris disponibles en aquest moment.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>