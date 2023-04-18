<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fa-solid fa-chart-line"></i>
            {{ __('Balance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">  
                    <div class="p-6 bg-white  md:justify-between md:items-center">

                        <div class="py-3">
                            <a href="{{route('report.index')}}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Volver</a>
                            <a href="{{route('report.balance')}}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Limpiar</a>
                        </div>

                        <form action="{{ route('report.balance') }}" method="GET">
                            <div class="md:grid md:grid-cols-3 gap-5"> 
                                <div class="pb-5 md:pb-0">
                                    <select name="month" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                                        <option value="">--Filtrar por Mes--</option>
                                        <option value="1">Este Mes</option>
                                        <option value="2">Mes Anterior</option>
                                    </select>
                                </div>

                                <div class="pb-5 md:pb-0">
                                    <select name="year" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                                        <option value="">--Filtrar por Año--</option>
                                        <option value="1">Este Año</option>
                                        <option value="2">Año Anterior</option>
                                    </select>
                                </div>

                                <div class="pb-5">
                                    <x-primary-button class="w-full py-3.5"><i class="fa fa-filter"></i></x-primary-button>
                                </div>    
                            </div>
                        </form>
                            

                        <table class="w-full">    
                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                                <tr>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                        Nombre
                                    </th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">
                                        Importe
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $record) 
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-3/5 p-3 text-sm text-gray-700">
                                        @switch($record->type)
                                            @case(1)
                                                INGRESOS
                                                @break
                                            @case(2)
                                                EGRESOS
                                                @break      
                                            @default       
                                        @endswitch
                                    </td> 
                                    <td class="p-3 text-sm text-gray-700">
                                        {{$record->total}}
                                    </td> 
                                </tr>
                            @endforeach
                            </tbody>   
                        </table> 
                        
                        <div class="md:grid md:grid-cols-2 gap-5">
                            <div></div>
                            <div class="mt-5 p-3 text-xl text-gray-700 font-semibold tracking-wide bg-gray-50 border-b-2 border-gray-200">
                               <span class="pl-4">Total:</span><span class="pl-12 md:pl-8">{{ $balance }}</span><span class="pl-2">ARS</span>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>