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
                <li class="breadcrumb-item active">Settings </li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mx-auto">

            <div class="card card-primary">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">App Settings</h3>

                    <a href="{{ route('admin.settings.edit') }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>

                <div class="card-body">

                    @include('admin.layouts.partials.flash_messages')

                   

                    <table class="table table-striped table-hover">
                        <tbody>

                            <tr>
                                <th width="30%">📞 Phone</th>
                                <td>{{ $settings->phone ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>📧 Email</th>
                                <td>{{ $settings->email ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>📘 Facebook</th>
                                <td>{{ $settings->email ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>🐦 Twitter</th>
                                <td>{{ $settings->x_url ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>🍎 App Store</th>
                                <td>{{ $settings->app_store_url ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>▶️ YouTube</th>
                                <td>{{ $settings->youtube_url ?? '-' }}</td>
                            </tr>

                            <tr>
                                <th>📱 About App</th>
                                <td>{{ $settings->about_app ?? '-' }}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
</div>

@endsection