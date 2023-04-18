<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fa-solid fa-chart-line"></i>
            {{ __('Reportes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">  
                    <div class="p-6 bg-white  md:justify-between md:items-center">

                        <div class="">
                            <a href="{{ route('report.add') }}" class="text-xl font-bold">
                                <i class="fa-solid fa-chart-line"></i> Desglose Evolucion Ingresos
                            </a>
                        </div>

                        <div class="">
                            <a href="{{ route('report.out') }}" class="text-xl font-bold">
                                <i class="fa-solid fa-chart-line"></i> Desglose Evolucion Gastos
                            </a>
                        </div>

                        <div class="">
                            <a href="{{ route('report.balance') }}" class="text-xl font-bold">
                                <i class="fa-solid fa-chart-line"></i> Balance
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>