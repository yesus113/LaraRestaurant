<x-app-layout>
    <x-slot name="header">
        <h1>Categorias</h1>
    </x-slot>
    @component('components.buttons.button-create')
        @section('ruta')
            <a href="{{ route('categ.create') }}">Agregar</a>
        @endsection
    @endcomponent

    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $dish)
                    <tr>
                        <th>{{ $dish->name }}</th>
                        <th>
                            @component('components.buttons.button-edit')
                                @section('ruta1')
                                    <a href="{{ route('dish.edit', $dish->id) }}">Editar</a>
                                @endsection
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
