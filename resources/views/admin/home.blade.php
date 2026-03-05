@extends('admin.layouts.main')

@section('pade_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/admin') }}">@lang('messages.home')</a></li>
          <li class="breadcrumb-item active">@lang('messages.dashboard')</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection

@section('content')

<div class="container-fluid">
  <div class="row">

    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $usersCount }}</h3>
          <p>Users</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $donationRequestsCount }}</h3>
          <p>Donation Requests</p>
        </div>
        <div class="icon">
          <i class="fas fa-hand-holding-heart"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $categoriesCount }}</h3>
          <p>Categories</p>
        </div>
        <div class="icon">
          <i class="fas fa-list"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $postsCount }}</h3>
          <p>Posts</p>
        </div>
        <div class="icon">
          <i class="fas fa-newspaper"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{ $governoratesCount }}</h3>
          <p>Governorates</p>
        </div>
        <div class="icon">
          <i class="fas fa-map"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-secondary">
        <div class="inner">
          <h3>{{ $citiesCount }}</h3>
          <p>Cities</p>
        </div>
        <div class="icon">
          <i class="fas fa-city"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-dark">
        <div class="inner">
          <h3>{{ $bloodTypesCount }}</h3>
          <p>Blood Types</p>
        </div>
        <div class="icon">
          <i class="fas fa-tint"></i>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection