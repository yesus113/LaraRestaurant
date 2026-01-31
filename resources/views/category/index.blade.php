<x-app-layout>
    <x-slot name="header">
        <h1>Categorias</h1>
    </x-slot>

    <x-alerts.messages />

    <x-buttons.button-back route="{{ route('dashboard') }}" name="Back" />

    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <th>{{ $category->name }}</th>
                        <th>
                            <x-buttons.button-edit route="{{ route('categ.edit', $category->id) }}" name="Editar" />

                            <x-buttons.button-delete action="{{ route('categ.destroy', $category->id) }}"
                                name="Borrar" />
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
    <x-buttons.button-create route="{{ route('categ.create') }}" name="Crear" />
</x-app-layout>
