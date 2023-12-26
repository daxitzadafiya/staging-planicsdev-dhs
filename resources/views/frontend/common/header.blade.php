    <!-- header start -->
    <div id="header" class="header-area">
        <div class="container">
            <nav class="menu-area">
                <div class="logo">
                    <a href="{{ route('frontend.index') }}" class="logo-img">
                        <img src="{{ url(Storage::url($setting->header_logo)) }}" alt="{{ env('APP_NAME') }}" />
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <ul class="main-menu d-flex align-items-center me-5">
                        <li>
                            <a class="{{ Route::is('frontend.index') ? 'active' : '' }}" href="{{ route('frontend.index') }}">
                                Home
                            </a>
                        </li>
                        <li class="dropdown-main">
                            <a class="{{ Route::is('frontend.about') ? 'active' : '' }}" href="{{ route('frontend.about') }}">
                                About Us
                            </a>
                        </li>
                        <li class="dropdown-main">
                            @php
                                $services_route_array = App\Models\Service::select('slug')->pluck('slug')->toArray();
                                $services_route = array_map(function($route) { return 'frontend.' . $route; }, $services_route_array);
                            @endphp
                            <a class="{{ !empty($services_route) && Route::is(array_merge($services_route, ['frontend.services'])) ? 'active' : '' }}" href="javascript:void(0)">
                                Services 
                                <i class="fa-solid fa-chevron-down ms-2"></i>
                            </a>
                            <div class="dropdown-menu-item" id="myDropdown">
                                <ul>
                                    <li class="{{ Route::is('frontend.services') ? 'active' : '' }}">
                                        <a href="{{ route('frontend.services') }}" class="nav-menu">
                                            All Services
                                        </a>
                                    </li>
                                    @foreach ($services as $service)
                                        <li class="{{ Route::is("frontend.$service->slug") ? 'active' : '' }}">
                                            <a href="{{ route("frontend.$service->slug") }}" class="nav-menu"> 
                                                {{ $service->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="{{ Route::is('frontend.portfolio') ? 'active' : '' }}" href="{{ route('frontend.portfolio') }}">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a class="{{ Route::is('frontend.contact-us') ? 'active' : '' }}" href="{{ route('frontend.contact-us') }}" class="pe-0">
                                Contact
                            </a>
                        </li>
                    </ul>
                    <a href="{{ isset($setting->header_email) && !empty($setting->header_email) ? 'mailto:'.$setting->header_email : 'javascript:void(0)' }}" class="btn d-none d-lg-block">
                        {{ $setting->header_button_text }}
                    </a>
                    <div class="hamburger-menu d-xl-none">
                        <span></span><span></span><span></span>
                    </div>
                </div>
            </nav>
        </div>
        <!-- responsive-menu -->
        <div class="main-menu-title" id="main-menu-title">
            <div class="container">
                <div class="cross-img">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="logo logo-content">
                    <a href="{{ route('frontend.index') }}" class="logo-img">
                        <img src="{{ url(Storage::url($setting->header_logo)) }}" alt="{{ env('APP_NAME') }}" />
                    </a>
                </div>
                <nav id="navbar-tab">
                    <ul class="main-menu-box">
                        <li>
                            <a class="{{ Route::is('frontend.index') ? 'active' : '' }}" href="{{ route('frontend.index') }}">
                                Home
                            </a>
                        </li>
                        <li>
                            <a class="{{ Route::is('frontend.about') ? 'active' : '' }}" href="{{ route('frontend.about') }}">
                                About Us
                            </a>
                        </li>
                        <li class="dropdown-content">
                            <a class="{{ Route::is('frontend.services') || Route::is('frontend.ui-ux') || Route::is('frontend.web-design') || Route::is('frontend.web-development') || Route::is('frontend.app-development') || Route::is('frontend.business-service') ? 'active' : '' }}" href="javascript:void(0)">
                                Services
                                <i class="fa-solid fa-chevron-down down-arrow down-arrow-mob ms-2"></i>
                            </a>
                            <div class="dropdown-menu-item-main">
                                <ul>
                                    <li>
                                        <a href="{{ route('frontend.services') }}">
                                            All Services
                                        </a>
                                    </li>
                                    @foreach ($services as $service)
                                        <li class="{{ Route::is("frontend.$service->slug") ? 'active' : '' }}">
                                            <a href="{{ route("frontend.$service->slug") }}" class="nav-menu"> 
                                                {{ $service->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="{{ Route::is('frontend.portfolio') ? 'active' : '' }}" href="{{ route('frontend.portfolio') }}">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a class="{{ Route::is('frontend.contact-us') ? 'active' : '' }}" href="{{ route('frontend.contact-us') }}">
                                Contact
                            </a>
                        </li>
                    </ul>
                    <div class="social-icon-nav">
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
                    <div class="text-center">
                        <a href="{{ isset($setting->header_email) && !empty($setting->header_email) ? 'mailto:'.$setting->header_email : 'javascript:void(0)' }}" class="btn ms-0 d-lg-none">
                            {{ $setting->header_button_text }}
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- header end -->

    <!-- bredcumb start -->
    @isset($page)
        <section class="bredcumb-wrapper ">
            <div class="container">
                <div class="bredcumb-text">
                    <h2 class="wow fadeInDown" data-wow-delay=".4s">{{ $page }}</h2>
                </div>
            </div>
        </section>
    @endisset
    <!-- bredcumb end -->
