@extends('layouts.pretor')

@section('content')
<div class="card shadow">
  <div class="card-header">
    <div class="float-right">
      <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-success"><i class="fas fa-users"></i></a>
    </div>
    <h3 class="card-title m-0 p-0">
      <i class="fas fa-users"></i>
      <span class="d-inline mr-2">Cadastro de Usuário</span>
    </h3>
  </div>
  <div class="card-body">
    <dl class="row">
      <dt class="col-sm-2">Name:</dt>
      <dd class="col-sm-10">{{ $user->name }}</dd>

      <dt class="col-sm-2">E-mail:</dt>
      <dd class="col-sm-10">{{ $user->email }}</dd>
    </dl>
    <div class="row border-bottom pb-1 mb-1">
      <div class="w-100">
        <form action="{{ route('users.destroy', ['user'=> $user->id]) }}" method="post">
          @csrf
          @method("PUT")
          <div class="btn-group float-right" role="group">
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-success"><i class="fas fa-plus"></i></a>
            <a href="{{ route('users.edit', ['user'=> $user->id]) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-pencil-alt"></i></a>
            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <h4>Lista de Roles</h4>
        <ul class="list-unstyled">
            @forelse($roles as $role)
            <li>{{ $role }} <em></em></li>
            @empty
            <em>Nenhuma Role vinculada.</em>
            @endforelse
        </ul>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-6">
        <h4>Lista de Permissões</h4>
        <dl class="row">
          @forelse($permissions as $permission)
          <dt class="col-sm-3">{{ $permission->name }}</dt>
          <dd class="col-sm-3">{{ $permission->title }}</dd>
          @empty
          <em>Nenhuma Permissão vinculada.</em>
          @endforelse
          </ul>
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
