<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }} - About Us</title>

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
        "page" => "About Us"
    ])

    <!-- about-us start -->
    <section class="aboutus-wrapper padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="aboutus-content">
                        <span class="wow fadeInUp" data-wow-delay=".3s">About Us</span>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">
                            {{ $setting->about_us_title }}
                        </h2>
                        <p class="abouttext wow fadeInUp" data-wow-delay=".5s">
                            {{ $setting->about_us_description }}
                        </p>
                    </div>
                    <div class="aboutus-content-list wow fadeInUp" data-wow-delay=".6s">
                        <div class="aboutus-content-img">
                            <img src="{{ asset('frontend/assets/img/aboutus-page/checkmark.png') }}" alt="">
                        </div>
                        <div class="aboutus-content-text">
                            <h2>Trusted Partner</h2>
                            <p>As your trusted partner, we are committed to your success. With our collaborative
                                approach and dedication to delivering
                                exceptional results, we work hand in hand with you to achieve your business goals</p>
                        </div>
                    </div>
                    <div class="aboutus-content-list wow fadeInUp" data-wow-delay=".7s">
                        <div class="aboutus-content-img">
                            <img src="{{ asset('frontend/assets/img/aboutus-page/checkmark.png') }}" alt="">
                        </div>
                        <div class="aboutus-content-text">
                            <h2>Responsibility</h2>
                            <p>We take our responsibility seriously, ensuring ethical practices, sustainability, and the
                                utmost care for your project
                                and the wider community.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".5s" data-tilt-max="2"
                    data-tilt-speed="1000"
                    style="will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
                    <div class="about-content-image">
                        <img src="{{ url(Storage::url($setting->about_us_image)) }}" alt="{{ env('APP_NAME') }}" data-tilt-max="10"
                            data-tilt-speed="1000"
                            style="will-change: transform; transform: perspective(5000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);">
                    </div>
                </div>
            </div>
            <div class="padding pb-0">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                        <div class="goal-wrapper">
                            <div class="goal-img">
                                <img src="{{ asset('frontend/assets/img/aboutus-page/goal1.png') }}" alt="">
                            </div>
                            <h2>Over Vision</h2>
                            <p>To be a trailblazer in the IT industry, driving innovation and transforming businesses
                                through cutting-edge solutions
                                that shape the digital future.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="goal-wrapper">
                            <div class="goal-img">
                                <img src="{{ asset('frontend/assets/img/aboutus-page/goal2.png') }}" alt="">
                            </div>
                            <h2>Over Mision</h2>
                            <p>Our mission is to empower businesses with transformative technology solutions, fostering
                                growth and success. We strive
                                to exceed client expectations by delivering exceptional quality, innovation, and
                                unparalleled customer service.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                        <div class="goal-wrapper">
                            <div class="goal-img">
                                <img src="{{ asset('frontend/assets/img/aboutus-page/goal3.png') }}" alt="">
                            </div>
                            <h2>Quality Management</h2>
                            <p>Excellence is our priority. Through rigorous quality management practices, we
                                consistently deliver superior solutions
                                that exceed client expectations and drive measurable results.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-us end -->

    <!-- our clients start -->
    <div class="clients-wrapper padding">
        <div class="container">
            <div class="section-title">
                <h2 class="wow fadeInUp" data-wow-delay=".4s">Our Clients & Partners</h2>
                <p class="wow fadeInUp" data-wow-delay=".5s">
                    We provide to you the best choiches for you. Adjust it to your
                    health needs and make sure your undergo treatment with our highly
                    qualified doctors.
                </p>
            </div>
            <div class="clientsslider wow fadeInUp" data-wow-delay=".6s">
                <div class="clients-img">
                    <img src="{{ asset('frontend/assets/img/aboutus-page/clientlogo/clientlogo1.png') }}" alt="client1">
                </div>
                <div class="clients-img">
                    <img src="{{ asset('frontend/assets/img/aboutus-page/clientlogo/clientlogo2.png') }}" alt="client1">
                </div>
                <div class="clients-img">
                    <img src="{{ asset('frontend/assets/img/aboutus-page/clientlogo/clientlogo3.png') }}" alt="client1">
                </div>
                <div class="clients-img">
                    <img src="{{ asset('frontend/assets/img/aboutus-page/clientlogo/clientlogo4.png') }}" alt="client1">
                </div>
                <div class="clients-img">
                    <img src="{{ asset('frontend/assets/img/aboutus-page/clientlogo/clientlogo5.png') }}" alt="client1">
                </div>
                <div class="clients-img">
                    <img src="{{ asset('frontend/assets/img/aboutus-page/clientlogo/clientlogo6.png') }}" alt="client1">
                </div>

            </div>
        </div>
    </div>
    <!-- our clients start -->

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