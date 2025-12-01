<x-app-layout>
    <x-slot name="header">
        <h2>Create view</h2>
    </x-slot>
    <div class="flex justify-center mt-10">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <form action="{{ route('dish.store') }}" method="POST">
                    @csrf
                    <label class="input m-2">
                        <span class="label">Nombre</span>
                        <input class="text-black" type="text" placeholder="Enchiladas Verde" name="name" />
                    </label>

                    <label class="input m-2">
                        <span class="label">Descripcion</span>
                        <input class="text-black" type="text" placeholder="Ingredientes" name="description" />
                    </label>

                    <label class="input m-2">
                        <span class="label">Precio</span>
                        <input class="text-black" type="text" placeholder="100" name="price"/>
                    </label>

                    <label class="select">
                        <span class="label">Categoria</span>
                        <select class="text-black" name="category_id">
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name}}</option>
                            @empty
                                <option>No options</option>
                            @endforelse
                        </select>
                    </label>
                    <button  type="submit" class="btn btn-primary mt-4 w-full">Guardar</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
