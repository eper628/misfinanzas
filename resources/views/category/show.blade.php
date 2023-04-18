<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">  
                    <div class="p-6 bg-white  md:justify-between md:items-center">
                        
                        @if (count($subcategories) > 0)
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nombre
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategories as $subcategory) 
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{$subcategory->name}}
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>   
                            </table>
                        @else
                            <p><span class="font-bold">No existen subcategorias </span><a class="text-indigo-500" href="{{route('subcategory.create')}}">Acá se pueden crear</a></p>
                        @endif 
                            

                        <div class="my-4">
                            <a href="{{route('category.index')}}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Cancelar</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>