@extends('layouts.main')

@section('page-title')
    {{ env('APP_NAME') }} - Profile
@endsection

@section('breadcrumb-title')
    Profile
@endsection

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Profile
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-9">
            <div class="intro-y box p-5">
                <form action="{{ route('profile.update', $user) }}" method="post">
                    @csrf
                    @method('put')
                    <div>
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" name="name" class="form-control w-full @error('name') border-danger @enderror" value="{{ isset($user->name) ? $user->name : old('name') }}" placeholder="Please Enter Name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" class="form-control w-full @error('email') border-danger @enderror" value="{{ isset($user->email) ? $user->email : old('email') }}" placeholder="Please Enter Email" readonly>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <div class="text-center font-semibold text-lg">
                            <h1>Change Password</h1>
                        </div>
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" name="password" class="form-control w-full @error('password') border-danger @enderror" placeholder="**********">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control w-full @error('password_confirmation') border-danger @enderror" placeholder="**********">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary w-24">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
