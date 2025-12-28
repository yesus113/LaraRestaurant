@yield('route-del') {{-- <form method="POST" action="{{ route('dish.destroy', $dish->id) }}"> --}}
    @csrf
    @method('DELETE')
    <button type="submit" value="DELETE"
        class=" glass border border-blue-600 text-white hover:bg-red-600 hover:text-white font-medium px-4 py-2 rounded-md transition m-2">
        Borrar
    </button>
</form>
