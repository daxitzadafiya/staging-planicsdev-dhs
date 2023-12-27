@extends('layouts.main')

@section('page-title')
    {{ env('APP_NAME') }} - Settings
@endsection

@section('breadcrumb-title')
    Settings
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Settings
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5 bg-white rounded-md shadow">
        <div class="intro-y col-span-12 p-5">
            <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist">
                <li id="header-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4 active" data-tw-target="#header" aria-controls="header" aria-selected="true" role="tab">
                        Header
                    </a> 
                </li>
                <li id="about-us-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4" data-tw-target="#about-us" aria-controls="about-us" aria-selected="false" role="tab">
                        About Us
                    </a> 
                </li>
                <li id="contact-us-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4" data-tw-target="#contact-us" aria-controls="contact-us" aria-selected="false" role="tab">
                        Contact Us
                    </a> 
                </li>
                <li id="clients-partners-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4" data-tw-target="#clients-partners" aria-controls="clients-partners" aria-selected="false" role="tab">
                        Clients & Partners
                    </a>
                </li>
                <li id="point-of-difference-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4" data-tw-target="#point-of-difference" aria-controls="point-of-difference" aria-selected="false" role="tab">
                        Point Of Difference 
                    </a> 
                </li>
                <li id="service-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4" data-tw-target="#service" aria-controls="service" aria-selected="false" role="tab">
                        Service
                    </a>
                </li>
                <li id="achievement-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4" data-tw-target="#achievement" aria-controls="achievement" aria-selected="false" role="tab">
                        Achievement
                    </a>
                </li>
                <li id="core-value-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4" data-tw-target="#core-value" aria-controls="core-value" aria-selected="false" role="tab">
                        Core Value
                    </a>
                </li>
                <li id="technology-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4" data-tw-target="#technology" aria-controls="technology" aria-selected="false" role="tab">
                        Technology
                    </a>
                </li>
                <li id="portfolio-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4" data-tw-target="#portfolio" aria-controls="portfolio" aria-selected="false" role="tab">
                        Portfolio
                    </a>
                </li>
                <li id="contact-news-letter-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4" data-tw-target="#contact-news-letter" aria-controls="contact-news-letter" aria-selected="false" role="tab">
                        Contact News Letter
                    </a>
                </li>
                <li id="footer-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4" data-tw-target="#footer" aria-controls="footer" aria-selected="false" role="tab">
                        Footer
                    </a>
                </li>
            </ul>
            <form action="{{ route('settings.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @isset($setting)
                    <input type="hidden" name="id" value="{{ $setting->id }}">
                @endisset
                <div class="intro-y tab-content mt-5">
                    <div id="header" class="tab-pane active" role="tabpanel" aria-labelledby="header-tab">
                        <div>
                            <label for="header_logo" class="form-label">Logo</label>
                            <input id="header_logo" type="file" name="header_logo" class="form-control w-full">
                        </div>
                        @if(isset($setting->header_logo) && !empty($setting->header_logo))
                            <div class="w-24 h-24 image-fit mt-3 cursor-pointer zoom-in">
                                <img class="rounded-full" src="{{ url(Storage::url($setting->header_logo)) }}">
                            </div>
                        @endif
                        <div class="mt-3">
                            <label for="header_email" class="form-label">Email</label>
                            <input id="header_email" type="email" name="header_email" class="form-control w-full" value="{{ isset($setting->header_email) ? $setting->header_email : old('header_email') }}" placeholder="Please Enter Email">
                        </div>
                        <div class="mt-3">
                            <label for="header_button_text" class="form-label">Button Text</label>
                            <input id="header_button_text" type="text" name="header_button_text" class="form-control w-full" value="{{ isset($setting->header_button_text) ? $setting->header_button_text : old('header_button_text') }}" placeholder="Please Enter Button Text">
                        </div>
                    </div>
                    <div id="about-us" class="tab-pane" role="tabpanel" aria-labelledby="about-us-tab">
                        <div>
                            <label for="about_us_title" class="form-label">Title</label>
                            <input id="about_us_title" type="text" name="about_us_title" class="form-control w-full" value="{{ isset($setting->about_us_title) ? $setting->about_us_title : old('about_us_title') }}" placeholder="Please Enter Title">
                        </div>
                        <div class="mt-3">
                            <label for="about_us_description" class="form-label">Description</label>
                            <textarea name="about_us_description" id="about_us_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->about_us_description) ? $setting->about_us_description : old('about_us_description') }}</textarea>
                        </div>
                        <div class="mt-3">
                            <label for="about_us_image" class="form-label">Image</label>
                            <input id="about_us_image" type="file" name="about_us_image" class="form-control w-full">
                        </div>
                        @if(isset($setting->about_us_image) && !empty($setting->about_us_image))
                            <div class="w-24 h-24 image-fit mt-3 cursor-pointer zoom-in">
                                <img class="rounded-full" src="{{ url(Storage::url($setting->about_us_image)) }}">
                            </div>
                        @endif
                        <div class="gap-x-5 border border-slate-200 rounded-md p-8 mt-3">
                            <h2 class="mb-3 font-bold">Key Partners</h2>
                            <div class="about_us_key_partners_div">
                                @if(isset($setting->about_us_key_partners) && !empty($setting->about_us_key_partners))
                                    @foreach ($setting->about_us_key_partners as $key => $about_us_key_partner)
                                        @if($loop->first)
                                            <div class="flex justify-between gap-x-5">
                                                <div class="w-full">
                                                    <label for="about_us_key_partners_title_{{ $key }}" class="form-label">Title</label>
                                                    <input id="about_us_key_partners_title_{{ $key }}" type="text" name="about_us_key_partners[{{ $key }}][title]" class="form-control w-full" value="{{ $about_us_key_partner['title'] }}" placeholder="Please Enter Title" autocomplete="off">
                                                    <small class="text-danger" id="about_us_key_partners_title_error_{{ $key }}"></small>
                                                </div>
                                                <div class="w-full">
                                                    <label for="about_us_key_partners_description_{{ $key }}" class="form-label">Description</label>
                                                    <textarea id="about_us_key_partners_description_{{ $key }}" name="about_us_key_partners[{{ $key }}][description]" cols="8" rows="4" class="form-control w-full" placeholder="Please Enter Description" autocomplete="off">
                                                        {{ $about_us_key_partner['description'] }}
                                                    </textarea>
                                                    <small class="text-danger" id="about_us_key_partners_description_error_{{ $key }}"></small>
                                                </div>
                                                <div class="mt-6">
                                                    <button type="button" class="btn btn-sm btn-primary w-full addMore" data-count="{{ count($setting->about_us_key_partners) }}" onclick="addMore(this)">
                                                        <i data-lucide="plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @else
                                            <div class="flex justify-between items-center mt-5 gap-x-5 removeRow">
                                                <div class="w-full">
                                                    <input id="about_us_key_partners_title_{{ $key }}" type="text" name="about_us_key_partners[{{ $key }}][title]" class="form-control w-full" value="{{ $about_us_key_partner['title'] }}" placeholder="Please Enter Title" autocomplete="off">
                                                    <small class="text-danger" id="about_us_key_partners_title_error_{{ $key }}"></small>
                                                </div>
                                                <div class="w-full">
                                                    <textarea id="about_us_key_partners_description_{{ $key }}" name="about_us_key_partners[{{ $key }}][description]" cols="8" rows="4" class="form-control w-full" placeholder="Please Enter Description" autocomplete="off">
                                                        {{ $about_us_key_partner['description'] }}
                                                    </textarea>
                                                    <small class="text-danger" id="about_us_key_partners_description_error_{{ $key }}"></small>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-sm btn-danger w-full" data-count="{{ count($setting->about_us_key_partners) }}" onclick="removeRow(this)">
                                                        <i data-lucide="minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else    
                                    <div class="flex justify-between gap-x-5">
                                        <div class="w-full">
                                            <label for="about_us_key_partners_title_0" class="form-label">Title</label>
                                            <input id="about_us_key_partners_title_0" type="text" name="about_us_key_partners[0][title]" class="form-control w-full" placeholder="Please Enter Title" autocomplete="off">
                                            <small class="text-danger" id="about_us_key_partners_title_error_0"></small>
                                        </div>
                                        <div class="w-full">
                                            <label for="about_us_key_partners_description_0" class="form-label">Description</label>
                                            <textarea id="about_us_key_partners_description_0" name="about_us_key_partners[0][description]" cols="8" rows="4" class="form-control w-full" placeholder="Please Enter Description" autocomplete="off"></textarea>
                                            <small class="text-danger" id="about_us_key_partners_description_error_0"></small>
                                        </div>
                                        <div class="mt-6">
                                            <button type="button" class="btn btn-sm btn-primary w-full addMore" data-count="0" onclick="addMore(this)">
                                                <i data-lucide="plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="contact-us" class="tab-pane" role="tabpanel" aria-labelledby="contact-us-tab">
                        <div>
                            <label for="contact_us_title" class="form-label">Title</label>
                            <input id="contact_us_title" type="text" name="contact_us_title" class="form-control w-full" value="{{ isset($setting->contact_us_title) ? $setting->contact_us_title : old('contact_us_title') }}" placeholder="Please Enter Title">
                        </div>
                        <div class="mt-3">
                            <label for="contact_us_description" class="form-label">Description</label>
                            <textarea name="contact_us_description" id="contact_us_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->contact_us_description) ? $setting->contact_us_description : old('contact_us_description') }}</textarea>
                        </div>
                        <div class="mt-3">
                            <label for="contact_us_image" class="form-label">Image</label>
                            <input id="contact_us_image" type="file" name="contact_us_image" class="form-control w-full">
                        </div>
                        @if(isset($setting->contact_us_image) && !empty($setting->contact_us_image))
                            <div class="w-24 h-24 image-fit mt-3 cursor-pointer zoom-in">
                                <img class="rounded-full" src="{{ url(Storage::url($setting->contact_us_image)) }}">
                            </div>
                        @endif
                    </div>
                    <div id="clients-partners" class="tab-pane" role="tabpanel" aria-labelledby="clients-partners-tab">
                        <div>
                            <label for="clients_partners_title" class="form-label">Title</label>
                            <input id="clients_partners_title" type="text" name="clients_partners_title" class="form-control w-full" value="{{ isset($setting->clients_partners_title) ? $setting->clients_partners_title : old('clients_partners_title') }}" placeholder="Please Enter Title">
                        </div>
                        <div class="mt-3">
                            <label for="clients_partners_description" class="form-label">Description</label>
                            <textarea name="clients_partners_description" id="clients_partners_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->clients_partners_description) ? $setting->clients_partners_description : old('clients_partners_description') }}</textarea>
                        </div>
                    </div>
                    <div id="point-of-difference" class="tab-pane" role="tabpanel" aria-labelledby="point-of-difference-tab">
                        <div>
                            <label for="point_of_differences_title" class="form-label">Title</label>
                            <input id="point_of_differences_title" type="text" name="point_of_differences_title" class="form-control w-full" value="{{ isset($setting->point_of_differences_title) ? $setting->point_of_differences_title : old('point_of_differences_title') }}" placeholder="Please Enter Title">
                        </div>
                        <div class="mt-3">
                            <label for="point_of_differences_description" class="form-label">Description</label>
                            <textarea name="point_of_differences_description" id="point_of_differences_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->point_of_differences_description) ? $setting->point_of_differences_description : old('point_of_differences_description') }}</textarea>
                        </div>
                    </div>
                    <div id="service" class="tab-pane" role="tabpanel" aria-labelledby="service-tab">
                        <div>
                            <label for="services_title" class="form-label">Title</label>
                            <input id="services_title" type="text" name="services_title" class="form-control w-full" value="{{ isset($setting->services_title) ? $setting->services_title : old('services_title') }}" placeholder="Please Enter Title">
                        </div>
                        <div class="mt-3">
                            <label for="services_description" class="form-label">Description</label>
                            <textarea name="services_description" id="services_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->services_description) ? $setting->services_description : old('services_description') }}</textarea>
                        </div>
                    </div>
                    <div id="achievement" class="tab-pane" role="tabpanel" aria-labelledby="achievement-tab">
                        <div>
                            <label for="achievement_title" class="form-label">Title</label>
                            <input id="achievement_title" type="text" name="achievement_title" class="form-control w-full" value="{{ isset($setting->achievement_title) ? $setting->achievement_title : old('achievement_title') }}" placeholder="Please Enter Title">
                        </div>
                        <div class="mt-3">
                            <label for="achievement_description" class="form-label">Description</label>
                            <textarea name="achievement_description" id="achievement_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->achievement_description) ? $setting->achievement_description : old('achievement_description') }}</textarea>
                        </div>
                        <div class="mt-3">
                            <label for="achievement_logo" class="form-label">Logo</label>
                            <input id="achievement_logo" type="file" name="achievement_logo" class="form-control w-full">
                        </div>
                        @if(isset($setting->achievement_logo) && !empty($setting->achievement_logo))
                            <div class="w-24 h-24 image-fit mt-3 cursor-pointer zoom-in">
                                <img class="rounded-full" src="{{ url(Storage::url($setting->achievement_logo)) }}">
                            </div>
                        @endif
                    </div>
                    <div id="core-value" class="tab-pane" role="tabpanel" aria-labelledby="core-value-tab">
                        <div>
                            <label for="core_values_title" class="form-label">Title</label>
                            <input id="core_values_title" type="text" name="core_values_title" class="form-control w-full" value="{{ isset($setting->core_values_title) ? $setting->core_values_title : old('core_values_title') }}" placeholder="Please Enter Title">
                        </div>
                        <div class="mt-3">
                            <label for="core_values_description" class="form-label">Description</label>
                            <textarea name="core_values_description" id="core_values_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->core_values_description) ? $setting->core_values_description : old('core_values_description') }}</textarea>
                        </div>
                    </div>
                    <div id="technology" class="tab-pane" role="tabpanel" aria-labelledby="technology-tab">
                        <div>
                            <label for="technologies_title" class="form-label">Title</label>
                            <input id="technologies_title" type="text" name="technologies_title" class="form-control w-full" value="{{ isset($setting->technologies_title) ? $setting->technologies_title : old('technologies_title') }}" placeholder="Please Enter Title">
                        </div>
                        <div class="mt-3">
                            <label for="technologies_description" class="form-label">Description</label>
                            <textarea name="technologies_description" id="technologies_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->technologies_description) ? $setting->technologies_description : old('technologies_description') }}</textarea>
                        </div>
                    </div>
                    <div id="portfolio" class="tab-pane" role="tabpanel" aria-labelledby="portfolio-tab">
                        <div>
                            <label for="portfolio_title" class="form-label">Title</label>
                            <input id="portfolio_title" type="text" name="portfolio_title" class="form-control w-full" value="{{ isset($setting->portfolio_title) ? $setting->portfolio_title : old('portfolio_title') }}" placeholder="Please Enter Title">
                        </div>
                        <div class="mt-3">
                            <label for="portfolio_description" class="form-label">Description</label>
                            <textarea name="portfolio_description" id="portfolio_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->portfolio_description) ? $setting->portfolio_description : old('portfolio_description') }}</textarea>
                        </div>
                    </div>
                    <div id="contact-news-letter" class="tab-pane" role="tabpanel" aria-labelledby="contact-news-letter-tab">
                        <div>
                            <label for="contact_news_letter_title" class="form-label">Title</label>
                            <input id="contact_news_letter_title" type="text" name="contact_news_letter_title" class="form-control w-full" value="{{ isset($setting->contact_news_letter_title) ? $setting->contact_news_letter_title : old('contact_news_letter_title') }}" placeholder="Please Enter Title">
                        </div>
                        <div class="mt-3">
                            <label for="contact_news_letter_button_link" class="form-label">Button Link</label>
                            <input id="contact_news_letter_button_link" type="text" name="contact_news_letter_button_link" class="form-control w-full" value="{{ isset($setting->contact_news_letter_button_link) ? $setting->contact_news_letter_button_link : old('contact_news_letter_button_link') }}" placeholder="Please Enter Button Link">
                        </div>
                        <div class="mt-3">
                            <label for="contact_news_letter_button_text" class="form-label">Button Text</label>
                            <input id="contact_news_letter_button_text" type="text" name="contact_news_letter_button_text" class="form-control w-full" value="{{ isset($setting->contact_news_letter_button_text) ? $setting->contact_news_letter_button_text : old('contact_news_letter_button_text') }}" placeholder="Please Enter Button Text">
                        </div>
                    </div>
                    <div id="footer" class="tab-pane" role="tabpanel" aria-labelledby="footer-tab">
                        <div>
                            <label for="footer_logo" class="form-label">Logo</label>
                            <input id="footer_logo" type="file" name="footer_logo" class="form-control w-full">
                        </div>
                        @if(isset($setting->footer_logo) && !empty($setting->footer_logo))
                            <div class="w-24 h-24 image-fit mt-3 cursor-pointer zoom-in">
                                <img class="rounded-full" src="{{ url(Storage::url($setting->footer_logo)) }}">
                            </div>
                        @endif
                        <div class="mt-3">
                            <label for="footer_description" class="form-label">Description</label>
                            <textarea name="footer_description" id="footer_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->footer_description) ? $setting->footer_description : old('footer_description') }}</textarea>
                        </div>
                        <div class="mt-3">
                            <label for="footer_email" class="form-label">Email</label>
                            <input id="footer_email" type="email" name="footer_email" class="form-control w-full" value="{{ isset($setting->footer_email) ? $setting->footer_email : old('footer_email') }}" placeholder="Please Enter Email">
                        </div>
                        <div class="mt-3">
                            <label for="footer_contact" class="form-label">Contact</label>
                            <input id="footer_contact" type="text" name="footer_contact" class="form-control w-full" value="{{ isset($setting->footer_contact) ? $setting->footer_contact : old('footer_contact') }}" placeholder="Please Enter Contact">
                        </div>
                        <div class="mt-3">
                            <label for="map_link" class="form-label">Map Link</label>
                            <input id="map_link" type="url" name="map_link" class="form-control w-full" value="{{ isset($setting->map_link) ? $setting->map_link : old('map_link') }}" placeholder="Please Enter Map Link">
                        </div>
                        <div class="mt-3">
                            <label for="footer_address_one" class="form-label">Address One</label>
                            <textarea name="footer_address_one" id="footer_address_one" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Address One">{{ isset($setting->footer_address_one) ? $setting->footer_address_one : old('footer_address_one') }}</textarea>
                        </div>
                        <div class="mt-3">
                            <label for="footer_address_two" class="form-label">Address Two</label>
                            <textarea name="footer_address_two" id="footer_address_two" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Address Two">{{ isset($setting->footer_address_two) ? $setting->footer_address_two : old('footer_address_two') }}</textarea>
                        </div>
                        <div class="mt-3">
                            <label for="linked_in_url" class="form-label">Linked In URL</label>
                            <input id="linked_in_url" type="url" name="linked_in_url" class="form-control w-full" value="{{ isset($setting->linked_in_url) ? $setting->linked_in_url : old('linked_in_url') }}" placeholder="Please Enter Linked In URL">
                        </div>
                        <div class="mt-3">
                            <label for="instagram_url" class="form-label">Instagram URL</label>
                            <input id="instagram_url" type="url" name="instagram_url" class="form-control w-full" value="{{ isset($setting->instagram_url) ? $setting->instagram_url : old('instagram_url') }}" placeholder="Please Enter Instagram URL">
                        </div>
                        <div class="mt-3">
                            <label for="facebook_url" class="form-label">Facebook URL</label>
                            <input id="facebook_url" type="url" name="facebook_url" class="form-control w-full" value="{{ isset($setting->facebook_url) ? $setting->facebook_url : old('facebook_url') }}" placeholder="Please Enter Facebook URL">
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary w-24">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        const addMore = (data) => {
            let count = $(data).attr('data-count');
                count = parseInt(count);

            $(`#about_us_key_partners_title_${count}`).removeClass('border-danger');
            $(`#about_us_key_partners_description_${count}`).removeClass('border-danger');
            $(`#about_us_key_partners_title_error_${count}`).html('');
            $(`#about_us_key_partners_description_error_${count}`).html('');
            if($(`#about_us_key_partners_title_${count}`).val() == "") {
                $(`#about_us_key_partners_title_${count}`).addClass('border-danger');
                $(`#about_us_key_partners_title_error_${count}`).html('The Title field is required!');
                return false;
            }

            if($(`#about_us_key_partners_description_${count}`).val() == "") {
                $(`#about_us_key_partners_description_${count}`).addClass('border-danger');
                $(`#about_us_key_partners_description_error_${count}`).html('The Description field is required!');
                return false;
            }

            let increment = ++count;

            let html = ``;
                html += `<div class="flex justify-between items-center mt-5 gap-x-5 removeRow">`;
                html += `<div class="w-full">`;
                html += `<input id="about_us_key_partners_title_${increment}" type="text" name="about_us_key_partners[${increment}][title]" class="form-control w-full" placeholder="Please Enter Title" autocomplete="off">`;
                html += `<small class="text-danger" id="about_us_key_partners_title_error_${increment}"></small>`;
                html += `</div>`;
                html += `<div class="w-full">`;
                html += `<textarea id="about_us_key_partners_description_${increment}" name="about_us_key_partners[${increment}][description]" cols="8" rows="4" class="form-control w-full" placeholder="Please Enter Description" autocomplete="off"></textarea>`;
                html += `<small class="text-danger" id="about_us_key_partners_description_error_${increment}"></small>`;
                html += `</div>`;
                html += `<div>`;
                html += `<button type="button" class="btn btn-sm btn-danger w-full" data-count="${increment}" onclick="removeRow(this)">`;
                html += `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="minus" data-lucide="minus" class="lucide lucide-minus">`;
                html += `<line x1="5" y1="12" x2="19" y2="12"></line>`;
                html += `</svg>`;
                html += `</button>`;
                html += `</div>`;
                html += `</div>`;

                $('.addMore').attr('data-count', increment);
                $('.about_us_key_partners_div').append(html);
        };

        const removeRow = (data) => {
            let count = $(data).attr('data-count');
                count = parseInt(count);
                count = Math.max(0, count - 1);

            $('.addMore').attr('data-count', count);

            $(data).parents('.removeRow').remove();
        };
    </script>
@endpush