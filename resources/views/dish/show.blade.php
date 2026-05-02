<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalle del platillo
        </h2>
    </x-slot>

    @php
        $categoryName = strtolower($dish->category->name ?? '');
        $dishImage = match (true) {
            str_contains($categoryName, 'bebida') => asset('img/bebida/bebidas-naturales.jpg'),
            str_contains($categoryName, 'postre') => asset('img/postre/cupcakes-de-chocolate.jpg'),
            default => asset('img/entrada/entrada.jpg'),
        };
    @endphp

    <section class="mx-auto max-w-5xl px-4 py-8 sm:px-6 lg:px-8">
        
        <article class="card overflow-hidden bg-base-100 shadow-xl ring-1 ring-base-300 lg:card-side">
            <figure class="relative min-h-72 bg-base-200 lg:w-5/12">
                <img
                    src="{{ $dishImage }}"
                    alt="Imagen de {{ $dish->name }}"
                    class="h-full w-full object-cover"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-black/10 to-transparent lg:bg-gradient-to-r"></div>

            </figure>

            <div class="card-body gap-6 p-6 sm:p-8 lg:w-7/12">
                <div>
                    <p class="mb-2 text-sm font-semibold uppercase tracking-wide text-primary">
                        Lo mas vendido
                    </p>
                    <h1 class="text-3xl font-bold leading-tight text-base-content sm:text-4xl">
                        {{ $dish->name }}
                    </h1>
                </div>

                <div class="rounded-lg border border-base-300 bg-base-200/50 p-5">
                    <h2 class="mb-3 text-sm font-semibold uppercase tracking-wide text-base-content/60">
                        Descripcion
                    </h2>
                    <p class="text-base leading-7 text-base-content/80">
                        {{ $dish->description ?: 'Este platillo aun no tiene una descripcion registrada.' }}
                    </p>
                </div>

                <div class="stats stats-vertical border border-base-300 bg-base-100 shadow-sm sm:stats-horizontal">
                    <div class="stat">
                        <div class="stat-title">Precio</div>
                        <div class="stat-value text-success">${{ number_format($dish->price, 2) }}</div>
                        <div class="stat-desc">MXN</div>
                    </div>

                    <div class="stat">
                        <div class="stat-title">Categoria</div>
                        <div class="stat-value text-lg">{{ $dish->category->name ?? 'Sin categoria' }}</div>
                    </div>
                </div>

                <div class="card-actions flex-col gap-3 sm:flex-row sm:justify-end">
                    <a href="{{ route('dish.edit', $dish->id) }}" class="btn btn-primary w-full sm:w-auto">
                        Editar platillo
                    </a>
                    <a href="{{ route('dish.index') }}" class="btn btn-outline w-full sm:w-auto">
                        Volver
                    </a>
                </div>
            </div>
        </article>
    </section>
</x-app-layout>
