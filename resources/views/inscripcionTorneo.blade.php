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
                <form method="POST" action="/inscripcion/{{$torneo->id}}">
                    @csrf

                    <h1 class="m-5 text-4xl">Inscribete con un equipo que ya hayas creado:</h1>

                    <select required name="equipos" id="equipos" class="h-10 pl-3 pr-6 text-base border-gray-300 placeholder-gray-300 border rounded-lg appearance-none focus:shadow-outline">
                        @foreach( $equipos as $equipo)
                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                        @endforeach
                    </select>

                    <a href="/inscripcion/{{$torneo->id}}">
                        <x-button>
                            Inscribirse
                        </x-button>
                    </a>

                </form>

                <h1 class="m-5 text-4xl">O crea uno nuevo:</h1>
    
                <a  href="{{ route('equipo.create') }}">
                    <x-button>
                        Crear Nuevo Equipo
                    </x-button>
                </a>
            </div>

        </div>

    </div>

</x-app-layout>