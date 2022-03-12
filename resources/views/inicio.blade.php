<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Torneos Activos') }}
        </h2>
 
        @auth
        @if(Auth::user()->rol == 'Admin' || Auth::user()->rol == 'Organizador')

        <a  href="{{ route('torneo.create') }}">
            <x-button class="ml-2">
                Nuevo Evento
            </x-button>
        </a>

        @endif
        @endauth

    </x-slot>

    <div class="flex inline-block bg-gray-900 border rounded-lg border-gray-700 p-5">
        <div class="grid grid-cols-4">
            @foreach ($torneos as $torneo)
            <!-- Card -->
            <a class="bg-slate-900 border rounded-lg border-gray-700 p-5 m-2 shadow hover:bg-gray-700 delay-100 duration-200" href="/torneo/{{$torneo->id}}">
                <!-- Header -->
                <img src="/imagenes/{{ $torneo->juego->imagen }}" class="rounded w-72 h-72" />
                <p class="mt-3 text-gray-500 font-semibold">{{$torneo->juego->nombre}}</p>
                <!-- Content -->
                <p class="text-xs text-gray-500 mt-3">
                    {{$torneo->descripcion}}
                    {{$torneo->fecha}}
                    {{$torneo->hora_inicio}}
                    {{$torneo->nequipos}}
                    {{$torneo->tipo}}
                    {{$torneo->user->name}}
                </p>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>