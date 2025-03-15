@extends('layouts.admin_page_layout')

@section('title')
    Admin Dashboard
@endsection

@section('description')
    Overview of system stats and recent activities
@endsection

@section('admin_section')
    <h3 class="mb-4">Basic Information</h3>

    <div class="row">
        <!-- Users Overview -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Users</h5>
                    <p class="display-6">{{ $totalUsers }}</p>
                    <p>Active: {{ $activeUsers }} | Banned: {{ $bannedUsers }}</p>
                    <a href="{{ route('admin.users') }}" class="btn btn-primary">Manage Users</a>
                </div>
            </div>
        </div>

        <!-- Projects Overview -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Projects</h5>
                    <p class="display-6">{{ $totalProjects }}</p>
                    <p>Completed: {{ $completedProjects }} | Aborted: {{ $abortedProjects }}</p>
                    <p>In Progress: {{ $inProgressProjects }}</p>
                    <a href="{{ route('admin.projects') }}" class="btn btn-primary">Manage Projects</a>
                </div>
            </div>
        </div>

        <!-- Opportunities Overview -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Opportunities</h5>
                    <p class="display-6">{{ $totalOpportunities }}</p>
                    <p>Open: {{ $openOpportunities }} | Closed: {{ $closedOpportunities }}</p>
                    <p>Under Review: {{ $underReviewOpportunities }}</p>
                    <a href="{{ route('admin.opportunities') }}" class="btn btn-primary">Manage Opportunities</a>
                </div>
            </div>
        </div>
    </div>
@endsection
