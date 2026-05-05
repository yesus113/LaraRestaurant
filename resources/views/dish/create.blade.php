<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-emerald-600 dark:text-emerald-400">
                    Nuevo registro
                </p>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white">
                    Crear platillo
                </h2>
            </div>

            <a href="{{ route('dish.index') }}" class="btn btn-outline btn-sm">
                Volver al listado
            </a>
        </div>
    </x-slot>

    <section class="mx-auto max-w-5xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="grid gap-6 lg:grid-cols-[0.8fr_1.2fr]">
            <aside class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-800">
                <p class="text-sm font-semibold uppercase tracking-wide text-emerald-600 dark:text-emerald-400">
                    Informacion
                </p>
                <h3 class="mt-2 text-2xl font-bold text-slate-950 dark:text-white">
                    Agrega un platillo al menu
                </h3>
                <p class="mt-4 leading-7 text-slate-600 dark:text-slate-300">
                    Captura el nombre, descripcion, precio y categoria. Despues podras editarlo desde el listado.
                </p>

                <div class="mt-6 rounded-lg bg-emerald-50 p-4 text-sm text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-100">
                    El nombre debe tener al menos 5 caracteres y la descripcion, si se agrega, al menos 10.
                </div>
            </aside>

            <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-800">
                <form action="{{ route('dish.store') }}" method="POST" class="grid gap-5">
                    @csrf

                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-200">
                            Nombre
                        </label>
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Enchiladas verdes"
                            class="input input-bordered w-full bg-white text-slate-900 placeholder:text-slate-400 dark:bg-slate-900 dark:text-slate-100"
                        />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <label for="description" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-200">
                            Descripcion
                        </label>
                        <textarea
                            id="description"
                            name="description"
                            rows="5"
                            placeholder="Ingredientes, preparacion o notas del platillo"
                            class="textarea textarea-bordered w-full bg-white text-slate-900 placeholder:text-slate-400 dark:bg-slate-900 dark:text-slate-100"
                        >{{ old('description') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="price" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-200">
                                Precio
                            </label>
                            <label class="input input-bordered flex items-center gap-2 bg-white text-slate-900 dark:bg-slate-900 dark:text-slate-100">
                                <span class="text-slate-500">$</span>
                                <input
                                    id="price"
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    name="price"
                                    value="{{ old('price') }}"
                                    placeholder="100.00"
                                    class="grow bg-transparent"
                                />
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>

                        <div>
                            <label for="category_id" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-200">
                                Categoria
                            </label>
                            <select
                                id="category_id"
                                name="category_id"
                                class="select select-bordered w-full bg-white text-slate-900 dark:bg-slate-900 dark:text-slate-100"
                            >
                                <option value="" disabled @selected(! old('category_id'))>
                                    Selecciona una categoria
                                </option>
                                @forelse ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @empty
                                    <option value="" disabled>No hay categorias disponibles</option>
                                @endforelse
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                        </div>
                    </div>

                    <div class="flex flex-col-reverse gap-3 pt-2 sm:flex-row sm:justify-end">
                        <a href="{{ route('dish.index') }}" class="btn btn-outline">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-success">
                            Guardar platillo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
