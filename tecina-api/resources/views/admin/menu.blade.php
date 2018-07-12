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
                <form action="#" method="GET" style="display:inline">
                  <label>
                    <input type="text" name="filter" value="{{@$_GET['filter']}}" />
                  </label>
                  <button type="submit" class="btn btn-primary">filtrar</button>
                </form>
                <div style="float:right">
                  <a href="/api/menus/create" class="btn btn-primary">
                    <i class="material-icons">create</i>
                    <span>Crear Menú</span>
                  </a>
                </div>
              </div>
              <div class="card-body">
                {{ $menus_2->links('pagination::bootstrap-4') }}
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
                      <td>
                        #{{$menu['id']}}
                      </td>
                      <td>
                        {{$menu['translate']['es']['name']}}
                      </td>
                      <td>
                        <a href="/api/menus/{{$menu['id']}}/edit" class="btn btn-primary">
                          <i class="material-icons">edit</i>
                          <span>Editar</span>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                </table>
                {{ $menus_2->links('pagination::bootstrap-4') }}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
