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
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Our Key Features</h2>
                    <p class="wow fadeInUp" data-wow-delay=".5s">
                        Discover the distinctive qualities that make us stand out from the competition. Experience our
                        expert team, tailored
                        solutions, and commitment to innovation, delivering exceptional results for your business
                    </p>
                </div>
                <div class="row wow fadeInUp" data-wow-delay=".5s">
                    <div class="col-lg-3 col-md-6">
                        <div class="process-box">
                            <div class="process-img">
                                <img src="{{ asset('frontend/assets/img/process1.png') }}" alt="Discover-img">
                            </div>
                            <h2>Expert Team</h2>
                            <p>Emphasize the qualifications and expertise of your team members. Highlight their
                                experience, certifications, and areas
                                of specialization to showcase the depth of knowledge and skill available to clients.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="process-box">
                            <div class="process-img">
                                <img src="{{ asset('frontend/assets/img/process2.png') }}" alt="Discover-img">
                            </div>
                            <h2>Innovation and Creativity</h2>
                            <p>Communicate your commitment to innovation and creativity in your solutions. Highlight how
                                you stay updated with the
                                latest industry trends, emerging technologies, and design practices to offer
                                cutting-edge and forward-thinking
                                solutions.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="process-box">
                            <div class="process-img">
                                <img src="{{ asset('frontend/assets/img/process3.png') }}" alt="Discover-img">
                            </div>
                            <h2>Client Satisfaction</h2>
                            <p>Highlight your focus on client satisfaction and success. Showcase testimonials or case
                                studies that demonstrate how your
                                solutions have positively impacted your clients' businesses and helped them achieve
                                their goals.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="process-box process-box-last">
                            <div class="process-img">
                                <img src="{{ asset('frontend/assets/img/process4.png') }}" alt="Discover-img">
                            </div>
                            <h2>Long-Term Support</h2>
                            <p>Communicate your commitment to providing ongoing support and maintenance to clients even
                                after the project is completed.
                                Mention your post-launch support services and the availability of service-level
                                agreements (SLAs) to ensure long-term
                                client satisfaction.</p>
                        </div>
                    </div>
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
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Our Success Stories</h2>
                    <p class="wow fadeInUp" data-wow-delay=".5s">
                        Witness the power of our solutions through real-world success stories. Explore how we've helped
                        businesses thrive and
                        envision your own path to remarkable growth.
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
                                            <img src="{{ asset('frontend/assets/img/achievement-logo.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="achievement-description">
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Transforming Businesses with Excellence</h2>
                            <p class="wow fadeInUp" data-wow-delay=".5s">we take pride in the success
                                stories we've created in partnership with our clients. Explore a
                                selection of projects where we have achieved remarkable results, driving business growth
                                and surpassing expectations.
                                Witness the transformative power of our solutions and envision the possibilities for
                                your own success.</p>
                            <p class="mb-5 wow fadeInUp" data-wow-delay=".6s">Discover how our expertise and innovative
                                solutions have propelled businesses to new heights. Dive into our success
                                stories and envision the potential for your own remarkable transformation. Partner with
                                us to unlock your business's
                                full potential and join the ranks of our satisfied clients.</p>
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="counter-box wow fadeInUp" data-wow-delay=".4s">
                                        <div class="counter-text">
                                            <h1>
                                                <span class="counter">
                                                    <span
                                                        class="numscroller counter-box-numbers count-1 numscroller-big-bottom"
                                                        data-slno="1" data-min="0" data-max="55" data-delay="20"
                                                        data-count="40" data-increment="9">55</span>
                                                </span>
                                                <span class="plus-icon">+</span>
                                            </h1>
                                            <h6 class="mb-0 text">Completed Projects</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="counter-box wow fadeInUp" data-wow-delay=".5s">
                                        <div class="counter-text">
                                            <h1>
                                                <span class="counter">
                                                    <span
                                                        class="numscroller counter-box-numbers count-1 numscroller-big-bottom"
                                                        data-slno="1" data-min="0" data-max="12" data-delay="20"
                                                        data-count="40" data-increment="9">12</span>
                                                </span>
                                                <span class="plus-icon">+</span>
                                            </h1>
                                            <h6 class="mb-0 text">Completed Projects</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="counter-box wow fadeInUp" data-wow-delay=".6s">
                                        <div class="counter-text">
                                            <h1>
                                                <span class="counter">
                                                    <span
                                                        class="numscroller counter-box-numbers count-1 numscroller-big-bottom"
                                                        data-slno="1" data-min="0" data-max="20" data-delay="20"
                                                        data-count="40" data-increment="9">20</span>
                                                </span>
                                                <span class="plus-icon">+</span>
                                            </h1>
                                            <h6 class="mb-0 text">Completed Projects</h6>
                                        </div>
                                    </div>
                                </div>
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
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Our Process</h2>
                    <p class="wow fadeInUp" data-wow-delay=".5s">
                        Discover the distinctive qualities that make us stand out from the competition. Experience our
                        expert team, tailored solutions, and commitment to innovation, delivering exceptional results
                        for your business
                    </p>
                </div>
                <div class="wow fadeInUp" data-wow-delay=".6s">
                    <div class="key-features-box">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="features-text text-lg-end">
                                    <h2>Discovery and Requirement Gathering</h2>
                                    <p>Describe how you kickstart each project by thoroughly understanding the client's
                                        needs, goals, and target audience.
                                        Explain how you conduct research and gather requirements to ensure a
                                        comprehensive understanding of the project scope.</p>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="features-img">
                                    <img src="{{ asset('frontend/assets/img/key-features/key1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="label-text">
                                    <h2 class=" text-lg-start">01</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="key-features-box">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="label-text label-text-right">
                                    <h2 class="text-lg-end">02</h2>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="features-img">
                                    <img src="{{ asset('frontend/assets/img/key-features/key2.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="features-text festures-text-right text-lg-start">
                                    <h2>Planning and Strategy</h2>
                                    <p>Outline your process of creating a tailored plan and strategy for each project.
                                        This includes defining project
                                        milestones, timelines, resource allocation, and identifying the most effective
                                        technologies and methodologies to be
                                        employed.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="key-features-box">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="features-text text-lg-end">
                                    <h2>Design and Prototyping</h2>
                                    <p>Discuss your approach to crafting visually appealing and user-centric designs.
                                        Explain how you create wireframes,
                                        mockups, and prototypes to provide clients with a clear visualization of the
                                        final product and allow for feedback and
                                        iterations.</p>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="features-img">
                                    <img src="{{ asset('frontend/assets/img/key-features/key3.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="label-text">
                                    <h2 class=" text-lg-start">03</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="key-features-box">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="label-text label-text-right">
                                    <h2 class="text-lg-end">04</h2>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="features-img">
                                    <img src="{{ asset('frontend/assets/img/key-features/key4.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="features-text festures-text-right text-lg-start">
                                    <h2>Development and Implementation</h2>
                                    <p>Highlight your development process, including coding, integration of
                                        functionalities, and rigorous testing. Emphasize
                                        your commitment to using industry best practices and adhering to coding
                                        standards to ensure scalability, performance,
                                        and security.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="key-features-box">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="features-text text-lg-end">
                                    <h2>Iteration and Feedback</h2>
                                    <p>Describe how you encourage client involvement throughout the project, providing
                                        regular updates and seeking their
                                        feedback. Explain how you incorporate client input, conduct testing, and make
                                        necessary iterations to ensure the project
                                        meets their expectations.</p>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="features-img">
                                    <img src="{{ asset('frontend/assets/img/key-features/key5.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="label-text">
                                    <h2 class=" text-lg-start">05</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="key-features-box">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="label-text label-text-right">
                                    <h2 class="text-end">06</h2>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="features-img features-img-last">
                                    <img src="{{ asset('frontend/assets/img/key-features/key6.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="features-text festures-text-right text-start">
                                    <h2>Quality Assurance and Testing</h2>
                                    <p>Discuss your rigorous quality assurance processes, including comprehensive
                                        testing to identify and resolve any bugs or
                                        issues. Highlight your dedication to delivering a seamless and error-free end
                                        product.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="key-features-box">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="features-text text-lg-end">
                                    <h2>Deployment and Launch</h2>
                                    <p>Explain how you support clients during the final deployment and launch phase.
                                        Discuss your meticulous attention to
                                        detail to ensure a smooth transition from development to the live environment.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="features-img">
                                    <img src="{{ asset('frontend/assets/img/key-features/key1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="label-text">
                                    <h2 class=" text-lg-start">07</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="key-features-box">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="label-text label-text-right">
                                    <h2 class="text-lg-end">08</h2>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="features-img">
                                    <img src="{{ asset('frontend/assets/img/key-features/key2.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="features-text festures-text-right text-lg-start">
                                    <h2>Post-Launch Support and Maintenance</h2>
                                    <p>Communicate your commitment to providing ongoing support and maintenance after
                                        the project is launched. Describe your
                                        service level agreements (SLAs) and how you address any post-launch issues or
                                        additional feature requests.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- key-features end -->

        <!-- Testimoniols start -->
        <section class="testimoniols-wrapper padding pt-0">
            <div class="container">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Our Client Says</h2>
                    <p class="wow fadeInUp" data-wow-delay=".5s">
                        Discover firsthand accounts of our clients' experiences. See how our solutions have transformed
                        their businesses, and
                        join them in their success.
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

                                    <div class="testimoniols-item testimoniols-item1 tab_links active"
                                        onclick="openCity(event, 'test1')">
                                        <img src="{{ asset('frontend/assets/img/testmoniols/testimg1.png') }}" alt="" class="test-img">
                                    </div>
                                    <div class="testimoniols-item testimoniols-item2 tab_links"
                                        onclick="openCity(event, 'test2')">
                                        <img src="{{ asset('frontend/assets/img/testmoniols/testimg2.png') }}" alt="" class="test-img">
                                    </div>
                                    <div class="testimoniols-item testimoniols-item3 tab_links"
                                        onclick="openCity(event, 'test3')">
                                        <img src="{{ asset('frontend/assets/img/testmoniols/testimg3.png') }}" alt="" class="test-img">
                                    </div>
                                    <div class="testimoniols-item testimoniols-item4 tab_links"
                                        onclick="openCity(event, 'test4')">
                                        <img src="{{ asset('frontend/assets/img/testmoniols/testimg4.png') }}" alt="" class="test-img">
                                    </div>
                                    <div class="testimoniols-item testimoniols-item5 tab_links"
                                        onclick="openCity(event, 'test5')">
                                        <img src="{{ asset('frontend/assets/img/testmoniols/testimg5.png') }}" alt="" class="test-img">
                                    </div>
                                    <div class="testimoniols-item testimoniols-item6 tab_links"
                                        onclick="openCity(event, 'test6')">
                                        <img src="{{ asset('frontend/assets/img/testmoniols/testimg6.png') }}" alt="" class="test-img">
                                    </div>
                                    <div class="testimonial-circle-img">
                                        <img src="{{ asset('frontend/assets/img/test-logo.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="testimoniols-content-item">

                                    <div id="test1" class="tab_content">
                                        <div class="testimoniols-text">
                                            <div class="testimoniols-content-img">
                                                <img src="{{ asset('frontend/assets/img/testmoniols/quote.png') }}" alt="">
                                            </div>
                                            <p class="paragraph"> Daxit is very good freelancer. I am very much
                                                satisfied with his works. Good professionalism in his work and attitude.
                                                He is always on time and delivering works on time, good communication
                                                also.</p>
                                            <div class="test-flex">
                                                <div class="test-img">
                                                    <img src="{{ asset('frontend/assets/img/testmoniols/testimg1.png') }}" alt="">
                                                </div>
                                                <div class="testimoniols-content">
                                                    <h2>Tony Verghase</h2>
                                                    <p>5.0 <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="test2" class="tab_content">
                                        <div class="testimoniols-text">
                                            <div class="testimoniols-content-img">
                                                <img src="{{ asset('frontend/assets/img/testmoniols/quote.png') }}" alt="">
                                            </div>
                                            <p class="paragraph"> Daxit was a great asset to my project - a proficient
                                                developer who I would have no problem recommending (and have done)
                                                to other people.
                                                Thank you for your hardwork Daxit and I sincerely hope we can work
                                                together again in the future.</p>
                                            <div class="test-flex">
                                                <div class="test-img">
                                                    <img src="{{ asset('frontend/assets/img/testmoniols/testimg2.png') }}" alt="">
                                                </div>
                                                <div class="testimoniols-content">
                                                    <h2>Lee Jonson</h2>
                                                    <p>4.0 <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <!-- <i class="fa-solid fa-star"></i> -->
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="test3" class="tab_content">
                                        <div class="testimoniols-text">
                                            <div class="testimoniols-content-img">
                                                <img src="{{ asset('frontend/assets/img/testmoniols/quote.png') }}" alt="">
                                            </div>
                                            <p class="paragraph"> Great working with Daxit and will work with him again.
                                            </p>
                                            <div class="test-flex">
                                                <div class="test-img">
                                                    <img src="{{ asset('frontend/assets/img/testmoniols/testimg3.png') }}" alt="">
                                                </div>
                                                <div class="testimoniols-content">
                                                    <h2>Jon skinner</h2>
                                                    <p>4.3 <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star-half"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="test4" class="tab_content">
                                        <div class="testimoniols-text">
                                            <div class="testimoniols-content-img">
                                                <img src="{{ asset('frontend/assets/img/testmoniols/quote.png') }}" alt="">
                                            </div>
                                            <p class="paragraph"> Tanahair is the friendliest and most efficient company
                                                I have ever used.
                                                The whole thing takes time to introduce the product and as a result puts
                                                forward only the best opportunities that really suit you. they help from
                                                start to finish to create a great product identity for your company.</p>
                                            <div class="test-flex">
                                                <div class="test-img">
                                                    <img src="{{ asset('frontend/assets/img/testmoniols/testimg4.png') }}" alt="">
                                                </div>
                                                <div class="testimoniols-content">
                                                    <h2>Kinjal Patel</h2>
                                                    <p>4.3 <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star-half"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="test5" class="tab_content">
                                        <div class="testimoniols-text">
                                            <div class="testimoniols-content-img">
                                                <img src="{{ asset('frontend/assets/img/testmoniols/quote.png') }}" alt="">
                                            </div>
                                            <p class="paragraph"> Impressed with the professional quality of the
                                                delivered Full Stack Web application in a few weeks. Daxi was mindful of
                                                the tight deadline for this project and led the development by providing
                                                prompt and helpful communication, actively
                                                delivering results, and implementing feedback. Always a pleasure working
                                                with Ishan!</p>
                                            <div class="test-flex">
                                                <div class="test-img">
                                                    <img src="{{ asset('frontend/assets/img/testmoniols/testimg5.png') }}" alt="">
                                                </div>
                                                <div class="testimoniols-content">
                                                    <h2>Sebastiaan Wessels</h2>
                                                    <p>4.3 <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star-half"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="test6" class="tab_content">
                                        <div class="testimoniols-text">
                                            <div class="testimoniols-content-img">
                                                <img src="{{ asset('frontend/assets/img/testmoniols/quote.png') }}" alt="">
                                            </div>
                                            <p class="paragraph"> Amazing person to work with. Great in-depth knowledge
                                                of Laravel and open to ideas. Good communication skills as well.</p>
                                            <div class="test-flex">
                                                <div class="test-img">
                                                    <img src="{{ asset('frontend/assets/img/testmoniols/testimg6.png') }}" alt="">
                                                </div>
                                                <div class="testimoniols-content">
                                                    <h2>Don Sony</h2>
                                                    <p>4.3 <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star-half"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimoniols-area-block d-lg-none">
                    <div class="testimoniols">
                        <div class="testimoniols-text">
                            <div class="testimoniols-content-img">
                                <img src="{{ asset('frontend/assets/img/testmoniols/quote.png') }}" alt="">
                            </div>
                            <p class="paragraph"> Great working with Daxit and will work with him again.</p>
                            <div class="test-flex">
                                <div class="test-img">
                                    <img src="{{ asset('frontend/assets/img/testmoniols/testimg1.png') }}" alt="">
                                </div>
                                <div class="testimoniols-content">
                                    <h2>Smit Pinga</h2>
                                    <p>5.0 <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="testimoniols-text">
                            <div class="testimoniols-content-img">
                                <img src="{{ asset('frontend/assets/img/testmoniols/quote.png') }}" alt="">
                            </div>
                            <p class="paragraph"> Tanahair is the friendliest and most efficient company
                                I have ever used.
                                The whole thing takes time to introduce the product and as a result puts
                                forward only the best opportunities that really suit you. they help from
                                start to finish to create a great product identity for your company.</p>
                            <div class="test-flex">
                                <div class="test-img">
                                    <img src="{{ asset('frontend/assets/img/testmoniols/testimg2.png') }}" alt="">
                                </div>
                                <div class="testimoniols-content">
                                    <h2>Mahek Mania</h2>
                                    <p>4.0 <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <!-- <i class="fa-solid fa-star"></i> -->
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="testimoniols-text">
                            <div class="testimoniols-content-img">
                                <img src="{{ asset('frontend/assets/img/testmoniols/quote.png') }}" alt="">
                            </div>
                            <p class="paragraph"> Tanahair is the friendliest and most efficient company
                                I have ever used.
                                The whole thing takes time to introduce the product and as a result puts
                                forward only the best opportunities that really suit you. they help from
                                start to finish to create a great product identity for your company.</p>
                            <div class="test-flex">
                                <div class="test-img">
                                    <img src="{{ asset('frontend/assets/img/testmoniols/testimg3.png') }}" alt="">
                                </div>
                                <div class="testimoniols-content">
                                    <h2>Rahul Patel</h2>
                                    <p>4.3 <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="testimoniols-text">
                            <div class="testimoniols-content-img">
                                <img src="{{ asset('frontend/assets/img/testmoniols/quote.png') }}" alt="">
                            </div>
                            <p class="paragraph"> Tanahair is the friendliest and most efficient company
                                I have ever used.
                                The whole thing takes time to introduce the product and as a result puts
                                forward only the best opportunities that really suit you. they help from
                                start to finish to create a great product identity for your company.</p>
                            <div class="test-flex">
                                <div class="test-img">
                                    <img src="{{ asset('frontend/assets/img/testmoniols/testimg4.png') }}" alt="">
                                </div>
                                <div class="testimoniols-content">
                                    <h2>Kinjal Patel</h2>
                                    <p>4.3 <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="testimoniols-text">
                            <div class="testimoniols-content-img">
                                <img src="{{ asset('frontend/assets/img/testmoniols/quote.png') }}" alt="">
                            </div>
                            <p class="paragraph"> Tanahair is the friendliest and most efficient company
                                I have ever used.
                                The whole thing takes time to introduce the product and as a result puts
                                forward only the best opportunities that really suit you. they help from
                                start to finish to create a great product identity for your company.</p>
                            <div class="test-flex">
                                <div class="test-img">
                                    <img src="{{ asset('frontend/assets/img/testmoniols/testimg5.png') }}" alt="">
                                </div>
                                <div class="testimoniols-content">
                                    <h2>Priyanka Chauhan</h2>
                                    <p>4.3 <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="testimoniols-text">
                            <div class="testimoniols-content-img">
                                <img src="{{ asset('frontend/assets/img/testmoniols/quote.png') }}" alt="">
                            </div>
                            <p class="paragraph"> Tanahair is the friendliest and most efficient company
                                I have ever used.
                                The whole thing takes time to introduce the product and as a result puts
                                forward only the best opportunities that really suit you. they help from
                                start to finish to create a great product identity for your company.</p>
                            <div class="test-flex">
                                <div class="test-img">
                                    <img src="{{ asset('frontend/assets/img/testmoniols/testimg6.png') }}" alt="">
                                </div>
                                <div class="testimoniols-content">
                                    <h2>Kaushik Don</h2>
                                    <p>4.3 <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half"></i>
                                    </p>
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