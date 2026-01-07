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
                <li class="breadcrumb-item active">Users List </li>
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
                    <h3 class="card-title">Users List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Create User</a>
                    @include('admin.layouts.partials.flash_messages')
                    <form method="GET" action="{{ route('admin.users.index') }}" class="mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <select name="governorate_id" class="form-control">
                                    <option value="">-- اختر المحافظة --</option>
                                    @foreach($governorates as $governorate)
                                    <option value="{{ $governorate->id }}"
                                        {{ request('governorate_id') == $governorate->id ? 'selected' : '' }}>
                                        {{ $governorate->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Governorate Filter</button>
                            </div>
                        </div>
                    </form>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Governorate</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->city?->name }}</td>
                                <td>{{ $user->city?->governorate?->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @if($user->is_active)
                                    <span class="badge badge-success mr-2">Active</span>
                                    @else
                                    <span class="badge badge-danger mr-2">Inactive</span>
                                    @endif

                                    <form action="{{ route('admin.users.toggle', $user->id) }}"
                                        method="POST"
                                        style="display:inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            onclick="return confirm('هل أنت متأكد من تغيير الحالة؟')"
                                            class="btn btn-sm {{ $user->is_active ? 'btn-warning' : 'btn-success' }}">
                                            {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>
                                </td>


                                <td>
                                    <div class="btn-group">
                                        <!-- <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                            @lang('messages.edit')
                                        </a> -->
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this patient?')"><i class="fas fa-trash-alt"></i> @lang('messages.delete')</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $users->appends(request()->query())->links() }}

                </div>

            </div>
            <!-- /.card -->


        </div>


    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

@endsection