@extends('layouts.app')

@section('sidebar')
    @parent
    @include('components.menus.sidebar')
@stop

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pretor 2.0</h1>
@stop

@section('content')
    <p>Painel Administrativo do Sistema de Gerenciamento de Processos.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
