<nav class="side-nav">
    <ul>
        <li>
            <a href="{{ route('dashboard') }}" class="side-menu {{ Route::is('dashboard') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="{{ route('hero-sections.index') }}" class="side-menu {{ Route::is('hero-sections.*') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="book"></i> </div>
                <div class="side-menu__title"> Hero Sections </div>
            </a>
        </li>
        <li>
            <a href="{{ route('point-of-differences.index') }}" class="side-menu {{ Route::is('point-of-differences.*') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="book-open"></i> </div>
                <div class="side-menu__title"> Point Of Differences </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{ Route::is(['services.*', 'service-categories.*', 'core-values.*', 'achievements.*', 'technologies.*']) ? 'side-menu--active side-menu--open' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                <div class="side-menu__title"> Services <i data-lucide="chevron-down" class="side-menu__sub-icon "></i> </div>
            </a>
            <ul class="{{ Route::is(['services.*', 'service-categories.*', 'core-values.*', 'achievements.*', 'technologies.*']) ? 'side-menu__sub-open' : '' }}">
                <li>
                    <a href="{{ route('services.index') }}" class="side-menu {{ Route::is('services.*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Services </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('service-categories.index') }}" class="side-menu {{ Route::is('service-categories.*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="package"></i> </div>
                        <div class="side-menu__title"> Service Categories </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('core-values.index') }}" class="side-menu {{ Route::is('core-values.*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="briefcase"></i> </div>
                        <div class="side-menu__title"> Core Values </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('achievements.index') }}" class="side-menu {{ Route::is('achievements.*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="award"></i> </div>
                        <div class="side-menu__title"> Achievements </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('technologies.index') }}" class="side-menu {{ Route::is('technologies.*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="globe"></i> </div>
                        <div class="side-menu__title"> Technologies </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('portfolios.index') }}" class="side-menu {{ Route::is('portfolios.*') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title"> Portfolio </div>
            </a>
        </li>
        <li>
            <a href="{{ route('settings.index') }}" class="side-menu {{ Route::is('settings.index') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="settings"></i> </div>
                <div class="side-menu__title"> Settings </div>
            </a>
        </li>
    </ul>
</nav>