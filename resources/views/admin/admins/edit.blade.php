@extends('admin.layouts.main')
@section('pade_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">@lang('messages.dashboard')</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Edit Profile</li>
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
                    <h3 class="card-title">@lang('messages.edite')</h3>
                </div>

                <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                value="{{ old('name', $admin->name) }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control"
                                value="{{ $admin->email }}"
                                readonly>
                            <small class="text-muted">Email cannot be changed.</small>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label for="password" class="form-label">old Password</label>
                            <input
                                type="password"
                                name="current_password"
                                id="current_password"
                                class="form-control"
                                placeholder="Enter current password to change it">
                        </div>

                        <hr>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password (optional):</label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                placeholder="Leave empty if you don't want to change">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password:</label>
                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="form-control"
                                placeholder="Confirm new password">
                        </div>

                    </div> <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            @lang('messages.submit')
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
                    </div>

                </form>

            </div> <!-- /.card -->
        </div>
    </div>
</div>

<div class="text-center mt-4">
    <a href="{{ route('admin.admins.index') }}" class="btn btn-secondary px-4">Back</a>
</div>

@endsection