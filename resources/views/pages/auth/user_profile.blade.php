@extends('layouts.base_layout')

@push('styles')
@endpush

@section('title')
    Opportunities | StudentSphere
@endsection

@section('description')
    Profile of a user!
@endsection

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-3">Profile Details</h4>
            <p><strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Date of Birth:</strong> {{ $user->dob ?? 'N/A' }}</p>
            <p><strong>Gender:</strong> {{ ucfirst($user->gender) ?? 'N/A' }}</p>
        </div>
    </div>

    <div class="card mt-3 shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-3">Social Links</h4>
            @if($user->linkedin || $user->github || $user->personal_site)
                <ul class="list-unstyled">
                    @if($user->linkedin)
                        <li><strong>LinkedIn:</strong> <a href="{{ $user->linkedin }}" target="_blank">View Profile</a></li>
                    @endif
                    @if($user->github)
                        <li><strong>GitHub:</strong> <a href="{{ $user->github }}" target="_blank">View Profile</a></li>
                    @endif
                    @if($user->personal_site)
                        <li><strong>Personal Website:</strong> <a href="{{ $user->personal_site }}" target="_blank">Visit</a></li>
                    @endif
                </ul>
            @else
                <p class="text-muted">No social links provided.</p>
            @endif
        </div>
    </div>

    <div class="card mt-3 shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-3">Educational Background</h4>
            @if($user->educationalBackground)
                <p><strong>Degree:</strong> {{ $user->educationalBackground->degree }}</p>
                <p><strong>Institution:</strong> {{ $user->educationalBackground->institution }}</p>
                <p><strong>Graduation Year:</strong> {{ $user->educationalBackground->graduation_year }}</p>
            @else
                <p class="text-muted">No educational background added.</p>
            @endif
        </div>
    </div>

    <div class="card mt-3 shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-3">Projects Created (Owner)</h4>
            @if($user->projects->isNotEmpty())
                <ul class="list-group">
                    @foreach ($user->projects as $project)
                        <li class="list-group-item">
                            <a href="{{ route('projects.show', $project) }}" class="text-primary">
                                {{ $project->opportunity->title ?? 'Untitled Project' }}
                            </a>
                            <span class="badge bg-secondary ms-2 text-white">{{ ucfirst(str_replace('_', ' ', $project->status->value)) }}</span>
                            <small class="text-muted d-block">Created On: {{ $project->created_at->format('d M Y') }}</small>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No projects created yet.</p>
            @endif
        </div>
    </div>

    <div class="card mt-3 shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-3">Participated Projects</h4>
            @if($user->participatedProjects->isNotEmpty())
                <ul class="list-group">
                    @foreach ($user->participatedProjects as $project)
                        <li class="list-group-item">
                            <a href="{{ route('projects.show', $project) }}" class="text-primary">
                                {{ $project->opportunity->title ?? 'Untitled Project' }}
                            </a>
                            <span class="badge bg-success ms-2 text-white">{{ ucfirst(str_replace('_', ' ', $project->status->value)) }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No participated projects.</p>
            @endif
        </div>
    </div>

    <div class="card mt-3 shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-3">Created Opportunities</h4>
            @if($user->opportunities->isNotEmpty())
                <ul class="list-group">
                    @foreach ($user->opportunities as $opportunity)
                        <li class="list-group-item">
                            <a href="{{ route('opportunities.show', $opportunity) }}" class="text-primary">
                                {{ $opportunity->title }}
                            </a>
                            <span class="badge bg-warning ms-2 text-white">{{ ucfirst(str_replace('_', ' ', $opportunity->status->value)) }}</span>
                            <small class="text-muted d-block">Posted On: {{ $opportunity->created_at->format('d M Y') }}</small>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No opportunities created.</p>
            @endif
        </div>
    </div>

@endsection

@push('scripts')

@endpush

