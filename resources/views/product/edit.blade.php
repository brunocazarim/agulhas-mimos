<!DOCTYPE html> @extends('layout') @section('content')
<div class="container-fluid">
  @if(is_null($product))
  <h1 class="text-center">Novo Produto</h1>
  @else
  <h1 class="text-center">{{$product->name}}</h1>
  @endif @if(count($errors) > 0)
  <div class="alert alert-info">
    <ul>
      @foreach($errors->all as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form class="form-horizontal" action="{{action('ProductsController@createOrUpdateProduct')}}" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-sm-6">
        <input name="id" type="hidden" value="{{is_null($product) ? " " : $product->id}}">
      </div>
      <div class="col-sm-6">
        <input name="_token" type="hidden" value="{{csrf_token()}}">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5">
        <div class="form-group">
          <label for="product-code" class="col-sm-3 control-label">Cód. Produto</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="product-code" disabled value="{{is_null($product) ? "" : $product->code}}">
          </div>
        </div>
        <div class="form-group">
          <label for="product-name" class="col-sm-3 control-label">Nome</label>
          <div class="col-sm-9">
            <input name="name" type="text" class="form-control" id="product-name" autofocus value="{{is_null($product) ? "" : $product->name}}">
          </div>
        </div>
        <!-- div class="form-group">
          <label for="product-group" class="col-sm-3 control-label">Categoria</label>
          <div class="col-sm-9">
            <select name="group" class="form-control" id="product-group">
            @foreach ($categories as $category)
              <option value="{{$category->id}}" {{is_null($product) ? '' : $product->ID_GROUP == $group->ID_GROUP ? 'selected' : ''}}>{{$group->NAM_GROUP}}</option>
            @endforeach
            </select>
          </div -->
        </div>
        <div class="form-group">
          <label for="product-price" class="col-sm-3 control-label">Preço</label>
          <div class="col-sm-9">
            <input name="price" type="number" min="0" step="0.01" class="form-control" id="product-price" value="{{is_null($product) ? "" : $product->price}}">
          </div>
        </div>
        <div class="form-group">
          <label for="product-qty" class="col-sm-3 control-label">Quantidade</label>
          <div class="col-sm-9">
            <input name="qty" type="text" class="form-control" id="product-qty" value="">
          </div>
        </div>
        <div class="form-group">
          <label for="product-desc" class="col-sm-3 control-label">Descrição</label>
          <div class="col-sm-9">
            @if(is_null($product))
            <textarea name="description" class="form-control" rows="5" id="product-desc"></textarea> @else
            <textarea name="description" class="form-control" rows="5" id="product-desc">{{$product->description}}</textarea>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row text-center">
      <button type="submit" class="btn btn-custom btn-lg active">Salvar</button>
    </div>
  </form>
</div>
@stop