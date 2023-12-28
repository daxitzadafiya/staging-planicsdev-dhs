<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }} - Home</title>

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
    @include('frontend.common.header')

    <!-- hero-slider start -->
    <section class="hero-slider">
        <div class="slider owl-carousel owl-them">
            @foreach ($heroSections as $heroSection)
                <div class="postion-relative slide-padding">
                    <div class="row">
                        <div class="col-lg-6 banner-content">
                            <div class="hero-text">
                                <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ $heroSection->title }}</h2>
                                <h6 class="wow fadeInUp" data-wow-delay=".5s">
                                    {{ $heroSection->sub_title }}
                                </h6>
                                <p class="wow fadeInUp" data-wow-delay=".6s">
                                    {{ $heroSection->description }}
                                </p>
                                <a href="{{ $heroSection->button_url ?? 'javascript:void(0)' }}" target="{{ isset($heroSection->button_url) ? '_blank' : '_self' }}" class="btn wow fadeInUp" data-wow-delay=".7s">{{ $heroSection->button_text }}</a>
                            </div>
                        </div>
                        <div class="col-lg-6 banner-content-row justify-content-start wow fadeInRight" data-wow-delay=".5s" data-tilt="" data-tilt-max="2" data-tilt-speed="1000" style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
                            <div class="hero-img">
                                <img src="{{ url(Storage::url($heroSection->image)) }}" alt="hero-img" data-tilt="" data-tilt-max="10" data-tilt-speed="1000" style="will-change: transform; transform: perspective(5000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);" />
                            </div>
                        </div>
                    </div>
                    <div class="shape1">
                        <img src="{{ asset('frontend/assets/img/shape1.png') }}" alt="shape1">
                    </div>
                    <div class="shape2">
                        <img src="{{ asset('frontend/assets/img/shape2.png') }}" alt="shape2">
                    </div>
                    <div class="shape3">
                        <img src="{{ asset('frontend/assets/img/shape3.png') }}" alt="shape3">
                    </div>
                </div>
            @endforeach
        </div>
        <div class="field">
            <a href="#scroll">
                <div class="mouse"></div>
            </a>
        </div>
        <div class="social-icon me-5">
            <ul>
                <li>
                    <a href="{{ $setting->linked_in_url ?? 'javascript:void(0)' }}" target="{{ isset($setting->linked_in_url) ? '_blank' : '_self' }}"><i class="fa-brands fa-linkedin-in"></i></a>
                </li>
                <li>
                    <a href="{{ $setting->instagram_url ?? 'javascript:void(0)' }}" target="{{ isset($setting->instagram_url) ? '_blank' : '_self' }}"><i class="fa-brands fa-instagram"></i></a>
                </li>
                <li>
                    <a href="{{ $setting->facebook_url ?? 'javascript:void(0)' }}" target="{{ isset($setting->facebook_url) ? '_blank' : '_self' }}"><i class="fa-brands fa-facebook-f"></i></a>
                </li>
            </ul>
        </div>
        <div class="logo-bg">
            <img src="{{ asset('frontend/assets/img/logo/logo1.png') }}" alt="logo1" class="left-logo wow fadeInLeft" data-wow-delay="1s">
            <img src="{{ asset('frontend/assets/img/logo/logo2.png') }}" alt="center-logo" class="center-logo wow fadeInUp" data-wow-delay="1s">
            <img src="{{ asset('frontend/assets/img/logo/logo3.png') }}" alt="center-mid-logo" class="center-mid-logo wow fadeInDown"
                data-wow-delay="1s">
            <img src="{{ asset('frontend/assets/img/logo/logo4.png') }}" alt="right-logo" class="right-logo wow fadeInRight"
                data-wow-delay="1s">
        </div>
    </section>
    <!-- hero-slider end -->

    <div id="scroll">
        <!-- we-are-different start -->
        <section class="about-block padding">
            <div class="container">
                <div class="d-none d-lg-block">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-block-text">
                                <h3 class="wow fadeInUp" data-wow-delay=".4s">
                                    {{ $setting->point_of_differences_title }}
                                </h3>
                                <p class="wow fadeInUp" data-wow-delay=".5s">
                                    {{ $setting->point_of_differences_description }}
                                </p>
                            </div>
                        </div>
                        @foreach ($pointOfDifferences as $pointOfDifference)
                            @if($loop->first)
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".6s">
                                    <div class="card-block card-margin">
                                        <img src="{{ url(Storage::url($pointOfDifference->image)) }}" alt="" />
                                        <div class="card-block-content">
                                            <h2>{{ $pointOfDifference->title }}</h2>
                                            <p>
                                                {{ $pointOfDifference->description }}
                                            </p>
                                            <a href="{{ $pointOfDifference->link_url ?? 'javascript:void(0)' }}" target="{{ isset($pointOfDifference->link_url) ? '_blank' : '_self' }}">
                                                {{ $pointOfDifference->link_text }} 
                                                <i class="fa-solid fa-arrow-right-long"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="row">
                        @foreach ($pointOfDifferences as $pointOfDifference)
                            @if(!$loop->first)
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay="{{ $loop->last ? '.7s' : '.8s' }}">
                                    <div class="card-block {{ $loop->last ? '' : 'cardmargin' }}">
                                        <img src="{{ url(Storage::url($pointOfDifference->image)) }}" alt="" />
                                        <div class="card-block-content">
                                            <h2>{{ $pointOfDifference->title }}</h2>
                                            <p>
                                                {{ $pointOfDifference->description }}
                                            </p>
                                            <a href="{{ $pointOfDifference->link_url ?? 'javascript:void(0)' }}" target="{{ isset($pointOfDifference->link_url) ? '_blank' : '_self' }}">
                                                {{ $pointOfDifference->link_text }} 
                                                <i class="fa-solid fa-arrow-right-long"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="d-lg-none">
                    <div class="about-block-text mb-5">
                        <h3 class="wow fadeInUp" data-wow-delay=".4s">
                            {{ $setting->point_of_differences_title }}
                        </h3>
                        <p class="wow fadeInUp" data-wow-delay=".5s">
                            {{ $setting->point_of_differences_description }}
                        </p>
                    </div>
                    <div class="about_slider">
                        @foreach ($pointOfDifferences as $pointOfDifference)
                            <div class="card-block">
                                <img src="{{ url(Storage::url($pointOfDifference->image)) }}" alt="" />
                                <div class="card-block-content">
                                    <h2>{{ $pointOfDifference->title }}</h2>
                                    <p>
                                        {{ $pointOfDifference->description }}
                                    </p>
                                    <a href="{{ $pointOfDifference->link_url ?? 'javascript:void(0)' }}" target="{{ isset($pointOfDifference->link_url) ? '_blank' : '_self' }}">
                                        {{ $pointOfDifference->link_text }} 
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="about-bg">
                <img src="{{ asset('frontend/assets/img/about-block/background.png') }}" alt="" />
            </div>
            <div class="about-bg1">
                <img src="{{ asset('frontend/assets/img/about-block/background2.png') }}" alt="" />
            </div>
        </section>
        <!-- we-are-different start -->

        <!-- services start -->
        <section class="services-wrapper padding">
            <div class="container">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ $setting->services_title }}</h2>
                    <p class="wow fadeInUp" data-wow-delay=".5s">
                        {{ $setting->services_description }}
                    </p>
                </div>
                <div class="row">
                    @foreach ($services as $index => $service)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ '.'.($index + 3).'s' }}">
                            <div class="service-card">
                                <div>
                                    <img src="{{ url(Storage::url($service->icon)) }}" width="70" height="70" alt="{{ env('APP_NAME') }}">
                                </div>
                                <div class="service-text mt-4">
                                    <h2>{{ $service->title }}</h2>
                                    <p>
                                        {{ $service->description }}
                                    </p>
                                    <a href="{{ route('frontend.'.$service->slug) ?? 'javascript:void(0)' }}">
                                        {{ $service->link_text }} 
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-5 wow fadeInUp" data-wow-delay=".9s">
                    <a href="{{ route('frontend.services') }}" class="view-btn">View All</a>
                </div>
            </div>
        </section>
        <!-- services end -->

        <!-- portfolio start -->
        <section class="portfolio-wrapper padding">
            <div class="container">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ $setting->portfolio_title }}</h2>
                    <p class="wow fadeInUp" data-wow-delay=".5s">
                        {{ $setting->portfolio_description }}
                    </p>
                </div>
                <div class="row justify-content-center">
                    @foreach ($portfolios as $index => $portfolio)    
                        <div class="col-lg-4 col-md-6 wow fadeInDown" data-wow-delay="{{ '.'.($index + 4).'s' }}">
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
                <div class="text-center mt-lg-5 wow fadeInUp" data-wow-delay=".9s"
                    style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInUp;">
                    <a href="{{ route('frontend.portfolio') }}" class="view-btn">View All</a>
                </div>
            </div>
        </section>
        <!-- portfolio end -->

        <!-- process start -->
        <section class="process-wrapper pt-0 padding">
            <div class="container">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ $setting->key_features_title }}</h2>
                    <p class="wow fadeInUp" data-wow-delay=".5s">
                        {{ $setting->key_features_description }}
                    </p>
                </div>
                <div class="row wow fadeInUp" data-wow-delay=".5s">
                    @foreach ($key_features as $key_feature)
                        <div class="col-lg-3 col-md-6">
                            <div class="process-box {{ $loop->last ? 'process-box-last' : '' }}">
                                <div class="process-img">
                                    <img src="{{ url(Storage::url($key_feature->image)) }}" alt="{{ $key_feature->title }}">
                                </div>
                                <h2>{{ $key_feature->title }}</h2>
                                <p>
                                    {{ $key_feature->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="process-bg">
                <img src="{{ asset('frontend/assets/img/about-block/background.png') }}" alt="" />
            </div>
        </section>
        <!-- process end -->

        <!-- achievement start -->
        <section class="padding achievement-wrapper">
            <div class="container">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ $setting->success_story_title }}</h2>
                    <p class="wow fadeInUp" data-wow-delay=".5s">
                        {{ $setting->success_story_description }}
                    </p>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 wow fadeInLeft">
                        <div class="col-lg-6 banner-content-row justify-content-start wow fadeInLeft"
                            data-wow-delay=".5s">
                            <div class="achievement-circle">
                                <div class="achievement-circle1">
                                    <div class="achievement-circle2">
                                        <div class="achievement-circle3">
                                            <img src="{{ url(Storage::url($setting->success_story_logo)) }}" alt="{{ env('APP_NAME') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="achievement-description">
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ $setting->success_story_sub_title }}</h2>
                            <p class="wow fadeInUp mb-5" data-wow-delay=".5s">
                                {{ $setting->success_story_sub_description }}
                            </p>
                            <div class="row">
                                @foreach ($setting->our_works as $index => $our_work)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="counter-box wow fadeInUp" data-wow-delay="{{ '.'.($index + 4).'s' }}">
                                            <div class="counter-text">
                                                <h1>
                                                    <span class="counter">
                                                        <span
                                                            class="numscroller counter-box-numbers count-1 numscroller-big-bottom"
                                                            data-slno="1" data-min="0" data-max="{{ $our_work['value'] }}" data-delay="20"
                                                            data-count="40" data-increment="9">{{ $our_work['value'] }}</span>
                                                    </span>
                                                    <span class="plus-icon">+</span>
                                                </h1>
                                                <h6 class="mb-0 text">{{ $our_work['key'] }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- achievement end -->

        <!-- key-features start -->
        <section class="padding key-features-wrapper">
            <div class="container">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ $setting->our_process_title }}</h2>
                    <p class="wow fadeInUp" data-wow-delay=".5s">
                        {{ $setting->our_process_description }}
                    </p>
                </div>
                <div class="wow fadeInUp" data-wow-delay=".6s">
                    @foreach ($our_processes as $index => $our_process)
                    <div class="key-features-box">
                        <div class="row justify-content-center">
                                @if($index % 2 != 0)
                                    <div class="col-lg-5">
                                        <div class="label-text label-text-right">
                                            <h2 class="text-lg-end">{{ "0".$index + 1 }}</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="features-img">
                                            <img src="{{ url(Storage::url($our_process->image)) }}" alt="{{ env('APP_NAME') }}">
                                        </div>
                                    </div>
                                @endif
                                <div class="col-lg-5">
                                    <div class="features-text text-lg-end">
                                        <h2>{{ $our_process->title }}</h2>
                                        <p>
                                            {{ $our_process->description }}
                                        </p>
                                    </div>
                                </div>
                                @if($index % 2 == 0)
                                    <div class="col-lg-1">
                                        <div class="features-img">
                                            <img src="{{ url(Storage::url($our_process->image)) }}" alt="{{ env('APP_NAME') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="label-text">
                                            <h2 class="text-lg-start">{{ "0".$index + 1 }}</h2>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- key-features end -->

        <!-- Testimoniols start -->
        <section class="testimoniols-wrapper padding pt-0">
            <div class="container">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ $setting->client_says_title }}</h2>
                    <p class="wow fadeInUp" data-wow-delay=".5s">
                        {{ $setting->client_says_description }}
                    </p>
                </div>
                <div class="position-relative test-block wow fadeInUp" data-wow-delay=".6s">
                    <div class="testimoniols-position">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="testimoniols-circle">
                                    <div class="testimoniols-circle-main1">
                                        <div class="testimoniols-circle-main2"></div>
                                        <div class="testimoniols-circle-main8"></div>
                                    </div>
                                    <div class="testimoniols-circle-main3">
                                        <div class="testimoniols-circle-main4"></div>
                                        <div class="testimoniols-circle-main5"></div>
                                    </div>
                                    <div class="testimoniols-circle-main6">
                                        <div class="testimoniols-circle-main7"></div>
                                        <div class="testimoniols-circle-main9"></div>
                                    </div>

                                    @foreach ($client_reviews as $index => $client_review)
                                        <div class="testimoniols-item testimoniols-item{{ $index + 1 }} tab_links {{ $loop->first ? 'active' : '' }}"
                                            onclick="openCity(event, '{{ 'test'.$index + 1 }}')">
                                            <img src="{{ url(Storage::url($client_review->image)) }}" alt="{{ env('APP_NAME') }}" class="test-img">
                                        </div>
                                    @endforeach
                                    <div class="testimonial-circle-img">
                                        <img src="{{ url(Storage::url($setting->client_says_logo)) }}" alt="{{ env('APP_NAME') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="testimoniols-content-item">
                                    @foreach ($client_reviews as $index => $client_review)
                                        <div id="test{{ $index + 1 }}" class="tab_content">
                                            <div class="testimoniols-text">
                                                <div class="testimoniols-content-img">
                                                    <img src="{{ asset('frontend/assets/img/testmoniols/quote.png') }}" alt="">
                                                </div>
                                                <p class="paragraph"> 
                                                    {{ $client_review->review }}
                                                </p>
                                                <div class="test-flex">
                                                    <div class="test-img">
                                                        <img src="{{ url(Storage::url($client_review->image)) }}" alt="{{ env('APP_NAME') }}">
                                                    </div>
                                                    <div class="testimoniols-content">
                                                        <h2>{{ $client_review->name }}</h2>
                                                        <p> 
                                                            {{ $client_review->rating }}
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if($i <=  $client_review->rating)
                                                                    <i class="fa-solid fa-star"></i>
                                                                @else
                                                                    @if(str_contains($client_review->rating, "."))
                                                                        <i class="fa-solid fa-star-half"></i>
                                                                    @else
                                                                        <i class="fa-regular fa-star"></i>
                                                                    @endif    
                                                                @endif
                                                            @endfor
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="process-bg">
                <img src="{{ asset('frontend/assets/img/about-block/background.png') }}" alt="">
            </div>
        </section>
        <!-- Testimoniols end -->

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

        var a = 0;
        $(window).scroll(function () {
            var oTop = $('.counter').offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() > oTop) {
                $('.counter-box-numbers').each(function () {
                    var $this = $(this);
                    jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.ceil(this.Counter));
                        }
                    });
                });
                a = 1;
            }
        });
    </script>
</body>

</html>