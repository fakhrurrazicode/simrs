@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header border-0">{{ __('User') }}</div>

                <div class="card-body">
                    <table id="table-data"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('scripts')
<script>
    $(function(){

        $('#table-data').bootstrapTable({
            toolbar: "#table-data-toolbar",
            classes: 'table table-striped table-no-bordered',
            search: true,
            showRefresh: true,
            iconsPrefix: 'fa',
            // showToggle: true,
            // showColumns: true,
            // showExport: true,
            // showPaginationSwitch: true,
            pagination: true,
            pageList: [10, 25, 50, 100, 'ALL'],
            // showFooter: false,
            sidePagination: 'server',
            url: '{{route('api.user.index')}}',
            columns: [
                {
                    field: 'id',
                    title: 'Action',
                    class: 'text-nowrap',
                    formatter: function(value, row, index){
                       
                        return `
                            <a class="btn btn-sm btn-info" href="${base_url + '/user/' + value + '/edit'}"><i class="fa fa-edit"></i> Ubah</a>
                            <form method="POST" action="${base_url + '/user/' + value}" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus data ${row.name}?')">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        `;
                    }
                },
                {
                    field: 'name',
                    title: 'Name',
                },
                {
                    field: 'email',
                    title: 'Email',
                },
                {
                    field: 'roles_name',
                    title: 'Roles',
                    formatter: function(roles_name){
                        if(roles_name.length){
                            return '<span class="py-1 px-2 badge badge-success">' + roles_name.join('</span> <span class="py-1 px-2 badge badge-success">Aktif') + '</span>';
                        }
                    }
                },
                {
                    field: 'created_at',
                    title: 'Created at',
                },
                {
                    field: 'updated_at',
                    title: 'Updated at',
                },
            ]
        });

    });
</script>