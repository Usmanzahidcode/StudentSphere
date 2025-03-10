@extends('layouts.base_layout')

@push('styles')
@endpush

@section('title')
    Project initialization | StudentSphere
@endsection

@section('description')
    Details of the project
@endsection

@section('content')
    <div class="container py-4">
        <!-- Project Title -->
        <h1 class="mb-3">{{ $project->opportunity->title }}</h1>

        <!-- Project Status with Timeline -->
        <div class="mb-4">
            <span class="badge bg-success fs-5">{{ ucfirst($project->status) }}</span>
            <div class="progress mt-2" style="height: 8px;">
                <div
                    class="progress-bar"
                    role="progressbar"
                    style="width: {{ $project->status == 'in_progress' ? '50%' : ($project->status == 'completed' ? '100%' : '0%') }};"
                ></div>
            </div>
            <div class="d-flex justify-content-between small text-muted mt-1">
                <span>Not Started</span>
                <span>In Progress</span>
                <span>Completed</span>
            </div>
        </div>

        <!-- View Opportunity Button -->
        <a href="{{ route('opportunities.show', $project->opportunity->id) }}" class="btn btn-primary mb-4">
            View Opportunity Details
        </a>

        <!-- Project Members -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Project Members</h5>
                @if ($project->members->isEmpty())
                    <p class="text-muted">No members yet.</p>
                @else
                    <ul class="list-group">
                        @foreach ($project->members as $member)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $member->first_name }} {{ $member->last_name }}</strong>
                                    <a href="#" class="text-primary small">View Profile</a>
                                </div>
                                <span class="badge bg-secondary">{{ $member->email }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection


@push('scripts')

@endpush

