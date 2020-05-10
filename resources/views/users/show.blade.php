@extends('layouts.pretor')

@section('content')
<div class="container doubling stackable ui raised segment teal">
    <div class="ui items">
        <div class="item">
            <div class="ui image">
                <i class="user icon icon-header-size"></i>
            </div>
            <div class="middle align content">
                <h2 class="ui header">Usuário
                    <div class="sub header">
                        <span>Informações do usuário e gerencimento de acesso </span>
                    </div>
                </h2>

                <div class="description">
                    <p></p>
                </div>
            </div>
            <div class="right floated">
                <div class="ui mini icon buttons">
                    <a href="{{ route('users.index') }}" class="ui button grey" title="Listar registros">
                        <i class="fas fa-folder"></i>
                    </a>
                    <a href="{{ route('users.create') }}" class="ui button primary" data-toggle="tooltip"
                        data-placement="top" title="Novo cadastro">
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="{{ route('users.edit', ['user'=> $user->id]) }}" class="ui button orange"
                        title="Editar cadastro">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form action="{{ route('users.destroy', ['user'=> $user->id]) }}" method="post">
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
                <p>{{ $user->name }}</p>
            </div>
        </div>
        <div class="row">
            <div class="three wide column">
                <h5>E-mail:</h5>
            </div>
            <div class="nine wide column">
                <p>{{ $user->email }}</p>
            </div>
        </div>
    </div>
    <div class="ui items">
        <h4 class="ui horizontal divider header">
            <i class="far fa-id-badge icon"></i>
            Roles do Usuário
        </h4>
        <div class="ui segment raised">
            <ul class="list-unstyled">
                @forelse($roles as $role)
                <li>{{ $role }} <em></em></li>
                @empty
                <em>Nenhuma Role vinculada.</em>
                @endforelse
            </ul>
        </div>

        <h4 class="ui horizontal divider header">
            <i class="fas fa-user-lock"></i>
            Permissões do Usuário
        </h4>
        <div class="ui segment raised">
            <dl class="row">
                @forelse($permissions as $permission)
                <dt class="col-sm-3">{{ $permission->name }}</dt>
                <dd class="col-sm-3">{{ $permission->title }}</dd>
                @empty
                <em>Nenhuma Permissão vinculada.</em>
                @endforelse
                </ul>

        </div>
    </div>
</div>
@endsection
