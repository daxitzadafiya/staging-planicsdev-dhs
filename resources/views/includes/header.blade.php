<div class="top-bar-boxed h-[70px] md:h-[65px] z-[51] border-b border-white/[0.08] md:mt-12 mt-0  -mx-3 sm:-mx-8 md:-mx-0 px-3 md:border-b-0 relative md:fixed md:inset-x-0 md:top-0 sm:px-8 md:px-10 md:pt-10 md:bg-gradient-to-b md:from-slate-100 md:to-transparent dark:md:from-darkmode-700">
    <div class="h-full flex items-center relative">
        <a href="{{ route('dashboard') }}" class="logo -intro-x hidden md:flex xl:w-[180px] block">
            <img alt="Planics Dev" class="logo__image header-logo" src="{{ asset('frontend/assets/img/footer-logo.png') }}">
        </a>
        <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
            <ol class="breadcrumb breadcrumb-light">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ env('APP_NAME') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb-title')</li>
            </ol>
        </nav>
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                <img alt="Planics Dev" src="{{ asset('dist/images/profile-5.jpg') }}">
            </div>
            <div class="dropdown-menu w-56">
                <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                    <li class="p-2">
                        <div class="font-medium">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">{{ Auth::user()->email }}</div>
                    </li>
                    <li>
                        <a href="{{ route('profile.edit') }}" class="dropdown-item hover:bg-white/5">
                            <i data-lucide="user" class="w-4 h-4 mr-2"></i> 
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="dropdown-item hover:bg-white/5"> 
                            <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> 
                            Logout 
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>