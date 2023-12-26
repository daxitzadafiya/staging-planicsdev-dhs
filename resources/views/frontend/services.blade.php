<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }} - Services</title>

    <!-- favicon here-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/fav-icon.png') }}" />

    <!-- Bootstrap here -->
    <link href="{{ asset('frontend/assets/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- animate css -->
    <link href="{{ asset('frontend/assets/css/animate.min.css') }}" rel="stylesheet" />

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owlcarousel/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owlcarousel/assets/owl.theme.default.min.css') }}" />

    <!-- slick -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/js/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/js/slick/slick-theme.css') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
    @include('frontend.common.header', [
        "page" => "Services"
    ])

    @foreach ($services as $key => $service)
        <section class="all_services_wrapper wow fadeInDown" data-wow-delay=".3s">
            <div class="container">
                <div class="row align-items-center">
                    @if($key % 2 != 0)
                        <div class="col-lg-7 p-lg-0 flex-order">
                            <div class="all_services-img">
                                <img src="{{ url(Storage::url($service->image)) }}" alt="">
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-5 p-lg-0">
                        <div class="{{ $key % 2 != 0 ? 'all_services_position_right' : 'all_services_position' }}">
                            <div class="all_services-content {{ $key % 2 != 0 ? 'all_services-content_right' : '' }}">
                                <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ $service->title }}</h2>
                                <p class="wow fadeInUp" data-wow-delay=".5s">
                                    {{ $service->description }}
                                </p>
                                <div class="All_services_list mb-3 wow fadeInUp" data-wow-delay=".6s">
                                    <ul>
                                        @foreach ($service->service_categories as $service_category)  
                                            <li> 
                                                <img src="{{ asset('frontend/assets/img/servicepage/check.png') }}" class="me-2" alt="">
                                                {{ $service_category->title }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <a href="{{ route('frontend.'.$service->slug) ?? 'javascript:void(0)' }}" target="{{ isset($service->link_url) ? '_blank' : '_self' }}" class="btn wow fadeInUp" data-wow-delay=".7s">{{ $service->link_text }}</a>
                            </div>
                        </div>
                    </div>
                    @if($key % 2 == 0)
                        <div class="col-lg-7 p-lg-0">
                            <div class="all_services-img">
                                <img src="{{ url(Storage::url($service->image)) }}" alt="">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endforeach

    <!-- achievement-services start -->
    <section class="achievement-services-wrapper padding">
        <div class="container">
            <div class="section-title">
                <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ $setting->achievement_title }}</h2>
                <p class="wow fadeInUp" data-wow-delay=".5s">
                    {{ $setting->achievement_description }}
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-3 wow fadeInLeft" data-wow-delay=".4s">
                    <div class="achievement-services-logo">
                        <img src="{{ url(Storage::url($setting->achievement_logo)) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-9 wow fadeInRight" data-wow-delay=".5s">
                    <div class="d-none d-lg-block">
                        <div class="row align-items-lg-center justify-content-center">
                            @foreach ($achievement_rows as $achievement_row)
                                <div class="col-lg-2 ">
                                    @foreach ($achievement_row as $achievement)
                                        <div class="achievement-services-card {{ $loop->last ? '' : 'achievement-services-margin' }}">
                                            <div>
                                                <img src="{{ url(Storage::url($achievement['image'])) }}">
                                                <h4>{{ $achievement['title'] }}</h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="d-lg-none d-block">
                        <div class="row align-items-lg-center">
                            <div class="col-sm-3 col-6">
                                <div class="achievement-services-card achievement-services-margin">
                                    <div>
                                        <img src="{{ asset('frontend/assets/img/servicepage/achievements/achievementsimg1.png') }}">
                                        <h4>E-Commerce</h4>
                                    </div>
                                </div>
                                <div class="achievement-services-card">
                                    <div>
                                        <img src="{{ asset('frontend/assets/img/servicepage/achievements/achievementsimg2.png') }}">
                                        <h4>Repair</h4>
                                    </div>
                                </div>
                                <div class="achievement-services-card">
                                    <div>
                                        <img src="{{ asset('frontend/assets/img/servicepage/achievements/achievementsimg12.png') }}">
                                        <h4>Finance</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-6">
                                <div class="achievement-services-card achievement-services-margin">
                                    <div>
                                        <img src="{{ asset('frontend/assets/img/servicepage/achievements/achievementsimg3.png') }}">
                                        <h4>Real Estate</h4>
                                    </div>
                                </div>
                                <div class="achievement-services-card achievement-services-margin">
                                    <div>
                                        <img src="{{ asset('frontend/assets/img/servicepage/achievements/achievementsimg4.png') }}">
                                        <h4>Multi-Media</h4>
                                    </div>
                                </div>
                                <div class="achievement-services-card">
                                    <div>
                                        <img src="{{ asset('frontend/assets/img/servicepage/achievements/achievementsimg5.png') }}">
                                        <h4>Restaurants</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-6">
                                <div class="achievement-services-card achievement-services-margin">
                                    <div>
                                        <img src="{{ asset('frontend/assets/img/servicepage/achievements/achievementsimg6.png') }}">
                                        <h4>Health Care</h4>
                                    </div>
                                </div>
                                <div class="achievement-services-card">
                                    <div>
                                        <img src="{{ asset('frontend/assets/img/servicepage/achievements/achievementsimg7.png') }}">
                                        <h4>Travel & <br>
                                            Booking</h4>
                                    </div>
                                </div>
                                <div class="achievement-services-card achievement-services-margin">
                                    <div>
                                        <img src="{{ asset('frontend/assets/img/servicepage/achievements/achievementsimg11.png') }}">
                                        <h4>Fitness</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-6">
                                <div class="achievement-services-card achievement-services-margin">
                                    <div>
                                        <img src="{{ asset('frontend/assets/img/servicepage/achievements/achievementsimg8.png') }}">
                                        <h4>Banking</h4>
                                    </div>
                                </div>
                                <div class="achievement-services-card achievement-services-margin">
                                    <div>
                                        <img src="{{ asset('frontend/assets/img/servicepage/achievements/achievementsimg9.png') }}">
                                        <h4>Education</h4>
                                    </div>
                                </div>
                                <div class="achievement-services-card">
                                    <div>
                                        <img src="{{ asset('frontend/assets/img/servicepage/achievements/achievementsimg10.png') }}">
                                        <h4>Sports</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- achievement-services end -->

    <!-- Contact-Newsletter start -->
    <x-contact-news-letter :title="$setting->contact_news_letter_title" :link="$setting->contact_news_letter_button_link" :text="$setting->contact_news_letter_button_text"></x-contact-news-letter>
    <!-- Contact-Newsletter end -->

    <!-- footer start -->
    @include('frontend.common.footer')
    <!-- footer end -->

    <!-- back-to-top start-->
    <div class="back-top">
        <a href="javascript:void(0);" id="rocketmeluncur" class="showrocket"></a>
    </div>
    <!-- back-to-top end -->

    <!-- JavaScript Bundle with Popper -->
    <!-- jquery here -->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>

    <!-- bootstrap js here -->
    <script src="{{ asset('frontend/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- Pluggin here -->
    <script src="{{ asset('frontend/assets/js/plugin.min.js') }}"></script>

    <!-- Owl carousel here -->
    <script src="{{ asset('frontend/assets/css/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- slick here -->
    <script src="{{ asset('frontend/assets/js/slick/slick.js') }}"></script>

    <!-- wow js here -->
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>

    <!-- main script here -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>