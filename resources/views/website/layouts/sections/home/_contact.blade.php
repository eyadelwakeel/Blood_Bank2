<!--contact-->
        <div class="contact">
            <div class="container">
                <div class="col-md-7">
                    <div class="title">
                        <h3>اتصل بنا</h3>
                    </div>
                    <p class="text">يمكنك الإتصال بنا للإستفسار عن معلومة وسيتم الرد عليكم</p>
                    <div class="row whatsapp">
                        <a href="#">
                            <img src="{{ asset('website/assets/imgs/whats.png') }}">
                            <p dir="ltr" href="{{ 'https://wa.me/'.$settings->phone ?? '#' }}" target="_blank">
                                {{ $settings->phone ?? '01011588455' }}
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>