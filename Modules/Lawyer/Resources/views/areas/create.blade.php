@extends('layouts.pretor')

@section('title-header')

@endsection

@section('content')
<div class="card shadow">
    <div class="card-header">
        <div class="float-right">
        <a href="{{ route('areas.index') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-folder"></i></a>
        </div>
        <h3 class="card-title m-0 p-0">
            <i class="fas fa-file"></i>
            <span class="d-inline mr-2">Nova Área</span>
        </h3>
    </div>
    <div class="card-body">
            {!! Form::open(['route' => 'areas.store', 'method' => 'POST']) !!}

            {{ Form::pretorInput(['name'=>'name','value'=>old('name'), 'label'=>'Nome', 'placeholder'=>'Nome da Área', 'required'=>true], $errors) }}

        <hr>
        {{ Form::pretorSubmit('Confirmar') }}
    </div>
</div>
@endsection
