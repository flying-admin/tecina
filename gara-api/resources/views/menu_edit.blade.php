@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card">
        <div class="card-header">
          <strong>Edición de menú</strong>
        </div>
        <div class="card-body">

          <section>
            <p>Información del menú</p>
            <form action="/api/menus/{{$id}}" method="POST">
              <input name="_method" type="hidden" value="PUT">
              <ul class="nav nav-tabs">
                @foreach($langs =  DB::table('languages')->get() as $lang)
                  <li><a data-toggle="tab" href="#{{$lang->code}}" @if ($loop->first) class="active show" @endif>{{$lang->code}}</a></li>
                @endforeach
              </ul>
              <div class="tab-content">
                @foreach($langs =  DB::table('languages')->get() as $lang)
                <div id="{{$lang->code}}" class="tab-pane fade in @if ($loop->first) active show @endif">
                  <label for="name_{{$lang->code}}">
                    <span>Nombre:</span>
                    <input type="text" id="name_{{$lang->code}}" name="name_{{$lang->code}}" value="{{$translation[$lang->code]['name']}}"/>
                  </label>
                  <label for="description_{{$lang->code}}">
                    <span>Descripción:</span>
                    <input type="text" id="description_{{$lang->code}}" name="description_{{$lang->code}}" value="{{$translation[$lang->code]['description']}}"/>
                  </label>
                </div>
                @endforeach
              </div>
              <label for="active">
                <span>Activo:</span>
                <input type="checkbox" name="active"{{($menu->active)?' checked':''}}  />
              </label>
              <button type="submit" class="btn btn-primary">
                <i class="material-icons">save</i>
                <span>Guardar cambios</span>
              </button>
            </form>
          </section>

          <section>
            <p>Platos incluídos en el menú</p>
            <ul id="menu_dishes">
              @foreach($dishes as $dishId => $dish)
                <li id="dish_{{$dishId}}">
                  <span class="dishName">{{$dish['name']}}</span>
                  <a href="#" onclick="deleteDishMenu({{$dishId}},{{$id}});" class="link">
                    <i class="material-icons">delete</i>
                    <span>Eliminar</span>
                  </a>
                </li>
              @endforeach
            </ul>
            <label for="add_menu_dish">
              <span>Selecciona un plato:</span>
              <select id="add_menu_dish">
                @foreach(db::table('dishes_translations')->whereNotIn('id_dish',array_keys($dishes))->where('id_language',1)->get() as $dish)
                  <option value="{{$dish->id_dish}}">
                    {{$dish->name}}
                  </option>
                @endforeach
              </select>
            </label>
            <button type="button" class="btn btn-primary" id="add_menu_dish_button" onclick="addDishMenu({{$id}})">
              <i class="material-icons">add_circle</i>
              <span>Añadir plato</span>
            </button>
          </section>

          <section>
            <p>Vinos incluídos en el menú</p>
            <ul id="menu_wines">
              @foreach($wines as $wineId => $wine)
                <li id="wine_{{$wineId}}">
                  <span class="wineName">{{$wine}}</span>
                  <a href="#" onclick="deleteWineMenu({{$wineId}},{{$id}});" class="link">
                    <i class="material-icons">delete</i>
                    <span>Eliminar</span>
                  </a>
                </li>
              @endforeach
            </ul>
            <label for="add_menu_wine">
              <span>Selecciona un vino:</span>
              <select id="add_menu_wine">
                @foreach(db::table('wines')->whereNotIn('id',array_keys($wines))->get() as $wine)
                  <option value="{{$wine->id}}">
                    {{$wine->name}}
                  </option>
                @endforeach
              </select>
            </label>
            <button type="button" class="btn btn-primary" id="add_menu_wine_button" onclick="addWineMenu({{$id}})">
              <i class="material-icons">add_circle</i>
              <span>Añadir vino</span>
            </button>
          </section>

          <section>
            <p>Imagen del menu <small>(opcional)</small></p>
            <img style="max-width:300px;max-height:300px;" id="menu_image" src="/img/menus/{{$image}}" class="menu main admin" onclick="jQuery('#uploadMenuImage').toggle();" />
            <div id="uploadMenuImage" style="display: none;">
              <label for="menuImage">
                <span>Selecciona una imagen:</span>
                <input type="file" name="menuImage" id="menuImage" accept="image/x-png" placeholder="Imagen nueva" />
              </label>
              <button type="button" class="btn btn-primary" id="upload_menu_image_button" onclick="uploadMenuImage({{$id}})">
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
  function addDishMenu(menuId){
    var dishId=$('#add_menu_dish').val();
    jQuery.ajax({
      url:'/addDishFromMenu/'+dishId+'/'+menuId,
    }).done(function(data){
    if(data){
      jQuery('#menu_dishes').append('<li id="dish_'+data.dishId+'"><span class="dishName">'+data.dishName+'</span><a href="#" onclick="deleteDishMenu('+data.dishId+','+menuId+');" class="link"><i class="material-icons">delete</i>Eliminar</a></li>');
      jQuery('#add_menu_dish>option[value="'+data.dishId+'"]').remove();
    }
    });
  }
  function addWineMenu(menuId){
    var wineId=$('#add_menu_wine').val();
    jQuery.ajax({
      url:'/addWineFromMenu/'+wineId+'/'+menuId,
    }).done(function(data){
    if(data){
      jQuery('#menu_wines').append('<li id="wine_'+data.wineId+'"><span class="wineName">'+data.wineName+'</span><a href="#" onclick="deleteWineMenu('+data.wineId+','+menuId+');" class="link"><i class="material-icons">delete</i>Eliminar</a></li>');
      jQuery('#add_menu_wine>option[value="'+data.wineId+'"]').remove();
    }
    });
  }
  function deleteDishMenu(dishId,menuId){
    var name=jQuery('#dish_'+dishId+'>span.dishName').text();
    jQuery.ajax({
      url:'/deleteDishFromMenu/'+dishId+'/'+menuId,
      data:{'dishId':dishId, 'menuId':menuId}
    }).done(function(data){
    if(data){
      jQuery('#dish_'+data).fadeOut().remove();
      jQuery('#add_menu_dish').prepend('<option selected value="'+data+'">'+name+'</option>');
    }
    });
  }
  function deleteWineMenu(wineId,menuId){
    var name=jQuery('#wine_'+wineId+'>span.wineName').text();
    jQuery.ajax({
      url:'/deleteWineFromMenu/'+wineId+'/'+menuId,
      data:{'wineId':wineId, 'menuId':menuId}
    }).done(function(data){
    if(data){
      jQuery('#wine_'+data).fadeOut().remove();
      jQuery('#add_menu_wine').prepend('<option selected value="'+data+'">'+name+'</option>');
    }
    });
  }
  function uploadMenuImage(idMenu){
    var file_data = $('#menuImage').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    $.ajax({
          url: '/uploadMenuImage/'+idMenu, // point to server-side PHP script
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function(php_script_response){
              $('#menu_image').attr('src',php_script_response['img']);
              $('#uploadMenuImage').fadeOut();
          },
       });
   }
</script>
@endsection
