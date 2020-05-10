@extends('layouts.pretor')

@section('content')
<div class="container doubling stackable ui raised segment teal">
    <div class="ui items divided">
        <div class="item">
            <div class="ui image">
                <i class="fas fa-balance-scale-right icon-header-size"></i>
            </div>
            <div class="middle align content">
                <h2 class="ui header">Atualização de Classes Processuais
                    <div class="sub header">
                        <span>Atualização de classes processuais administrativas e judiciais</span>
                    </div>
                </h2>
            </div>
            <div class="right floated">
                <div class="ui mini icon buttons">
                    <a href="{{ route('kinds.index') }}" class="ui button grey" title="Listar registros">
                        <i class="fas fa-folder"></i>
                    </a>
                    <a href="{{ route('kinds.create') }}" class="ui button primary" data-toggle="tooltip"
                        data-placement="top" title="Novo cadastro">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="ui form">
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
        </div>
        <hr>
        <div class="ui buttons">
            {{ Form::pretorSubmit('Confirmar') }}
            <a href="{{route('kinds.index')}}" class="ui button grey">Cancelar</a>
        </div>
    </div>
</div>
@endsection
