@extends('layouts.admin_page_layout')

@section('admin_section')
    <div class="container">
        <h1>Project Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $project->title }}</h5>
                <p class="card-text"><strong>Status:</strong>
                    <span class="badge text-white {{ $project->status->value === 'active' ? 'bg-success' : 'bg-danger' }}">
                        {{ ucfirst($project->status->value) }}
                    </span>
                </p>
                <p class="card-text"><strong>Description:</strong> {!! $project->description !!}</p>

                <h5>Authors</h5>
                <ul>
                    @foreach ($project->authors as $author)
                        <li>
                            <a href="{{ route('admin.users.show', $author) }}">{{ $author->first_name }} {{ $author->last_name }}</a>
                        </li>
                    @endforeach
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

                    @if($project->opportunity->status->value !== 'closed')
                        <form action="{{ route('opportunities.close', $project->opportunity) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">Close Opportunity</button>
                        </form>
                    @endif
                @endif

                @if($project->status->value === 'active')
                    <form action="{{ route('projects.abort', $project) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-warning">Abort Project</button>
                    </form>
                @endif

                <a href="{{ route('projects') }}" class="btn btn-secondary">Back to Projects</a>
            </div>
        </div>
    </div>
@endsection
