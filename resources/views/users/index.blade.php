@extends('layouts.pretor')

@section('content')
<div class="card shadow">
  <div class="card-header">
    <div class="float-right">
      <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-success"><i class="fas fa-plus"></i></a>
    </div>
    <h3 class="card-title m-0 p-0">
        <i class="fas fa-users"></i>
        <span class="d-inline mr-2">Usuários</span>
    </h3>
  </div>
  <div class="card-body">
    <table class="table table-hover table-sm">
        <thead>
            <th>Nome</th>
            <th>e-mail</th>
            <th class="text-right">Ações</th>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-right">
                    <form action="{{ route('users.destroy', ['user'=> $user->id]) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="btn-group" role="group">
                            <a href="{{ route('users.show', ['user'=> $user->id]) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-folder-open"></i></a>
                            <a href="{{ route('users.edit', ['user'=> $user->id]) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-pencil-alt"></i></a>
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td><h5>Usários não localizados.</h5></td></tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div>
@endsection

@section('footer-page')
<div class="card-footer p-1 mb-0 ">
    <div class="row justify-content-center">
        {{ $users->links() }}
    </div>
</div>
@endsection
