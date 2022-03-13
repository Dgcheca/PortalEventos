<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Torneo') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col ">
                        <div class="shadow sm:rounded-lg">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <form method="POST" action="/equipos">
                                @csrf
                                <div class="w-full grid grid-cols-2">
                                    <div class="">

                                        <div>
                                            <x-label for="nombre" :value="__('Nombre del Equipo')" />
                                            <x-input id="nombre" class="block mt-1" type="text" name="nombre" required autofocus />
                                        </div>

                                        <div>
                                            <!-- TENGO QUE COMPROBAR QUE EL CAMPO NO ESTE VACIO, AL PONER NG-MODEL SE SALTA EL REQUIRED -->
                                            <x-label for="tipo" :value="__('Tipo')" />
                                            <select ng-model="tipo" required name="tipo" id="tipo" class="h-10 pl-3 pr-6 text-base border-gray-300 placeholder-gray-300 border rounded-lg appearance-none focus:shadow-outline">
                                                <option value="1">Individual</option>
                                                <option value="2">Equipo de 2</option>
                                                <option value="3">Equipo de 3</option>
                                                <option value="4">Equipo de 4</option>
                                                <option value="5">Equipo de 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="">
                                        <!-- MIEMBROS DEL EQUIPO -->
                                        <div class="mt-4">
                                            <!-- LOS CAMPOS DEL FORMULARIO SE CREAN DE FORMA DINAMICA SEGUN EL TAMAÑO DEL EQUIPO (TIPO) -->
                                            <!-- EL PRIMERO SIEMPRE ES EL CREADOR DEL EQUIPO Y NO SE PUEDE CAMBIAR -->
                                            <x-label for="jugador1" :value="__('Jugador 1')" />
                                            <select required name="jugador1" id="jugador1" class="h-10 pl-3 pr-6 text-base border-gray-300 placeholder-gray-300 border rounded-lg appearance-none focus:shadow-outline">
                                                <option value="{{Auth::user()->id}}">{{ Auth::user()->name }}</option>
                                            </select>

                                            <!-- SEGUNDO JUGADOR SI EQUIPO ES 2 O MAS -->
                                            <div class="mt-4" ng-if="tipo > 1">
                                                <x-label for=" jugador2" :value="__('Jugador 2')" />
                                                <select required ng-model="j2" name="jugador2" id="jugador2" class="h-10 pl-3 pr-6 text-base border-gray-300 placeholder-gray-300 border rounded-lg appearance-none focus:shadow-outline">
                                                    @foreach( $usuarios as $usuario)
                                                    @if($usuario->id != Auth::user()->id)
                                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- TERCER JUGADOR SI EQUIPO ES 3 O MAS -->
                                            <div class="mt-4" ng-if="tipo > 2">
                                                <x-label for=" jugador3" :value="__('Jugador 3')" />
                                                <select required ng-model="j3" name="jugador3" id="jugador3" class="h-10 pl-3 pr-6 text-base border-gray-300 placeholder-gray-300 border rounded-lg appearance-none focus:shadow-outline">
                                                    @foreach( $usuarios as $usuario)
                                                    @if($usuario->id != Auth::user()->id)
                                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- CUARTO JUGADOR SI EQUIPO ES 4 O MAS -->
                                            <div class="mt-4" ng-if="tipo > 3">
                                                <x-label for=" jugador4" :value="__('Jugador 4')" />
                                                <select required ng-model="j4" name="jugador4" id="jugador4" class="h-10 pl-3 pr-6 text-base border-gray-300 placeholder-gray-300 border rounded-lg appearance-none focus:shadow-outline">
                                                    @foreach( $usuarios as $usuario)
                                                    @if($usuario->id != Auth::user()->id)
                                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- QUINTO JUGADOR SI EQUIPO ES 5 -->
                                            <div class="mt-4" ng-if="tipo > 4">
                                                <x-label for=" jugador5" :value="__('Jugador 5')" />
                                                <select required ng-model="j5" name="jugador5" id="jugador5" class="h-10 pl-3 pr-6 text-base border-gray-300 placeholder-gray-300 border rounded-lg appearance-none focus:shadow-outline">
                                                    @foreach( $usuarios as $usuario)
                                                    @if($usuario->id != Auth::user()->id)
                                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ route('equipo.store') }}">
                                            <x-button>
                                                Crear
                                            </x-button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>