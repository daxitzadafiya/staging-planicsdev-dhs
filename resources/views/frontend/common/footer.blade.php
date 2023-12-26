<section class="footer-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInDown" data-wow-delay=".4s">
                <div class="footer-items">
                    <div class="Footer-img">
                        <a href="{{ route('frontend.index') }}">
                            <img src="{{ url(Storage::url($setting->footer_logo)) }}" alt="{{ env('APP_NAME') }}">
                        </a>
                    </div>
                    <p>{{ $setting->footer_description }}</p>
                    <div class="footer-icon">
                        <ul>
                            <li>
                                <a href="{{ $setting->linked_in_url ?? 'javascript:void(0)' }}" target="{{ isset($setting->linked_in_url) && !empty($setting->linked_in_url) ? '_blank' : '_self' }}">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $setting->instagram_url ?? 'javascript:void(0)' }}" target="{{ isset($setting->instagram_url) && !empty($setting->instagram_url) ? '_blank' : '_self' }}">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $setting->facebook_url ?? 'javascript:void(0)' }}" target="{{ isset($setting->facebook_url) && !empty($setting->facebook_url) ? '_blank' : '_self' }}">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 wow fadeInDown" data-wow-delay=".5s">
                <div class="footer-list">
                    <h2>Quick Links</h2>
                    <ul>
                        <li>
                            <a href="{{ route('frontend.index') }}">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.about') }}">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.services') }}">
                                Services
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.portfolio') }}">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.contact-us') }}">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 wow fadeInDown" data-wow-delay=".6s">
                <div class="footer-list">
                    <h2>Services</h2>
                    <ul>
                        @foreach ($services as $service)
                            <li>
                                <a href="{{ route("frontend.$service->slug") }}"> 
                                    {{ $service->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInDown" data-wow-delay=".7s">
                <div class="footer-contact">
                    <h2>Contact us</h2>
                    <div class="footer-flex">
                        <ul>
                            <li>
                                <a href="{{ $setting->map_link ?? 'javascript:void(0)' }}" target="{{ isset($setting->map_link) && !empty($setting->map_link) ? '_blank' : '_self' }}">
                                    <i class="fa-solid fa-location-dot footer-icon"></i>
                                    <span>
                                        {{ $setting->footer_address_one }} <br>
                                        {{ $setting->footer_address_two }}
                                    </span> 
                                </a>
                            </li>
                            <li>
                                <a href="{{ isset($setting->footer_email) && !empty($setting->footer_email) ? 'mailto:'.$setting->footer_email : 'javascript:void(0)' }}">
                                    <i class="fa-solid fa-envelope footer-iconlast"></i>
                                    <span>{{ $setting->footer_email }}</span> 
                                </a>
                            </li>
                            <li>
                                <a href="{{ isset($setting->footer_contact) && !empty($setting->footer_contact) ? 'tel:'.$setting->footer_contact : 'javascript:void(0)' }}">
                                    <i class="fa-solid fa-phone footer-iconlast"></i>
                                    <span>{{ $setting->footer_contact }}</span> 
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom wow fadeInDown" data-wow-delay=".48">
        <p>
            Copyright @ {{ date("Y") }} - {{ date("Y", strtotime("+1 year")) }}
            <a href="{{ route('frontend.index') }}">
                {{ env('APP_NAME') }}.
            </a>
            all right reserved.
        </p>
</section>