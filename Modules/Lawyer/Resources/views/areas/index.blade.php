@extends('layouts.pretor')

@section('content')
<div class="container doubling stackable ui raised segment teal">
    <div class="ui items divided">
        <div class="item">
            <div class="ui image">
                <i class="fas fa-balance-scale-left icon-header-size"></i>
            </div>
            <div class="middle align content">
                <h2 class="ui header">Gerenciamento de Áreas jurídicas
                    <div class="sub header">
                        <span>Cadastro de temas jurídicos abrangente nos processos</span>
                    </div>
                </h2>
            </div>
            <div class="right floated">
                <a class="ui labeled icon button primary" href="{{ route('areas.create') }}">
                    <i class=" icon plus"></i>
                    Novo
                </a>
            </div>
        </div>
    </div>
    <div class="item" style="padding:5px 0 0 0;">
        <form action="{{ route('areas.index') }}" method="GET" id="formSearch" class="ui form">
            {!! Form::hidden('per_page', $search['per_page'] ?? 10, ['id' => 'per_page']) !!}
            {!! Form::hidden('order', $search['order'] ?? null, ['id' => 'order']) !!}
            {!! Form::hidden('order_type', $search['order_type'] ?? null, ['id' => 'order_type']) !!}

            <div class="fields">
                <div class="ui action input field focus">
                    <input type="text" name="name" id="name" value="{{ $search['name'] ?? null }}"
                        placeholder="Consultar por nome">
                    <div class="ui button" onclick="setField('name',null);return false;"><i class="erase icon"></i>
                    </div>
                    <button class="ui button"><i class="search icon"></i></button>
                </div>
            </div>
        </form>
    </div>

    <div class="item">
        <table class="ui table compact celled striped selectable">
            <thead class="bg-light text-dark text-md-center">
                <th>Nome</th>
                <th class="center aligned">Ações</th>
            </thead>
            <tbody>
                @forelse($areas as $area)
                <tr>
                    <td>{{ $area->name }}</td>
                    <td class="right aligned">
                        <div class="ui mini buttons icon" style="padding:0; margin:0;">
                            <a href="{{ route('areas.show', ['area'=> $area->id]) }}" class="ui button grey"><i
                                    class="icon folder open"></i></a>
                            <a href="{{ route('areas.edit', ['area'=> $area->id]) }}" class="ui button mini orange"><i
                                    class="icon pencil alt"></i></a>
                            <form action="{{ route('areas.destroy', ['area'=> $area->id]) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="ui button icon red"><i class="icon trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>
                        <h5><span class="badge badge-danger"> Áreas jurídicas não localizadas. </span></h5>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="ui grid item" style="margin:0;padding:0;">
        <div class="five wide column">
            Localizado {{ $areas->total() }} registro(s)
        </div>
        <div class="six wide column center aligned">
            Exibindo
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
            linhas por página
        </div>
        <div class="five wide column right aligned">
            Página {{ $areas->currentPage() }} de {{ $areas->lastPage() }}
        </div>
        <div class="sixteen wide column divider center aligned" style="margin:0;padding:0;">
            {{ $areas->onEachSide(5)->links('components.pagination.semantic') }}
        </div>
    </div>
</div>
</div>


@endsection

@section('footer-page')

@endsection
