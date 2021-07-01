@extends('layouts.temp')
@section('contenido')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
  Listado de proveedores
</h2>

<div>
  <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 mb-4 transition-colors
    duration-150 bg-blue-500 border border-transparent rounded-lg text-white active:bg-gray-600 hover:bg-gray-100
    hover:text-gray-700 focus:outline-none focus:shadow-outline-gray" 
    onclick="location.href='{{route('provider.create')}}'"
  >
    <span>Nuevo</a></span>
    
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
  </button>
</div>

<div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
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
          <th class="px-4 py-3">Acciones</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
      @foreach ($providers as $provider)
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
            <a class="text-blue-500" href="{{route('provider.show', $provider->id)}}">
              {{$provider->provider}}
            </a>
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
          <td class="px-4 py-3">
            <div class="flex items-center space-x-4 text-sm">
              <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-500 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit"> 
                <a href="{{route('provider.edit', $provider->id)}}">
                  <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  >
                  <path
                  d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                  ></path>
                  </svg>
                </a>
              </button>
              <button
                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                aria-label="Delete">
                <a href="{{route('provider.destroy', $provider->id)}}">
                  <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  >
                  <path
                  fill-rule="evenodd"
                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                  clip-rule="evenodd"
                  ></path>
                  </svg>
                </a>
              </button>
            </div>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  
  </div>
</div>
@endsection