<form class="md:w-1/2 space-y-5" wire:submit.prevent='crearTransfer'>
    <div>
        <x-input-label for="created_at" :value="__('Fecha')" />
        <x-text-input id="created_at" class="block mt-1 w-full" type="date" wire:model="created_at" :value="old('created_at')" />
        @error('created_at')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label :value="__('De la Cuenta')" />
        <select wire:model="account_id_out" id="account_id_out" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option>Seleccione Cuenta</option>
            @foreach ($accountsOut as $account)
                <option value="{{$account->id}}">{{$account->name}}</option>
            @endforeach
        </select>
            @if (count($coinsOut))
                <div class="block font-medium text-sm text-gray-500">
                    Saldo:
                    @foreach ($coinsOut as $coin)
                    {{ $coin->name }}
                    @endforeach
                    {{ $saldoOut }}
                </div>
            @else
            @endif 
        @error('account_id_out')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>
    
    <div>
        <x-input-label :value="__('A la Cuenta')" />
        <select wire:model="account_id_add" id="account_id_add" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option>Seleccione Cuenta</option>
            @foreach ($accountsAdd as $account)
                <option value="{{$account->id}}">{{$account->name}}</option>
            @endforeach
        </select>
            @if (count($coinsAdd))
                <div class="block font-medium text-sm text-gray-500">
                    Saldo:
                    @foreach ($coinsAdd as $coin)
                    {{ $coin->name }}
                    @endforeach
                    {{ $saldoAdd }}
                </div>
            @else
            @endif 
        @error('account_id_add')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="amount" :value="__('Importe')" />
        <x-text-input id="amount" class="block mt-1 w-full" type="text" wire:model="amount" :value="old('amount')" placeholder="importe"/>  
        @error('amount')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>
    
    <div>
        <a href="{{route('transfer.index')}}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Cancelar</a>
        <x-primary-button>Guardar</x-primary-button>
    </div>

  </form> 