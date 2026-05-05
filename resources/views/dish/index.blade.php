<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-emerald-600 dark:text-emerald-400">
                    Menu del restaurante
                </p>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white">
                    Platillos
                </h2>
            </div>

            <a href="{{ route('dish.create') }}" class="btn btn-success btn-sm text-white">
                Crear platillo
            </a>
        </div>
    </x-slot>

    <x-alerts.messages />

    @php
        $selectedCategory = $categories->firstWhere('id', (int) request('category_id'));
    @endphp

    <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <a href="{{ route('dashboard') }}" class="btn btn-ghost w-full justify-start text-slate-700 sm:w-auto dark:text-slate-200">
                <span aria-hidden="true">&larr;</span>
                Volver al dashboard
            </a>

            <form action="{{ route('dish.index') }}" method="GET" class="flex flex-col gap-3 sm:flex-row sm:items-center">
                <label for="category_id" class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                    Filtrar por categoria
                </label>

                <div class="flex gap-2">
                    <select
                        name="category_id"
                        id="category_id"
                        onchange="this.form.submit()"
                        class="select select-bordered w-full min-w-56 bg-white text-slate-900 shadow-sm dark:bg-slate-800 dark:text-slate-100"
                    >
                        <option value="">Todas las categorias</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @if (request('category_id'))
                        <a href="{{ route('dish.index') }}" class="btn btn-outline btn-error">
                            Limpiar
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="mb-6 grid gap-4 sm:grid-cols-3">
            <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-800">
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total</p>
                <p class="mt-2 text-3xl font-bold text-slate-900 dark:text-white">{{ $dishes->count() }}</p>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-800">
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Filtro activo</p>
                <p class="mt-2 truncate text-lg font-bold text-slate-900 dark:text-white">
                    {{ $selectedCategory->name ?? 'Todas las categorias' }}
                </p>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-800">
                <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Categorias</p>
                <p class="mt-2 text-3xl font-bold text-slate-900 dark:text-white">{{ $categories->count() }}</p>
            </div>
        </div>

        <div class="hidden overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800 md:block">
            <table class="table w-full">
                <thead class="bg-slate-100 text-slate-700 dark:bg-slate-900 dark:text-slate-200">
                    <tr>
                        <th class="py-4 text-sm font-bold">Platillo</th>
                        <th class="py-4 text-sm font-bold">Descripcion</th>
                        <th class="py-4 text-sm font-bold">Precio</th>
                        <th class="py-4 text-sm font-bold">Categoria</th>
                        <th class="py-4 text-right text-sm font-bold">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                    @forelse ($dishes as $dish)
                        <tr class="text-slate-700 transition-colors hover:bg-emerald-50/70 dark:text-slate-200 dark:hover:bg-slate-700/60">
                            <td class="font-bold text-slate-950 dark:text-white">
                                {{ $dish->name }}
                            </td>
                            <td class="max-w-md">
                                <p class="line-clamp-2 text-sm leading-6 text-slate-600 dark:text-slate-300">
                                    {{ $dish->description ?: 'Sin descripcion registrada.' }}
                                </p>
                            </td>
                            <td class="font-bold text-emerald-700 dark:text-emerald-400">
                                ${{ number_format($dish->price, 2) }}
                            </td>
                            <td>
                                <span class="badge border-emerald-200 bg-emerald-50 text-emerald-700 dark:border-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-200">
                                    {{ $dish->category->name ?? 'Sin categoria' }}
                                </span>
                            </td>
                            <td>
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('dish.show', $dish->id) }}" class="btn btn-outline btn-info btn-sm">
                                        Detalle
                                    </a>
                                    <a href="{{ route('dish.edit', $dish->id) }}" class="btn btn-outline btn-warning btn-sm">
                                        Editar
                                    </a>
                                    <form method="POST" action="{{ route('dish.destroy', $dish->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-outline btn-error btn-sm"
                                            onclick="return confirm('Estas seguro de que deseas eliminar este platillo?')"
                                        >
                                            Borrar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-500 dark:text-slate-400">
                                No hay platillos registrados todavia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="grid gap-4 md:hidden">
            @forelse ($dishes as $dish)
                <article class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-700 dark:bg-slate-800">
                    <div class="mb-4 flex items-start justify-between gap-3">
                        <div>
                            <h3 class="text-lg font-bold text-slate-950 dark:text-white">{{ $dish->name }}</h3>
                            <span class="mt-2 inline-flex rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-200">
                                {{ $dish->category->name ?? 'Sin categoria' }}
                            </span>
                        </div>
                        <p class="text-lg font-bold text-emerald-700 dark:text-emerald-400">
                            ${{ number_format($dish->price, 2) }}
                        </p>
                    </div>

                    <p class="mb-5 text-sm leading-6 text-slate-600 dark:text-slate-300">
                        {{ $dish->description ?: 'Sin descripcion registrada.' }}
                    </p>

                    <div class="grid grid-cols-3 gap-2">
                        <a href="{{ route('dish.show', $dish->id) }}" class="btn btn-outline btn-info btn-sm">
                            Ver
                        </a>
                        <a href="{{ route('dish.edit', $dish->id) }}" class="btn btn-outline btn-warning btn-sm">
                            Editar
                        </a>
                        <form method="POST" action="{{ route('dish.destroy', $dish->id) }}">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="btn btn-outline btn-error btn-sm w-full"
                                onclick="return confirm('Estas seguro de que deseas eliminar este platillo?')"
                            >
                                Borrar
                            </button>
                        </form>
                    </div>
                </article>
            @empty
                <div class="rounded-lg border border-slate-200 bg-white p-8 text-center text-slate-500 shadow-sm dark:border-slate-700 dark:bg-slate-800 dark:text-slate-400">
                    No hay platillos registrados todavia.
                </div>
            @endforelse
        </div>
    </section>
</x-app-layout>
