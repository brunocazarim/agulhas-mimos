<!DOCTYPE html> @extends('layout') @section('content')
<div class="container-fluid">
  @if(is_null($product))
  <h1 class="text-center">Novo Produto</h1>
  @else
  <h1 class="text-center">{{$product->NAM_PRODUCT}}</h1>
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
        <input name="id" type="hidden" value="{{is_null($product) ? " " : $product->ID_PRODUCT}}">
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
            <input type="text" class="form-control" id="product-code" disabled value="{{is_null($product) ? "" : $product->COD_PRODUCT}}">
          </div>
        </div>
        <div class="form-group">
          <label for="product-name" class="col-sm-3 control-label">Nome</label>
          <div class="col-sm-9">
            <input name="name" type="text" class="form-control" id="product-name" autofocus value="{{is_null($product) ? "" : $product->NAM_PRODUCT}}">
          </div>
        </div>
        <div class="form-group">
          <label for="product-group" class="col-sm-3 control-label">Grupo</label>
          <div class="col-sm-9">
            <select name="group" class="form-control" id="product-group">
            @foreach ($groups as $group)
              <option value="{{$group->ID_GROUP}}" {{is_null($product) ? '' : $product->ID_GROUP == $group->ID_GROUP ? 'selected' : ''}}>{{$group->NAM_GROUP}}</option>
            @endforeach
            </select>
            <!-- input name="group" type="text" class="form-control" id="product-group" value="" -->
          </div>
        </div>
        <div class="form-group">
          <label for="product-price" class="col-sm-3 control-label">Preço</label>
          <div class="col-sm-9">
            <input name="price" type="number" min="0" step="0.01" class="form-control" id="product-price" value="{{is_null($product) ? "" : $product->PRICE}}">
          </div>
        </div>
        <div class="form-group">
          <label for="product-qty" class="col-sm-3 control-label">Quantidade</label>
          <div class="col-sm-9">
            <input name="qty" type="text" class="form-control" id="product-qty" value="">
          </div>
        </div>
        <div class="form-group">
          <label for="product-details" class="col-sm-3 control-label">Detalhes</label>
          <div class="col-sm-9">
            @if(is_null($product))
            <textarea name="details" class="form-control" rows="5" id="product-details"></textarea> @else
            <textarea name="details" class="form-control" rows="5" id="product-details">{{$product->DETAILS_PRODUCT}}</textarea>            @endif
          </div>
        </div>
      </div>
      <div class="col-sm-7">
        <div class="form-group">
          <label for="product-img1" class="col-sm-3 control-label">Imagens</label>
          <div class="col-sm-9">
            <input name="img1" type="file" class="form-control" id="product-img1" value="">
            <br>
            <input name="img2" type="file" class="form-control" id="product-img2" value="">
            <br>
            <input name="img3" type="file" class="form-control" id="product-img3" value="">
            <br>
            <input name="img4" type="file" class="form-control" id="product-img4" value="">
            <br>
            <input name="img5" type="file" class="form-control" id="product-img5" value="">
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