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
                <li class="breadcrumb-item active">Edit Post</li>
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

                <form action="{{ route('admin.donation-requests.update', $donationRequest->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Donation Request Name</label>
                            <input
                                type="text"
                                value="{{ $donationRequest->name }}"
                                name="name"
                                class="form-control"
                                id="name"
                                placeholder="{{ $donationRequest->name }}"
                                required
                            >

                        </div>
                       
                        <div class="form-group">
                            <label for="blood_type">Blood Type</label>
                            <select
                                name="blood_type_id"
                                class="form-control"
                                id="blood_type"
                                required
                            >
                                @foreach($bloodTypes as $bloodType)
                                    <option value="{{ $bloodType->id }}"
                                        {{ $donationRequest->blood_type_id == $bloodType->id ? 'selected' : '' }}>
                                        {{ $bloodType->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input
                                type="text"
                                value="{{ $donationRequest->latitude }}"
                                name="latitude"
                                class="form-control"
                                id="latitude"
                                placeholder="{{ $donationRequest->latitude }}"
                                required
                            >
                        </div>
                         <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input
                                type="text"
                                value="{{ $donationRequest->longitude }}"
                                name="longitude"
                                class="form-control"
                                id="longitude"
                                placeholder="{{ $donationRequest->longitude }}"
                                required
                            >
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <select
                                name="city_id"
                                class="form-control"
                                id="city"
                                required
                            >
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ $donationRequest->city_id == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="longitude">Phone</label>
                            <input
                                type="text"
                                value="{{ $donationRequest->phone }}"
                                name="phone"
                                class="form-control"
                                id="phone"
                                placeholder="{{ $donationRequest->phone }}"
                                required
                            >
                        </div>
                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <input
                                type="text"
                                value="{{ $donationRequest->notes }}"
                                name="notes"
                                class="form-control"
                                id="notes"
                                placeholder="{{ $donationRequest->notes }}"
                                required
                            >
                        </div>
                        <div class="form-group">
                            <label for="hospital_name">Hospital Name</label>
                            <input
                                type="text"
                                value="{{ $donationRequest->hospital_name }}"
                                name="hospital_name"
                                class="form-control"
                                id="hospital_name"
                                placeholder="{{ $donationRequest->hospital_name }}"
                                required
                            >
                        </div>
                        <div class="form-group">
                            <label for="bags_number">Bags Number</label>
                            <input
                                type="text"
                                value="{{ $donationRequest->bags_number }}"
                                name="bags_number"
                                class="form-control"
                                id="bags_number"
                                placeholder="{{ $donationRequest->bags_number }}"
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