@extends('layouts.temp')
@section('contenido')
    <h1>Formulario para Proveedor</h1>
    
    @if(isset($provider))
        
        <form action="{{route('provider.update', $provider)}}" method="POST">
            @method('PATCH')
        
    @else
        <form action="{{route('provider.store')}}" method="POST">
    @endif
        @csrf
        <label for="proveedor">Nombre de Proveedor</label>
        <input type="text" name="provider" id="" value="{{$provider->provider ?? ''}}">
        <br>
        <label for="tel_prov">Telefono de Proveedor</label>
        <input type="text" name="tel_prov" id="" value="{{$provider->tel_prov ?? ''}}">
        <br>
        <label for="correo_prov">Correo de proveedor</label>
        <input type="text" name="email_prov" id="" value="{{$provider->email_prov ?? ''}}">
        <br>
        <input type="submit" value="Guardar">
        </form>
@endsection