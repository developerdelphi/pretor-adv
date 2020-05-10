@extends('layouts.pretor')

@section('content')
<div class="container doubling stackable ui raised segment teal">
    <div class="ui items divided">
        <div class="item">
            <div class="ui image">
                <i class="fas fa-users icon-header-size"></i>
            </div>
            <div class="middle align content">
                <h2 class="ui header">Atualização de Usuário
                    <div class="sub header">
                        <span>Alteração de dados do usuário</span>
                    </div>
                </h2>
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
                </div>
            </div>
        </div>
    </div>
    <div class="ui form">
        {!! Form::model($user,['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}

        {{ Form::pretorInput(['name'=>'name','value'=>$user->name, 'label'=>'Nome', 'placeholder'=>'Nome do usuário', 'required'=>true], $errors) }}
        <div class="row">
            <div class="col-6">
                {{ Form::pretorInput(['type' => 'email', 'name'=>'email','value'=>$user->email, 'label'=>'E-mail', 'placeholder'=>'Informe o e-mail válido', 'required'=>true], $errors) }}
            </div>
            <div class="col-6">
                {{ Form::pretorInput(['type' => 'password', 'name'=>'password','value'=>$user->password, 'label'=>'Senha', 'placeholder'=>'Informe a senha!', 'required'=>true], $errors) }}
            </div>
        </div>
        <hr>
        <div class="ui buttons">
            {{ Form::pretorSubmit('Confirmar') }}
            <a href="{{route('users.index')}}" class="ui button grey">Cancelar</a>
        </div>
    </div>
</div>
@endsection
