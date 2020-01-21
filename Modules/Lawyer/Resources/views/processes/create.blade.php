@extends('layouts.pretor')

@section('title-header')

@endsection

@section('content')
<div class="card shadow">
    <div class="card-header">
        <div class="float-right">
        <a href="{{ route('processes.index') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-list-alt"></i></a>
        </div>
        <h3 class="card-title m-0 p-0">
            <i class="fas fa-book"></i>
            <span class="d-inline mr-2">Novo Processo</span>
        </h3>
    </div>
    <div class="card-body">
            {!! Form::open(['route' => 'processes.store', 'method' => 'POST']) !!}
            <div class="row align-items-center">
                <div class="col-6">
                    {{ Form::pretorInput(['name'=>'archivy','value'=>old('archivy'), 'label'=>'Número Pasta', 'placeholder'=>'Número da pasta de arquivamento', 'required'=>true], $errors) }}
                </div>
                <div class="col-6">
                    <div class="row align-items-center">
                        <div class="col-12">
                            {{ Form::pretorSelect(
                                    [
                                        'name'=>'state',
                                        'value'=>$states,
                                        'selected'=>null,
                                        'label'=>'Situação do Processo',
                                        'placeholder'=>'Situação do Processo',
                                        'required'=>false
                                    ],
                                    $errors
                                )
                            }}
                        </div>
                    </div>
                </div>
            </div>
        <hr>
        {{ Form::pretorSubmit('Confirmar') }}
    </div>
</div>
@endsection
