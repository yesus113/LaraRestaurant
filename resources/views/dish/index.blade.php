<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Entradas' }}
        </h2>
    </x-slot>
    @component('components.buttons.button-create')
        @section('ruta')
            <a href="{{ route('dish.create') }}">Agregar</a>
        @endsection
    @endcomponent

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
                            @component('components.buttons.button-edit')
                                @section('ruta1')
                                    <a href="{{ route('dish.edit', $dish->id) }}">Editar</a>
                                @endsection
                                
                            @endcomponent
                            @component('components.buttons.button-show')
                            @endcomponent

                            @component('components.buttons.button-delete')
                                @section('route-del')
                                    <form method="POST" action="{{ route('dish.destroy', $dish->id) }}">
                                    @endsection
                                @endcomponent
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
