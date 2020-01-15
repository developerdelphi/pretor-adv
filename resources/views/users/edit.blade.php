@extends('layouts.pretor')

@section('content')
<div class="card shadow">
  <div class="card-header">
    <div class="float-right">
      <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-success"><i class="fas fa-folder"></i></a>
    </div>
    <h3 class="card-title m-0 p-0">
        <i class="fas fa-users"></i>
        <span class="d-inline mr-2">Atualizar Usuário</span>
    </h3>
  </div>
  <div class="card-body">
      {!! Form::model($user,['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}

      {{ Form::pretorInput(['name'=>'name','value'=>$user->name, 'label'=>'Nome', 'placeholder'=>'Nome do usuário', 'required'=>true], $errors) }}
      <div class="row">
          <div class="col-6">
          {{ Form::pretorInput(['type' => 'email', 'name'=>'email','value'=>$user->email, 'label'=>'E-mail', 'placeholder'=>'Informe o e-mail válido', 'required'=>true], $errors) }}
          </div>
          <div class="col-6">
          {{ Form::pretorInput(['type' => 'password', 'name'=>'password','value'=>$user->password, 'label'=>'Senha', 'placeholder'=>'Informe a senha!', 'required'=>true], $errors) }}
          </div>
      </div>
      <hr>
      {{ Form::pretorSubmit('Confirmar') }}
  </div>
</div>
@endsection
