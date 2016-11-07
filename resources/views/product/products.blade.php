<!DOCTYPE html> @extends('layout') @section('content')
<div class="container">
    <h1 class="text-center">Produtos</h1>
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
                <td>{{$product->code}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="/products/edit/{{$product->id}}">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </td>
                <td>
                    <form method="delete">
                        <a href="/products/delete?id={{$product->id}}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="row text-center">
        <form action="/products/edit/{{0}}">
            <button type="submit" class="btn btn-custom btn-lg active">Novo</button>
        </form>
    </div>
</div>
@stop