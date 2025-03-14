@extends('layouts.accounts_page_layout')

@section('title')
    Admin Dashboard
@endsection
@section('description')
    Overview of system stats and recent activities
@endsection

@section('content')
    <h1 class="mb-4">Admin Dashboard</h1>

    <div class="row">
        <!-- Users Overview -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Users</h5>
                    <p class="display-6">{{ $totalUsers }}</p>
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
                    <a href="{{ route('admin.projects') }}" class="btn btn-primary">Manage Projects</a>
                </div>
            </div>
        </div>
    </div>
@endsection
