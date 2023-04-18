<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Registros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">  
                    <div class="p-6 bg-white  md:justify-between md:items-center">
                        
                        <livewire:edit-transfer :record="$record" />
                
                    
                            {{--    <form action="{{route('transfer.update', $record)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <x-input-label for="created_at" :value="__('Fecha')" />
                                    <x-text-input id="created_at" class="block mt-1 w-full" type="date" name="created_at" :value="old('created_at', $record->created_at->format('Y-m-d'))" required autofocus autocomplete="created_at" />
                                    <x-input-error :messages="$errors->get('created_at')" class="mt-2" />
                                </div>
                                <x-input-label :value="__('De la Cuenta')" />
                                <div>           
                                    <select name="account_id_out" id="account_id_out" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        @foreach ($accounts as $account)
                                            @if ($out->account_id==$account->id)
                                                <option selected value="{{$account->id}}">{{$account->name}}</option>
                                            @else
                                                <option value="{{$account->id}}">{{$account->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <x-input-label :value="__('A la Cuenta')" />
                                <div>           
                                    <select name="account_id_add" id="account_id_add" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                        @foreach ($accounts as $account)
                                            @if ($add->account_id==$account->id)
                                                <option selected value="{{$account->id}}">{{$account->name}}</option>
                                            @else
                                                <option value="{{$account->id}}">{{$account->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="mb-3">
                                    <x-input-label for="amount" :value="__('Importe')" />
                                    <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount', $record->amount)" required autofocus autocomplete="amount" />
                                    <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                                </div> 
                                
                                
        
                        
                                <a href="{{route('transfer.index')}}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Cancelar</a>
                                <x-primary-button>Guardar</x-primary-button>
        
                            </form> --}}

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>