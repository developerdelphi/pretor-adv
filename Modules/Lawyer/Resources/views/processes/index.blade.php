@extends('layouts.pretor')

@section('content')
<div class="card shadow">
    <div class="card-header bg-dark text-light">
        <div class="float-right">
            <a href="{{ route('processes.create') }}" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <h3 class="card-title m-0 p-0">
            <i class="fas fa-book"></i>
            <span class="d-inline mr-2">Processos</span>
        </h3>
    </div>
    <div class="card-body">
        <table class="table table-hover table-sm">
            <thead class="bg-light text-dark text-md-center">
                <th>Nome</th>
                <th>Ação</th>
                <th>Situação</th>
                <th class="text-right">Ações</th>
            </thead>
            <tbody>
                @forelse($processes as $process)
                <tr>
                    <td>{{ $process->name }}</td>
                    <td>
                        @foreach($process->kinds as $kind)
                            <a href="#" class="badge badge-primary">{{ $kind->name }}</a>
                        @endforeach
                    </td>
                    <td>{{ $process->state }}</td>

                    <td class="text-right">
                        <form action="{{ route('processes.destroy', ['process'=> $process->id]) }}" method="post">
                            @csrf
                            @method("DELETE")
                                <div class="btn-group" role="group">
                                <a href="{{ route('processes.show', ['process'=> $process->id]) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-folder-open"></i></a>
                                <a href="{{ route('processes.edit', ['process'=> $process->id]) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-pencil-alt"></i></a>
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>
                        <h5 ><span class="badge badge-danger"> Processos não localizados. </span></h5>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer p-1 mb-0 ">
        <div class="row justify-content-center">
            {{ $processes->links() }}
        </div>
    </div>
</div>
@endsection

@section('footer-page')

@endsection
