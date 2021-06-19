@extends('layouts.temp')
@section('contenido')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
  Listado de compras
</h2>

<div>
  <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 mb-4 transition-colors
    duration-150 bg-blue-500 border border-transparent rounded-lg text-white active:bg-gray-600 hover:bg-gray-100
    hover:text-gray-700 focus:outline-none focus:shadow-outline-gray" 
    onclick="location.href='{{route('purchase.create')}}'"
  >
    <span>Nueva</a></span>
    
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
  </button>
</div>

<div class="w-full overflow-hidden rounded-lg shadow-xs">
  <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr
          class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
        >
          <th class="px-4 py-3">ID</th>
          <th class="px-4 py-3">Proveedor</th>
          <th class="px-4 py-3">Fecha</th>
          <th class="px-4 py-3">Usuario</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
      @foreach ($purchases as $purchase)
        <tr class="text-gray-700 dark:text-gray-400 text-center">
          <td class="px-4 py-3">
            <div class="text-sm">
                <a class="text-blue-500" href="{{route('purchase.show', $purchase->id)}}">
                    {{$purchase->id}}
                </a>
            </div>
          </td>
          <td class="px-4 py-3 text-sm">
            {{$purchase->provider->provider}}
          </td>
          <td class="px-4 py-3 text-sm">
            {{$purchase->created_at}}
          </td>
          <td class="px-4 py-3 text-sm">
            {{$purchase->user->name}}
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  
  </div>
</div>
@endsection