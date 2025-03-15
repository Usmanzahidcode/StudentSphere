@extends('layouts.admin_page_layout')

@section('admin_section')
    <div class="container">
        <h3>Project Details</h3>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $project->title }}</h5>
                <p class="card-text"><strong>Status:</strong>
                    <span class="badge text-white {{ $project->status->value === 'in_progress' ? 'bg-success' : 'bg-danger' }}">
                        {{ ucfirst($project->status->value) }}
                    </span>
                </p>
                <p class="card-text"><strong>Description:</strong> {!! $project->description !!}</p>

                <h5>Author</h5>
                <ul>
                    <li>
                        <a href="{{ route('admin.users.show', $project->user->id) }}">{{ $project->user->first_name }} {{ $project->user->last_name }}</a>
                    </li>
                </ul>

                <h5>Members</h5>
                <ul>
                    @foreach ($project->members as $member)
                        <li>
                            <a href="{{ route('admin.users.show', $member) }}">{{ $member->first_name }} {{ $member->last_name }}</a>
                        </li>
                    @endforeach
                </ul>

                @if($project->opportunity)
                    <h5>Related Opportunity</h5>
                    <p>
                        <a href="{{ route('admin.opportunities.show', $project->opportunity) }}">{{ $project->opportunity->title }}</a>
                    </p>
                @endif

                    <form action="{{ route('admin.projects.reject', $project) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-warning">Abort Project</button>
                    </form>

                <a href="{{ route('admin.projects') }}" class="btn btn-secondary">Back to Projects</a>
            </div>
        </div>
    </div>
@endsection
