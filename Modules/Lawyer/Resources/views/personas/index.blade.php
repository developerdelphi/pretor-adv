@extends('layouts.pretor')

@section('content')

<div class="ui grid doubling">
    <div class="column sixteen wide" style="padding-bottom:0;">
        <h2 class="ui blue block header">
            <i class="users icon"></i>
            <div class="content">
                Gerenciamento de Pessoas
                <div class="sub header">Cadastro de clientes e partes</div>
            </div>
        </h2>
    </div>
    <div class="row" style="padding:10px 0 0 0;">
        <div class="column fourteen wide container">
            <form action="{{ route('personas.index') }}" method="GET" id="formSearch" class="ui form">
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
        <div class="column two wide">
            <div class="ui vertical animated button blue" tabindex="0">
                <a class="hidden content" href="{{ route('personas.create') }}">Novo</a>
                <div class="visible content">
                    <i class=" icon plus"></i>
                </div>
            </div>
            {{-- <button class="ui right labeled icon button teal">
                Novo
                <i class="icon plus"></i>
            </button> --}}
        </div>
    </div>
    <div class="row container">
        <div class="column sexteen wide">
            <table class="ui table very compact selectable striped celled blue">
                <thead class="">
                    <th class="fifteen wide">
                        Nome
                        <a href="#" onclick="orderBy('name','ASC')"><i class="fas fa-sort-up"></i></a>
                        <a href="#" onclick="orderBy('name','DESC')"><i class="fas fa-sort-down"></i></a>
                    </th>
                    <th class="two wide center aligned">Ações</th>
                </thead>
                <tbody>
                    @forelse($personas as $persona)
                    <tr>
                        <td>{{ $persona->name }}</td>
                        <td class="right aligned">
                            <form action="{{ route('personas.destroy', ['persona'=> $persona->id]) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <div class="ui buttons mini icon">
                                    <a href="{{ route('personas.show', ['persona'=> $persona->id]) }}"
                                        class="ui button yellow">
                                        <i class="icon folder open"></i></a>
                                    <a href="{{ route('personas.edit', ['persona'=> $persona->id]) }}"
                                        class="ui button orange"><i class="icon pencil alt"></i></a>
                                    <button type="submit" class="ui button red"><i class="icon trash alt"></i></button>
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
    </div>
    <div class="row container">
        <div class="five wide column">
            Localizado {{ $personas->total() }} registro(s)
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
            Página {{ $personas->currentPage() }} de {{ $personas->lastPage() }}
        </div>
    </div>
    <div class="row">
        <div class="column center aligned">
            {{ $personas->onEachSide(5)->links('components.pagination.semantic') }}
        </div>
    </div>
</div>

@endsection
