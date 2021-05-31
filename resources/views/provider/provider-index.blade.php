@extends('layouts.temp')
@section('contenido')
<h1 class="mt-5 mb-5 text-center"> Listado de Proveedores </h1>
<div class="container">
  <div class="table-responsive">
    <table class="table table-striped text-center">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Proveedor</th>
              <th scope="col">Telefono</th>
              <th scope="col">Correo</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($providers as $provider)
              <tr>
                <th scope="row">{{$provider->id}}</th>
                <td>
                    <a href="{{route('provider.show', $provider->id)}}">
                        {{$provider->provider}}
                    </a>
                </td>
                <td>{{$provider->tel_prov}}</td>
                <td>{{$provider->email_prov}}</td>
                <td>
                  <a href="{{route('provider.edit', $provider->id)}}" class="btn btn-success">Editar</a>
                </td>
              </tr>
              @endforeach
          </tbody>
    </table>
  </div>
  <a href="{{route('provider.create')}}" class="btn btn-info">Nuevo</a>
</div>
@endsection