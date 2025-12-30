<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"> {{ 'Products' }}</h2>
    </x-slot>

    <x-buttons.button-create route="{{ route('dish.create') }}" name="Crear" />

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
                        <th>${{ $dish->price }}</th>
                        <th>{{ $dish->category->name }}</th>
                        <th>

                            <x-buttons.button-edit route="{{ route('dish.edit', $dish->id) }}" name="Editar" />

                            <x-buttons.button-show />

                            <x-buttons.button-delete action="{{ route('dish.destroy', $dish->id) }}" name="Borrar"/>

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
