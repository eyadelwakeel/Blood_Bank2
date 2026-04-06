@extends('website.layouts.app', ['bodyClass' => 'signin-account'])


@section('content')
  
      <!--form-->
    <div class="form">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                </ol>
            </nav>
        </div>
        <div class="signin-form">
            <!-- الفورم هنا -->
            <form action="{{ route('website.login.submit') }}" method="POST">
                @csrf
                <div class="logo">
                    <img src="{{ asset('website/assets/imgs/logo.png') }}">
                </div>
                <div class="form-group">
                    <input type="text" name="phone" class="form-control" placeholder="الجوال">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="كلمة المرور">
                </div>
                <div class="row options">
                    <div class="col-md-6 remember">
                        <div class="form-group form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                        </div>
                    </div>
                    <div class="col-md-6 forgot">
                        <img src="{{ asset('website/assets/imgs/complain.png') }}">
                        <a href="#">هل نسيت كلمة المرور</a>
                    </div>
                </div>
                <div class="row buttons">
                    <div class="col-md-6 right">
                        <button type="submit" class="btn btn-primary">دخول</button>
                    </div>
                    <div class="col-md-6 left">
                        {{-- <a href="{{ route('website.create-account') }}">انشاء حساب جديد</a> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection