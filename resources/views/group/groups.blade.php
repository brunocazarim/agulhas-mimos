<!DOCTYPE html> @extends('layout') @section('content')
<div class="container">
    <h1 class="text-center">Grupos de Produtos</h1>
    @if(old('name'))
    <div class="row">
        <div class="alert alert-success" role="alert">
            <strong>{{old('name')}}</strong> adicionado com sucesso!
        </div>
    </div>
    @endif
    <div class="row">
        <table class="table table-striped">
            @foreach ($groups as $group)
            <tr class="lead">
                <td>{{$group->NAM_GROUP}}</td>
                <td>{{$group->DES_GROUP}}</td>
                <td>
                    <a href="/groups/edit/{{$group->ID_GROUP}}">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </td>
                <td>
                    <form method="delete">
                        <a href="/groups/delete?id={{$group->ID_GROUP}}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="row text-center">
        <form action="/groups/edit/{{0}}">
            <button type="submit" class="btn btn-custom btn-lg active">Novo</button>
        </form>
    </div>
</div>
@stop