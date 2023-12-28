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
            <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center justify-between text-center" role="tablist">
                <li id="header-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4 px-1 active" data-tw-target="#header" aria-controls="header" aria-selected="true" role="tab">
                        Header
                    </a> 
                </li>
                <li id="about-us-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4 px-1" data-tw-target="#about-us" aria-controls="about-us" aria-selected="false" role="tab">
                        About Us
                    </a> 
                </li>
                <li id="contact-us-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4 px-1" data-tw-target="#contact-us" aria-controls="contact-us" aria-selected="false" role="tab">
                        Contact Us
                    </a> 
                </li>
                <li id="clients-partners-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4 px-1" data-tw-target="#clients-partners" aria-controls="clients-partners" aria-selected="false" role="tab">
                        Clients & Partners
                    </a>
                </li>
                <li id="point-of-difference-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4 px-1" data-tw-target="#point-of-difference" aria-controls="point-of-difference" aria-selected="false" role="tab">
                        Point Of Difference 
                    </a> 
                </li>
                <li id="service-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4 px-1" data-tw-target="#service" aria-controls="service" aria-selected="false" role="tab">
                        Service
                    </a>
                </li>
                <li id="portfolio-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4 px-1" data-tw-target="#portfolio" aria-controls="portfolio" aria-selected="false" role="tab">
                        Portfolio
                    </a>
                </li>
                <li id="key-features-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4 px-1" data-tw-target="#key-features" aria-controls="key-features" aria-selected="false" role="tab">
                        Key Features
                    </a>
                </li>
                <li id="success_story-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4 px-1" data-tw-target="#success_story" aria-controls="success_story" aria-selected="false" role="tab">
                        Success Stories
                    </a>
                </li>
                <li id="our_process-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4 px-1" data-tw-target="#our_process" aria-controls="our_process" aria-selected="false" role="tab">
                        Our Process
                    </a>
                </li>
                <li id="client_says-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4 px-1" data-tw-target="#client_says" aria-controls="client_says" aria-selected="false" role="tab">
                        Client Says
                    </a>
                </li>
                <li id="contact-news-letter-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4 px-1" data-tw-target="#contact-news-letter" aria-controls="contact-news-letter" aria-selected="false" role="tab">
                        Contact News Letter
                    </a>
                </li>
                <li id="footer-tab" class="nav-item" role="presentation"> 
                    <a href="javascript:;" class="nav-link py-4 px-1" data-tw-target="#footer" aria-controls="footer" aria-selected="false" role="tab">
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
                                            <div class="flex justify-between mt-5 gap-x-5 removeRow">
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
                        <div class="mt-5">
                            <div class="text-center font-semibold text-lg">
                                <h1>Achivement</h1>
                            </div>
                            <div class="mt-3">
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
                        <div class="mt-5">
                            <div class="text-center font-semibold text-lg">
                                <h1>Core Value</h1>
                            </div>
                            <div class="mt-3">
                                <label for="core_values_title" class="form-label">Title</label>
                                <input id="core_values_title" type="text" name="core_values_title" class="form-control w-full" value="{{ isset($setting->core_values_title) ? $setting->core_values_title : old('core_values_title') }}" placeholder="Please Enter Title">
                            </div>
                            <div class="mt-3">
                                <label for="core_values_description" class="form-label">Description</label>
                                <textarea name="core_values_description" id="core_values_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->core_values_description) ? $setting->core_values_description : old('core_values_description') }}</textarea>
                            </div>
                        </div>
                        <div class="mt-5">
                            <div class="text-center font-semibold text-lg">
                                <h1>Technology</h1>
                            </div>
                            <div class="mt-3">
                                <label for="technologies_title" class="form-label">Title</label>
                                <input id="technologies_title" type="text" name="technologies_title" class="form-control w-full" value="{{ isset($setting->technologies_title) ? $setting->technologies_title : old('technologies_title') }}" placeholder="Please Enter Title">
                            </div>
                            <div class="mt-3">
                                <label for="technologies_description" class="form-label">Description</label>
                                <textarea name="technologies_description" id="technologies_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->technologies_description) ? $setting->technologies_description : old('technologies_description') }}</textarea>
                            </div>
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
                    <div id="key-features" class="tab-pane" role="tabpanel" aria-labelledby="key-features-tab">
                        <div>
                            <label for="key_features_title" class="form-label">Title</label>
                            <input id="key_features_title" type="text" name="key_features_title" class="form-control w-full" value="{{ isset($setting->key_features_title) ? $setting->key_features_title : old('key_features_title') }}" placeholder="Please Enter Title">
                        </div>
                        <div class="mt-3">
                            <label for="key_features_description" class="form-label">Description</label>
                            <textarea name="key_features_description" id="key_features_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->key_features_description) ? $setting->key_features_description : old('key_features_description') }}</textarea>
                        </div>
                    </div>
                    <div id="success_story" class="tab-pane" role="tabpanel" aria-labelledby="success_story-tab">
                        <div>
                            <label for="success_story_title" class="form-label">Title</label>
                            <input id="success_story_title" type="text" name="success_story_title" class="form-control w-full" value="{{ isset($setting->success_story_title) ? $setting->success_story_title : old('success_story_title') }}" placeholder="Please Enter Title">
                        </div>
                        <div class="mt-3">
                            <label for="success_story_description" class="form-label">Description</label>
                            <textarea name="success_story_description" id="success_story_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->success_story_description) ? $setting->success_story_description : old('success_story_description') }}</textarea>
                        </div>
                        <div class="mt-3">
                            <label for="success_story_sub_title" class="form-label">Sub Title</label>
                            <input id="success_story_sub_title" type="text" name="success_story_sub_title" class="form-control w-full" value="{{ isset($setting->success_story_sub_title) ? $setting->success_story_sub_title : old('success_story_sub_title') }}" placeholder="Please Enter Title">
                        </div>
                        <div class="mt-3">
                            <label for="success_story_sub_description" class="form-label">Sub Description</label>
                            <textarea name="success_story_sub_description" id="success_story_sub_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->success_story_sub_description) ? $setting->success_story_sub_description : old('success_story_sub_description') }}</textarea>
                        </div>
                        <div class="mt-3">
                            <label for="success_story_logo" class="form-label">Logo</label>
                            <input id="success_story_logo" type="file" name="success_story_logo" class="form-control w-full">
                        </div>
                        @if(isset($setting->success_story_logo) && !empty($setting->success_story_logo))
                            <div class="w-24 h-24 image-fit mt-3 cursor-pointer zoom-in">
                                <img class="rounded-full" src="{{ url(Storage::url($setting->success_story_logo)) }}">
                            </div>
                        @endif
                        <div class="gap-x-5 border border-slate-200 rounded-md p-8 mt-3">
                            <h2 class="mb-3 font-bold">Our Works</h2>
                            <div class="our_works_div">
                                @if(isset($setting->our_works) && !empty($setting->our_works))
                                    @foreach ($setting->our_works as $index => $our_work)
                                        @if($loop->first)
                                            <div class="flex justify-between gap-x-5">
                                                <div class="w-full">
                                                    <label for="our_works_key_{{ $index }}" class="form-label">Key</label>
                                                    <input id="our_works_key_{{ $index }}" type="text" name="our_works[{{ $index }}][key]" class="form-control w-full" value="{{ $our_work['key'] }}" placeholder="Please Enter Key" autocomplete="off">
                                                    <small class="text-danger" id="our_works_key_error_{{ $index }}"></small>
                                                </div>
                                                <div class="w-full">
                                                    <label for="our_works_value_{{ $index }}" class="form-label">Value</label>
                                                    <input id="our_works_value_{{ $index }}" type="text" name="our_works[{{ $index }}][value]" class="form-control w-full" value="{{ $our_work['value'] }}" placeholder="Please Enter Value" autocomplete="off">
                                                    <small class="text-danger" id="our_works_value_error_{{ $index }}"></small>
                                                </div>
                                                <div class="mt-6">
                                                    <button type="button" class="btn btn-sm btn-primary w-full addMoreWork" data-count="{{ count($setting->our_works) }}" onclick="addMoreWork(this)">
                                                        <i data-lucide="plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @else
                                            <div class="flex justify-between mt-5 gap-x-5 removeWorkRow">
                                                <div class="w-full">
                                                    <input id="our_works_key_{{ $index }}" type="text" name="our_works[{{ $index }}][key]" class="form-control w-full" value="{{ $our_work['key'] }}" placeholder="Please Enter Key" autocomplete="off">
                                                    <small class="text-danger" id="our_works_key_error_{{ $index }}"></small>
                                                </div>
                                                <div class="w-full">
                                                    <input id="our_works_value_{{ $index }}" type="text" name="our_works[{{ $index }}][value]" class="form-control w-full" value="{{ $our_work['value'] }}" placeholder="Please Enter Value" autocomplete="off">
                                                    <small class="text-danger" id="our_works_value_error_{{ $index }}"></small>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-sm btn-danger w-full" data-count="{{ count($setting->our_works) }}" onclick="removeWorkRow(this)">
                                                        <i data-lucide="minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else    
                                    <div class="flex justify-between gap-x-5">
                                        <div class="w-full">
                                            <label for="our_works_key_0" class="form-label">Key</label>
                                            <input id="our_works_key_0" type="text" name="our_works[0][key]" class="form-control w-full" placeholder="Please Enter Key" autocomplete="off">
                                            <small class="text-danger" id="our_works_key_error_0"></small>
                                        </div>
                                        <div class="w-full">
                                            <label for="our_works_value_0" class="form-label">Value</label>
                                            <input id="our_works_value_0" type="text" name="our_works[0][value]" class="form-control w-full" placeholder="Please Enter Value" autocomplete="off">
                                            <small class="text-danger" id="our_works_value_error_0"></small>
                                        </div>
                                        <div class="mt-6">
                                            <button type="button" class="btn btn-sm btn-primary w-full addMoreWork" data-count="0" onclick="addMoreWork(this)">
                                                <i data-lucide="plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="our_process" class="tab-pane" role="tabpanel" aria-labelledby="our_process-tab">
                        <div>
                            <label for="our_process_title" class="form-label">Title</label>
                            <input id="our_process_title" type="text" name="our_process_title" class="form-control w-full" value="{{ isset($setting->our_process_title) ? $setting->our_process_title : old('our_process_title') }}" placeholder="Please Enter Title">
                        </div>
                        <div class="mt-3">
                            <label for="our_process_description" class="form-label">Description</label>
                            <textarea name="our_process_description" id="our_process_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->our_process_description) ? $setting->our_process_description : old('our_process_description') }}</textarea>
                        </div>
                    </div>
                    <div id="client_says" class="tab-pane" role="tabpanel" aria-labelledby="client_says-tab">
                        <div>
                            <label for="client_says_title" class="form-label">Title</label>
                            <input id="client_says_title" type="text" name="client_says_title" class="form-control w-full" value="{{ isset($setting->client_says_title) ? $setting->client_says_title : old('client_says_title') }}" placeholder="Please Enter Title">
                        </div>
                        <div class="mt-3">
                            <label for="client_says_description" class="form-label">Description</label>
                            <textarea name="client_says_description" id="client_says_description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($setting->client_says_description) ? $setting->client_says_description : old('client_says_description') }}</textarea>
                        </div>
                        <div class="mt-3">
                            <label for="client_says_logo" class="form-label">Logo</label>
                            <input id="client_says_logo" type="file" name="client_says_logo" class="form-control w-full">
                        </div>
                        @if(isset($setting->client_says_logo) && !empty($setting->client_says_logo))
                            <div class="w-24 h-24 image-fit mt-3 cursor-pointer zoom-in">
                                <img class="rounded-full" src="{{ url(Storage::url($setting->client_says_logo)) }}">
                            </div>
                        @endif
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
                html += `<div class="flex justify-between mt-5 gap-x-5 removeRow">`;
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

        const addMoreWork = (data) => {
            let count = $(data).attr('data-count');
                count = parseInt(count);

            $(`#our_works_key_${count}`).removeClass('border-danger');
            $(`#our_works_value_${count}`).removeClass('border-danger');
            $(`#our_works_key_error_${count}`).html('');
            $(`#our_works_value_error_${count}`).html('');
            if($(`#our_works_key_${count}`).val() == "") {
                $(`#our_works_key_${count}`).addClass('border-danger');
                $(`#our_works_key_error_${count}`).html('The Key field is required!');
                return false;
            }

            if($(`#our_works_value_${count}`).val() == "") {
                $(`#our_works_value_${count}`).addClass('border-danger');
                $(`#our_works_value_error_${count}`).html('The Value field is required!');
                return false;
            }

            let increment = ++count;

            let html = ``;
                html += `<div class="flex justify-between mt-5 gap-x-5 removeWorkRow">`;
                html += `<div class="w-full">`;
                html += `<input id="our_works_key_${increment}" type="text" name="our_works[${increment}][key]" class="form-control w-full" placeholder="Please Enter Key" autocomplete="off">`;
                html += `<small class="text-danger" id="our_works_key_error_${increment}"></small>`;
                html += `</div>`;
                html += `<div class="w-full">`;
                html += `<input id="our_works_value_${increment}" type="text" name="our_works[${increment}][value]" class="form-control w-full" placeholder="Please Enter Value" autocomplete="off">`;
                html += `<small class="text-danger" id="our_works_value_error_${increment}"></small>`;
                html += `</div>`;
                html += `<div>`;
                html += `<button type="button" class="btn btn-sm btn-danger w-full" data-count="${increment}" onclick="removeWorkRow(this)">`;
                html += `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="minus" data-lucide="minus" class="lucide lucide-minus">`;
                html += `<line x1="5" y1="12" x2="19" y2="12"></line>`;
                html += `</svg>`;
                html += `</button>`;
                html += `</div>`;
                html += `</div>`;

                $('.addMoreWork').attr('data-count', increment);
                $('.our_works_div').append(html);
        };

        const removeWorkRow = (data) => {
            let count = $(data).attr('data-count');
                count = parseInt(count);
                count = Math.max(0, count - 1);

            $('.addMoreWork').attr('data-count', count);

            $(data).parents('.removeWorkRow').remove();
        };
    </script>
@endpush