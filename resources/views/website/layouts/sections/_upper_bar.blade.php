        <!--upper-bar-->
        <div class="upper-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="language">
                            <a href="index.html" class="ar active">عربى</a>
                            <a href="index-ltr.html" class="en inactive">EN</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="social">
                            <div class="icons">
                                <a href="{{ $settings->fb_url }}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{ $settings->instagram_url }}" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a href="{{ $settings->x_url }}" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="{{ 'https://wa.me/'.$settings->phone }}" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- not a member-->
                    <div class="col-lg-4">
                        <div class="info" dir="ltr">
                            <div class="phone">
                                <i class="fas fa-phone-alt"></i>
                                <p>{{ $settings->phone }}</p>
                            </div>
                            <div class="e-mail">
                                <i class="far fa-envelope"></i>
                                <p>{{ $settings->email }}</p>
                            </div>
                        </div>
                     
                        
                    </div>
                </div>
            </div>
        </div>