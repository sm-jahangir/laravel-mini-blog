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
                                <th>USERNAME</th>
                                <th>ROLE</th>
                                <th>CREATED AT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key=>$user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge badge-pill badge-success">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>
                                    <a name="" id="" class="btn btn-primary" href="{{ route('admin.user.edit', $user->id) }}" user="button">Edit</a>
                                    <button class="btn btn-danger" onclick="deleteData({{ $user->id }})">Delete</button>
                                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.user.destroy',$user->id) }}" method="post" class="d-none">
                                        @method('DELETE')
                                        @csrf
                                    </form>
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
                    <script>
                        function deleteData(id) {
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    document.getElementById('delete-form-'+id).submit();
                                }
                                })
                        }
                    </script>
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
