@extends('layouts.main')

@section('page-title')
    {{ env('APP_NAME') }} - {{ isset($pointOfDifference) ? 'Update' : 'Create' }} Point Of Difference
@endsection

@section('breadcrumb-title')
    {{ isset($pointOfDifference) ? 'Update' : 'Create' }} Point Of Difference
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($pointOfDifference) ? 'Update' : 'Create' }} Point Of Difference
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-9">
            <div class="intro-y box p-5">
                <form action="{{ isset($pointOfDifference) ? route('point-of-differences.update', $pointOfDifference) : route('point-of-differences.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @isset($pointOfDifference)
                        @method('put')
                    @endisset
                    <div>
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type="text" name="title" class="form-control w-full" value="{{ isset($pointOfDifference->title) ? $pointOfDifference->title : old('title') }}" placeholder="Please Enter Title">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($pointOfDifference->description) ? $pointOfDifference->description : old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="link_text" class="form-label">Link Text</label>
                        <input id="link_text" type="text" name="link_text" class="form-control w-full" value="{{ isset($pointOfDifference->link_text) ? $pointOfDifference->link_text : old('link_text') }}" placeholder="Please Enter Link Text">
                        @error('link_text')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="link_url" class="form-label">Link URL</label>
                        <input id="link_url" type="text" name="link_url" class="form-control w-full" value="{{ isset($pointOfDifference->link_url) ? $pointOfDifference->link_url : old('link_url') }}" placeholder="Please Enter Link URL">
                        @error('link_url')
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
                    @if(isset($pointOfDifference->image) && !empty($pointOfDifference->image))
                        <div class="w-24 h-24 image-fit mt-3 cursor-pointer zoom-in">
                            <img class="rounded-full" src="{{ url(Storage::url($pointOfDifference->image)) }}">
                        </div>
                    @endif
                    <div class="mt-3">
                        <label for="is_active" class="form-label">Is Active</label>
                        <div class="form-switch mt-2">
                            <input type="checkbox" id="is_active" name="is_active" class="form-check-input" {{ isset($pointOfDifference->is_active) && $pointOfDifference->is_active == 1 ? 'checked' : "" }}>
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('point-of-differences.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary w-24">{{ isset($pointOfDifference) ? 'Update' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
