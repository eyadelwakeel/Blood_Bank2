@extends('admin.layouts.main')

@section('page_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">@lang('messages.dashboard')</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Users List</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">@lang('messages.edite')</h3>
                </div>

                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group">

                            <label>User Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>

                            <label>User Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>

                            <label>User Phone</label>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" required>

                            <label>User Blood Type</label>
                            <select name="blood_type_id" class="form-control" required>
                                <option value="">Select Blood Type</option>
                                @foreach($bloodTypes as $bloodType)
                                <option value="{{ $bloodType->id }}"
                                    {{ $user->blood_type_id == $bloodType->id ? 'selected' : '' }}>
                                    {{ $bloodType->name }}
                                </option>
                                @endforeach
                            </select>

                            <label>User City</label>
                            <select name="city_id" class="form-control" required>
                                <option value="">Select City</option>
                                @foreach($cities as $city)
                                <option value="{{ $city->id }}"
                                    {{ $user->city_id == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                                @endforeach
                            </select>

                            <label>User Status</label>
                            <select name="is_active" class="form-control" required>
                                <option value="1" {{ $user->is_active ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="0" {{ !$user->is_active ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>

                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            @lang('messages.submit')
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

@endsection