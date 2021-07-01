@extends('layouts.temp')
@section('contenido')
<div>
    <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white
      border border-transparent focus:outline-none mt-4"
      href="{{url()->previous()}}"
    >
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="#1c64f2">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
      </svg>
    </a>
</div>

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Formulario para compras
</h2>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="{{route('purchase.store')}}" method="POST">
    @csrf
    <div class="grid gap-6 mt-2 md:grid-cols-2 xl:grid-cols-3">
        
        <label class="text-sm mb-4">
            <span class="block text-gray-700 dark:text-gray-400">Usuario que registra la compra</span>
            <input 
            class="mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            type="text" name="user" id="user"
            value="{{Auth::user()->name}}" readonly disabled
            />
        </label>

        <label class="text-sm mb-4">
            <span class="block text-gray-700 dark:text-gray-400">Fecha de la compra</span>
            <input 
            class=" mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            type="text" name="created_at" id="created_at"
            readonly
            />
        </label> 
        
    </div>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
              Proveedor
            </span>
            <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select
            focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
            name="provider_id" id="provider_id">
              @foreach ($providers as $provider)
              <option value="{{$provider->id}}">
                {{$provider->provider}}
              </option>
              @endforeach
            </select>
            @error('provider_id')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>

        <input class="mt-8 px-4 py-2 text-sm font-medium leading-5 transition-colors duration-150 bg-blue-500 border border-transparent rounded-lg text-white active:bg-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:shadow-outline-gray" 
        type="submit" value="Guardar">
    </form>
</div>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous">
</script>

<script>
    $(document).ready(function() {
        var date = new Date();

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = year + "-" + month + "-" + day;       
        $("#created_at").attr("value", today);
        $("#created_at").attr("value", today);
        $("#created_at").attr("min", today);
    });
</script>
@endsection