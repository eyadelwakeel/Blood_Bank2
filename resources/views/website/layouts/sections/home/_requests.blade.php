<!--requests-->
<div class="requests">
    <div class="container">
        <div class="head-text">
            <h2>طلبات التبرع</h2>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <form class="row filter" method="GET" action="{{ route('website.donation-requests') }}">

                <div class="col-md-5 blood">
                    <div class="form-group">
                        <div class="inside-select">
                            <select name="blood_type_id" class="form-control">
                                <option value="">اختر فصيلة الدم</option>
                                @foreach ($bloodTypes as $bloodType)
                                <option value="{{ $bloodType->id }}"
                                    {{ request('blood_type_id') == $bloodType->id ? 'selected' : '' }}>
                                    {{ $bloodType->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 city">
                    <div class="form-group">
                        <div class="inside-select">
                            <select name="city_id" class="form-control">
                                <option value="">اختر المدينة</option>
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}"
                                    {{ request('city_id') == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 search">
                    <button type="submit" class="btn btn-secondary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

            </form>
              <div class="patients">
                    @foreach ($donationRequests as $donationRequest)

                    <div class="details">
                        <div class="blood-type">
                            <h2 dir="ltr">{{ $donationRequest->bloodType->name }}</h2>
                        </div>
                        <ul>
                            <li><span>اسم الحالة:</span> {{ $donationRequest->name }}</li>
                            <li><span>مستشفى:</span> {{ $donationRequest->hospital_name }}</li>
                            <li><span>المحافظة:</span> {{ $donationRequest->city->governorate->name }}</li>
                            <li><span>المدينة:</span> {{ $donationRequest->city->name }}</li>
                            <li><span>الهاتف:</span> {{ $donationRequest->phone }}</li>

                        </ul>
                    </div>
                    @endforeach
                </div>
            <div class="more">
                <a href="{{ route('website.donation-requests') }}">المزيد</a>
            </div>
        </div>
    </div>
</div>