@extends('layouts.main')

@section('page-title')
    {{ env('APP_NAME') }} - {{ isset($coreValue) ? 'Update' : 'Create' }} Core Value
@endsection

@section('breadcrumb-title')
    {{ isset($coreValue) ? 'Update' : 'Create' }} Core Value
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ isset($coreValue) ? 'Update' : 'Create' }} Core Value
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-9">
            <div class="intro-y box p-5">
                <form action="{{ isset($coreValue) ? route('core-values.update', $coreValue) : route('core-values.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @isset($coreValue)
                        @method('put')
                    @endisset
                    <div>
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type="text" name="title" class="form-control w-full" value="{{ isset($coreValue->title) ? $coreValue->title : old('title') }}" placeholder="Please Enter Title">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control w-full" cols="10" rows="10" placeholder="Please Enter Description">{{ isset($coreValue->description) ? $coreValue->description : old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="service_id" class="form-label">Service</label>
                        <select name="service_id" class="form-control w-full" id="service_id">
                            <option value="">Select Service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}" {{ isset($coreValue) && $service->id == $coreValue->service_id ? 'selected' : '' }}>{{ $service->title }}</option>    
                            @endforeach
                        </select>
                        @error('service_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="is_active" class="form-label">Is Active</label>
                        <div class="form-switch mt-2">
                            <input type="checkbox" id="is_active" name="is_active" class="form-check-input" {{ isset($coreValue->is_active) && $coreValue->is_active == 1 ? 'checked' : "" }}>
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('core-values.index') }}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary w-24">{{ isset($coreValue) ? 'Update' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
