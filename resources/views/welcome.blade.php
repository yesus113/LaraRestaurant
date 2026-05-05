<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Restaurante') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50 font-sans text-slate-900 dark:bg-slate-950 dark:text-white">
    <header class="absolute inset-x-0 top-0 z-20">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-5 sm:px-6 lg:px-8">
            <a href="{{ url('/') }}" class="text-lg font-bold text-white">
                Restaurante
            </a>

            @if (Route::has('login'))
                <div class="flex items-center gap-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-sm bg-white text-slate-950 hover:bg-slate-100">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-ghost btn-sm text-white hover:bg-white/15">
                            Iniciar sesion
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-sm bg-white text-slate-950 hover:bg-slate-100">
                                Registrarse
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </nav>
    </header>

    <main>
        <section class="relative grid min-h-[72vh] place-items-center overflow-hidden px-4 py-28">
            <img
                src="{{ asset('img/pf/picaña.jpg') }}"
                alt="Platillo principal del restaurante"
                class="absolute inset-0 h-full w-full object-cover"
            />
            <div class="absolute inset-0 bg-slate-950/65"></div>

            <div class="relative z-10 mx-auto max-w-3xl text-center text-white">
                <p class="mb-4 text-sm font-bold uppercase tracking-wide text-emerald-300">
                    Menu fresco cada dia
                </p>
                <h1 class="text-4xl font-bold leading-tight sm:text-6xl">
                    Sabores sencillos, bien servidos
                </h1>
                <p class="mx-auto mt-5 max-w-2xl text-base leading-8 text-slate-200 sm:text-lg">
                    Explora entradas, platillos fuertes, postres y bebidas preparados para una experiencia clara,
                    cercana y sin complicaciones.
                </p>

                <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                        <a href="{{ route('dashboard') }}" class="btn btn-success text-white">
                            Sobre nosotros
                        </a>

                    <a href="#menu" class="btn btn-outline border-white text-white hover:bg-white hover:text-slate-950">
                        Ver categorias
                    </a>
                </div>
            </div>
        </section>

        <section id="menu" class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="mb-8 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-bold uppercase tracking-wide text-emerald-600 dark:text-emerald-400">
                        Categorias
                    </p>
                    <h2 class="text-3xl font-bold text-slate-950 dark:text-white">
                        Elige por antojo
                    </h2>
                </div>
                <p class="max-w-xl text-slate-600 dark:text-slate-300">
                    Texto largo.
                </p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <article class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
                    <img src="{{ asset('img/entrada/entrada.jpg') }}" alt="Entrada" class="h-40 w-full object-cover">
                    <div class="p-5">
                        <h3 class="text-lg font-bold">Entradas</h3>
                        <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Agregar un boolean a los productos, para saber si aun se vender.</p>
                    </div>
                </article>

                <article class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
                    <img src="{{ asset('img/pf/picaña.jpg') }}" alt="Platillo fuerte" class="h-40 w-full object-cover">
                    <div class="p-5">
                        <h3 class="text-lg font-bold">Platillos fuertes</h3>
                        <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">La parte principal del menu.</p>
                    </div>
                </article>

                <article class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
                    <img src="{{ asset('img/postre/cupcakes-de-chocolate.jpg') }}" alt="Postre" class="h-40 w-full object-cover">
                    <div class="p-5">
                        <h3 class="text-lg font-bold">Postres</h3>
                        <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Un cierre dulce.</p>
                    </div>
                </article>

                <article class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-900">
                    <img src="{{ asset('img/bebida/bebidas-naturales.jpg') }}" alt="Bebidas" class="h-40 w-full object-cover">
                    <div class="p-5">
                        <h3 class="text-lg font-bold">Bebidas</h3>
                        <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Frescas y naturales.</p>
                    </div>
                </article>
            </div>
        </section>
    </main>
</body>

</html>
