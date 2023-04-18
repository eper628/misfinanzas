<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fa-solid fa-house"></i>
            {{ __('Home') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">  
                    @if (count($accounts) > 0)
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                               
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nombre
                                        </th>
                                        <th scope="col" class="sm:hidden hidden md:table-cell px-6 py-3">
                                            Tipo
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Moneda
                                        </th>
                                        <th scope="col" class="sm:hidden hidden md:table-cell px-6 py-3">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Saldo
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accounts as $account) 
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{$account->name}}
                                        </th>
                                        <td class="sm:hidden hidden md:table-cell px-6 py-4">
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
                                        <td class="px-6 py-4">
                                            {{$account->moneda}}
                                        </td>
                                        <td class="sm:hidden hidden md:table-cell px-6 py-4">
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
                                        
                                    
                                    <td class="px-6 py-4">
                                        {{$account->saldo}}
                                    </td>
                                    
                                </tr>
                                @endforeach
                                </tbody>   
                        </table> 
                    @else
                        <p><span class="font-bold">No existen cuentas </span><a class="text-indigo-500" href="{{route('account.create')}}">Acá se pueden crear</a></p>
                    @endif     
                </div> 
            </div>
        </div>
    </div>
</x-app-layout>