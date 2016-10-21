<!DOCTYPE html> @extends('layout') @section('content')
<div class="starter-template">
  @if(is_null($product))
  <h1>Novo Produto</h1>
  @else
  <h1>{{$product->NAM_PRODUCT}}</h1>
  @endif

  <form action="{{action('ProductsController@createOrUpdateProduct')}}" method="post">
    <div class="row">
      <div class="col-sm-6">
        <span class="input-group-addon" id="product-id">ID</span>
        <input name="id" type="number" class="form-control" aria-describedby="product-id" disabled value="{{is_null($product) ? "" : $product->ID_PRODUCT}}">
      </div>
      <div class="col-sm-6">
        <input name="_token" type="hidden" value="{{csrf_token()}}">
      </div>

      <div class="row">
        <div class="col-sm-7">
          <div class="input-group">
            <span class="input-group-addon" id="product-code">Cód. Produto</span>
            <input type="text" class="form-control" aria-describedby="product-code" disabled value="{{is_null($product) ? "" : $product->COD_PRODUCT}}">
          </div>

          <br>

          <div class="input-group">
            <span class="input-group-addon" id="product-name">Nome</span>
            <input name="name" type="text" class="form-control" aria-describedby="product-name" autofocus value="{{is_null($product) ? "" : $product->NAM_PRODUCT}}">
          </div>

          <br>

          <div class="input-group">
            <span class="input-group-addon" id="product-price">Preço</span>
            <input name="price" type="number" min="0" step="0.01" class="form-control" aria-describedby="product-price" value="{{is_null($product) ? "" : $product->PRICE}}">
          </div>

          <br>

          <div class="input-group">
            <span class="input-group-addon" id="product-qty">Quantidade</span>
            <input name="qty" type="text" class="form-control" aria-describedby="product-qty" value="">
          </div>

          <br>

          <div class="form-group">
            <label for="details">Detalhes</label>
            @if(is_null($product))
            <textarea name="details" class="form-control" rows="5" id="product-details"></textarea>
            @else
            <textarea name="details" class="form-control" rows="5" id="product-details">{{$product->DETAILS_PRODUCT}}</textarea>            @endif
          </div>
        </div>

        <div class="col-sm-5">
          <p>Imagens</p>
        </div>
      </div>

      <div class="row">
        <button type="submit" class="btn btn-default btn-lg active">Salvar</button>
      </div>
  </form>
  </div>
  @stop