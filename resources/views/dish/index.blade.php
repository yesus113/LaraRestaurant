<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"> {{ 'Products' }}</h2>
    </x-slot>

    <x-alerts.messages />

    <div class="overflow-x-auto rounded-lg border border-base-300 shadow-sm p-6">
        <x-buttons.button-back route="{{ route('dashboard') }}" name="Volvel" class="bg-blue-400" />
        <br>
        <table class="table table-sm md:table-md table-zebra w-full">
            <thead class="bg-base-200">
                <tr>
                    <th class="text-base font-bold">Nombre</th>
                    <th class="text-base font-bold">Descripción</th>
                    <th class="text-base font-bold">Precio</th>
                    <th class="text-base font-bold">Categoría</th>
                    <th class="text-base font-bold text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dishes as $dish)
                    <tr class="hover:bg-base-200/50 transition-colors">
                        <td class="font-medium text-base-content">{{ $dish->name }}</td>
                        <td class="max-w-xs truncate">{{ $dish->description }}</td>
                        <td class="font-semibold text-success">${{ number_format($dish->price, 2) }}</td>
                        <td>
                            <span class="badge badge-ghost border-base-300">{{ $dish->category->name }}</span>
                        </td>
                        <td>
                            <div class="flex items-center justify-center gap-2">
                                <x-buttons.button-edit route="{{ route('dish.edit', $dish->id) }}" name="Editar" />
                                <x-buttons.button-show />
                                <x-buttons.button-delete action="{{ route('dish.destroy', $dish->id) }}"
                                    name="Borrar" />
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-10 text-base-content/50 italic">
                            No hay platillos registrados aún.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <x-buttons.button-create route="{{ route('dish.create') }}" name="Crear" />
</x-app-layout>
