@extends('layouts.temp')
@section('contenido')
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