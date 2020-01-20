@extends('layouts.pretor')

@section('title-header')

@endsection

@section('content')
<div class="card shadow">
    <div class="card-header">
        <div class="float-right">
        <a href="{{ route('kinds.index') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-folder"></i></a>
        </div>
        <h3 class="card-title m-0 p-0">
            <i class="fas fa-file"></i>
            <span class="d-inline mr-2">Nova Classe Processual</span>
        </h3>
    </div>
    <div class="card-body">
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
        {{ Form::pretorSubmit('Confirmar') }}
    </div>
</div>
@endsection
