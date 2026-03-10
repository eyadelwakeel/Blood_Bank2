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
                <li class="breadcrumb-item active">Edit Settings</li>
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

                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="phone">@lang('messages.phone')</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="{{ $settings->phone }}" placeholder="@lang('messages.enter') @lang('messages.phone')">
                        </div>
                        <div class="form-group">
                            <label for="email">@lang('messages.email')</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $settings->email }}" placeholder="@lang('messages.enter') @lang('messages.email')">
                        </div>
                        <div class="form-group">
                            <label for="fb_url">@lang('messages.fb_url')</label>
                            <input type="url" name="fb_url" class="form-control" id="fb_url" value="{{ $settings->fb_url }}" placeholder="@lang('messages.enter') @lang('messages.fb_url')">
                        </div>
                        <div class="form-group">
                            <label for="x_url">@lang('messages.x_url')</label>
                            <input type="url" name="x_url" class="form-control" id="x_url" value="{{ $settings->x_url }}" placeholder="@lang('messages.enter') @lang('messages.x_url')">
                        </div>
                        <div class="form-group">
                            <label for="app_store_url">@lang('messages.app_store_url')</label>
                            <input type="url" name="app_store_url" class="form-control" id="app_store_url" value="{{ $settings->app_store_url }}" placeholder="@lang('messages.enter') @lang('messages.app_store_url')">
                        </div>
                        <div class="form-group">
                            <label for="youtube_url">@lang('messages.youtube_url')</label>
                            <input type="url" name="youtube_url" class="form-control" id="youtube_url" value="{{ $settings->youtube_url }}" placeholder="@lang('messages.enter') @lang('messages.youtube_url')">
                        </div>
                        <div class="form-group">
                            <label for="about_app">@lang('messages.about_app')</label>
                            <textarea name="about_app" class="form-control" id="about_app" placeholder="@lang('messages.enter') @lang('messages.about_app')">{{ $settings->about_app }}</textarea>
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