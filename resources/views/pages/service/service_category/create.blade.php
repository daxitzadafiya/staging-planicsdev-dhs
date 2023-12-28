@extends('layouts.main')

@section('page-title')
    {{ env('APP_NAME') }} - {{ isset($serviceCategory) ? 'Update' : 'Create' }} Service Category
@endsection

@section('breadcrumb-title')
    {{ isset($serviceCategory) ? 'Update' : 'Create' }} Service Category
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($serviceCategory) ? 'Update' : 'Create' }} Service Category
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-9">
            <div class="intro-y box p-5">
                <form action="{{ isset($serviceCategory) ? route('service-categories.update', $serviceCategory) : route('service-categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @isset($serviceCategory)
                        @method('put')
                    @endisset
                    <div>
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type="text" name="title" class="form-control w-full @error('title') border-danger @enderror" value="{{ isset($serviceCategory->title) ? $serviceCategory->title : old('title') }}" placeholder="Please Enter Title">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="service_id" class="form-label">Service</label>
                        <select name="service_id" class="form-control w-full @error('service_id') border-danger @enderror" id="service_id">
                            <option value="">Select Service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}" {{ isset($serviceCategory) && $service->id == $serviceCategory->service_id ? 'selected' : '' }}>{{ $service->title }}</option>    
                            @endforeach
                        </select>
                        @error('service_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="is_active" class="form-label">Is Active</label>
                        <div class="form-switch mt-2">
                            <input type="checkbox" id="is_active" name="is_active" class="form-check-input" {{ isset($serviceCategory->is_active) && $serviceCategory->is_active == 1 ? 'checked' : "" }}>
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('service-categories.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary w-24">{{ isset($serviceCategory) ? 'Update' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
