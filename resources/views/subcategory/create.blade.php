<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Subcategorias') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">  
                    <div class="p-6 bg-white  md:justify-between md:items-center">
                        
                        <form class="md:w-1/2 space-y-5" action="{{route('subcategory.store')}}" method="POST">
                            @csrf

                            <x-input-label :value="__('Categoria')" />
                            <div>           
                                <select name="category_id" id="category_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                                    <option value="">Seleccione Categoria</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <livewire:mostrar-alerta :message="$message"/>
                                @enderror
                            </div>

                            <div>
                                <x-input-label for="name" :value="__('Nombre')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />
                                @error('name')
                                    <livewire:mostrar-alerta :message="$message"/>
                                @enderror
                            </div>

                            <a href="{{route('subcategory.index')}}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Cancelar</a>
                            <x-primary-button>Guardar</x-primary-button>

                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>