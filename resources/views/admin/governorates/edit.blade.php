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
                <li class="breadcrumb-item active">Governorates List </li>
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

                <form action="{{ route('admin.governorates.update', $governorate->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Governorate Name</label>
                            <input
                                type="text"
                                value="{{ $governorate->name }}"
                                name="name"
                                class="form-control"
                                id="name"
                                placeholder="{{ $governorate->name }}"
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