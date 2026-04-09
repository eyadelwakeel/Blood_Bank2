@extends('website.layouts.app', ['bodyClass' => 'contact-us'])

@section('content')

<!--contact-us-->
<div class="contact-now">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                </ol>
            </nav>
        </div>
        <div class="row methods">
            <div class="col-md-6">
                <div class="call">
                    <div class="title">
                        <h4>اتصل بنا</h4>
                    </div>
                    <div class="content">
                        <div class="logo">
                            <img src="{{ asset('website/assets/imgs/logo.png') }}">
                        </div>
                        <div class="details">
                            <!-- 'phone',
                            'email',
                            'fb_url',
                            'x_url',
                            'app_store_url',
                            'youtube_url',
                            'about_app', -->
                            <ul>
                                <li><span>الجوال:</span> {{ $settings->phone ?? '' }}</li>
                                <li><span>فاكس:</span> {{ $settings->fax ?? '589654' }}</li>
                                <li><span>البريد الإلكترونى:</span> {{ $settings->email ?? '' }}</li>
                            </ul>
                        </div>
                        <div class="social">
                            <h4>تواصل معنا</h4>
                            <div class="icons" dir="ltr">
                                <div class="out-icon">
                                    <a href="{{ $settings->fb_url ?? '#' }}" target="_blank"><img src="{{ asset('website/assets/imgs/001-facebook.svg') }}"></a>
                                </div>
                                <div class="out-icon">
                                    <a href="{{ $settings->x_url ?? '#' }}" target="_blank"><img src="{{ asset('website/assets/imgs/002-twitter.svg') }}"></a>
                                </div>
                                <div class="out-icon">
                                    <a href="{{ $settings->youtube_url ?? '#' }}" target="_blank"><img src="{{ asset('website/assets/imgs/003-youtube.svg') }}"></a>
                                </div>
                                <div class="out-icon">
                                    <a href="{{ $settings->instagram_url ?? '#' }}" target="_blank"><img src="{{ asset('website/assets/imgs/004-instagram.svg') }}"></a>
                                </div>
                                <div class="out-icon">
                                    <a href="{{ $settings->whatsapp_url ?? '#' }}" target="_blank"><img src="{{ asset('website/assets/imgs/005-whatsapp.svg') }}"></a>
                                </div>
                                <div class="out-icon">
                                    <a href="{{ $settings->google_plus_url ?? '#' }}" target="_blank"><img src="{{ asset('website/assets/imgs/006-google-plus.svg') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-form">
                    <div class="title">
                        <h4>تواصل معنا</h4>
                    </div>
                    <div class="fields">
                        <form action="{{ route('website.contact-us.send') }}" method="post">
                            @csrf
                            
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الإسم" name="name" value="{{ old('name', $name) }}">
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="البريد الإلكترونى" name="email" value="{{ old('email', $email) }}">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الجوال" name="phone" value="{{ old('phone', $phone) }}">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="عنوان الرسالة" name="title">
                            <textarea placeholder="نص الرسالة" class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
                            <button type="submit">ارسال</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

