@extends('layouts.pretor')

@section('title-header')

@endsection

@section('content')
<div class="container doubling stackable ui raised segment teal">
    <div class="ui items divided">
        <div class="item">
            <div class="ui image">
                <i class="fas fa-balance-scale-right icon-header-size"></i>
            </div>
            <div class="middle align content">
                <h2 class="ui header">Criação de Classes Processuais <div class="sub header">
                        <span>Nova classe de processo</span>
                    </div>
                </h2>
            </div>
            <div class="right floated">
                <div class="ui mini icon buttons">
                    <a href="{{ route('kinds.index') }}" class="ui button grey" title="Listar registros">
                        <i class="fas fa-folder"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="ui form">
            {!! Form::open(['route' => 'kinds.store', 'method' => 'POST']) !!}

            {{ Form::pretorInput(
                    [
                        'name'=>'name',
                        'value'=>old('name'),
                        'label'=>'Nome',
                        'placeholder'=>'Nome da Classe Processual',
                        'required'=>true,
                        'autofocus'=>true
                    ],
                    $errors
                )
            }}

            {{ Form::pretorSelect(
                    [
                        'name'=>'area_id',
                        'value'=>$areas,
                        'selected'=>old('area_id'),
                        'label'=>'Área do Processo',
                        'placeholder'=>'Nome da Área',
                        'required'=>true
                    ],
                    $errors
                )
            }}
            <hr>
            <div class="ui buttons">
                {{ Form::pretorSubmit('Confirmar') }}
                <a href="{{route('kinds.index')}}" class="ui button grey">Cancelar</a>
            </div>
        </div>
    </div>
    @endsection
