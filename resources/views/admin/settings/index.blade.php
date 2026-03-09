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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Settings</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{ route('admin.settings.edit') }}" class="btn btn-primary mb-3">Edit Settings</a>
                    @include('admin.layouts.partials.flash_messages')
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>phone</th>
                                <th>email</th>
                                <th>Facebook</th>
                                <th>Twitter</th>
                                <th>App Store</th>
                                <th>YouTube</th>
                                <th>About App</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                                <td>{{ $settings->first()->phone }}</td>
                                <td>{{ $settings->first()->email }}</td>
                                <td>{{ $settings->first()->fb_url }}</td>
                                <td>{{ $settings->first()->x_url }}</td>
                                <td>{{ $settings->first()->app_store_url }}</td>
                                <td>{{ $settings->first()->youtube_url }}</td>
                                <td>{{ $settings->first()->about_app }}</td>
                                
                            </tr>


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $users->appends(request()->query())->links() }}

                </div>

                <a href="{{ route('admin.settings.edit') }}" class="btn btn-primary mb-3">Edit Settings</a>
            </div>
            <!-- /.card -->


        </div>


    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

@endsection