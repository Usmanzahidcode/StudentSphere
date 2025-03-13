@extends('layouts.accounts_page_layout')

@section('account_section')
    <h3>Projects & Opportunities</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-3">Your Projects</h4>
            @if($projects->isNotEmpty())
                <ul class="list-group">
                    @foreach ($projects as $project)
                        <li class="list-group-item">
                            <a href="{{ route('projects.show', $project) }}" class="text-primary">
                                {{ $project->opportunity->title ?? 'Untitled Project' }}
                            </a>
                            <span class="badge bg-secondary ms-2 text-white">{{ ucfirst($project->status->value) }}</span>
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
            @if($participatedProjects->isNotEmpty())
                <ul class="list-group">
                    @foreach ($participatedProjects as $project)
                        <li class="list-group-item">
                            <a href="{{ route('projects.show', $project) }}" class="text-primary">
                                {{ $project->opportunity->title ?? 'Untitled Project' }}
                            </a>
                            <span class="badge bg-success ms-2 text-white">{{ ucfirst($project->status->value) }}</span>
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
            @if($opportunities->isNotEmpty())
                <ul class="list-group">
                    @foreach ($opportunities as $opportunity)
                        <li class="list-group-item">
                            <a href="{{ route('opportunities.show', $opportunity) }}" class="text-primary">
                                {{ $opportunity->title }}
                            </a>
                            <span class="badge bg-warning ms-2 text-white">{{ ucfirst($opportunity->status->value) }}</span>
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
