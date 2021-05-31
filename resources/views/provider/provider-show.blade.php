@extends('layouts.temp')
@section('contenido')
<h1 class="mt-5 mb-5 text-center"> Detalle de Proveedor </h1>
<div class="container">
  <div class="table-responsive">
    <table class="table table-striped text-center">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Proveedor</th>
              <th scope="col">Telefono</th>
              <th scope="col">Correo</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <th scope="row">{{$provider->id}}</th>
                <td>{{$provider->provider}}</td>
                <td>{{$provider->tel_prov}}</td>
                <td>{{$provider->email_prov}}</td>
              </tr>
          </tbody>
    </table>
  </div>
  <form action="{{route('provider.destroy', $provider)}}" method="post">
    @csrf
    @method('DELETE')
    <input class="btn btn-danger" type="submit" value="Eliminar proveedor">
  </form>   
</div>
@endsection