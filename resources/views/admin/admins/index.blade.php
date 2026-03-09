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
                <li class="breadcrumb-item active">Admin List </li>
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
                    <h3 class="card-title">Admins List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{ route('admin.admins.create') }}" class="btn btn-primary mb-3">Create Admin</a>
                    @include('admin.layouts.partials.flash_messages')


                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    @if(auth()->id() != $admin->id)
                                    <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->


            </div>
            <!-- /.card -->


        </div>


    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

@endsection