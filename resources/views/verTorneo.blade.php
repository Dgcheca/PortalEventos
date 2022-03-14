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
                <p class="m-5">Equipos Participantes: {{$equipos->count()}}</p>
                <p class="m-5">Por equipos de: {{$torneo->tipo}}</p>
                <p class="m-5">Organizado por: {{$torneo->user->name}}</p>
                <p class="m-5">
                    @auth
                    @if(Auth::user()->rol == 'Jugador')
                    @if(count($contenido) == 0)
                    <a href="/inscripcion/{{$torneo->id}}">
                        <x-button>
                            Inscribirse
                        </x-button>
                    </a>
                    @else
                    <!-- HAY QUE HACER LA COMPROBACION PARA VER SI YA ESTA INSCRITO -->
                    <a href="/inscripcion/{{$torneo->id}}/{{$contenido[0]}}/delete">
                        <x-button>
                            Borrar Inscripcion
                        </x-button>
                    </a>
                    @endif

                    @elseif((Auth::user()->rol == 'Admin') || (Auth::user()->id == $torneo->user->id))

                    <a href="/torneo/{{$torneo->id}}/edit">
                        <x-button>
                            Editar
                        </x-button>
                    </a>
                    <a href="/torneo/{{$torneo->id}}/delete">
                        <x-button>
                            Borrar
                        </x-button>
                    </a>

                    @endif
                    @endauth
                </p>
            </div>
        </div>

    </div>

</x-app-layout>