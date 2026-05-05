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
                    {{ 'Bienvenido!  ' . auth()->user()->name }}
                </div>

                <!-- Options-->

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    {{--
                    <x-dashboard.a-card
                        route="{{ route('dish.index', ['category' => 'entrada']) }}"
                        imgUrl="{{ asset('img/entrada/entrada.jpg') }}"
                        alt="Entrada"
                        name="Entrada"/>

                    <x-dashboard.a-card
                        route="{{ route('dish.index', ['category' => 'platillo fuerte']) }}"
                        imgUrl="{{ asset('img/pf/picaña.jpg') }}"
                        alt="Platillo Fuerte"
                        name="Platillo Fuerte"/>

                    <x-dashboard.a-card
                        route="{{ route('dish.index', ['category' => 'postre']) }}"
                        imgUrl="{{ asset('img/postre/cupcakes-de-chocolate.jpg') }}"
                        alt="Postre"
                        name="Postre"/>

                    <x-dashboard.a-card
                        route="{{ route('dish.index', ['category' => 'bebida']) }}"
                        imgUrl="{{ asset('img/bebida/bebidas-naturales.jpg') }}"
                        alt="Bebida"
                        name="Bebida"/>
                        --}}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
