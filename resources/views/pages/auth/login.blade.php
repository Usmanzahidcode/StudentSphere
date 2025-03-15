@extends('layouts.base_layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/auth/registration.css') }}">
@endpush

@section('title')
    Login | StudentSphere
@endsection

@section('description')
    Login into the StudentSphere
@endsection

@section('content')
    <div class="mt-5"></div>
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-6">
            <div class="card card-registration my-4">
                <div class="row g-0">
                    <div class="col-xl-12">
                        <div class="card-body p-md-5 text-black d-flex flex-column align-items-center">
                            <h3 class="mb-5 text-uppercase">Student Login</h3>

                            <form class="form w-100" action="{{ route('login.submit') }}" method="POST">
                                @csrf

                                <!-- Email Input -->
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <div class="">
                                            <label class="form-label" for="email">Email</label>
                                            <input name="email" type="text" id="email"
                                                   class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                   value="{{ old('email') }}"/>
                                            @error('email')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Password Input -->
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <div class="">
                                            <label class="form-label" for="password">Password</label>
                                            <input name="password" type="password" id="password"
                                                   class="form-control form-control-lg @error('password') is-invalid @enderror"/>
                                            @error('password')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Remember Me Checkbox -->
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <div class="form-check">
                                            <input type="checkbox" name="remember" class="form-check-input" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">Remember Me</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush

