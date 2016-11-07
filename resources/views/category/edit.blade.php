<!DOCTYPE html> @extends('layout') @section('content')
<div class="container">
  @if(is_null($category))
  <h1 class="text-center">Nova Categoria</h1>
  @else
  <h1 class="text-center">{{$category->name}}</h1>
  @endif @if(count($errors) > 0)
  <div class="alert alert-info">
    <ul>
      @foreach($errors->all as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form class="form-horizontal" action="{{action('ProductsController@createOrUpdateCategory')}}" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-sm-6">
        <input name="id" type="hidden" value="{{is_null($category) ? "" : $category->id}}">
      </div>
      <div class="col-sm-6">
        <input name="_token" type="hidden" value="{{csrf_token()}}">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5">
        <div class="form-group">
          <label for="category-name" class="col-sm-3 control-label">Nome</label>
          <div class="col-sm-9">
            <input name="name" type="text" class="form-control" id="category-name" value="{{is_null($category) ? "" : $category->name}}">
          </div>
        </div>
      </div>
      <div class="col-sm-7">
        <div class="form-group">
          <label for="category-desc" class="col-sm-3 control-label">Descrição</label>
          <div class="col-sm-9">
            <input name="description" type="text" class="form-control" id="category-desc" value="{{is_null($category) ? "" : $category->description}}">
          </div>
        </div>
      </div>
    </div>
    <div class="row text-center">
      <button type="submit" class="btn btn-custom btn-lg active">Salvar</button>
    </div>
  </form>
</div>
<script>
$(document).ready(function(){
  if($("#category-name").attr("value").trim()){
    $("#category-name").prop('disabled', true);
    $("#category-desc").focus();
  }
  else{
    $("#category-name").focus();
  }
});
</script> @stop