@extends('layouts.pretor')

@section('title-header')

@endsection

@section('content')
<div class="container doubling stackable ui raised segment teal">
    <div class="ui items divided">
        <div class="item">
            <div class="ui image">
                <i class="fas fa-users icon-header-size"></i>
            </div>
            <div class="middle align content">
                <h2 class="ui header">Criação de Usuários <div class="sub header">
                        <span>Novo usuário</span>
                    </div>
                </h2>
            </div>
            <div class="right floated">
                <div class="ui mini icon buttons">
                    <a href="{{ route('users.index') }}" class="ui button grey" title="Listar registros">
                        <i class="fas fa-folder"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="ui form">
            {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

            {{ Form::pretorInput(['name'=>'name','value'=>old('name'), 'label'=>'Nome', 'placeholder'=>'Nome do usuário', 'required'=>true], $errors) }}
            <div class="row">
                <div class="col-6">
                    {{ Form::pretorInput(['type' => 'email', 'name'=>'email','value'=>old('email'), 'label'=>'E-mail', 'placeholder'=>'Informe o e-mail válido', 'required'=>true], $errors) }}
                </div>
                <div class="col-6">
                    {{ Form::pretorInput(['type' => 'password', 'name'=>'password','value'=>old('password'), 'label'=>'Senha', 'placeholder'=>'Informe a senha!', 'required'=>true], $errors) }}
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
