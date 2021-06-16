@extends('layouts.temp')
@section('contenido')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Formulario para productos
</h2>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
@if(isset($product))
    <form action="{{route('product.update', $product)}}" method="POST">
        @method('PATCH')
@else
    <form action="{{route('product.store')}}" method="POST">
@endif
@csrf
        <label class="block text-sm mb-4">
        <span class="text-gray-700 dark:text-gray-400">Nombre del producto</span>
            <input 
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                @error('product') border-red-600 focus:border-red-400 focus:shadow-outline-red @enderror" 
                placeholder="Jane Doe" type="text" name="product" id="product"
                value="{{ old('product') ?? $product->product ?? '' }}"
            />
            @error('product')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>
        
        <label class="block text-sm mb-4">
            <span class="text-gray-700 dark:text-gray-400">Descripcion del Producto</span>
            <input 
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                @error('description') border-red-600 focus:border-red-400 focus:shadow-outline-red @enderror" 
                placeholder="Jane Doe" type="text" name="description" id="description"
                value="{{ old('description') ?? $product->description ?? '' }}"
            />
            @error('description')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>

        <label class="block text-sm mb-4">
            <span class="text-gray-700 dark:text-gray-400">Precio U. del producto</span>
            <input 
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                @error('unitprice') border-red-600 focus:border-red-400 focus:shadow-outline-red @enderror" 
                placeholder="Jane Doe" type="text" name="unitprice" id="unitprice"
                value="{{old('unitprice') ?? $product->unitprice ?? ''}}"
            />
            @error('unitprice')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>

        @if (isset($product))           
        <div class="mb-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
              Status del Producto
            </span>
            <div class="mt-2">
              <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                <input type="radio" class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" name="status" value="1" 
                @if ($product->status==true)
                    checked
                @endif>
                <span class="ml-2">Activo</span>
              </label>
              <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                <input type="radio" class="text-blue-600 form-radio focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" name="status" value="0"
                @if ($product->status==false)
                    checked
                @endif>
                <span class="ml-2">Baja</span>
              </label>
            </div>
          </div>
        @endif


        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
              Categoría
            </span>
            <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select
            focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray"
            name="category_id" id="category_id">
              @foreach ($categories as $category)
              <option value="{{$category->id}}">
                {{$category->category}}
              </option>
              @endforeach
              @if (isset($product))
                <option value="{{$product->category->id}}" selected>
                    {{$product->category->category}}
                </option>
              @endif
            </select>
            @error('category_id')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
          </label>

        <div class="mt-4">
            <input class="px-4 py-2 text-sm font-medium leading-5 transition-colors duration-150 bg-blue-500 border border-transparent rounded-lg text-white active:bg-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:shadow-outline-gray" 
            type="submit" value="Guardar">
        </div>
    </form>
</div>
@endsection