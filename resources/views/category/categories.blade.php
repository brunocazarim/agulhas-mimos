<!DOCTYPE html> @extends('layout') @section('content')
<div class="container">
    <h1 class="text-center">Categorias de Produtos</h1>
    @if(old('name'))
    <div class="row">
        <div class="alert alert-success" role="alert">
            <strong>{{old('name')}}</strong> adicionado com sucesso!
        </div>
    </div>
    @endif
    <div class="row">
        <table class="table table-striped">
            @foreach ($categories as $category)
            <tr class="lead">
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>
                    <a href="/categories/edit/{{$category->id}}">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </td>
                <td>
                    <form method="delete">
                        <a href="/categories/delete?id={{$category->id}}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="row text-center">
        <form action="/categories/edit/{{0}}">
            <button type="submit" class="btn btn-custom btn-lg active">Novo</button>
        </form>
    </div>
</div>
@stop