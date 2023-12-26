<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }} - Portfolio</title>

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
        "page" => "Portfolio"
    ])

    <!-- portfolio start -->
    <section class="portfolio-dts-wrapper padding">
        <div class="container">
            <div id="portfolio-filter">
                <ul class="portfolio-filter-menu d-flex flex-wrap justify-content-center gap-3">
                    <li class="btn active" data-filter="all">All</li>
                    @foreach ($services as $service)
                        <li class="btn" data-filter="{{ $service->slug }}">{{ $service->title }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="row justify-content-center portfolio-container wow fadeInUp" data-wow-delay=".4s">
                @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6" data="{{ $portfolio->service->slug }}">
                        <div class="portfolio-box">
                            <div class="portfolio-img">
                                <img src="{{ url(Storage::url($portfolio->image)) }}" alt="{{ env('APP_NAME') }}">
                            </div>
                            <div class="portfolio-text">
                                <h2>{{ $portfolio->title }}</h2>
                                <p>{{ $portfolio->service->title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- portfolio end -->

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