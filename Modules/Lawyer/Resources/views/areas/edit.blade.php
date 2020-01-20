@extends('layouts.pretor')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <div class="float-right">
        <a href="{{ route('areas.index') }}" class="btn btn-sm btn-outline-success"><i class="fas fa-folder"></i></a>
        </div>
        <h3 class="card-title m-0 p-0">
            <i class="fas fa-file"></i>
            <span class="d-inline mr-2">Atualizar Área</span>
        </h3>
    </div>
    <div class="card-body">
        {!! Form::model($area,['route' => ['areas.update', $area->id], 'method' => 'PUT']) !!}
        {{ Form::pretorInput(['name'=>'name','value'=>$area->name, 'label'=>'Nome', 'placeholder'=>'Nome da Área', 'required'=>true], $errors) }}
        <hr>
        {{ Form::pretorSubmit('Confirmar') }}
    </div>
</div>
@endsection
