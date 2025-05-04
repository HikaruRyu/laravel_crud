<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Assignar Alumne') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.users.add', $user) }}">
                    @csrf

                    <div class="mb-4">
                        <label for="grade" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Selecciona el grau:</label>
                        <select id="grade" name="grade" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="1ESO">1ESO</option>
                            <option value="2ESO">2ESO</option>
                            <option value="3ESO">3ESO</option>
                            <option value="4ESO">4ESO</option>
                            <option value="1BATX">1BATX</option>
                            <option value="2BATX">2BATX</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Assignar Alumne
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
