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

                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Post Title</label>
                            <input
                                type="text"
                                value="{{ $post->title }}"
                                name="title"
                                class="form-control"
                                id="title"
                                placeholder="{{ $post->title }}"
                                required
                            >

                        </div>
                        <div class="form-group">
                            <label for="content">Post Content</label>
                            <textarea
                                name="content"
                                class="form-control"
                                id="content"
                                placeholder="{{ $post->content }}"
                                required
                            >{{ $post->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select
                                name="category_id"
                                class="form-control"
                                id="category"
                                required
                            >
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
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