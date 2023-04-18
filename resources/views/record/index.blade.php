<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fa-solid fa-outdent"></i>
            {{ __('Registros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session()->has('mensaje'))
                <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm">
                    {{ session('mensaje') }}
                </div>
            @endif
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">  
                    <div class="p-6 bg-white md:justify-between md:items-center">

                        <div class="py-3">
                            <a href="{{ route('record.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Agregar</a>
                        </div>
                        <div>    
                                <form action="{{ route('record.index')}}" method="GET">
                                    <div class="md:grid md:grid-cols-2 gap-5 pb-5">
                                        <div>
                                            <x-input-label for="start" :value="__('Fecha Inicio')" />
                                            <x-text-input type="date" name="start" id="start" {{--name="start"--}} class="block mt-1 w-full" />
                                        </div>
                                        <div>
                                            <x-input-label for="finish" :value="__('Fecha Final')" />
                                            <x-text-input type="date" name="finish" id="finish" {{--name="finish"--}} class="block mt-1 w-full" />
                                        </div>
                                    </div>
                                    <div class="md:grid md:grid-cols-4 gap-5"> 
                                        <div class="pb-5 md:pb-0">
                                            <select name="type" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                                                <option value="">--Tipo de movimiento--</option>
                                                <option value="1">Ingresos</option>
                                                <option value="2">Egresos</option>
                                            </select>
                                        </div>
                                        <div class="pb-5">           
                                            <select name="subcategory_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                                                    <option value="">--Subcategoria--</option>
                                                @foreach ($subcategories as $subcategory) 
                                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="pb-5">           
                                            <select name="account_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                                                    <option value="">--Cuenta--</option>
                                                @foreach ($accounts as $account) 
                                                    <option value="{{$account->id}}">{{$account->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="pb-5">
                                            <x-primary-button class="w-full py-3.5"><i class="fa fa-filter"></i></x-primary-button>
                                        </div>    
                                    </div>
                                </form>    
                        </div>

                        <table class="w-full">
                               
                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                                <tr>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                        Fecha
                                    </th>
                                    <th class="sm:hidden hidden md:table-cell p-3 text-sm font-semibold tracking-wide text-left">
                                        Concepto
                                    </th>
                                    <th class="sm:hidden hidden md:table-cell p-3 text-sm font-semibold tracking-wide text-left">
                                        Tipo
                                    </th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                        Importe
                                    </th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                        Cuenta
                                    </th>
                                    <th class="sm:hidden hidden md:table-cell p-3 text-sm font-semibold tracking-wide text-left">
                                        Subcategory
                                    </th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $record)   
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="p-3 text-sm text-gray-700">
                                            {{$record->created_at->format('d/m/y')}} <p class="text-sm md:hidden">{{$record->concept}}</p>
                                        </td>
                                        <td class="sm:hidden hidden md:table-cell p-3 text-sm text-gray-700">
                                            {{$record->concept}}
                                        </td>
                                        <td class="sm:hidden hidden md:table-cell p-3 text-sm text-gray-700">
                                            @switch($record->type)
                                                @case(1)
                                                    Add <i class="fa fa-sort-up"></i>
                                                    @break
                                                @case(2)
                                                    Out  <i class="fa fa-sort-desc"></i>
                                                    @break   
                                                @default
                                                    
                                            @endswitch
                                        </td>
                                        <td class="p-3 text-sm text-gray-700">
                                            @if ($record->type == 2)
                                                {{$record->amount = -$record->amount}}
                                            @else
                                                {{$record->amount}}
                                            @endif 
                                        </td>   
                                        <td class="p-3 text-sm text-gray-700">
                                            {{$record->account->name}}
                                        </td>
                                        <td class="sm:hidden hidden md:table-cell p-3 text-sm text-gray-700">
                                            {{$record->subcategory->name}}
                                        </td>
                                        <td class="p-3 text-sm text-gray-700">
                                            <form action="{{route('record.destroy', $record)}}" method="POST">
                                                <a href="{{route('record.edit', $record)}}" class="mb-1 inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-200 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition ease-in-out duration-150">
                                                    <i class="fa fa-edit"></i></a> 
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-200 rounded-md font-semibold text-xm text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition ease-in-out duration-150">
                                                    <i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>   
                        </table> 

                        


                        {{ $records->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>