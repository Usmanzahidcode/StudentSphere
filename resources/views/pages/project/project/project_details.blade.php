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
    <div class="container py-5">
        <!-- Project Title -->
        <h1 class="mb-4 fw-bold">{{ $project->opportunity->title }}</h1>

        <!-- Project Status with Timeline -->
        <div class="mb-4">
            @php
                $progress = match ($project->status) {
                    App\Enums\Project\ProjectStatus::IN_PROGRESS => 50,
                    App\Enums\Project\ProjectStatus::COMPLETED,
                    App\Enums\Project\ProjectStatus::ABORTED => 100,
                    default => 0
                };

                $color = match ($project->status) {
                    App\Enums\Project\ProjectStatus::COMPLETED => 'bg-success',
                    App\Enums\Project\ProjectStatus::ABORTED => 'bg-danger',
                    App\Enums\Project\ProjectStatus::IN_PROGRESS => 'bg-info',
                    default => 'bg-secondary'
                };
            @endphp

            <div class="progress">
                <div class="progress-bar {{ $color }}"
                     role="progressbar"
                     style="width: {{ $progress }}%;"
                     aria-valuenow="{{ $progress }}"
                     aria-valuemin="0"
                     aria-valuemax="100">
                </div>
            </div>

            <div class="d-flex justify-content-between small text-muted mt-2">
                <span>Not Started</span>
                <span>In Progress</span>
                <span>Completed / Aborted</span>
            </div>

        </div>

        <!-- View Opportunity Button -->
        <a href="{{ route('opportunities.show', $project->opportunity->id) }}"
           class="btn btn-primary mb-4 {{ $project->opportunity->status === App\Enums\Project\OpportunityStatus::OPEN ? '' : 'disabled' }}">
            View Opportunity Details
        </a>

        <!-- Project Members Section -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title mb-3">Project Members</h4>
                @if ($project->members->isEmpty())
                    <p class="text-muted">No members yet.</p>
                @else
                    <ul class="list-group">
                        @foreach ($project->members as $member)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $member->first_name }} {{ $member->last_name }}</strong>
                                    <a href="#" class="text-decoration-none text-primary small ms-2">View Profile</a>
                                </div>
                                <span class="badge bg-secondary text-white">{{ $member->email }}</span>
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

