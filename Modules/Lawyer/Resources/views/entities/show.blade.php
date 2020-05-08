@extends('layouts.pretor')

@section('content')
<div class="container doubling stackable ui raised segment">
    <div class="ui items divided">
        <div class="item">
            <div class="icon">
                <i class="icon orange icon-header.size"></i>
            </div>
            <div class="middle align content">
                <h2 class="ui orange header">Gerenciamento de Entidades
                    <div class="sub header">
                        <span>Cadastro de entidades públicas e privadas</span>
                    </div>
                </h2>

                <div class="description">
                    <p></p>
                </div>
            </div>
            <div class="right floated">
                <a class="ui button tiny primary" href="{{ route('entities.index') }}">Listar</a>
            </div>
        </div>

        <div class="item">
            <dl class="row">
                <dt class="col-sm-2 bg-dark text-light border-bottom border-light">Nome</dt>
                <dd class="col-sm-10">{{ $entity->name }}</dd>
            </dl>
            <div class="row border-top border-secondary">
                <div class="w-100">
                    <form action="{{ route('entities.destroy', ['entity'=> $entity->id]) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <div class="btn-group float-right mt-1" role="group">
                            <a href="{{ route('entities.create') }}" class="btn btn-sm btn-outline-secondary"
                                data-toggle="tooltip" data-placement="top" title="Novo cadastro">
                                <i class="fas fa-plus"></i>
                            </a>
                            <a href="{{ route('entities.edit', ['entity'=> $entity->id]) }}"
                                class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top"
                                title="Editar cadastro">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <button type="submit" class="btn btn-sm btn-outline-danger" data-toggle="tooltip"
                                data-placement="top" title="Exluir do cadastro">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </form>
                </div>
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
