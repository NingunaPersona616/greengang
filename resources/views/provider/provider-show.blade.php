@extends('layouts.temp')
@section('contenido')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
  Detalle del proveedor: 
  <span class="text-m font-semibold tracking-wide text-gray-500 dark:text-gray-400 uppercase">
    {{$provider->provider}}
  </span>
</h2>

<div class="w-full overflow-hidden rounded-lg shadow-xs">
  <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr
          class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
        >
          <th class="px-4 py-3">ID</th>
          <th class="px-4 py-3">Proveedor</th>
          <th class="px-4 py-3">Telefono</th>
          <th class="px-4 py-3">Correo</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        <tr class="text-gray-700 dark:text-gray-400">
          <td class="px-4 py-3">
            <div class="flex items-center text-sm">
              <div>
                <p class="font-semibold">{{$provider->id}}</p>
                <!--<p class="text-xs text-gray-600 dark:text-gray-400">
                  10x Developer
                </p>
                -->
              </div>
            </div>
          </td>
          <td class="px-4 py-3 text-sm">
              {{$provider->provider}}
          </td>
          <td class="px-4 py-3 text-xs">
            <!--<span
              class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
            >
            
              Approved
            </span>
            -->
            {{$provider->tel_prov}}
          </td>
          <td class="px-4 py-3 text-sm">
            {{$provider->email_prov}}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<form action="{{route('provider.destroy', $provider)}}" method="post">
  @csrf
  @method('DELETE')
  <div class="items-end">
    <input class="px-4 py-2 text-sm font-medium leading-5 mt-4 transition-colors
    duration-150 bg-red-600 border border-transparent rounded-lg text-white active:bg-gray-600 hover:bg-gray-100
    hover:text-gray-700 focus:outline-none focus:shadow-outline-gray" type="submit" value="Eliminar proveedor">
  </div>
</form> 
@endsection