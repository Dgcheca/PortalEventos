<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Juego') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col ">
                        <div class="shadow sm:rounded-lg">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <form method="POST" action="/juegos"  enctype="multipart/form-data">
                                @csrf

                                <!-- NOMBRE -->
                                <div>
                                    <x-label for="nombre" :value="__('Nombre')" />
                                    <x-input id="nombre" class="block mt-1" type="text" name="nombre" :value="old('nombre')" required autofocus />
                                </div>
                                <!-- IMAGEN -->
                                <div>
                                    <x-label for="file" :value="__('Imagen')" />
                                    <x-input id="file" class="block mt-1" type="file" name="file" required autofocus />
                                </div>
                                <div class="mt-4">
                                    <a href="{{ route('juegos.store') }}">
                                        <x-button>
                                            Crear
                                        </x-button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>