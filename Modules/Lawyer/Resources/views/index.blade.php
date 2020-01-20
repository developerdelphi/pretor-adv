@extends('layouts.pretor')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <div class="float-right">

        </div>
        <h3 class="card-title m-0 p-0">
            <i class="fas fa-user-tie"></i>
            <span class="d-inline mr-2">Painel :: {!! config('lawyer.moduleTitle') !!}</span>
        </h3>
    </div>
    <div class="card-body">
        <p>
            This view is loaded from module: {!! config('lawyer.moduleTitle') !!}
        </p>
    </div>
</div>

@endsection
