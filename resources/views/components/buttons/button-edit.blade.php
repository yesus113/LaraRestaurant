@props([
        'route',
        'name' => 'empty' //default value bro, don't worry
        ])
<button
    class=" glass border border-blue-600 text-white hover:bg-yellow-600 hover:text-white font-medium px-4 py-2 rounded-md transition m-2">
    <a href="{{ $route }}">{{ $name }}</a>
</button>
