<x-app-layout>
    <x-slot name="header">
        <h2>Create view</h2>
    </x-slot>
    <div class="flex justify-center mt-10">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <form action="{{ route('categ.store') }}" method="POST">
                    @csrf
                    <label class="input m-2">
                        <span class="label">Nombre</span>
                        <input class="text-black" type="text" placeholder="Enchiladas Verde" name="name"
                            value="{{ old('name') }}" />
                    </label>
                    <button type="submit" class="btn btn-outline btn-secondary mt-4 w-full">Guardar</button>

                    @if ($errors->any())
                        <div class="alert alert-error mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </form>
            </div>
        </div>
    </div>

</x-app-layout>
