@extends('layouts.main')

@section('page-title')
    {{ env('APP_NAME') }} - {{ isset($portfolio) ? 'Update' : 'Create' }} Portfolio
@endsection

@section('breadcrumb-title')
    {{ isset($portfolio) ? 'Update' : 'Create' }} Portfolio
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($portfolio) ? 'Update' : 'Create' }} Portfolio
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-9">
            <div class="intro-y box p-5">
                <form action="{{ isset($portfolio) ? route('portfolios.update', $portfolio) : route('portfolios.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @isset($portfolio)
                        @method('put')
                    @endisset
                    <div>
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type="text" name="title" class="form-control w-full @error('title') border-danger @enderror" value="{{ isset($portfolio->title) ? $portfolio->title : old('title') }}" placeholder="Please Enter Title">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="service_id" class="form-label">Service</label>
                        <select name="service_id" class="form-control w-full @error('service_id') border-danger @enderror" id="service_id">
                            <option value="">Select Service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}" {{ isset($portfolio) && $service->id == $portfolio->service_id ? 'selected' : '' }}>{{ $service->title }}</option>    
                            @endforeach
                        </select>
                        @error('service_id')
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
                    @if(isset($portfolio->image) && !empty($portfolio->image))
                        <div class="w-24 h-24 image-fit mt-3 cursor-pointer zoom-in">
                            <img class="rounded-full" src="{{ url(Storage::url($portfolio->image)) }}">
                        </div>
                    @endif
                    <div class="mt-3">
                        <label for="is_active" class="form-label">Is Active</label>
                        <div class="form-switch mt-2">
                            <input type="checkbox" id="is_active" name="is_active" class="form-check-input" {{ isset($portfolio->is_active) && $portfolio->is_active == 1 ? 'checked' : "" }}>
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('portfolios.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary w-24">{{ isset($portfolio) ? 'Update' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
