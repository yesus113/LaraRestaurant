@props(['name', 'imgUrl', 'alt', 'route'])

    <a href="{{ $route }}">

        <div class="card p-1 rounded h-72 overflow-hidden">

            <figure class="px-4 pt-4 h-40">
                <img src="{{ $imgUrl }}" alt="{{ $alt }}" class="rounded-xl" />
            </figure>
            <div class="card-body items-center text-center">
                <h2 class="card-title">{{ $name }}</h2>
            </div>
        </div>
    </a>



