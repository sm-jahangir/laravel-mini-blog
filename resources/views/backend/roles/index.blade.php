@extends('layouts.backend.app')
@section('BackendMainContent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>PERMISSIONS</th>
                                <th>CREATED AT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                        <span class="badge badge-pill badge-outline-primary border"> {{ $permission->name }} </span>
                                    @endforeach
                                </td>
                                <td>{{$role->created_at->diffForHumans()}}</td>
                                <td>
                                    <a name="" id="" class="btn btn-primary" href="#" role="button">Edit</a>
                                    <a name="" id="" class="btn btn-danger" href="#" role="button">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                                
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>PERMISSIONS</th>
                                <th>CREATED AT</th>
                                <th>ACTION</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
@push('js')
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

</script>
@endpush
