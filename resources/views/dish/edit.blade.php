<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"> {{ 'Editar' }}</h2>
    </x-slot>

    <div class="flex justify-center mt-10">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <form action="{{ route('dish.update', $dish->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label class="input m-2">
                            <span class="label">Nombre</span>
                            <input class="text-black" type="text" placeholder="Enchiladas" name="name"
                                value="{{ old('name', $dish->name) }}" />
                        </label>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <label class="input m-2">
                            <span class="label">Descripcion</span>
                            <input class="text-black" type="text" placeholder="Ingredientes" name="description"
                                value="{{ old('description', $dish->description) }}" />
                        </label>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <label class="input m-2">
                            <span class="label">Precio</span>
                            <input class="text-black" type="text" placeholder="100" name="price"
                                value="{{ old('price', $dish->price) }}" />
                        </label>
                        <x-input-error class="mt-2" :messages="$errors->get('price')" />
                    </div>


                    <label class="select">
                        <span class="label">Categoria</span>
                        <select class="text-black" name="category_id">
                            @forelse ($categories as $name => $id)
                                <option {{ old('category_id', $dish->category_id) == $id ? 'selected' : '' }}
                                    value="{{ $id }}">
                                    {{ $name }}
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
