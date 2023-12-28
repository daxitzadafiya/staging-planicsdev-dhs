@extends('layouts.main')

@section('page-title')
    {{ env('APP_NAME') }} - {{ isset($heroSection) ? 'Update' : 'Create' }} Hero Section
@endsection

@section('breadcrumb-title')
    {{ isset($heroSection) ? 'Update' : 'Create' }} Hero Section
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($heroSection) ? 'Update' : 'Create' }} Hero Section
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-9">
            <div class="intro-y box p-5">
                <form action="{{ isset($heroSection) ? route('hero-sections.update', $heroSection) : route('hero-sections.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @isset($heroSection)
                        @method('put')
                    @endisset
                    <div>
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type="text" name="title" class="form-control w-full @error('title') border-danger @enderror" value="{{ isset($heroSection->title) ? $heroSection->title : old('title') }}" placeholder="Please Enter Title">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="sub_title" class="form-label">Sub Title</label>
                        <input id="sub_title" type="text" name="sub_title" class="form-control w-full @error('sub_title') border-danger @enderror" value="{{ isset($heroSection->sub_title) ? $heroSection->sub_title : old('sub_title') }}" placeholder="Please Enter Sub Title">
                        @error('sub_title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control w-full @error('description') border-danger @enderror" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($heroSection->description) ? $heroSection->description : old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="button_text" class="form-label">Button Text</label>
                        <input id="button_text" type="text" name="button_text" class="form-control w-full @error('button_text') border-danger @enderror" value="{{ isset($heroSection->button_text) ? $heroSection->button_text : old('button_text') }}" placeholder="Please Enter Button Text">
                        @error('button_text')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="button_url" class="form-label">Button URL</label>
                        <input id="button_url" type="text" name="button_url" class="form-control w-full @error('button_url') border-danger @enderror" value="{{ isset($heroSection->button_url) ? $heroSection->button_url : old('button_url') }}" placeholder="Please Enter Button URL">
                        @error('button_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="image" class="form-label">Image</label>
                        <input id="image" type="file" name="image" class="form-control w-full">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    @if(isset($heroSection->image) && !empty($heroSection->image))
                        <div class="w-24 h-24 image-fit mt-3 cursor-pointer zoom-in">
                            <img class="rounded-full" src="{{ url(Storage::url($heroSection->image)) }}">
                        </div>
                    @endif
                    <div class="mt-3">
                        <label for="is_active" class="form-label">Is Active</label>
                        <div class="form-switch mt-2">
                            <input type="checkbox" id="is_active" name="is_active" class="form-check-input" {{ isset($heroSection->is_active) && $heroSection->is_active == 1 ? 'checked' : "" }}>
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('hero-sections.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary w-24">{{ isset($heroSection) ? 'Update' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
