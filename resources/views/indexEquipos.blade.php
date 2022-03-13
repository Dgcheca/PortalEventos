<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Equipos') }}
        </h2>
        @auth
        @if(Auth::user()->rol == 'Jugador')

        <a  href="{{ route('equipo.create') }}">
            <x-button class="ml-2">
                Nuevo Equipo
            </x-button>
        </a>

        @endif
        @endauth
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="divide-y divide-gray-200 max-w-9xl min-w-9xl mx-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Borrar</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if(isset($equipos))
                            @foreach($equipos as $equipo)
                           
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $equipo->nombre}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $equipo->tipo }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="/equipos/{{ $equipo->id }}/delete" data-method='delete' class="text-red-600"><button class="bg-red-600 hover:bg-red-700 text-black font-bold py-2 px-2 rounded">X</button></a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        @if(isset($equipos))
                        <div class="flex justify-center max-w-8xl mx-auto">
                            {{ $equipos->links() }}
                        </div>
                        @endif
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>