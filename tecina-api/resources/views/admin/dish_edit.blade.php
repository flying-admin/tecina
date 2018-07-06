@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-8">

      <div class="card">
        <div class="card-header">
          <strong>Edición de Plato</strong>
        </div>
        <div class="card-body">

          <section>
            <p>Información general</p>
            <form action="/api/dishes/{{$dish->id}}" method="POST">
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
                    <input type="text" id="name_{{$lang->code}}" name="name_{{$lang->code}}" value="{{ @$translations[$lang->code]['name'] }}"/>
                  </label>
                  <label for="description_{{$lang->code}}">
                    <span>Descripción:</span>
                    <input type="text" id="description_{{$lang->code}}" name="description_{{$lang->code}}" value="{{ @$translations[$lang->code]['description'] }}"/>
                  </label>
                </div>
                @endforeach
              </div>
              <label for="ingredients">
                <span>Ingredientes:</span>
                <input type="text" name="ingredients" value="{{($dish->ingredients)?$dish->ingredients:''}}" />
              </label>
              <label for="active">
                <span>Activo:</span>
                <input type="checkbox" name="active"{{($dish->active)?' checked':''}}  />
              </label>
              <button type="submit" class="btn btn-primary">
                <i class="material-icons">save</i>
                <span>Guardar cambios</span>
              </button>
            </form>
          </section>

          <section>
            <p>Categoría de plato</p>
            <ul id="dish_category">
              @foreach($categories as $category)
                <li id="category_{{$category->id}}"><span class="categoryName">{{@$categoryTranslations[$category->id]['es']['name']}}</span> <span class="glyphicon glyphicon-remove-circle"><a href="#" onclick="deleteDishCategory({{$dish->id}},{{$category->id}});">Eliminar</a></span></li>
              @endforeach
            </ul>
            <label for="add_dish_category">
              <span>Selecciona una categoría:</span>
              <select id="add_dish_category">
                @foreach(db::table('categories_translations')->whereNotIn('id_category',$categoryIds)->where('id_language',1)->get() as $category)
                  <option value="{{$category->id_category}}">
                    {{$category->name}}
                  </option>
                @endforeach
              </select>
            </label>
            <button type="button" class="btn btn-primary" id="add_dish_category_button" onclick="addDishCategory({{$dish->id}})">
              <i class="material-icons">add_circle</i>
              <span>Añadir categoría de plato</span>
            </button>
          </section>

          <section>
            <p>Tipo de plato</p>
            <ul id="dish_food_type">
              @foreach($foodTypes as $food_type)
                <li id="food_type_{{$food_type->id}}"><span class="foodTypeName">{{@$foodTypeTranslations[$food_type->id]['es']}}</span> <span class="glyphicon glyphicon-remove-circle"><a href="#" onclick="deleteDishFoodType({{$dish->id}},{{$food_type->id}});">Eliminar</a></span></li>
              @endforeach
            </ul>
            <label for="add_dish_food_type">
              <span>Selecciona un tipo de plato:</span>
              <select id="add_dish_food_type">
                @foreach(db::table('food_types_translations')->whereNotIn('id_food_type',$foodTypeIds)->where('id_language',1)->get() as $foodType)
                  <option value="{{$foodType->id_food_type}}">
                    {{$foodTypeTranslations[$foodType->id_food_type]['es']}}
                  </option>
                @endforeach
              </select>
            </label>
            <button type="button" class="btn btn-primary" id="add_dish_foodType_button" onclick="addDishFoodType({{$dish->id}})">
              <i class="material-icons">add_circle</i>
              <span>Añadir tipo de plato</span>
            </button>
          </section>

          <section>
            <p>Alérgenos</p>
            <ul id="dish_allergens">
              @foreach($allergens as $allergen)
                <li id="allergen_{{$allergen->id}}">
                  <span class="allergenName">{{@$allergenTranslations[$allergen->id]['es']['name']}}</span>
                  <a href="#" onclick="deleteDishAllergen({{$dish->id}},{{$allergen->id}});" class="link">
                    <i class="material-icons">delete</i>
                    <span>Eliminar</span>
                  </a>
                </li>
              @endforeach
            </ul>
            <label for="add_dish_allergen">
              <span>Selecciona un alérgeno:</span>
              <select id="add_dish_allergen">
                @foreach(db::table('allergens_translations')->whereNotIn('id_allergen',$allergenIds)->where('id_language',1)->get() as $allergen)
                  <option value="{{$allergen->id_allergen}}">
                    {{$allergenTranslations[$allergen->id_allergen]['es']['name']}}
                  </option>
                @endforeach
              </select>
            </label>
            <button type="button" class="btn btn-primary" id="add_dish_allergen_button" onclick="addDishAllergen({{$dish->id}})">
              <i class="material-icons">add_circle</i>
              <span>Añadir alérgeno</span>
            </button>
          </section>

          <section>
            <p>Imagen del plato</p>
            <img style="max-width:300px;max-height:300px;" id="dish_image" src="{{$dish->image}}" class="dish main admin" onclick="jQuery('#uploadDishImage').toggle();" />
            <div id="uploadDishImage" style="display:none">
              <label for="dishImage">
                <span>Selecciona una imagen:</span>
                <input type="file" name="dishImage" id="dishImage" accept="image/x-png" placeholder="Imagen nueva" />
              </label>
              <button type="button" class="btn btn-primary" id="upload_dish_image_button" onclick="uploadDishImage({{$dish->id}})">
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
  function addDishAllergen(dishId){
    var allergenId=$('#add_dish_allergen').val();
    jQuery.ajax({
      url:'/addDishAllergen/'+dishId+'/'+allergenId,
    }).done(function(data){
    if(data){
      jQuery('#dish_allergens').append('<li id="allergen_'+data.allergenId+'"><span class="allergenName">'+data.allergenName+'</span><span class="glyphicon glyphicon-remove-circle"><a href="#" onclick="deleteDishAllergen('+dishId+','+data.allergenId+');">Eliminar</a></span></li>');
      jQuery('#add_dish_allergen>option[value="'+data.allergenId+'"]').remove();
    }
    });
  }

  function deleteDishAllergen(dishId,allergenId){
    var name=jQuery('#allergen_'+allergenId+'>span.allergenName').text();
    jQuery.ajax({
      url:'/deleteDishAllergen/'+dishId+'/'+allergenId,
      data:{'allergenId':allergenId, 'dishId':dishId}
    }).done(function(data){
      if(data){
        jQuery('#allergen_'+data).fadeOut().remove();
        jQuery('#add_dish_allergen').prepend('<option selected value="'+data+'">'+name+'</option>');
      }
    });
  }


  function addDishFoodType(dishId){
    var foodTypeId=$('#add_dish_food_type').val();
    jQuery.ajax({
      url:'/addDishFoodType/'+dishId+'/'+foodTypeId,
    }).done(function(data){
    if(data){
      jQuery('#dish_food_type').append('<li id="food_type_'+data.foodTypeId+'"><span class="foodTypeName">'+data.foodTypeName+'</span><span class="glyphicon glyphicon-remove-circle"><a href="#" onclick="deleteDishFoodType('+dishId+','+data.foodTypeId+');">Eliminar</a></span></li>');
      jQuery('#add_dish_food_type>option[value="'+data.foodTypeId+'"]').remove();
    }
    });
  }

  function deleteDishFoodType(dishId,foodTypeId){
    var name=jQuery('#food_type_'+foodTypeId+'>span.foodTypeName').text();
    jQuery.ajax({
      url:'/deleteDishFoodType/'+dishId+'/'+foodTypeId,
      data:{'foodTypeId':foodTypeId, 'dishId':dishId}
    }).done(function(data){
      if(data){
        jQuery('#food_type_'+data).fadeOut().remove();
        jQuery('#add_dish_food_type').prepend('<option selected value="'+data+'">'+name+'</option>');
      }
    });
  }

  function addDishCategory(dishId){
    var categoryId=$('#add_dish_category').val();
    jQuery.ajax({
      url:'/addDishCategory/'+dishId+'/'+categoryId,
    }).done(function(data){
    if(data){
      jQuery('#dish_category').append('<li id="category_'+data.categoryId+'"><span class="categoryName">'+data.categoryName+'</span><span class="glyphicon glyphicon-remove-circle"><a href="#" onclick="deleteDishCategory('+dishId+','+data.categoryId+');">Eliminar</a></span></li>');
      jQuery('#add_dish_category>option[value="'+data.categoryId+'"]').remove();
    }
    });
  }

  function deleteDishCategory(dishId,categoryId){
    var name=jQuery('#category_'+categoryId+'>span.categoryName').text();
    jQuery.ajax({
      url:'/deleteDishCategory/'+dishId+'/'+categoryId,
      data:{'foodTypeId':categoryId, 'dishId':dishId}
    }).done(function(data){
      if(data){
        jQuery('#category_'+data).fadeOut().remove();
        jQuery('#add_dish_category').prepend('<option selected value="'+data+'">'+name+'</option>');
      }
    });
  }

  function uploadDishImage(idDish){
    var file_data = $('#dishImage').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    $.ajax({
          url: '/uploadDishImage/'+idDish, // point to server-side PHP script
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function(php_script_response){
              $('#dish_image').attr('src',php_script_response['img']);
              $('#uploadDishImage').fadeOut();
          },
       });
   }
</script>
@endsection
