@extends('layouts.temp')
@section('contenido')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Formulario para compras
</h2>

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="{{route('purchase.insertProduct', $last_purchase)}}" method="POST">
    @csrf
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
              Elige los productos a comprar
            </span>
            <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select
            focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
            multiple name="product_id[]" id="product_id" required>
              @foreach ($products as $product)
              <option value="{{$product->id}}">
                {{$product->product}}
              </option>
              @endforeach
            </select>
        </label>

        <input class="mt-8 px-4 py-2 text-sm font-medium leading-5 transition-colors duration-150 bg-blue-500 border border-transparent rounded-lg text-white active:bg-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:shadow-outline-gray" 
        type="submit" value="Guardar">
    </form>
</div>

@endsection