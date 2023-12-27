@extends('layouts.main')

@section('page-title')
    {{ env('APP_NAME') }} - {{ isset($clientReview) ? 'Update' : 'Create' }} Client Review
@endsection

@section('breadcrumb-title')
    {{ isset($clientReview) ? 'Update' : 'Create' }} Client Review
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($clientReview) ? 'Update' : 'Create' }} Client Review
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-9">
            <div class="intro-y box p-5">
                <form action="{{ isset($clientReview) ? route('client-reviews.update', $clientReview) : route('client-reviews.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @isset($clientReview)
                        @method('put')
                    @endisset
                    <div>
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" name="name" class="form-control w-full" value="{{ isset($clientReview->name) ? $clientReview->name : old('name') }}" placeholder="Please Enter Name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="review" class="form-label">Review</label>
                        <textarea name="review" id="review" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Review">{{ isset($clientReview->review) ? $clientReview->review : old('review') }}</textarea>
                        @error('review')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="rating" class="form-label">Rating</label>
                        <input id="rating" type="text" name="rating" class="form-control w-full" value="{{ isset($clientReview->rating) ? $clientReview->rating : old('rating') }}" placeholder="Please Enter Rating">
                        @error('rating')
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
                    @if(isset($clientReview->image) && !empty($clientReview->image))
                        <div class="w-24 h-24 image-fit mt-3 cursor-pointer zoom-in">
                            <img class="rounded-full" src="{{ url(Storage::url($clientReview->image)) }}">
                        </div>
                    @endif
                    <div class="mt-3">
                        <label for="is_active" class="form-label">Is Active</label>
                        <div class="form-switch mt-2">
                            <input type="checkbox" id="is_active" name="is_active" class="form-check-input" {{ isset($clientReview->is_active) && $clientReview->is_active == 1 ? 'checked' : "" }}>
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('client-reviews.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary w-24">{{ isset($clientReview) ? 'Update' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection