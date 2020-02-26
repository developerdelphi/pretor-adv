@extends('layouts.pretor')

@section('content')
<div class="card shadow">
    <div class="card-header bg-dark text-light">
        <div class="float-right">
            <a href="{{ route('personas.create') }}" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-plus"></i></a>
        </div>
        <h3 class="card-title m-0 p-0">
            <i class="fas fa-users"></i>
            <span class="d-inline mr-2">Pessoas</span>
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('personas.index') }}" method="GET" id="formSearch">
            {!! Form::hidden('per_page', $search['per_page'] ?? 10, ['id' => 'per_page']) !!}
            {!! Form::hidden('order', $search['order'] ?? null, ['id' => 'order']) !!}
            {!! Form::hidden('order_type', $search['order_type'] ?? null, ['id' => 'order_type']) !!}
            <div class="row mb-1 mt-0">
                <div class="col-sm-10">
                    <div class="input-group form-inline">
                        <input type="text" name="name" id="name" value="{{ $search['name'] ?? null }}"
                            class="form-control form-control-sm" placeholder="Consultar por nome"
                            aria-label="Consulta por nome" aria-describedby="button" autofocus>
                        <div class="input-group-append" id="button-addon4">
                            <button class="btn btn-sm btn-outline-secondary" type="submit">consultar</button>
                            <button class="btn btn-sm btn-outline-secondary" type="button button-sm"
                                onclick="setField('name',null);return false;">
                                <i class="fas fa-ban"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <table class="table table-hover table-striped table-sm" id="pretor-datatable">
            <thead class="">
                <th>Nome
                    <a href="#" onclick="orderBy('name','ASC')"><i class="fas fa-sort-up"></i></a>
                    <a href="#" onclick="orderBy('name','DESC')"><i class="fas fa-sort-down"></i></a>
                </th>
                <th class="text-right pr-2">Ações</th>
            </thead>
            <tbody>
                @forelse($personas as $persona)
                <tr>
                    <td>{{ $persona->name }}</td>
                    <td class="text-right">
                        <form action="{{ route('personas.destroy', ['persona'=> $persona->id]) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <div class="btn-group" role="group">
                                <a href="{{ route('personas.show', ['persona'=> $persona->id]) }}"
                                    class="btn btn-sm btn-outline-secondary"><i class="fas fa-folder-open"></i></a>
                                <a href="{{ route('personas.edit', ['persona'=> $persona->id]) }}"
                                    class="btn btn-sm btn-outline-primary"><i class="fas fa-pencil-alt"></i></a>
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                        class="fas fa-trash-alt"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>
                        <h5><span class="badge badge-secondary"> Pessoas não localizadas. </span></h5>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <div class="row justify-content-between">
            <div class="col-sm justify-content-start">
                Localizado {{ $personas->total() }} registro(s)
            </div>
            <div class="col-sm form-inline justify-content-center">
                Exibir
                <select id="selectPerPage" class="form-control form-control-sm"
                    onchange="setField(setField('per_page', this.value));return false;">
                    <option value="1" {{ $search['per_page'] == 1 ? 'selected' : ''}}>1</option>
                    <option value="5" {{ $search['per_page'] == 5 ? 'selected' : ''}}>5</option>
                    <option value="10" {{ $search['per_page'] == 10 ? 'selected' : ''}}>10</option>
                    <option value="15" {{ $search['per_page'] == 15 ? 'selected' : ''}}>15</option>
                    <option value="20" {{ $search['per_page'] == 20 ? 'selected' : ''}}>20</option>
                    <option value="25" {{ $search['per_page'] == 25 ? 'selected' : ''}}>25</option>
                    <option value="50" {{ $search['per_page'] == 50 ? 'selected' : ''}}>50</option>
                    <option value="75" {{ $search['per_page'] == 75 ? 'selected' : ''}}>75</option>
                    <option value="100" {{ $search['per_page'] == 100 ? 'selected' : ''}}>100</option>
                </select>
            </div>
            <div class="col-sm text-right">
                Página {{ $personas->currentPage() }} de {{ $personas->lastPage() }}
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        {{ $personas->onEachSide(1)->links() }}
    </div>
</div>
</div>
@endsection
