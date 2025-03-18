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
    <h1 class="mb-5">Account management!</h1>
    <div class="row">
        <!-- Sidebar Navigation Tabs -->
        <div class="tabs-wrapper d-flex flex-column gap-3 col-2 align-content-stretch">
            <a href="{{ route('account.profile') }}"
               class="btn rounded-pill {{ request()->routeIs('account.profile') ? 'btn-primary' : 'btn-success' }}">
                Personal Information
            </a>
            <a href="{{ route('account.background') }}"
               class="btn rounded-pill {{ request()->routeIs('account.background') ? 'btn-primary' : 'btn-success' }}">
                Background Information
            </a>
            <a href="{{ route('account.password') }}"
               class="btn rounded-pill {{ request()->routeIs('account.password') ? 'btn-primary' : 'btn-success' }}">
                Password & Security
            </a>
            <a href="{{ route('account.projects') }}"
               class="btn rounded-pill {{ request()->routeIs('account.projects') ? 'btn-primary' : 'btn-success' }}">
                Projects & Opportunities
            </a>
            <a href="{{ route('account.forum') }}"
               class="btn rounded-pill {{ request()->routeIs('account.forum') ? 'btn-primary' : 'btn-success' }}">
                Forum Posts
            </a>
            <a href="{{ route('account.management') }}"
               class="btn rounded-pill {{ request()->routeIs('account.management') ? 'btn-primary' : 'btn-success' }}">
                Account Management
            </a>
        </div>

        <!-- Page Content -->
        <div class="page col-10">
            @yield('account_section')
        </div>
    </div>

@endsection

@push('scripts')
@endpush
