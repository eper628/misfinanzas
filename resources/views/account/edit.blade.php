<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Cuentas') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">  
                    <div class="p-6 bg-white  md:justify-between md:items-center">
                        
                        <form class="md:w-1/2 space-y-5" action="{{route('account.update', $account)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-input-label for="name" :value="__('Nombre')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $account->name)" />
                                @error('name')
                                    <livewire:mostrar-alerta :message="$message"/>
                                @enderror
                            </div>

                            @if ($account->type==1)
                                <div>    
                                    <x-input-label :value="__('Tipo Cuenta')" />
                                    <input type="radio" name="type" id="type1" value="1" checked>       
                                    <label for="type1">Efectivo</label>  
                                    <br>
                                    <input type="radio" name="type" id="type2" value="2">       
                                    <label for="type2">Caja Ahorro</label>
                                </div>
                            @else
                                <div> 
                                    <x-input-label :value="__('Tipo Cuenta')" />   
                                    <input type="radio" name="type" id="type1" value="1">       
                                    <label for="type1">Efectivo</label>  
                                    <br>
                                    <input type="radio" name="type" id="type2" value="2" checked>       
                                    <label for="type2">Caja Ahorro</label>
                                </div>               
                            @endif
                            
                            <div>
                                <x-input-label :value="__('Moneda')" />           
                                <select name="coin_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                                    <option value="">Seleccione Moneda</option>
                                    @foreach ($coins as $coin)
                                        <option value="{{$coin->id}}"{{ old('coin_id', $account->coin_id) == $coin->id ? 'selected' : '' }}>
                                            {{$coin->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('coin_id')
                                    <livewire:mostrar-alerta :message="$message"/>
                                @enderror
                            </div>

                            @if ($account->status==3)
                                <div>  
                                    <x-input-label :value="__('Status')" />  
                                    <input type="radio" name="status" id="status1" value="3" checked>       
                                    <label for="status1">Activo</label>  
                                    <br>
                                    <input type="radio" name="status" id="status2" value="4">       
                                    <label for="status2">Inactivo</label>
                                </div>
                                <br>
                            @else
                                <div>   
                                    <x-input-label :value="__('Status')" /> 
                                    <input type="radio" name="status" id="status1" value="3">       
                                    <label for="status1">Activo</label>  
                                    <br>
                                    <input type="radio" name="status" id="status2" value="4" checked>       
                                    <label for="status2">Inactivo</label>
                                </div>
                                <br>
                            @endif    
                            

                            <a href="{{route('account.index')}}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Cancelar</a>
                            <x-primary-button>Guardar</x-primary-button>
                        </form>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>