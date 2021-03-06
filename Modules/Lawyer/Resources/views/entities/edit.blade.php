@extends('layouts.pretor')

@section('content')
<div class="container doubling stackable ui raised segment teal">
    <div class="ui items divided">
        <div class="item">
            <div class="ui image">
                <i class="fas fa-balance-scale-left icon-header-size"></i>
            </div>
            <div class="middle align content">
                <h2 class="ui header">Gerenciamento de Áreas jurídicas <div class="sub header">
                        <span>Cadastro de temas jurídicos abrangente nos processos</span>
                    </div>
                </h2>
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
                </div>
            </div>
        </div>
    </div>
    <div class="ui form">
        {!! Form::model($entity,['route' => ['entities.update', $entity->id], 'method' => 'PUT']) !!}
        {{ Form::pretorInput(['name'=>'name','value'=>$entity->name, 'label'=>'Nome', 'placeholder'=>'Nome da Entidade', 'required'=>true], $errors) }}
        <hr>
        <div class="ui buttons">
            {{ Form::pretorSubmit('Confirmar') }}
            <a href="{{ route('entities.index')}}" class="ui button grey">Cancelar</a>
        </div>
    </div>
</div>
@endsection
