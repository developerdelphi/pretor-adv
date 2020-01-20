@extends('layouts.pretor')

@section('content')
<div class="card shadow">
    <div class="card-header bg-dark text-light">
        <div class="float-right">
        <a href="{{ route('kinds.index') }}" class="btn btn-sm btn-outline-light" data-toggle="tooltip" data-placement="top" title="Listar registros">
            <i class="fas fa-list-alt"></i>
        </a>
        </div>
        <h3 class="card-title m-0 p-0">
        <i class="fas fa-list-alt"></i>
        <span class="d-inline mr-2">Cadastro de Classes Processuais</span>
        </h3>
    </div>
    <div class="card-body">
        <dl class="row">
        <dt class="col-sm-2 bg-dark text-light border-bottom border-light">Nome</dt>
        <dd class="col-sm-10">{{ $kind->name }}</dd>
        <dt class="col-sm-2 bg-dark text-light">Área Processual</dt>
        <dd class="col-sm-10"><a class="badge badge-secondary" href="{{ route('areas.show', [$kind->area_id]) }}">{{ $kind->area->name }}</a></dd>
        </dl>
        <div class="row border-bottom pb-1 mb-1">

        <div class="w-100 border-top border-secondary">
            <form action="{{ route('kinds.destroy', ['kind'=> $kind->id]) }}" method="post">
            @csrf
            @method("DELETE")
                <div class="btn-group float-right mt-1" role="group">
                    <a href="{{ route('kinds.create') }}" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Novo cadastro">
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="{{ route('kinds.edit', ['kind'=> $kind->id]) }}" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Editar cadastro">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <button type="submit" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Exluir do cadastro">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

<script>
  $(document).ready(function() {
    $(":input").inputmask();

  });
</script>
@endsection
