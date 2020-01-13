@extends('layouts.app')

@section('title-header')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-sm-center">
            <div class="col-sm-8">
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
                {{ Form::pretorSubmit('Confirmar') }}
            </div>
        </div>
    </div>
@endsection
