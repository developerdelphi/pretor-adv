@extends('layouts.pretor')

@section('content')
<div class="card shadow">
    <div class="card-header bg-dark text-light">
        <div class="float-right">
            <a href="{{ route('kinds.create') }}" class="btn btn-sm btn-outline-light" class="btn btn-sm btn-outline-light" data-toggle="tooltip" data-placement="top" title="Novo registro">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <h3 class="card-title m-0 p-0">
            <i class="fas fa-list-alt"></i>
            <span class="d-inline mr-2">Classe Processual</span>
        </h3>
    </div>
    <div class="card-body">
        <table class="table table-hover table-sm border-bottom">
            <thead class="bg-dark text-light">
                <th>Nome</th>
                <th>Área</th>
                <th class="text-right pr-2">Ações</th>
            </thead>
            <tbody>
                @forelse($kinds as $kind)
                <tr>
                    <td>{{ $kind->name }}</td>
                    <td><a class="badge badge-secondary" href="{{ route('areas.show',['area'=>$kind->area_id]) }}">{{ $kind->area->name }}</a></td>

                    <td class="text-right">
                        <form action="{{ route('kinds.destroy', ['kind'=> $kind->id]) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <div class="btn-group" role="group">
                                <a href="{{ route('kinds.show', ['kind'=> $kind->id]) }}" class="btn btn-sm btn-outline-secondary" class="btn btn-sm btn-outline-light" data-toggle="tooltip" data-placement="top" title="Visualizar registro">
                                    <i class="fas fa-folder-open"></i>
                                </a>
                                <a href="{{ route('kinds.edit', ['kind'=> $kind->id]) }}" class="btn btn-sm btn-outline-primary" class="btn btn-sm btn-outline-light" data-toggle="tooltip" data-placement="top" title="Atualizar registro">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <button type="submit" class="btn btn-sm btn-outline-danger" class="btn btn-sm btn-outline-light" data-toggle="tooltip" data-placement="top" title="Excluir registro">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>
                        <h5 ><span class="badge badge-secondary"> Classe Processual não localizadas. </span></h5>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer p-1 mb-0 ">
        <div class="row justify-content-center">
            {{ $kinds->links() }}
        </div>
    </div>
</div>
@endsection

@section('footer-page')

@endsection
