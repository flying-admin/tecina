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
      <form action="/api/menus/{{$id}}" method="POST">
        <input name="_method" type="hidden" value="PUT">
        <ul class="nav nav-tabs">
          @foreach($langs =  DB::table('languages')->get() as $lang)
            <li @if ($loop->first) class="active show" @endif><a data-toggle="tab" href="#{{$lang->code}}">{{$lang->code}}</a></li>
          @endforeach
        </ul>
        <div class="tab-content">
          @foreach($langs =  DB::table('languages')->get() as $lang)
          <div id="{{$lang->code}}" class="tab-pane fade in @if ($loop->first) active show @endif">
            <label for="name_{{$lang->code}}">
              <span>Nombre</span>
              <input type="text" id="name_{{$lang->code}}" name="name_{{$lang->code}}" value="{{$translation[$lang->code]['name']}}"/>
            </label><br>
            <label for="description_{{$lang->code}}">
              <span>Descripción</span>
              <input type="text" id="description_{{$lang->code}}" name="description_{{$lang->code}}" value="{{$translation[$lang->code]['description']}}"/>
            </label>
          </div>
          @endforeach
        </div>
        <input type="submit" value="Guardar cambios" />
        </form>
          <div>
            <p>Platos incluídos en el menú</p>
            <ul id="menu_dishes">
              @foreach($dishes as $dishId => $dish)
                <li id="dish_{{$dishId}}"><span class="dishName">{{$dish['name']}}</span> <span class="glyphicon glyphicon-remove-circle"><a href="#" onclick="deleteDishMenu({{$dishId}},{{$id}});">Eliminar</a></span></li>
              @endforeach
            </ul>
          <label for="add_menu_dish">
            Selecciona un plato
            <select id="add_menu_dish">
              @foreach(db::table('dishes_translations')->whereNotIn('id_dish',array_keys($dishes))->where('id_language',1)->get() as $dish)
                <option value="{{$dish->id_dish}}">
                  {{$dish->name}}
                </option>
              @endforeach
            </select>
          </label>
          <button type="button" name="button" id="add_menu_dish_button" onclick="addDishMenu({{$id}})">Añadir plato</button>
          </div>
          <div>
            <p>Vinos incluídos en el menú</p>
            <ul id="menu_wines">
              @foreach($wines as $wineId => $wine)
                <li id="wine_{{$wineId}}"><span class="wineName">{{$wine}}</span> <span class="glyphicon glyphicon-remove-circle"><a href="#" onclick="deleteWineMenu({{$wineId}},{{$id}});">Eliminar</a></span></li>
              @endforeach
            </ul>
          <label for="add_menu_wine">
            Selecciona un vino
            <select id="add_menu_wine">
              @foreach(db::table('wines')->whereNotIn('id',array_keys($wines))->get() as $wine)
                <option value="{{$wine->id}}">
                  {{$wine->name}}
                </option>
              @endforeach
            </select>
          </label>
          <button type="button" name="button" id="add_menu_wine_button" onclick="addWineMenu({{$id}})">Añadir vino</button>
          </div>
    <img style="max-width:300px;max-height:300px;" id="menu_image" src="{{$image}}" class="menu main admin" onclick="jQuery('#uploadMenuImage').toggle();" />
    <div id="uploadMenuImage" style="display:none">
      <input type="file" name="menuImage" id="menuImage" accept="image/x-png" placeholder="Imagen nueva" />
        <button type="button" name="menuImage" id="upload_menu_image_button" onclick="uploadMenuImage({{$id}})">Cambiar imagen</button>
    </div>
    </div>


</div>
</div>
</div>
</div>
<script type="text/javascript">
  function addDishMenu(dishId){
    var menuId=$('#add_menu_dish').val();
    jQuery.ajax({
      url:'/addDishFromMenu/'+menuId+'/'+dishId,
    }).done(function(data){
    if(data){
      jQuery('#menu_dishes').append('<li id="dish_'+data.dishId+'"><span class="dishName">'+data.dishName+'</span><span class="glyphicon glyphicon-remove-circle"><a href="#" onclick="deleteDishMenu('+data.dishId+','+data.menuId+');">Eliminar</a></span></li>');
      jQuery('#add_menu_dish>option[value="'+data.dishId+'"]').remove();
    }
    });
  }
  function addWineMenu(wineId){
    var menuId=$('#add_menu_wine').val();
    jQuery.ajax({
      url:'/addWineFromMenu/'+menuId+'/'+wineId,
    }).done(function(data){
    if(data){
      jQuery('#menu_wines').append('<li id="wine_'+data.wineId+'"><span class="wineName">'+data.wineName+'</span><span class="glyphicon glyphicon-remove-circle"><a href="#" onclick="deleteWineMenu('+data.wineId+','+data.menuId+');">Eliminar</a></span></li>');
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
      jQuery('#dish_'+data).fadeOut();
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
      jQuery('#wine_'+data).fadeOut();
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
