@extends('layouts.pretor')

@section('content')
<div class="container doubling stackable ui raised segment teal">
    <div class="ui items divided">
        <div class="item">
            <div class="ui image">
                <i class="fas fa-balance-scale-right icon-header-size"></i>
            </div>
            <div class="middle align content">
                <h2 class="ui header">Gerenciamento de Classes Processuais
                    <div class="sub header">
                        <span>Listagem de Classes Processuais</span>
                    </div>
                </h2>

                <div class="description">
                    <p></p>
                </div>
            </div>
            <div class="right floated">
                <a class="ui labeled icon button primary mini" href="{{ route('kinds.create') }}">
                    <i class=" icon plus"></i>
                    Novo
                </a>
            </div>
        </div>
        <div class="item" style="padding:5px 0 0 0;">
            <form action="{{ route('entities.index') }}" method="GET" id="formSearch" class="ui form">
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
            <table class="ui table compact celled striped selectable teal">
                <thead class="bg-dark text-light">
                    <th>Nome</th>
                    <th>Área</th>
                    <th class="text-right pr-2">Ações</th>
                </thead>
                <tbody>
                    @forelse($kinds as $kind)
                    <tr>
                        <td>{{ $kind->name }}</td>
                        <td><a class="badge badge-secondary"
                                href="{{ route('areas.show',['area'=>$kind->area_id]) }}">{{ $kind->area->name }}</a>
                        </td>

                        <td class="right aligned">
                            <div class="ui buttons mini">
                                <a href="{{ route('kinds.show', ['kind'=> $kind->id]) }}" class="ui button grey"
                                    title="Visualizar registro">
                                    <i class="fas fa-folder-open"></i>
                                </a>
                                <a href="{{ route('kinds.edit', ['kind'=> $kind->id]) }}" class="ui button orange"
                                    title="Atualizar registro">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('kinds.destroy', ['kind'=> $kind->id]) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="ui button red mini" title="Excluir registro">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>
                            <h5><span class="badge badge-secondary"> Classe Processual não localizadas. </span></h5>
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
