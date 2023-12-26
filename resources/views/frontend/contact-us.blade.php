<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }} - Contact Us</title>

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
        "page" => "Contact Us"
    ])

    <!-- contact-form start -->
    <section class="contact-form-wrapper padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 contact-form-img wow fadeInLeft" data-wow-delay=".4s" data-tilt=" "
                    data-tilt-max=" 2 " data-tilt-speed=" 1000 "
                    style=" will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1); ">
                    <img src="{{ asset('frontend/assets/img/contactpage/form.png') }}" alt="" data-tilt=" " data-tilt-max=" 10 "
                        data-tilt-speed=" 1000 "
                        style=" will-change: transform; transform: perspective(5000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1);" />
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0 wow fadeInRight" data-wow-delay=".4s">
                    <div class="contact-left">
                        <h2>Let’s talk about your project</h2>
                        <h5>
                            when an unknown printer took a galley of type and scrambled it
                            to make a type specimen book. It has survived not only five
                            centuries,
                        </h5>
                    </div>
                    <div class="contact-from">
                        <form>
                            <div class="col-12">
                                <input type="text" placeholder="Full Name" class="form-control" required />
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="email" placeholder="Email Address" class="form-control" required />
                                </div>
                                <div class="col-lg-6">
                                    <input type="tel" placeholder="Mobile Number" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="text" placeholder="Subject" class="form-control" required />
                            </div>
                            <div class="col-12">
                                <textarea placeholder="Message" class="form-control" rows="3"></textarea>
                            </div>
                            <div>
                                <a href="" class="btn">Submit Now</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-form end -->

    <!-- contact information start -->
    <section class="contact-info-wrapper padding pt-0">
        <div class="container">
            <div class="section-title">
                <h2 class="wow fadeInUp" data-wow-delay=".4s">
                    Please note that all message will be replied within the next 12hours
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 contact-information wow fadeInUp" data-wow-delay=".3s">
                    <div class="contact-info-card text-center">
                        <div class="contact-card-img">
                            <img src="{{ asset('frontend/assets/img/contactpage/phone.png') }}" alt="" />
                        </div>
                        <div class="contact-card-details">
                            <h5>CONTACT INFO</h5>
                            <a href="tel:97374 03846">97374 03846</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 contact-information wow fadeInUp" data-wow-delay=".4s">
                    <div class="contact-info-card text-center">
                        <div class="contact-card-img">
                            <img src="{{ asset('frontend/assets/img/contactpage/email.png') }}" alt="" />
                        </div>
                        <div class="contact-card-details">
                            <h5>WORKING HOURS</h5>
                            <a href="">Mon to Fri - 9.00 to 6.00</a>
                            <a href=""> Saturday - 9.00 to 1.00</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 contact-information wow fadeInUp" data-wow-delay=".5s">
                    <div class="contact-info-card text-center">
                        <div class="contact-card-img">
                            <img src="{{ asset('frontend/assets/img/contactpage/hours.png') }}" alt="" />
                        </div>
                        <div class="contact-card-details">
                            <h5>EMAIL ADDRESS</h5>
                            <a href="mailto:info@planicsdev.com">info@planicsdev.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 contact-information wow fadeInUp  " data-wow-delay=".6s">
                    <div class="contact-info-card text-center">
                        <div class="contact-card-img">
                            <img src="{{ asset('frontend/assets/img/contactpage/loaction.png') }}" alt="" />
                        </div>
                        <div class="contact-card-details">
                            <h5>OUR LOCATION</h5>
                            <a href="https://www.google.com/maps/place/Planics+Dev/@21.2292401,72.8976224,17z/data=!3m1!4b1!4m5!3m4!1s0x3be04f7eeb3a003b:0xc3451e5a937171c9!8m2!3d21.2292401!4d72.8998111"
                                target="_blank">410, Time Shoppers, Sarthana Jakatnaka,Surat.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact information end -->

    <!-- contact map start -->
    <section class="contact-map-wrapper">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.0657770717!2d72.8998111!3d21.2292401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f7eeb3a003b%3A0xc3451e5a937171c9!2sPlanics%20Dev!5e0!3m2!1sen!2sin!4v1670403497432!5m2!1sen!2sin"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="conatct-map"></iframe>
    </section>
    <!-- contact map end -->

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