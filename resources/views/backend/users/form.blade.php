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
                <div class="card-header bg-primary border-success">
                    <strong>User Registration</strong>
                </div>
                <form action="{{ route('admin.user.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text"
                                        class="form-control" name="name" id="name" placeholder="Please Enter Your Name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="username">User name</label>
                                    <input type="text"
                                        class="form-control" name="username" id="username" placeholder="Please Enter Your Username">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email"
                                        class="form-control" name="email" id="Email" placeholder="Please Enter Your Email">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                  <label for="role">Select Any Role</label>
                                  <select class="form-control" name="role" id="role">
                                      @foreach ($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                      @endforeach
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                  <label for="password">Password</label>
                                  <input type="password"
                                    class="form-control" name="password" id="password" placeholder="******">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                  <label for="password_confirmation">Confirmation Password</label>
                                  <input type="password"
                                    class="form-control" name="password_confirmation" id="password_confirmation" placeholder="******">
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="status" id="status" value="1" checked>
                            Status
                        </label>
                        </div>
                        <div class="row">
                            
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