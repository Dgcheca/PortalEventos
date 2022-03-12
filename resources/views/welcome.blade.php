<x-app-layout>
    <x-slot name="header">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </x-slot>
    <div class="grid grid-cols-4">
        @foreach ($torneos as $torneo)

        <!-- Card -->
        <div class="flex inline-block bg-gray-900 border rounded-lg border-gray-700 p-5 m-2">
            <a class="w-full bg-slate-900 border rounded-lg border-gray-700 p-5 shadow hover:bg-gray-700 delay-100 duration-200" href="#" >
            <!-- Header -->

                <img src="http://localhost/imagenes/{{ $torneo->juego->imagen }}" class="rounded w-72 h-72" />
                <p class="mt-3 text-gray-500 font-semibold">{{$torneo->juego->nombre}}</p>


                <!-- Content -->
                <p class="text-xs text-gray-500 mt-3">
                    {{$torneo->descripcion}}
                    {{$torneo->fecha}}
                    {{$torneo->hora_inicio}}
                    {{$torneo->nequipos}}
                    {{$torneo->tipo}}
                    {{$torneo->organizador->nombre}}
                </p>
            </a>
        </div>
        @endforeach
    </div>
</x-app-layout>