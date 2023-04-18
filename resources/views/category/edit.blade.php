<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Categorias') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">  
                    <div class="p-6 bg-white  md:justify-between md:items-center">
                        
                        <form class="md:w-1/2 space-y-5" action="{{route('category.update', $category)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-input-label for="name" :value="__('Nombre')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $category->name)" />
                                @error('name')
                                    <livewire:mostrar-alerta :message="$message"/>
                                @enderror
                            </div>

                            
                            @if ($category->type==1)
                                <div> 
                                    <x-input-label :value="__('Tipo Cuenta')" />   
                                    <input type="radio" name="type" id="type1" value="1" checked>       
                                    <label for="type1">Ingreso</label>
                                    <br>
                                    <input type="radio" name="type" id="type2" value="2">       
                                    <label for="type2">Egreso</label>
                                </div>
                            @elseIf($category->type==2)
                                <div>  
                                    <x-input-label :value="__('Tipo Cuenta')" />  
                                    <input type="radio" name="type" id="type1" value="1">       
                                    <label for="type1">Ingreso</label>  
                                    <br>
                                    <input type="radio" name="type" id="type2" value="2" checked>       
                                    <label for="type2">Egreso</label>
                                </div>
                             @endif

                            <a href="{{route('category.index')}}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Cancelar</a>
                            <x-primary-button>Guardar</x-primary-button>
                        </form>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>