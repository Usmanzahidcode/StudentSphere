@extends('layouts.base_layout')

@push('styles')
@endpush

@section('title')
    Admin Panel | StudentSphere
@endsection

@section('description')
    Manage users, projects, and system settings.
@endsection

@section('content')
    <h1 class="mb-5">Admin Panel</h1>
    <div class="row">
        <!-- Sidebar Navigation Tabs -->
        <div class="tabs-wrapper d-flex flex-column gap-3 col-2 align-content-stretch">
            <a href="{{ route('admin.dashboard') }}"
               class="btn rounded-pill {{ request()->routeIs('admin.dashboard') ? 'btn-primary' : 'btn-success' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.users') }}"
               class="btn rounded-pill {{ request()->routeIs('admin.users') || request()->routeIs('admin.users.show') ? 'btn-primary' : 'btn-success' }}">
                Users Management
            </a>
            <a href="{{ route('admin.projects') }}"
               class="btn rounded-pill {{ request()->routeIs('admin.projects') ? 'btn-primary' : 'btn-success' }}">
                Projects Management
            </a>
            <a href="{{ route('admin.opportunities') }}"
               class="btn rounded-pill {{ request()->routeIs('admin.opportunities') || request()->routeIs('admin.opportunities.show') ? 'btn-primary' : 'btn-success' }}">
                Opportunities Mng
            </a>
            <a href="{{ route('admin.forums') }}"
               class="btn rounded-pill {{ request()->routeIs('admin.forums') ? 'btn-primary' : 'btn-success' }}">
                Forum Management
            </a>
        </div>

        <!-- Page Content -->
        <div class="page col-10">
            @yield('admin_section')
        </div>
    </div>
@endsection

@push('scripts')
@endpush
