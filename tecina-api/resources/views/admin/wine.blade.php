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
                <strong>Listado de vinos</strong>
              </div>
              <div class="card-body">
                   {{ $wines->links('pagination::bootstrap-4') }}
                <table>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($wines as $wine)
                    <tr>
                      <td>#{{$wine->id}}</td>
                      <td>{{$wine->name}}</td>
                      <td>
                        <a href="/api/wines/{{$wine->id}}/edit" class="btn btn-primary a-btn-slide-text">
                          <i class="material-icons">edit</i>
                          <span>Editar</span>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                </table>
                   {{ $wines->links('pagination::bootstrap-4') }}
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <strong>Nuevo Vino</strong>
              </div>
              <div class="card-body">
                <form class="menus create" action="/api/wines/create" method="post">

                </form>
              </div>
            </div>

        </div>
    </div>
</div>
@endsection
