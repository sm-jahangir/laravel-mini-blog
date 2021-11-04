@extends('layouts.backend.app')
@section('BackendMainContent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Role Create</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Role Create</li>
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
                <form action="{{route('admin.role.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <label for="role">Role Name</label>
                        <input type="text"
                            class="form-control" name="name" id="role" placeholder="Please Enter Your Role Name">
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="status" id="status" value="1" checked>
                            Status
                        </label>
                        </div>
                        <div class="row">
                            @foreach ($all_permissions as $permission)
                            <div class="col col-md-4">
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="" value="{{ $permission->name }}">
                                    {{$permission->name}}
                                </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-success">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection