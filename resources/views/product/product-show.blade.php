@extends('layouts.temp')
@section('contenido')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Detalle del producto: &nbsp; &nbsp;
    <span class="text-2xl font-medium uppercase text-gray-500 dark:text-gray-200">
        {{$product->product}}
    </span>
</h2>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <p class="text-m font-semibold text-gray-700 dark:text-gray-100">
        ID del producto: &nbsp; &nbsp; 
      <span class="text-m font-medium text-gray-500 dark:text-gray-200">
        {{$product->id}}
      </span>
    </p>
    <p class="mt-4 text-m font-semibold text-gray-700 dark:text-gray-100">
        Nombre del producto: &nbsp; &nbsp; 
        <span class="text-m font-medium text-gray-500 dark:text-gray-200">
        {{$product->product}}
        </span>
    </p>
    <p class="mt-4 text-m font-semibold text-gray-700 dark:text-gray-100">
        Descripcion <br>  
        <span class="text-m font-medium text-gray-500 dark:text-gray-200">
          {{$product->description}}
        </span>
    </p>
    <p class="mt-4 text-m font-semibold text-gray-700 dark:text-gray-100">
        Categoría: &nbsp; &nbsp; 
        <span class="text-m font-medium text-gray-500 dark:text-gray-200">
          {{$product->category->category}}
        </span>
    </p>

    <p class="mt-4 mb-2 text-m font-semibold text-gray-700 dark:text-gray-100">
        Estatus del producto: &nbsp; &nbsp;
    @if ($product->status==true)
        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
            Activo
        </span>
    @else
        <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
            Baja
        </span>
    @endif
        
    </p>
    
</div>
<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
    <!-- Card Precio Unitario-->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
          Precio Unitario
        </p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
          $ {{$product->unitprice}}
        </p>
      </div>
    </div>
    <!-- Card Unidades Disponibles-->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
            </svg>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Unidades Disp.
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            {{$product->availableunits}}
            </p>
        </div>
    </div>
</div>
<form action="{{route('product.destroy', $product)}}" method="post">
  @csrf
  @method('DELETE')
  <div class="items-end">
    <input class="px-4 py-2 text-sm font-medium leading-5 mt-8 transition-colors
    duration-150 bg-red-600 border border-transparent rounded-lg text-white active:bg-gray-600 hover:bg-gray-100
    hover:text-gray-700 focus:outline-none focus:shadow-outline-gray" type="submit" value="Eliminar producto">
  </div>
</form> 
@endsection