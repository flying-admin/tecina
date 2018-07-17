@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card">
        <div class="card-header">
          <strong>Edición de Vino</strong>
          <div style="float:right">
            <form action="/api/wines/{{$wine->id}}" method="POST">
              <input type="hidden" name="_method" value="DELETE" />
              <button type="submit" class="btn btn-danger">
                <i class="material-icons">delete</i>
                <span>Eliminar Vino</span>
              </button>
            </form>
        </div>
        </div>
        <div class="card-body">
          <form action="/api/wines/{{$wine->id}}" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <section>
              <p>Información del vino</p>
              <label for="wineName">
                <span>Nombre del vino:</span>
                <input maxlength="40" placeholder="máximo 40 caracteres" name="wineName" type="text" value="{{$wine->name}}" placeholder="Nombre del vino" />
              </label>
              <small class="form-text text-muted">Introducir un máximo de 40 caracteres</small>
              <br />
              <ul class="nav nav-tabs">
                @foreach($langs =  DB::table('languages')->get() as $lang)
                  <li><a data-toggle="tab" href="#{{$lang->code}}" @if ($loop->first) class="active show" @endif>{{$lang->code}}</a></li>
                @endforeach
              </ul>
              <div class="tab-content">
                @foreach($langs =  DB::table('languages')->get() as $lang)
                <div id="{{$lang->code}}" class="tab-pane fade in @if ($loop->first) active show @endif">
                  <label for="description_{{$lang->code}}">
                    <span>Descripción:</span>
                    <input type="text" id="description_{{$lang->code}}" name="description_{{$lang->code}}" value="{{ @$translation[$lang->code] }}"/>
                  </label>
                </div>
                @endforeach
              </div>
              <br>
              <p>Detalles del vino</p>
              <label for="year">
                <span>Año:</span>
                <input type="number" min="1500" max="{{date('Y')}}" name="year" value="{{($wine->year)?$wine->year:''}}" />
              </label>

              <label for="active">
                <span>Activo:</span>
                <input type="checkbox" name="active"{{($wine->active)?' checked':''}}  />
              </label>

              <label for="do">
                <span>Denominación de Origen:</span>
                <select name="do" id="do">
                  @foreach($dos = DB::table('do')->get() as $my_do)
                    <option value="{{$my_do->id}}"{{($do->id==$my_do->id)?' selected':''}}>
                      {{$my_do->name}}
                    </option>
                  @endforeach
                </select>
              </label>

              <label for="age">
                <span>Edad:</span>
                <select name="age" id="age">
                  @foreach($ages = DB::table('wine_age_translations')->where('language_id',1)->get() as $my_age)
                    <option value="{{$my_age->wine_age_id}}"{{($age->id==$my_age->wine_age_id)?' selected':''}}>
                      {{$my_age->name}}
                    </option>
                  @endforeach
                </select>
              </label>

              <label for="type">
                <span>Tipo:</span>
                <select name="type" id="type">
                  @foreach($types = DB::table('wine_type_translations')->where('id_language',1)->get() as $my_type)
                    <option value="{{$my_type->id_wine_type}}"{{($type->id==$my_type->id_wine_type)?' selected':''}}>
                      {{$my_type->name}}
                    </option>
                  @endforeach
                </select>
              </label>

              <label for="class">
                <span>Clase:</span>
                <select name="class" id="class">
                  @foreach($classes = DB::table('wine_class_translations')->where('language_id',1)->get() as $my_class)
                    <option value="{{$my_class->wine_class_id}}"{{(@$class->id==$my_class->wine_class_id)?' selected':''}}>
                      {{$my_class->name}}
                    </option>
                  @endforeach
                </select>
              </label>

              <button type="submit" class="btn btn-primary">
                <i class="material-icons">save</i>
                <span>Actualizar información</span>
              </button>
            </section>

            <span></span>
          </form>

          <section>
            <p>Variedades de uva</p>
            <ul id="wine_varieties">
              @foreach($varieties as $variety)
                <li id="variety_{{$variety->id}}">
                  <span class="varietyName">{{@$varietieTranslations[$variety->id]['es']}}</span>
                  <a href="#" onclick="deleteWineVariety({{$wine->id}},{{$variety->id}});" class="link">
                    <i class="material-icons">delete</i>
                    <span>Eliminar</span>
                  </a>
                </li>
              @endforeach
            </ul>

            <label for="add_wine_variety">
              <span>Selecciona una variedad</span>
              <select id="add_wine_variety">
                @foreach(db::table('wine_variety_translations')->whereNotIn('id_wine_variety',array_keys($varietieTranslations))->where('id_language',1)->get() as $variety)
                  <option value="{{$variety->id_wine_variety}}">
                    {{$variety->name}}
                  </option>
                @endforeach
              </select>
            </label>

            <button type="button" class="btn btn-primary" id="add_wine_variety_button" onclick="addWineVariety({{$wine->id}})">
              <i class="material-icons">add_circle</i>
              <span>Añadir variedad</span>
            </button>
          </section>

          <section>
            <p>Imagen del vino</p>
            <img style="max-width:300px;max-height:300px;" id="wine_image" src="/img/wines/{{$wine->image}}" class="wine main admin" />
            <div id="uploadWineImage">
              <label for="wineImage">
                <span>Selecciona una imagen:</span>
                <input required type="file" name="wineImage" id="wineImage" accept="image/x-png" placeholder="Imagen nueva" />
              </label>
              <button type="button" class="btn btn-primary" id="upload_wine_image_button" onclick="uploadWineImage({{$wine->id}})">
                <i class="material-icons">photo_camera</i>
                <span>Cargar imagen</span>
              </button>
              <button type="button" class="btn btn-danger" id="delete_wine_image_button" onclick="deleteWineImage({{$wine->id}})">
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
  function addWineVariety(wineId){
    var varietyId=$('#add_wine_variety').val();
    jQuery.ajax({
      url:'/addWineVariety/'+wineId+'/'+varietyId,
    }).done(function(data){
    if(data){
      jQuery('#wine_varieties').append('<li id="variety_'+data.varietyId+'"><span class="varietyName">'+data.varietyName+'</span><a href="#" onclick="deleteWineVariety('+wineId+','+data.varietyId+');" class="link"><i class="material-icons">delete</i><span>Eliminar</span></a></li>');
      jQuery('#add_wine_variety>option[value="'+data.varietyId+'"]').remove();
    }
    });
  }
  // variety_7

  function deleteWineVariety(wineId,varietyId){
    console.log('Id: '+varietyId);
    console.log('#variety_'+varietyId);
    console.log(jQuery('#variety_'+varietyId));
    console.log(jQuery('#variety_'+varietyId).text());
    var name=jQuery('#variety_'+varietyId+'>span.varietyName').text();
    jQuery.ajax({
      url:'/deleteWineVariety/'+wineId+'/'+varietyId,
      data:{'varietyId':varietyId, 'wineId':wineId}
    }).done(function(data){
      console.log('El nombre de la variedad es '+name);
      if(data){
        jQuery('#variety_'+data).fadeOut().remove();
        jQuery('#add_wine_variety').prepend('<option selected value="'+data+'">'+name+'</option>');
      }
    });
  }

  function uploadWineImage(idWine){
    var file_data = $('#wineImage').prop('files')[0];
    if(file_data){

    var form_data = new FormData();
    form_data.append('file', file_data);
    $.ajax({
          url: '/uploadWineImage/'+idWine, // point to server-side PHP script
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function(php_script_response){
              $('#wine_image').attr('src',php_script_response['img']);
              $('#uploadWineImage').fadeOut();
          },
       });
     }else{
              alert('No has seleccionado ninguna imagen.');
     }
   }

  function deleteWineImage(idWine){
    var form_data = new FormData();
    $.ajax({
          url: '/uploadWineImage/'+idWine, // point to server-side PHP script
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function(php_script_response){
              $('#wine_image').attr('src',php_script_response['img']);
              $('#uploadWineImage').fadeOut();
          },
       });
   }
</script>
@endsection
