@extends('layouts.main')

@section('page-title')
    {{ env('APP_NAME') }} - {{ isset($ourProcess) ? 'Update' : 'Create' }} Our Process
@endsection

@section('breadcrumb-title')
    {{ isset($ourProcess) ? 'Update' : 'Create' }} Our Process
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($ourProcess) ? 'Update' : 'Create' }} Our Process
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-9">
            <div class="intro-y box p-5">
                <form action="{{ isset($ourProcess) ? route('our-processes.update', $ourProcess) : route('our-processes.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @isset($ourProcess)
                        @method('put')
                    @endisset
                    <div>
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type="text" name="title" class="form-control w-full @error('title') border-danger @enderror" value="{{ isset($ourProcess->title) ? $ourProcess->title : old('title') }}" placeholder="Please Enter Title">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control w-full @error('description') border-danger @enderror" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($ourProcess->description) ? $ourProcess->description : old('description') }}</textarea>
                        @error('description')
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
                    @if(isset($ourProcess->image) && !empty($ourProcess->image))
                        <div class="w-24 h-24 image-fit mt-3 cursor-pointer zoom-in">
                            <img class="rounded-full" src="{{ url(Storage::url($ourProcess->image)) }}">
                        </div>
                    @endif
                    <div class="mt-3">
                        <label for="is_active" class="form-label">Is Active</label>
                        <div class="form-switch mt-2">
                            <input type="checkbox" id="is_active" name="is_active" class="form-check-input" {{ isset($ourProcess->is_active) && $ourProcess->is_active == 1 ? 'checked' : "" }}>
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('our-processes.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary w-24">{{ isset($ourProcess) ? 'Update' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
