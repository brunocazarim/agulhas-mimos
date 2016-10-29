<!DOCTYPE html> @extends('layout') @section('content')
<div class="container-fluid">
  @if(is_null($group))
  <h1 class="text-center">Novo Grupo</h1>
  @else
  <h1 class="text-center">{{$group->NAM_GROUP}}</h1>
  @endif @if(count($errors) > 0)
  <div class="alert alert-info">
    <ul>
      @foreach($errors->all as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form class="form-horizontal" action="{{action('ProductsController@createOrUpdateProductGroup')}}" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-sm-6">
        <input name="id" type="hidden" value="{{is_null($group) ? " " : $group->ID_GROUP}}">
      </div>
      <div class="col-sm-6">
        <input name="_token" type="hidden" value="{{csrf_token()}}">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5">
        <div class="form-group">
          <label for="group-name" class="col-sm-3 control-label">Nome</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="group-name" disabled value="{{is_null($group) ? "" : $group->NAM_GROUP}}">
          </div>
        </div>
      </div>
      <div class="col-sm-7">
        <div class="form-group">
          <label for="group-desc" class="col-sm-3 control-label">Descrição</label>
          <div class="col-sm-9">
            <input name="description" type="text" class="form-control" id="group-desc" autofocus value="{{is_null($group) ? "" : $group->DES_GROUP}}">
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