<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} - {{ $service->title }}</title>

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
        "page" => "$service->title"
    ])

    <section class="all_services_wrapper wow fadeInDown" data-wow-delay=".3s">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 p-lg-0">
                    <div class="all_services_position">
                        <div class="all_services-content">
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
                            <a href="{{ $service->link_url ?? 'javascript:void(0)' }}" target="{{ isset($service->link_url) ? '_blank' : '_self' }}" class="btn wow fadeInUp" data-wow-delay=".7s">{{ $service->link_text }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 p-lg-0">
                    <div class="all_services-img">
                        <img src="{{ url(Storage::url($service->image)) }}" alt="{{ env('APP_NAME') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ui-value-wrapper">
        <div class="container">
            <div class="section-title">
                <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ $setting->core_values_title }}</h2>
                <p class="wow fadeInUp" data-wow-delay=".5s">
                    {{ $setting->core_values_description }}
                </p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 d-flex justify-content-end">
                    <div class="col-lg-10">
                        @foreach ($core_values[0] as $index => $core_value)
                            <div class="ui-value-card {{ $index%2 == 0 ? "ui-value-left-card" : '' }} wow fadeInLeft" data-wow-delay="{{ '.'.($index + 4).'s' }}">
                                <div class="ui-button">
                                    <h2>{{ $core_value['title'] }}</h2>
                                </div>
                                <p>
                                    {{ $core_value['description'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="ui-value-img">
                        <img src="{{ url(Storage::url($service->icon)) }}" alt="{{ env('APP_NAME') }}">
                    </div>
                </div>
                <div class="col-lg-5 d-flex justify-content-start">
                    <div class="col-lg-10">
                        @foreach ($core_values[1] as $index => $core_value)
                            <div class="ui-value-card {{ $index%2 != 0 ? "ui-value-right-card" : '' }} wow fadeInRight" data-wow-delay="{{ '.'.($index + 4).'s' }}">
                                <div class="ui-button ui-button-right ">
                                    <h2>Layouts/Wireframes</h2>
                                </div>
                                <p>Our employees are empowered and inspired. Only those who are content and connected can
                                    provide a truly excellent service. Our dedication to our staff translates into a
                                    dedication to our clients. </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ui-ux our value end -->

    <!-- ui-ux use technologies start -->
    <section class="technologi-wrapper padding">
        <div class="container">
            <div class="section-title">
                <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ $setting->technologies_title }}</h2>
                <p class="wow fadeInUp" data-wow-delay=".5s">
                    {{ $setting->technologies_description }}
                </p>
            </div>
            <div class="row  justify-content-center">
                @foreach ($service->technologies as $index => $technology)
                    <div class="col-sm-6 col-md-4 col-xl-2 text-center">
                        <div class="technologi-img  mx-auto mx-xl-0  d-flex flex-wrap justify-content-center align-items-center wow fadeInUp"
                            data-wow-delay="{{ '.'.($index + 3).'s' }}">
                            <div>
                                <img src="{{ url(Storage::url($technology->image)) }}" alt="{{ env('APP_NAME') }}" class="img-fluid">
                                <h6>{{ $technology->title }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact-Newsletter start -->
    <x-contact-news-letter :title="$setting->contact_news_letter_title" :link="$setting->contact_news_letter_button_link" :text="$setting->contact_news_letter_button_text"></x-contact-news-letter>
    <!-- Contact-Newsletter end -->

    <!-- footer start -->
    @include('frontend.common.footer')
    <!-- footer end -->
    </div>

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