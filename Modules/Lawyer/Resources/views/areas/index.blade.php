@extends('layouts.pretor')

@section('content')
<div class="card shadow">
    <div class="card-header bg-dark text-light">
        <div class="float-right">
            <a href="{{ route('areas.create') }}" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-plus"></i></a>
        </div>
        <h3 class="card-title m-0 p-0">
            <i class="fas fa-file"></i>
            <span class="d-inline mr-2">Áreas</span>
        </h3>
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped table-sm" id="pretor-datatable">
            <thead class="">
                <th>#</th>
                <th>Nome</th>
                <th class="text-right pr-2">Ações</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('footer-page')
<div class="card-footer p-1 mb-0 ">
    <div class="row justify-content-center">
        {{ $areas->links() }}
    </div>
</div>
@endsection

@section('page-script')
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function() {
    $('#pretor-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('areas.search') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
} );
</script>
@stop
