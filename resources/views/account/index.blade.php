<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cuentas') }}
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
                    <div class="p-6 bg-white  md:justify-between md:items-center">
                        
                        <div class="py-3">
                            <a href="{{ route('account.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Agregar</a>
                            <a href="{{route('setting.index')}}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Volver</a>
                        </div>

                        <table class="w-full">
                               
                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                                <tr>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                        Nombre
                                    </th>
                                    <th class="sm:hidden hidden md:table-cell p-3 text-sm font-semibold tracking-wide text-left">
                                        Tipo
                                    </th>
                                    <th class="sm:hidden hidden md:table-cell p-3 text-sm font-semibold tracking-wide text-left">
                                        Moneda
                                    </th>
                                    <th class="sm:hidden hidden md:table-cell p-3 text-sm font-semibold tracking-wide text-left">
                                        Status
                                    </th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $account) 
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="p-3 text-sm text-gray-700">
                                        {{$account->name}}
                                    </td>
                                    <td class="sm:hidden hidden md:table-cell p-3 text-sm text-gray-700">
                                        @switch($account->type)
                                            @case(1)
                                                EFECTIVO
                                                @break
                                            @case(2)
                                                CAJA AHORRO
                                                @break
                                            @default
                                                
                                        @endswitch
                                    </td>
                                    <td class="sm:hidden hidden md:table-cell p-3 text-sm text-gray-700">
                                        {{$account->coin->name}}
                                    </td>
                                    <td class="sm:hidden hidden md:table-cell p-3 text-sm text-gray-700">
                                        @switch($account->status)
                                            @case(3)
                                                ACTIVO
                                                @break
                                            @case(4)
                                                INACTIVO
                                                @break
                                            @default
                                                
                                        @endswitch
                                    </td>
                                    <td>
                                        <form action="{{route('account.destroy', $account)}}" method="POST">
                                            <a href="{{route('account.edit', $account)}}" class="mb-1 inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-200 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition ease-in-out duration-150">
                                                <i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-200 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition ease-in-out duration-150">
                                                <i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>   
                    </table> 
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>