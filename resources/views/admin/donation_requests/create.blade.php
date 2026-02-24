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
                <li class="breadcrumb-item active">Posts List </li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Create Donation Request</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.donation_requests.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Patient Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" name="age" id="age" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="blood_type_id" class="form-label">Blood Type</label>
                    <select name="blood_type_id" id="blood_type_id" class="form-select" required>
                        @foreach($bloodTypes as $bloodType)
                            <option value="{{ $bloodType->id }}">{{ $bloodType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="bags_number" class="form-label">Number of Bags</label>
                    <input type="number" name="bags_number" id="bags_number" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="hospital_name" class="form-label">Hospital Name</label>
                    <input type="text" name="hospital_name" id="hospital_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="city_id" class="form-label">City</label>
                    <select name="city_id" id="city_id" class="form-select" required>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="text" name="latitude" id="latitude" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="text" name="longitude" id="longitude" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea name="notes" id="notes" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('admin.donation_requests.index') }}" class="btn btn-secondary">Cancel</a>

            </form>
        </div>
    </div>
</div>


@endsection