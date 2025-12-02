<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Entradas' }}
        </h2>
    </x-slot>
    <button
        class=" glass border border-blue-600 text-white hover:bg-green-600 hover:text-white font-medium px-4 py-2 rounded-md transition m-3">
        <a href="{{ route('dish.create') }}">Agregar</a>
    </button>

    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dishes as $dish)
                    <tr>
                        <th>{{ $dish->name }}</th>
                        <th>{{ $dish->description }}</th>
                        <th>{{ $dish->price }}</th>
                        <th>{{ $dish->category->name }}</th>
                        <th>
                            <button
                                class=" glass border border-blue-600 text-white hover:bg-yellow-600 hover:text-white font-medium px-4 py-2 rounded-md transition m-2">
                                <a href="{{ route('dish.edit', $dish->id) }}">Editar</a>
                            </button>
                            <form method="POST" action="{{ route('dish.destroy', $dish->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" value="DELETE"
                                    class=" glass border border-blue-600 text-white hover:bg-red-600 hover:text-white font-medium px-4 py-2 rounded-md transition m-2">
                                    Borrar
                                </button>
                            </form>
                        </th>
                    </tr>
                @empty
                    <tr>
                        <th>No data</th>
                        <th>No data</th>
                        <th>No data</th>
                        <th>No data</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
