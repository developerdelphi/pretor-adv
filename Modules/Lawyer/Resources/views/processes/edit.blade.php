@extends('layouts.pretor')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <div class="float-right">
        <a href="{{ route('processes.index') }}" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Listar Classe Processuais">
            <i class="fas fa-list-alt"></i>
        </a>
        </div>
        <h3 class="card-title m-0 p-0">
            <i class="fas fa-book"></i>
            <span class="d-inline mr-2">Atualizar Processo</span>
        </h3>
    </div>
    <div class="card-body">
    {!! Form::model($process,['route' => ['processes.update', $process->id], 'method' => 'PUT']) !!}
        {{ Form::pretorInput(
                    [
                        'name'=>'name',
                        'value'=>$process->name,
                        'label'=>'Nome',
                        'placeholder'=>'Nome da Processo',
                        'required'=>true,
                        'autofocus'=>true
                    ],
                    $errors
                )
        }}
        <div class="row">
            <div class="col-9">
                {{ Form::pretorSelect(
                    [
                        'name'=>'state',
                        'value'=>$states,
                        'selected'=>$process->state,
                        'label'=>'Situação do Processo',
                        'placeholder'=>'Nome da Área',
                        'required'=>true
                    ],
                    $errors
                    )
                }}
            </div>
            <div class="col-3">
                {{ Form::pretorInput(
                        [
                            'name'=>'name',
                            'value'=>$process->archivy,
                            'label'=>'Número da Pasta',
                            'placeholder'=>'Número da Pasta',
                            'required'=>false,
                        ],
                        $errors
                    )
                }}
            </div>
        </div>
        {{ Form::pretorSelect(
                [
                    'name'=>'situation',
                    'value'=>$situations,
                    'selected'=>$process->situation,
                    'label'=>'Andamento do Processo',
                    'placeholder'=>'Selecione o andamento do processo',
                    'required'=>true
                ],
                $errors
            )
        }}
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
