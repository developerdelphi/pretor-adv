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
                    <a href="{{ route('areas.index') }}" class="ui button grey" title="Listar registros">
                        <i class="fas fa-folder"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="ui form">
            {!! Form::open(['route' => 'areas.store', 'method' => 'POST']) !!}

            {{ Form::pretorInput(['name'=>'name','value'=>old('name'), 'label'=>'Nome', 'placeholder'=>'Nome da Área', 'required'=>true], $errors) }}

            <hr>
            <div class="ui two buttons">
                {{ Form::pretorSubmit('Confirmar') }}
                <a href="{{ route('areas.index') }}" class="ui button grey">Cancelar</a>

            </div>
        </div>
    </div>
</div>
@endsection
