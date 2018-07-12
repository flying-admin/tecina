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
                <form action="#" method="GET" style="display:inline">
                  <label>
                    <input type="text" name="filter" value="{{@$_GET['filter']}}" />
                  </label>
                  <button type="submit" class="btn btn-primary">filtrar</button>
                </form>
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
                        </a>
                        <div style="float:right;margin-left:5px;">
                          <form action="/api/dishes/{{$dish->id}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="btn btn-danger">
                              <i class="material-icons">delete</i>
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                </table>
                   {{ $dishes->links('pagination::bootstrap-4') }}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
