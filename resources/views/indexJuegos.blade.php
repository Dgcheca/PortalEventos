<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Equipos') }}
        </h2>
        @auth
        @if(Auth::user()->rol == 'Organizador' || Auth::user()->rol == 'Admin')

        <a  href="{{ route('juegos.create') }}">
            <x-button class="ml-2">
                Nuevo Juego
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
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imagen</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span class="">Borrar</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if(isset($juegos))
                            @foreach($juegos as $juego)
                           
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $juego->nombre}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{base64_decode($juego->imagen)}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{$juego->imagen}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="/juegos/{{ $juego->id }}/delete" data-method='delete' class="text-red-600"><button class="bg-red-600 hover:bg-red-700 text-black font-bold py-2 px-2 rounded">X</button></a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        @if(isset($juegos))
                        <div class="flex justify-center max-w-8xl mx-auto">
                            {{ $juegos->links() }}
                        </div>
                        @endif
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>