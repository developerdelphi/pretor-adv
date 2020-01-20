@extends('layouts.pretor')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <div class="float-right">
        <a href="{{ route('kinds.index') }}" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Listar Classe Processuais">
            <i class="fas fa-list-alt"></i>
        </a>
        </div>
        <h3 class="card-title m-0 p-0">
            <i class="fas fa-list-alt"></i>
            <span class="d-inline mr-2">Atualizar Classe Processual</span>
        </h3>
    </div>
    <div class="card-body">
    {!! Form::model($kind,['route' => ['kinds.update', $kind->id], 'method' => 'PUT']) !!}
        {{ Form::pretorInput(
                    [
                        'name'=>'name',
                        'value'=>$kind->name,
                        'label'=>'Nome',
                        'placeholder'=>'Nome da Classe Processual',
                        'required'=>true,
                        'autofocus'=>true
                    ],
                    $errors
                )
        }}
        <div class="row align-items-center">
            <div class="col-11">
                {{ Form::pretorSelect(
                        [
                            'name'=>'area_id',
                            'value'=>$areas,
                            'selected'=>$kind->area_id,
                            'label'=>'Área do Processo',
                            'placeholder'=>'Nome da Área',
                            'required'=>true
                        ],
                        $errors
                    )
                }}
            </div>
            <div class="col-1 m-0 pl-0">
                <div class="btn-group" role="group">
                    <a href="{{ route('areas.index') }}" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Listar Áreas"><i class="fas fa-list-alt"></i></a>
                    <a href="{{ route('areas.create') }}" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Adicinar Áreas"><i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <hr>
        {{ Form::pretorSubmit('Confirmar') }}
    </div>
</div>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    }
</script>
@endsection
