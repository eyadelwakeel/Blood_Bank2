@extends('website.layouts.app', ['bodyClass' => 'donation-request'])

@section('content')


<!--inside-article-->
<div class="all-requests">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                </ol>
            </nav>
        </div>

        <!--requests-->
        <div class="requests">
            <div class="head-text">
                <h2>طلبات التبرع</h2>
            </div>
            <div class="content">
                <form class="row filter">
                    <div class="col-md-5 blood">
                        <div class="form-group">
                            <div class="inside-select">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>اختر فصيلة الدم</option>
                                    <option>+A</option>
                                    <option>+B</option>
                                    <option>+AB</option>
                                    <option>-O</option>
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 city">
                        <div class="form-group">
                            <div class="inside-select">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>اختر المدينة</option>
                                    <option>المنصورة</option>
                                    <option>القاهرة</option>
                                    <option>الإسكندرية</option>
                                    <option>سوهاج</option>
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 search">
                        <button type="submit">
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
                            <li><span>مستشفى:</span> {{ $donationRequest->hospital }}</li>
                            <li><span>المدينة:</span> {{ $donationRequest->city->name }}</li>
                        </ul>
                        <a href="#">التفاصيل</a>
                    </div>
                    @endforeach
                </div>
                <div class="pages">
                    <nav aria-label="Page navigation example" dir="ltr">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            {{ $donationRequests->links() }}
                            <li class="page-item"><a class="page-link active" href="#"></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection