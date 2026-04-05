<x-app-layout>
    <x-slot name="header">
        <h1>Categorias</h1>
    </x-slot>

    <x-alerts.messages />

    <x-buttons.button-back route="{{ route('dashboard') }}" name="Back" class="bg-blue-400" />

    <div class="overflow-x-auto rounded-lg border border-base-300 shadow-sm p-6">
        <br>
        <table class="table">
            <!-- head -->
            <thead class="bg-base-200">
                <tr>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="hover:bg-base-200/50 transition-colors">
                        <td>{{ $category->name }}</td>
                        <td>
                            <div class="flex items-center justify-center gap-2">
                                <x-buttons.button-edit route="{{ route('categ.edit', $category->id) }}" name="Editar" />
                                <x-buttons.button-delete action="{{ route('categ.destroy', $category->id) }}"
                                    name="Borrar" />
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-10 text-base-content/50 italic">
                            Sin categorias
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <x-buttons.button-create route="{{ route('categ.create') }}" name="Crear" />
</x-app-layout>
