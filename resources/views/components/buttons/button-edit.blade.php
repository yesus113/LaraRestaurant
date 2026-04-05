@props([
        'route',
        'name' => 'empty' //default value bro, don't worry
        ])
<button
    class=" glass border border-blue-600 text-base-content hover:bg-yellow-600 hover:primary-content font-medium px-4 py-2 rounded-md transition m-2 block">
    <a href="{{ $route }}">{{ $name }}</a>
</button>
