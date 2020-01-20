@extends('layouts.pretor')

@section('content')
<div class="card shadow">
    <div class="card-header bg-dark text-light">
        <div class="float-right">
            <a href="{{ route('entities.create') }}" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <h3 class="card-title m-0 p-0">
            <i class="fas fa-building"></i>
            <span class="d-inline mr-2">Entidades</span>
        </h3>
    </div>
    <div class="card-body">
        <table class="table table-hover table-sm">
            <thead class="bg-light text-dark text-md-center">
                <th>Nome</th>
                <th class="text-right">Ações</th>
            </thead>
            <tbody>
                @forelse($entities as $entity)
                <tr>
                    <td>{{ $entity->name }}</td>

                    <td class="text-right">
                        <form action="{{ route('entities.destroy', ['entity'=> $entity->id]) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <div class="btn-group" role="group">
                                <a href="{{ route('entities.show', ['entity'=> $entity->id]) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-folder-open"></i></a>
                                <a href="{{ route('entities.edit', ['entity'=> $entity->id]) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-pencil-alt"></i></a>
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>
                        <h5 ><span class="badge badge-danger"> Entidades não localizadas. </span></h5>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('footer-page')
<div class="card-footer p-1 mb-0 ">
    <div class="row justify-content-center">
        {{ $entities->links() }}
    </div>
</div>
@endsection
