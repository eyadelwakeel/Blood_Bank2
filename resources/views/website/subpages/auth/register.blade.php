@extends('website.layouts.app', ['bodyClass' => 'create'])

@section('content')
<div class="form">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('website.home') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('website.register') }}">انشاء حساب جديد</a></li>
                </ol>
            </nav>
        </div>
        <div class="account-form">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('website.register.submit') }}" method="POST">
                @csrf
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="الإسم">

                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="البريد الإلكترونى">

                <input placeholder="تاريخ الميلاد" class="form-control" type="text" onfocus="(this.type='date')" id="birth_date" name="birth_date">

                <select class="form-control" id="blood_type" name="blood_type_id">
                    <option selected disabled hidden value="">فصيلة الدم</option>
                    @foreach ($blood_types as $blood_type)
                    <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                    @endforeach
                </select>

                <select class="form-control" id="governorates" name="governorate_id">
                    <option selected disabled hidden value="">المحافظة</option>
                    @foreach ($governorates as $governorate)
                    <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                    @endforeach
                </select>

                <select class="form-control" id="cities" name="city_id">
                    <option selected disabled hidden value="">المدينة</option>
                </select>

                <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp" placeholder="رقم الهاتف">

                <input placeholder="آخر تاريخ تبرع" class="form-control" type="text" onfocus="(this.type='date')" id="last_donation_date" name="last_donation_date">

                <input type="password" class="form-control" id="password" name="password" placeholder="كلمة المرور">

                <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="تأكيد كلمة المرور">

                <div class="create-btn">
                    <input type="submit" value="إنشاء"></input>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $('#governorates').on('change', function() {
            var governorateID = $(this).val();
            if (governorateID) {
                $.ajax({
                    url: "{{ route('website.cities', ':id') }}".replace(':id', governorateID),
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#cities').empty().append('<option selected disabled hidden value="">اختر المدينة</option>');
                        $.each(data, function(key, value) {
                            $('#cities').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            } else {
                $('#cities').empty();
            }
        });
    });
</script>
@endsection

@endsection