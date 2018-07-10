@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if (session('status'))
            <div class="card">
                <div class="card-header">Aviso</div>

                <div class="card-body">
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                </div>
            </div>
          @endif
            <div class="card">
              <div class="card-header">
                <strong>Listado de platos</strong>
                <div style="float:right">
                  <a href="/api/dishes/create" class="btn btn-primary">
                    <i class="material-icons">create</i>
                    <span>Crear Plato</span>
                  </a>
                </div>
              </div>
              <div class="card-body">
                   {{ $dishes->links('pagination::bootstrap-4') }}
                <table>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($dishes as $dish)
                    <tr>
                      <td>#{{$dish->id}}</td>
                      <td>{{$dish->name}}</td>
                      <td>
                        <a href="/api/dishes/{{$dish->id}}/edit" class="btn btn-primary">
                          <i class="material-icons">edit</i>
                          <span>Editar</span>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                </table>
                   {{ $dishes->links('pagination::bootstrap-4') }}
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <strong>Nuevo Plato</strong>
              </div>
              <div class="card-body">
                <form class="menus create" action="/api/dishes/create" method="post">

                </form>
              </div>
            </div>

        </div>
    </div>
</div>
@endsection
