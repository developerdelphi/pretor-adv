@extends('layouts.pretor')

@section('content')
<div class="container doubling stackable ui raised segment">
    <div class="ui items">
        <div class="item">
            <div class="ui image">
                <i class="building icon orange icon-header-size"></i>
            </div>
            <div class="middle align content">
                <h2 class="ui orange header">Gerenciamento de Entidades
                    <div class="sub header">
                        <span>Cadastro de entidades públicas e privadas</span>
                    </div>
                </h2>

                <div class="description">
                    <p></p>
                </div>
            </div>
            <div class="right floated">
                <div class="ui mini icon buttons">
                    <a href="{{ route('entities.index') }}" class="ui button grey" title="Listar registros">
                        <i class="fas fa-folder"></i>
                    </a>
                    <a href="{{ route('entities.create') }}" class="ui button primary" data-toggle="tooltip"
                        data-placement="top" title="Novo cadastro">
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="{{ route('entities.edit', ['entity'=> $entity->id]) }}" class="ui button orange"
                        title="Editar cadastro">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form action="{{ route('entities.destroy', ['entity'=> $entity->id]) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="ui button red" data-toggle="tooltip" data-placement="top"
                            title="Exluir do cadastro">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h4 class="ui horizontal divider header">
        <i class="tag icon"></i>
        Descrição das Informações
    </h4>
    <div class="ui internally celled grid container" style="{margin-top:10px;}">
        <div class="row">
            <div class="three wide column">
                <h5>Nome:</h5>
            </div>
            <div class="nine wide column">
                <p>{{ $entity->name }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
