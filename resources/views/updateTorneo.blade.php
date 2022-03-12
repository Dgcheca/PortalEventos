<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Torneo') }}
        </h2>
    </x-slot>
    <x-guest-layout :class="__('py-12 bg-gray-900 min-h-screen')">
        <div class="py-12 bg-gray-900 min-h-screen">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex flex-col ">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">

                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                    <form method="POST" action="/torneo/{{$torneo->id}}">
                                        @csrf
                                        @method('PUT')
                                        <!-- JUEGO -->
                                        <div class="mt-4">
                                            <x-label for="juego_id" :value="__('juego')" />
                                            <select name="juego_id" selected="{{$torneo->juego_id}}" id="juego_id" class="h-10 pl-3 pr-6 text-base border-gray-300 placeholder-gray-300 border rounded-lg appearance-none focus:shadow-outline">
                                                @foreach( $juegos as $juego)
                                                <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                                                @if ($torneo->juego_id === $juego->id)
                                                <option value="{{ $juego->id }}" selected>{{ $juego->nombre }}</option>
                                                @else
                                                <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- FECHA -->
                                        <div>
                                            <x-label for="fecha" :value="__('fecha')" />
                                            <x-input id="fecha" class="block mt-1" type="date" name="fecha" min="" :value=" $torneo->fecha " required autofocus />
                                        </div>
                                        <!-- AFORO MAXIMO -->
                                        <div>
                                            <x-label for="aforo" :value="__('aforo')" />
                                            <x-input id="aforo" class="block mt-1" type="number" name="aforo" min="0" :value=" $torneo->aforo_maximo " required autofocus />
                                        </div>
                                        <!-- TIPO -->
                                        <div>
                                            <x-label for="tipo" :value="__('tipo')" />
                                            <select name="tipo" id="tipo" class="h-10 pl-3 pr-6 text-base border-gray-300 placeholder-gray-300 border rounded-lg appearance-none focus:shadow-outline">
                                                <option value="1" @if ( $torneo->tipo == 1) selected @endif>Individual</option>
                                                <option value="2" @if ( $torneo->tipo == 2) selected @endif>Equipos de 2</option>
                                                <option value="3" @if ( $torneo->tipo == 3) selected @endif>Equipos de 3</option>
                                                <option value="4" @if ( $torneo->tipo == 4) selected @endif>Equipos de 4</option>
                                                <option value="5" @if ( $torneo->tipo == 5) selected @endif>Equipos de 5</option>
                                            </select>
                                        </div>
                                        <!-- HORA_INICIO -->
                                        <div>
                                            <!-- HORA -->
                                            <div class="mt-4 inline-block" id="horahora" name="hora_inicio">
                                                <x-label for="hora" :value="__('hora')" />
                                                <x-input id="hora" class="block mt-1" type="number" name="hora" min="0" max="23" :value="$hora[0]" required autofocus />
                                            </div>
                                            <!-- MINUTOS -->
                                            <div class="mt-4 inline-block" id="horaminuto" name="hora_inicio">
                                                <x-label for="minutos" :value="__('minutos')" />
                                                <x-input id="minutos" class="block mt-1" type="number" name="minutos" min="0" max="59" :value="$hora[1]" required autofocus />
                                            </div>
                                        </div>
                                        <!-- DESCRIPCION -->
                                        <div class="mt-4">
                                            <x-label for="descripcion" :value="__('descripcion')" />
                                            <textarea class="block mt-1 w-full" name="descripcion" id="descripcion" cols="30" rows="10">{{$torneo->descripcion}}</textarea>
                                        </div>
                                        <div class="mt-4">
                                            <x-button class="ml-4">
                                                Actualizar
                                            </x-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-guest-layout>
</x-app-layout>
<script>
    window.onload = function() {
        var hoy = new Date();
        var dd = hoy.getDate() + 1;
        var mm = hoy.getMonth() + 1;
        var yyyy = hoy.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        var formato = yyyy + '-' + mm + '-' + dd;
        document.getElementById("fecha").setAttribute("min", formato);
    };
</script>