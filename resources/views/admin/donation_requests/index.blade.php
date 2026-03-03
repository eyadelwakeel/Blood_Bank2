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
                <li class="breadcrumb-item active">Donation Requests List </li>
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
                    <h3 class="card-title">Donation Requests List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{ route('admin.donation-requests.create') }}" class="btn btn-primary mb-3">Create Donation Request</a>
                    @include('admin.layouts.partials.flash_messages')
                    <form method="GET" action="{{ route('admin.donation-requests.index') }}" class="mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <select name="city_id" class="form-select">
                                    <option value="">-- Filter By City --</option>
                                    @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ request('city_id') == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <select name="blood_type_id" class="form-select">
                                    <option value="">-- Filter By Blood Type --</option>
                                    @foreach($bloodTypes as $bloodType)
                                    <option value="{{ $bloodType->id }}" {{ request('blood_type_id') == $bloodType->id ? 'selected' : '' }}>
                                        {{ $bloodType->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="{{ route('admin.donation-requests.index') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>

                                <th>Blood Type</th>
                                <th>City</th>
                                <th>Phone</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donationRequests as $donationRequest)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $donationRequest->bloodType->name }}</td>
                                <td>{{ $donationRequest->city->name }}</td>
                                <td>{{ $donationRequest->phone }}</td>
                                <td>

                                    <div class="btn-group">
                                        <a href="{{ route('admin.donation-requests.edit', $donationRequest->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                            @lang('messages.edit')
                                        </a>
                                        <a href="{{ route('admin.donation-requests.show', $donationRequest->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                            @lang('messages.show')
                                        </a>

                                        <form action="{{ route('admin.donation-requests.destroy', $donationRequest->id) }}"
                                            method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this post?')">
                                                <i class="fas fa-trash-alt"></i>
                                                @lang('messages.delete')
                                            </button>
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
                    {{ $donationRequests->links() }}
                </div>

            </div>
            <!-- /.card -->


        </div>


    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

@endsection