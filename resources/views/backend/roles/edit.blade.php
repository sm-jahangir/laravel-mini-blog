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
                <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                        <label for="role">Role Name</label>
                        <input type="text"
                            class="form-control" name="name" id="role" placeholder="Please Enter Your Role Name" value="{{ $role->name }}">
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

                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="permissions[]" class="custom-control-input" value="{{$permission->name}}" id="side-off-{{$permission->id}}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="side-off-{{$permission->id}}">
                                            <span style="font-size: 13px;" class="badge badge-pill badge-white border">{{$permission->name}}</span>
                                        </label>
                                    </div>
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