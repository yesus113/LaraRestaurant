<x-app-layout>
    <x-slot name="header">
        <h1>Categorias</h1>
    </x-slot>
    <x-buttons.button-create route="{{ route('categ.create') }}" name="Crear" />


    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $categ)
                    <tr>
                        <th>{{ $categ->name }}</th>
                        <th>
                            <x-buttons.button-edit route="{{ route('categ.edit', $categ->id) }}" name="Editar" />

                            <x-buttons.button-show />

                            <x-buttons.button-delete action="{{ route('categ.destroy', $categ->id) }}" name="Borrar" />
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
