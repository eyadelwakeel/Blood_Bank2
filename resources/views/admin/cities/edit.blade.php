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
                <li class="breadcrumb-item active">Cities List </li>
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

                <form action="{{ route('admin.cities.update', $city->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">City Name</label>
                            <input
                                type="text"
                                value="{{ $city->name }}"
                                name="name"
                                class="form-control"
                                id="name"
                                placeholder="{{ $city->name }}"
                                required>
                            <label for="governorate_id">The governorate to which it belongs</label>
                            <select name="governorate_id" class="form-control" id="governorate_id" required>
                                <option value="">Select a governorate</option>
                                @foreach($governorates as $governorate)
                                <option value="{{ $governorate->id }}" {{ $city->governorate_id == $governorate->id ? 'selected' : '' }}>
                                    {{ $governorate->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

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