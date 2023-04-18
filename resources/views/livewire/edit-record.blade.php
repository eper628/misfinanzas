<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarRecord'>
    <div>
        <x-input-label for="created_at" :value="__('Fecha')" />
        <x-text-input id="created_at" class="block mt-1 w-full" type="date" wire:model="created_at" :value="old('created_at')" />
        @error('created_at')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="type" :value="__('Tipo Registro')" />
        <select id="type" wire:model="type" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option>Seleccione Tipo Registro</option>
            <option value="1">Ingreso</option>
            <option value="2">Egreso</option>
        </select>
        @error('type')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="concept" :value="__('Concepto')" />
        <x-text-input id="concept" class="block mt-1 w-full" type="text" wire:model="concept" :value="old('concept')" placeholder="concepto"/>  
        @error('concept')
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
        <x-input-label for="account_id" :value="__('Cuenta')" />
        <select id="account_id" wire:model="account_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option>-- Seleccione --</option>
            @foreach ($accounts as $account)
                <option value="{{$account->id}}">{{$account->name}}</option>
            @endforeach
        </select>
        @error('account_id')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="subcategory_id" :value="__('Subcategoria')" />
        <select id="subcategory_id" wire:model="subcategory_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option>-- Seleccione --</option>
            @foreach ($subcategories as $subcategory)
                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
            @endforeach
        </select>
        @error('subcategory_id')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>



    <div>
        <a href="{{route('record.index')}}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Cancelar</a>
        <x-primary-button>Guardar</x-primary-button>
    </div>
</form>