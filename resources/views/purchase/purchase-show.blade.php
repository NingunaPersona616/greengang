@extends('layouts.temp')
@section('contenido')

<div>
  <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white
    border border-transparent focus:outline-none mt-4"
    href="{{route('purchase.index')}}"
  >
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#1c64f2">
      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
    </svg>
  </a>
</div>

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Detalle de la compra: &nbsp; &nbsp;
    <span class="text-2xl font-medium uppercase text-gray-500 dark:text-gray-200">
        {{$purchase->purchase}}
    </span>
</h2>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <p class="text-m font-semibold text-gray-700 dark:text-gray-100">
        ID de la compra: &nbsp; &nbsp; 
      <span class="text-m font-medium text-gray-500 dark:text-gray-200">
        {{$purchase->id}}
      </span>
    </p>
    <p class="mt-4 text-m font-semibold text-gray-700 dark:text-gray-100">
        Fecha de la compra: <br>  
        <span class="text-m font-medium text-gray-500 dark:text-gray-200">
            {{$purchase->created_at}}
        </span>
    </p>
    <p class="mt-4 text-m font-semibold text-gray-700 dark:text-gray-100">
        Nombre del proveedor: &nbsp; &nbsp; 
        <span class="text-m font-medium text-gray-500 dark:text-gray-200">
        {{$purchase->provider->provider}}
        </span>
    </p>
    <p class="mt-4 text-m font-semibold text-gray-700 dark:text-gray-100">
        Usuario que realizo la compra: &nbsp; &nbsp; 
        <span class="text-m font-medium text-gray-500 dark:text-gray-200">
          {{$purchase->user->name}}
        </span>
    </p>
    
</div>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-center text-gray-700 uppercase border-b 
            dark:border-gray-700 bg-green-100 dark:text-gray-400 dark:bg-gray-800"
          >
            <th class="px-4 py-3">ID producto</th>
            <th class="px-4 py-3">Producto</th>
            <th class="px-4 py-3">Unidades</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          @foreach ($purchase->products as $product)
          <tr class="text-gray-700 dark:text-gray-400 text-center">
            <td class="px-4 py-3">{{$product->id}}</td>
            <td class="px-4 py-3">{{$product->product}}</td>
            <td class="px-4 py-3">{{$product->pivot->units}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>  
@endsection