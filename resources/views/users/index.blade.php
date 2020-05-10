@extends('layouts.pretor')

@section('content')
<div class="container doubling stackable ui raised segment teal">
    <div class="ui items divided">
        <div class="item">
            <div class="ui image">
                <i class="users icon icon-header-size"></i>
            </div>
            <div class="middle align content">
                <h2 class="ui header">Gerenciamento Usuários
                    <div class="sub header">
                        <span>Listagem de Usuários do Sistema</span>
                    </div>
                </h2>

                <div class="description">
                    <p></p>
                </div>
            </div>
            <div class="right floated">
                <a class="ui labeled icon button primary mini" href="{{ route('users.create') }}">
                    <i class=" icon plus"></i>
                    Novo
                </a>
            </div>
        </div>
        <div class="item" style="padding:5px 0 0 0;">
            <form action="{{ route('entities.index') }}" method="GET" id="formSearch" class="ui form">
                {!! Form::hidden('per_page', $search['per_page'] ?? 10, ['id' => 'per_page']) !!}
                {!! Form::hidden('order', $search['order'] ?? null, ['id' => 'order']) !!}
                {!! Form::hidden('order_type', $search['order_type'] ?? null, ['id' => 'order_type']) !!}

                <div class="fields">
                    <div class="ui action input field focus">
                        <input type="text" name="name" id="name" value="{{ $search['name'] ?? null }}"
                            placeholder="Consultar por nome">
                        <div class="ui button" onclick="setField('name',null);return false;"><i class="erase icon"></i>
                        </div>
                        <button class="ui button"><i class="search icon"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="item">
            <table class="ui table compact celled striped selectable teal">
                <thead>
                    <th>Nome</th>
                    <th>e-mail</th>
                    <th class="text-right">Ações</th>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="right aligned">
                            <div class="ui buttons mini">
                                <a href="{{ route('users.show', ['user'=> $user->id]) }}" class="ui button icon grey"><i
                                        class="fas fa-folder-open"></i></a>
                                <a href="{{ route('users.edit', ['user'=> $user->id]) }}"
                                    class="ui button icon orange"><i class="fas fa-pencil-alt"></i></a>
                                <form action="{{ route('users.destroy', ['user'=> $user->id]) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="ui button icon red"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>
                            <h5>Usários não localizados.</h5>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @endsection

    @section('footer-page')
    <div class="card-footer p-1 mb-0 ">
        <div class="row justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
    @endsection
