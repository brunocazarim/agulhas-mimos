<!DOCTYPE html> @extends('layout') @section('content')
<div class="starter-template">
    <h1>Produtos</h1>
    @if(old('name'))
    <div class="row">
        <div class="alert alert-success" role="alert">
            <strong>{{old('name')}}</strong> adicionado com sucesso!
        </div>
    </div>
    @endif
    <div class="row">
        <table class="table table-striped">
            @foreach ($products as $product)
            <tr class="lead">
                <td>{{$product->COD_PRODUCT}}</td>
                <td>{{$product->NAM_PRODUCT}}</td>
                <td>{{$product->DETAILS_PRODUCT}}</td>
                <td>{{$product->PRICE}}</td>
                <td>
                    <a href="/products/edit/{{$product->ID_PRODUCT}}">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </td>
                <td>
                    <form method="delete">
                        <a href="/products/delete?id={{$product->ID_PRODUCT}}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="row">
        <form action="/products/edit/{{0}}">
            <button type="submit" class="btn btn-default btn-lg active">Novo</button>
        </form>
    </div>
</div>
@stop