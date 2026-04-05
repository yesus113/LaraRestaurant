    @props([
        'route',
        'name' => 'empty', //default value bro, don't worry
    ])
    <button
        class="glass border border-blue-600 text-base-content hover:bg-primary hover:text-primary-content font-medium px-4 py-2 rounded-md transition m-3 mx-auto block">
        <a href="{{ $route }}">{{ $name }}</a>
    </button>
