@extends('layouts.pretor')

@section('content')
<div class="container doubling stackable ui raised segment teal">
    <div class="ui items">
        <div class="item">
            <div class="ui image">
                <i class="building icon icon-header-size"></i>
            </div>
            <div class="middle align content">
                <h2 class="ui header">Classe Processual
                    <div class="sub header">
                        <span>Informações da Classe Processual</span>
                    </div>
                </h2>

                <div class="description">
                    <p></p>
                </div>
            </div>
            <div class="right floated">
                <div class="ui mini icon buttons">
                    <a href="{{ route('kinds.index') }}" class="ui button grey" title="Listar registros">
                        <i class="fas fa-folder"></i>
                    </a>
                    <a href="{{ route('kinds.create') }}" class="ui button primary" data-toggle="tooltip"
                        data-placement="top" title="Novo cadastro">
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="{{ route('kinds.edit', ['kind'=> $kind->id]) }}" class="ui button orange"
                        title="Editar cadastro">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form action="{{ route('kinds.destroy', ['kind'=> $kind->id]) }}" method="post">
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
                <p>{{ $kind->name }}</p>
            </div>
        </div>
        <div class="row">
            <div class="three wide column">
                <h5>Área Processual:</h5>
            </div>
            <div class="nine wide column">
                <a class="badge badge-secondary"
                    href="{{ route('areas.show', [$kind->area_id]) }}">{{ $kind->area->name }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
