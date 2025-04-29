<form action="{{ route('materies.update', $materia->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block mb-1 text-sm font-medium">Nom:</label>
        <input type="text" name="name" value="{{ old('name', $materia->name) }}" class="w-full rounded-md dark:bg-gray-700 dark:text-white" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1 text-sm font-medium">Día:</label>
        <select name="day" class="w-full rounded-md dark:bg-gray-700 dark:text-white" required>
            @foreach(['Dilluns','Dimarts','Dimecres','Dijous','Divendres','Dissabte','Diumenge'] as $dia)
                <option value="{{ $dia }}" @if($materia->day == $dia) selected @endif>{{ $dia }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block mb-1 text-sm font-medium">Hora:</label>
        <input type="time" name="hour" value="{{ old('hour', $materia->hour) }}" class="w-full rounded-md dark:bg-gray-700 dark:text-white" required>
    </div>

    <div class="mt-6">
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
            Actualizar Materia
        </button>
    </div>
</form>
