
@extends('admin.layouts.main')

@section('pade_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile</h3>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $admin->name }}" class="form-control" id="name" placeholder="Enter name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ $admin->email }}" class="form-control" id="email" placeholder="Enter email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter new password (leave blank to keep current)">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection