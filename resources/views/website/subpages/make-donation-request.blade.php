@extends('website.layouts.app')

@section('content')

<div class="donation-request py-5">
    <div class="container">

        <h3 class="text-center mb-4">إنشاء طلب تبرع</h3>

        <form method="POST" action="{{ route('website.store-donation-request') }}">
            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <input type="text" name="name" class="form-control" placeholder="الاسم" required>
                </div>

                <div class="col-md-6 mb-3">
                    <input type="number" name="age" class="form-control" placeholder="العمر" required>
                </div>

                <div class="col-md-6 mb-3">
                    <select name="blood_type_id" class="form-control" required>
                        <option value="">اختر فصيلة الدم</option>
                        @foreach($bloodTypes as $bloodType)
                        <option value="{{ $bloodType->id }}">{{ $bloodType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <input type="text" name="hospital_name" class="form-control" placeholder="اسم المستشفى" required>
                </div>

                <div class="col-md-6 mb-3">
                    <select id="governorate" class="form-control" required>
                        <option value="">اختر المحافظة</option>
                        @foreach($governorates as $gov)
                        <option value="{{ $gov->id }}">{{ $gov->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <select name="city_id" id="city" class="form-control" required>
                        <option value="">اختر المدينة</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <input type="text" name="phone" class="form-control" placeholder="رقم الهاتف" required>
                </div>

                <div class="col-md-6 mb-3">
                    <input type="number" name="bags_number" class="form-control" placeholder="عدد الأكياس" required>
                </div>

                <div class="col-md-12 mb-3">
                    <textarea name="notes" class="form-control" rows="4" placeholder="ملاحظات"></textarea>
                </div>

                <!-- hidden location -->
                <input type="hidden" name="latitude" id="lat">
                <input type="hidden" name="longitude" id="lng">

                <div class="col-md-12 text-center">
                    <button class="btn btn-danger px-5">إرسال الطلب</button>
                </div>

            </div>
        </form>

    </div>
</div>

@endsection

@section('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('governorate').addEventListener('change', function () {

        let govId = this.value;

        if (!govId) return;

        fetch("{{ url('website/get-cities') }}/" + govId)
            .then(res => res.json())
            .then(data => {

                let city = document.getElementById('city');

                city.innerHTML = '<option value="">اختر المدينة</option>';

                data.forEach(item => {
                    city.innerHTML += `<option value="${item.id}">${item.name}</option>`;
                });

            })
            .catch(err => console.log('error:', err));

    });

});
</script>

@endsection