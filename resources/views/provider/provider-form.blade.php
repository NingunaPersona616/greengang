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
        <label class="block text-sm mb-4">
        <span class="text-gray-700 dark:text-gray-400">Nombre del proveedor</span>
            <input 
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                @error('provider') border-red-600 focus:border-red-400 focus:shadow-outline-red @enderror" 
                placeholder="Jane Doe" type="text" name="provider" id="provider" required minlength="4" maxlength="50"
                value="{{ old('provider') ?? $provider->provider ?? '' }}"
            />
            @error('provider')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>
        
        <label class="block text-sm mb-4">
            <span class="text-gray-700 dark:text-gray-400">Telefono de Proveedor</span>
            <input 
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                @error('tel_prov') border-red-600 focus:border-red-400 focus:shadow-outline-red @enderror" 
                placeholder="3311224455" type="text" name="tel_prov" id="tel_prov" required minlength="10" maxlength="13"
                value="{{ old('tel_prov') ?? $provider->tel_prov ?? '' }}"
            />
            @error('tel_prov')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Correo de proveedor</span>
            <input 
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input
                @error('email_prov') border-red-600 focus:border-red-400 focus:shadow-outline-red @enderror" 
                placeholder="Jane@test.com" type="email" name="email_prov" id="email_prov" required
                value="{{old('email_prov') ?? $provider->email_prov ?? ''}}"
            />
            @error('email_prov')
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