<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                    <a href="{{ route('dish.index', ['category' => 'entrada']) }}">
                        <div class="card p-1 rounded h-72 overflow-hidden">
                            <figure class="px-4 pt-4 h-40">
                                <img src="{{ asset('img/entrada/entrada.jpg') }}" alt="Entrada" class="rounded-xl" />
                            </figure>
                            <div class="card-body items-center text-center">
                                <h2 class="card-title">Entradas</h2>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('dish.index', ['category' => 'platillo fuerte']) }}">
                        <div class="card p-1 rounded h-72 overflow-hidden">
                            <figure class="px-4 pt-4 h-40">
                                <img src="{{ asset('img/pf/picaña.jpg') }}" alt="Platillo Fuerte"
                                    class="rounded-xl " />
                            </figure>

                            <div class="card-body items-center text-center">
                                <h2 class="card-title">Platillos Fuerte</h2>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('dish.index', ['category' => 'postre']) }}">
                        <div class="card p-1 rounded h-72 overflow-hidden">
                            <figure class="px-4 pt-4 h-40">
                                <img src="{{ asset('img/postre/cupcakes-de-chocolate.jpg') }}" alt="Postres"
                                    class="rounded-xl" />
                            </figure>
                            <div class="card-body items-center text-center">
                                <h2 class="card-title">Postres</h2>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('dish.index', ['category' => 'bebida']) }}">
                        <div class="card p-1 rounded h-72 overflow-hidden">
                            <figure class="px-4 pt-4 h-40">
                                <img src="{{ asset('img/bebida/bebidas-naturales.jpg') }}" alt="Bebidas"
                                    class="rounded-xl" />
                            </figure>
                            <div class="card-body items-center text-center">
                                <h2 class="card-title">Bebidas</h2>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
