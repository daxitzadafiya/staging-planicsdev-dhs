<div>
    <section class="contact-newsletter wow fadeInDown" data-wow-delay=".4s">
        <div class="container">
            <div class="contact-newsletter-block">
                <div class="contact-newsletter-text">
                    <h2>{{ $title }}</h2>
                </div>
                <div>
                    <a href="{{ $link ?? 'javascript:void(0)' }}" target="{{ isset($link) && !empty($link) ? '_blank' : '_self' }}" class="contact-btn">{{ $text }}</a>
                </div>
            </div>
        </div>
    </section>
</div>
