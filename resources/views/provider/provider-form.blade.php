@extends('layouts.temp')
@section('contenido')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Formulario para proveedores
</h2>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
@if(isset($provider))
    <form action="{{route('provider.update', $provider)}}" method="POST">
        @method('PATCH')
@else
    <form action="{{route('provider.store')}}" method="POST">
@endif
@csrf
        <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Nombre del proveedor</span>
            <input 
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" type="text" name="provider" id="provider"
                value="{{$provider->provider ?? ''}}"
            />
        </label>
        
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Telefono de Proveedor</span>
            <input 
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" type="text" name="tel_prov" id="tel_prov"
                value="{{$provider->tel_prov ?? ''}}"
            />
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Correo de proveedor</span>
            <input 
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" type="text" name="email_prov" id="email_prov"
                value="{{$provider->email_prov ?? ''}}"
            />
        </label>

        <div class="mt-4">
            <input class="px-4 py-2 text-sm font-medium leading-5 transition-colors duration-150 bg-blue-500 border border-transparent rounded-lg text-white active:bg-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:shadow-outline-gray" 
            type="submit" value="Guardar">
        </div>
    </form>
</div>
@endsection