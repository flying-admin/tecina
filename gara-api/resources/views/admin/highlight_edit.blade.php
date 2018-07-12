@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-8">

      <div class="card">
        <div class="card-header">
          <strong>Edición de Destacado</strong>
        </div>
        <div class="card-body">

          <section>
            <p>Información general</p>
            <form action="/api/highlights/{{$highlight->id}}" method="POST">
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
                    <input maxlength="80" placeholder="máximo 80 caracteres" type="text" id="name_{{$lang->code}}" name="name_{{$lang->code}}" value="{{ @$highlight->translations[$lang->code]['name'] }}"/>
                  </label>
                  <small class="form-text text-muted">Introducir un máximo de 80 caracteres</small>
                  <label for="description_{{$lang->code}}">
                    <span>Descripción:</span>
                    <input type="text" id="description_{{$lang->code}}" name="description_{{$lang->code}}" value="{{ @$highlight->translations[$lang->code]['description'] }}"/>
                  </label>
                </div>
                @endforeach
              </div>
              <label for="order">
                <span>Orden (cero para desactivar):</span>
                <input style="width: 55px;" type="number" min="0" name="order" value="{{$highlight->order}}" />
              </label>
              <button type="submit" class="btn btn-primary">
                <i class="material-icons">save</i>
                <span>Guardar cambios</span>
              </button>
            </form>
          </section>
          <section>
            <p>Imagen del destacado</p>
            <img style="max-width:300px;max-height:300px;" id="highlight_image" src="/img/highlights/{{$highlight->image}}" class="highlight main admin" onclick="jQuery('#uploadHighlightImage').toggle();" />
            <div id="uploadHighlightImage" style="display:none">
              <label for="highlightImage">
                <span>Selecciona una imagen:</span>
                <input type="file" name="highlightImage" id="highlightImage" accept="image/x-png" placeholder="Imagen nueva" />
              </label>
              <button type="button" class="btn btn-primary" id="upload_highlight_image_button" onclick="uploadHighlightImage({{$highlight->id}})">
                <i class="material-icons">photo_camera</i>
                <span>Cambiar imagen</span>
              </button>
            </div>
          </section>

        </div>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">

  function uploadHighlightImage(idHighlight){
    var file_data = $('#highlightImage').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    $.ajax({
          url: '/uploadHighlightImage/'+idHighlight, // point to server-side PHP script
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function(php_script_response){
              $('#highlight_image').attr('src',php_script_response['img']);
              $('#uploadHighlightImage').fadeOut();
          },
       });
   }
</script>
@endsection
