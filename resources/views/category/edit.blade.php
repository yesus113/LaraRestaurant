<x-app-layout>
    <x-slot name="header">
        <h2>Edit</h2>
    </x-slot>
    <div class="flex justify-center mt-10">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <form action="{{ route('categ.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <label class="input m-2">
                        <span class="label">Nombre</span>
                        <input class="text-black" type="text" placeholder="example enchiladas" name="name"
                            value="{{ old('name', $category->name) }}" />
                    </label>
                    <button type="submit" class="btn btn-outline btn-secondary mt-4 w-full">Guardar</button>


                    @component('components.alerts.error-alert')
                    @endcomponent()
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
