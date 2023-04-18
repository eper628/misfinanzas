<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Ajuste') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">  
                    <div class="p-6 bg-white  md:justify-between md:items-center">
                        
                        <form class="md:w-1/2 space-y-5" action="{{route('account-setting.update', $record)}}" method="POST">
                            @csrf
                            @method('PUT')
                            
                                @if ($record->type == 1)
                                    <div>  
                                        <x-input-label :value="__('Tipo Ajuste')" />
                                        <input type="radio" name="type" id="type1" value="1" checked>       
                                        <label class="mr-5" for="type1">Ajuste Positivo</label>  
                                        <br>
                                        <input type="radio" name="type" id="type2" value="2">       
                                        <label for="type2">Ajuste Negativo</label>
                                    </div>
                                @else
                                    <div> 
                                        <x-input-label :value="__('Tipo Ajuste')" /> 
                                        <input type="radio" name="type" id="type1" value="1">       
                                        <label class="mr-5" for="type1">Ajuste Positivo</label>  
                                        <br>
                                        <input type="radio" name="type" id="type2" value="2" checked>       
                                        <label for="type2">Ajuste Negativo</label>
                                    </div>      
                                @endif

                            <div>  
                                <x-input-label :value="__('Subcategoria')" />         
                                <select name="subcategory_id" id="subcategory_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                                    <option value="">Seleccione Subcategoria</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}"{{ old('subcategory_id', $record->subcategory_id) == $subcategory->id ? 'selected' : '' }}>{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                                @error('subcategory_id')
                                    <livewire:mostrar-alerta :message="$message"/>
                                @enderror
                            </div>    

                            <div>   
                                <x-input-label :value="__('Cuenta')" />        
                                <select name="account_id" id="account_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                                    <option value="">Seleccione Cuenta</option>
                                    @foreach ($accounts as $account)
                                        <option value="{{$account->id}}"{{ old('account_id', $record->account_id) == $account->id ? 'selected' : '' }}>{{$account->name}}</option>
                                    @endforeach
                                </select>
                                @error('account_id')
                                    <livewire:mostrar-alerta :message="$message"/>
                                @enderror
                            </div>

                            <div>
                                <x-input-label for="created_at" :value="__('Fecha')" />
                                <x-text-input id="created_at" class="block mt-1 w-full" type="date" name="created_at" :value="old('created_at', $record->created_at ->format('Y-m-d'))" />
                                @error('created_at')
                                    <livewire:mostrar-alerta :message="$message"/>
                                @enderror
                            </div>

                            <div>
                                <x-input-label for="concept" :value="__('Concepto')" />
                                <x-text-input id="concept" class="block mt-1 w-full" type="text" name="concept" :value="old('concept', $record->concept)" />
                                @error('concept')
                                    <livewire:mostrar-alerta :message="$message"/>
                                @enderror
                            </div>

                            <div>
                                <x-input-label for="amount" :value="__('Importe')" />
                                <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount', $record->amount)" />
                                @error('amount')
                                    <livewire:mostrar-alerta :message="$message"/>
                                @enderror
                            </div>

                            <a href="{{route('account-setting.index')}}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Cancelar</a>
                            <x-primary-button>Guardar</x-primary-button>
                        </form>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>