@extends('layouts.pretor')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <div class="float-right">
        <a href="{{ route('entities.index') }}" class="btn btn-sm btn-outline-success"><i class="fas fa-folder"></i></a>
        </div>
        <h3 class="card-title m-0 p-0">
            <i class="fas fa-building"></i>
            <span class="d-inline mr-2">Atualizar Entidade</span>
        </h3>
    </div>
    <div class="card-body">
        {!! Form::model($entity,['route' => ['entities.update', $entity->id], 'method' => 'PUT']) !!}
        {{ Form::pretorInput(['name'=>'name','value'=>$entity->name, 'label'=>'Nome', 'placeholder'=>'Nome da Entidade', 'required'=>true], $errors) }}
        <hr>
        {{ Form::pretorSubmit('Confirmar') }}
    </div>
</div>
@endsection
