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
                            @foreach ($roles as $key=>$role)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                        <span class="badge badge-pill badge-outline-primary border"> {{ $permission->name }} </span>
                                    @endforeach
                                </td>
                                <td>{{$role->created_at->diffForHumans()}}</td>
                                <td>
                                    <a name="" id="" class="btn btn-primary" href="{{ route('admin.role.edit', $role->id) }}" role="button">Edit</a>
                                    <button class="btn btn-danger" onclick="deleteData({{ $role->id }})">Delete</button>
                                    <form id="delete-form-{{ $role->id }}" action="{{ route('admin.role.destroy',$role->id) }}" method="post" class="d-none">
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
                                    Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                    )
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
