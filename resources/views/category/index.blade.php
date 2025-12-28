<x-app-layout>
    <x-slot name="header">
        <h1>Categorias</h1>
    </x-slot>
    @component('components.buttons.button-create')
    @section('ruta')
        <a href="{{ route('dish.create') }}">Agregar</a>
    @endsection
    @endcomponent

</x-app-layout>

