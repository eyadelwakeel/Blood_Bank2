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
                <li class="breadcrumb-item active">Create Admin</li>
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
                    <h3 class="card-title">@lang('messages.create')</h3>
                </div>

                <form action="{{ route('admin.admins.store') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Admin Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="name"
                                placeholder="Enter governorate name"
                                required
                            >

                        </div>
                        <div class="form-group">
                            <label for="email">Admin Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                id="email"
                                placeholder="Enter admin email"
                                required
                            >
                        </div>
                        <div class="form-group">
                            <label for="password">Admin Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                id="password"
                                placeholder="Enter admin password"
                                required
                            >
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                id="password_confirmation"
                                placeholder="Confirm admin password"
                                required
                            >
                        </div>
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            @lang('messages.submit')
                        </button>
                    </div>

                </form>

            </div>
            <!-- /.card -->
        </div>
    </div>
</div>


    @endsection