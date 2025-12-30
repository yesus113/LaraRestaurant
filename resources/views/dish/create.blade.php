<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"> {{ 'Crear' }}</h2>
    </x-slot>
    <div class="flex justify-center mt-10">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <form action="{{ route('dish.store') }}" method="POST">
                    @csrf
                    <div>
                        <label class="input m-1">
                            <span class="label">Nombre</span>
                            <input class="text-black" type="text" placeholder="Enchiladas Verde" name="name"
                                value="{{ old('name') }}" />
                        </label>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <label class="input m-2">
                            <span class="label">Descripcion</span>
                            <input class="text-black" type="text" placeholder="Ingredientes" name="description"
                                value="{{ old('description') }}" />
                        </label>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <label class="input m-2">
                        <span class="label">Precio</span>
                        <input class="text-black" type="text" placeholder="$100" name="price"
                            value="{{ old('price') }}" />
                    </label>
                    <x-input-error class="mt-2" :messages="$errors->get('price')" />
                    </div>


                    <label class="select">
                        <span class="label">Categoria</span>
                        <select class="text-black" name="category_id">
                            @forelse ($categories as $category)
                                <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                    value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @empty
                                <option>No options</option>
                            @endforelse
                        </select>
                    </label>
                    <button type="submit" class="btn btn-primary mt-4 w-full">Guardar</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
