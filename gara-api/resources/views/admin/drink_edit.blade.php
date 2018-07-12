@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-8">

      <div class="card">
        <div class="card-header">
          <strong>Edición de Bebida</strong>
        </div>
        <div class="card-body">

          <section>
            <p>Información general</p>
            <form action="/api/drinks/{{$drink->id}}" method="POST">
              <input name="_method" type="hidden" value="PUT">
              <ul class="nav nav-tabs">
                @foreach($langs =  DB::table('languages')->get() as $lang)
                  <li><a data-toggle="tab" href="#{{$lang->code}}" @if($loop->first) class="active show" @endif>{{$lang->code}}</a></li>
                @endforeach
              </ul>
              <div class="tab-content">
                @foreach($langs =  DB::table('languages')->get() as $lang)
                <div id="{{$lang->code}}" class="tab-pane fade in @if ($loop->first) active show @endif">
                  <label for="name_{{$lang->code}}">
                    <span>Nombre:</span>
                    <input maxlength="40" placeholder="máximo 40 caracteres" type="text" id="name_{{$lang->code}}" name="name_{{$lang->code}}" value="{{ @$translations[$lang->code]['name'] }}"/>
                  </label>
                  <small class="form-text text-muted">Introducir un máximo de 40 caracteres</small>
                  <label for="description_{{$lang->code}}">
                    <span>Descripción:</span>
                    <input type="text" id="description_{{$lang->code}}" name="description_{{$lang->code}}" value="{{ @$translations[$lang->code]['description'] }}"/>
                  </label>
                </div>
                @endforeach
              </div>
              <label for="drink_type">
                <span>Tipo de bebida:</span>
                <select name="drink_type">
                  @foreach($drinkTypeTranslations as $id=>$values)
                  <option value="{{$id}}"{{($id==$drink_type)?' selected':''}}>
                    {{$values['es']['name']}}
                  </option>
                @endforeach
                </select>
              </label>

              <button type="submit" class="btn btn-primary">
                <i class="material-icons">save</i>
                <span>Guardar cambios</span>
              </button>
            </form>
          </section>



          <section>
            <p>Imagen de la Bebida</p>
            <img style="max-width:300px;max-height:300px;" id="drink_image" src="/img/drinks/{{$drink->image}}" class="drink main admin" onclick="jQuery('#uploaddrinkImage').toggle();" />
            <div id="uploaddrinkImage" style="display:none">
              <label for="drinkImage">
                <span>Selecciona una imagen:</span>
                <input type="file" name="drinkImage" id="drinkImage" accept="image/x-png" placeholder="Imagen nueva" />
              </label>
              <button type="button" class="btn btn-primary" id="upload_drink_image_button" onclick="uploaddrinkImage({{$drink->id}})">
                <i class="material-icons">photo_camera</i>
                <span>Cambiar imagen</span>
              </button>
              <button type="button" class="btn btn-danger" id="delete_drink_image_button" onclick="deletedrinkImage({{$drink->id}})">
                <i class="material-icons">delete</i>
                <span>Eliminar imagen</span>
              </button>
            </div>
          </section>

        </div>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">


  function uploaddrinkImage(iddrink){
    var file_data = $('#drinkImage').prop('files')[0];
    if(file_data){
    var form_data = new FormData();
    form_data.append('file', file_data);
    $.ajax({
          url: '/uploadDrinkImage/'+iddrink, // point to server-side PHP script
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function(php_script_response){
              $('#drink_image').attr('src',php_script_response['img']);
              $('#uploaddrinkImage').fadeOut();
          },
       });
     }else{
              alert('No has seleccionado ninguna imagen.');
     }
   }

  function deletedrinkImage(iddrink){
    var form_data = new FormData();
    $.ajax({
          url: '/uploadDrinkImage/'+iddrink, // point to server-side PHP script
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function(php_script_response){
              $('#drink_image').attr('src',php_script_response['img']);
              $('#uploaddrinkImage').fadeOut();
          },
       });
   }
</script>
@endsection
