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
                    <h3 class="card-title">Governorate List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{ route('admin.governorates.create') }}" class="btn btn-primary mb-3">Create Governorate</a>
                    @include('admin.layouts.partials.flash_messages')
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Cities Count</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($governorates as $governorate)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $governorate->name }}</td>
                                <td>{{ $governorate->cities_count }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.governorates.edit', $governorate->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                            @lang('messages.edit')
                                        </a>
                                        <form action="{{ route('admin.governorates.destroy', $governorate->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this governorate?')"><i class="fas fa-trash-alt"></i> @lang('messages.delete')</button>
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
                    {{ $governorates->links() }}
                </div>

            </div>
            <!-- /.card -->


        </div>


    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

@endsection