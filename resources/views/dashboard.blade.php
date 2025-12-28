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

                <a href="">
                    <div class="card bg-base-100 w-96 shadow-sm">
                        <figure class="px-10 pt-10">
                            <img src="{{ asset('img/entrada.jpg') }}" alt="Entrada" class="rounded-xl" />
                        </figure>
                        <div class="card-body items-center text-center">
                            <h2 class="card-title">Entradas</h2>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
