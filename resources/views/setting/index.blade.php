<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fa fa-gear"></i>
            {{ __('Ajustes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">  
                    <div class="p-6 bg-white  md:justify-between md:items-center">
                        
                        <div class="">
                            <a href="{{ route('account-setting.index') }}" class="text-xl font-bold">
                                <i class="fa-solid fa-gears"></i> Ajustes
                            </a>
                        </div>
                        <div class="">
                            <a href="{{ route('account.index') }}" class="text-xl font-bold">
                                <i class="fa-solid fa-landmark"></i> Cuentas
                            </a>
                        </div>
                        <div class="">
                            <a href="{{ route('category.index') }}" class="text-xl font-bold">
                                <i class="fa fa-list-ul"></i> Categorias
                            </a>
                        </div>
                        <div class="">
                            <a href="{{ route('subcategory.index') }}" class="text-xl font-bold">
                                <i class="fa-solid fa-list-ol"></i> Subcategorias
                            </a>
                        </div>
                
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>