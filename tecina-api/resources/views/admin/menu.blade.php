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
                <strong>Listado de menús</strong>
              </div>
              <div class="card-body">
                <table>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($menus as $menu)
                    <tr>
                      <td>#{{$menu['id']}}</td>
                      <td>{{$menu['translate']['es']['name']}}</td>
                      <td><a href="/api/menus/{{$menu['id']}}/edit" class="btn btn-primary a-btn-slide-text"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span><span><strong>Editar</strong></span></a></td>
                    </tr>
                  @endforeach
                </tbody>
                </table>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <strong>Nuevo Menú</strong>
              </div>
              <div class="card-body">
                <form class="menus create" action="/api/menus/create" method="post">

                </form>
              </div>
            </div>

        </div>
    </div>
</div>
@endsection
