<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Detalles') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">


        <div class="grid grid-cols-2 p-6 bg-gray-200 inline-block m-5 rounded">
            <img src="/imagenes/{{ $torneo->juego->imagen }}" class="rounded w-full inline-block" />

            <div class="inline-block m-5">
                <h1 class="m-5 text-5xl">Juego: {{$torneo->juego->nombre}}</h1>
                <p class="m-5">Info: {{$torneo->descripcion}}</p>
                <p class="m-5 inline-block">Fecha: {{$torneo->fecha}}</p>
                <p class="m-5 inline-block">Hora: {{$torneo->hora_inicio}}</p>
                <p class="m-5">Equipos Participantes: {{$torneo->nequipos}}</p>
                <p class="m-5">Por equipos de: {{$torneo->tipo}}</p>
                <p class="m-5">Organizado por: {{$torneo->user->name}}</p>
                
        @auth
        @if(Auth::user()->rol == 'Jugador')
            <p>Inscribirse</p>
        @elseif((Auth::user()->rol == 'Admin') || (Auth::user()->id == $torneo->user->id))
            <a href="/torneo/{{$torneo->id}}/edit"><x-button>
                Editar
            </x-button></a>
            <a href="/torneo/{{$torneo->id}}/delete"><x-button>
                Borrar
            </x-button></a>
        @endif
        @endauth
            </div>
        </div>

    </div>

</x-app-layout>