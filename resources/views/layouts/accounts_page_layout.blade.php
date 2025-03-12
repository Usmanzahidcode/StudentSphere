@extends('layouts.base_layout')

@push('styles')

@endpush

@section('title')
    Account Settings | StudentSphere
@endsection
@section('description')
    Manage your account settings in StudentSphere
@endsection

@section('content')
    <div class="row">
        <!-- Sidebar Navigation Tabs -->
        <div class="tabs-wrapper d-flex flex-column gap-3 col-2 align-content-stretch">
            <a href="{{ route('account.profile') }}"
               class="btn rounded-pill {{ request()->routeIs('account.profile') ? 'btn-primary' : 'btn-success' }}">
                Profile
            </a>
            <a href="{{ route('account.password') }}"
               class="btn rounded-pill {{ request()->routeIs('account.password') ? 'btn-primary' : 'btn-success' }}">
                Change Password
            </a>
            <a href="{{ route('account.security') }}"
               class="btn rounded-pill {{ request()->routeIs('account.security') ? 'btn-primary' : 'btn-success' }}">
                Security
            </a>
        </div>

        <!-- Page Content -->
        <div class="page col-10">
            @yield('account_content')
        </div>
    </div>
@endsection

@push('scripts')
@endpush
