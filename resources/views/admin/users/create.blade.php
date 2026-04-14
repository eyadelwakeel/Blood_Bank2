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
                    <h3 class="card-title">@lang('messages.create')</h3>
                </div>

                 <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">

                            <label>User Name</label>
                            <input type="text" name="name" class="form-control" required>

                            <label>User Email</label>
                            <input type="email" name="email" class="form-control" required>

                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" required>

                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>

                            <label>Birth Date</label>
                            <input type="date" name="birth_date" class="form-control">

                            <label>Last Donation Date</label>
                            <input type="date" name="last_donation_date" class="form-control">

                            <label>Blood Type</label>
                            <select name="blood_type_id" class="form-control" required>
                                <option value="">Select Blood Type</option>
                                @foreach($bloodTypes as $bloodType)
                                    <option value="{{ $bloodType->id }}">
                                        {{ $bloodType->name }}
                                    </option>
                                @endforeach
                            </select>

                            <label>City</label>
                            <select name="city_id" class="form-control" required>
                                <option value="">Select City</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>

                            <label>Status</label>
                            <select name="is_active" class="form-control" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>

                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">
                            Save
                        </button>
                    </div>

                </form>

            </div>
            <!-- /.card -->
        </div>
    </div>
</div>


    @endsection