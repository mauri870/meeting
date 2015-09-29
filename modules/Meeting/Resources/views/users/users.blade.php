@extends('meeting::layouts.master')
@section('title', $page_name)
@section('content')
        <!-- content -->
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">
            Usuários
        </h1>
    </div>
    <div id="no-more-tables">
        <table class="col-md-12 table-bordered table-striped table-condensed cf text-center">
            <thead class="cf">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Cargo</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $u)
                <tr>
                    <th>{{ $u->id }}</th>
                    <th>{{ $u->name }}</th>
                    <th>{{ 'Tipo' }}</th>
                    <th>{{ $u->email }}</th>
                    <th>{{ $u->phone }}</th>
                    <th>{{ $u->occupation->name }}</th>
                    <th>
                        <a href="{{ route('admin.users.edit',$u->id) }}" class="btn btn-xs btn-warning" title="Editar"><i class="fa fa-edit"></i></a>
                        <button  onclick="click_del('{{ route('admin.users.delete',$u->id) }}')" class="btn btn-xs btn-danger" title="Excluir"><i class="fa fa-close"></i></button>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div><!--/row-->
@stop
@section('scripts')
    <script>
        function click_del(url) {
            swal({
                        title: "Aviso",
                        text: "Tem certeza?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Sim, tenho!",
                        cancelButtonText: "Cancelar",
                        closeOnConfirm: false
                    },
                    function(){
                        window.location.href = url;
                    });
        }
    </script>
@stop