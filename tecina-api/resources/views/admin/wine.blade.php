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
                <form action="#" method="GET" style="display:inline">
                  <label>
                    <input type="text" name="filter" value="{{@$_GET['filter']}}" />
                  </label>
                  <button type="submit" class="btn btn-primary">filtrar</button>
                </form>
                <div style="float:right">
                  <a href="/api/wines/create" class="btn btn-primary">
                    <i class="material-icons">create</i>
                    <span>Crear Vino</span>
                  </a>
                </div>
              </div>
              <div class="card-body">
                   {{ $wines->links('pagination::bootstrap-4') }}
                <table>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($wines as $wine)
                    <tr>
                      <td>#{{$wine->id}}</td>
                      <td>{{$wine->name}}</td>
                      <td>
                        <a href="/api/wines/{{$wine->id}}/edit" class="btn btn-primary">
                          <i class="material-icons">edit</i>
                          <span>Editar</span>
                        </a>
                      </td>
                      <td>
                        <button id="highlightwine_{{$wine->id}}" class="btn {{($highlighted_wine==$wine->id)?'btn-danger':'btn-primary'}}" onclick="highlightwine({{$wine->id}})">
                          <i class="material-icons">stars</i>
                          <span>{{($highlighted_wine==$wine->id)?'Destacado':'Destacar'}}</span>
                        </button>

                      </td>
                    </tr>
                  @endforeach
                </tbody>
                </table>
                   {{ $wines->links('pagination::bootstrap-4') }}
              </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  function highlightwine(wineid){
    console.log('resaltando vino '+wineid);
    form_data= new FormData();
    form_data.append('_method','PUT');
    form_data.append('key','highlighted_wine');
    form_data.append('value',wineid);
    $.ajax({
          url: '/api/misc/highlighted_wine', // point to server-side PHP script
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function(php_script_response){
              $('[id^=highlightwine_].btn-danger').removeClass('btn-danger').addClass('btn-primary').find('span').html('Destacar');
              $('#highlightwine_'+wineid).removeClass('btn-primary').addClass('btn-danger');
              $('#highlightwine_'+wineid+'>span').text('Destacado');
          },
       });
  }
</script>
@endsection
