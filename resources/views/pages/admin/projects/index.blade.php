@extends('layouts.admin_page_layout')

@section('admin_section')
    <div class="container">
        <h3>Projects</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Created By</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->opportunity->title }}</td>
                    <td>{{ $project->user->first_name . " " . $project->user->last_name }}</td>
                    <td>
                            <span class="badge text-white {{ $project->status->value === 'in_progress' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($project->status->value) }}
                            </span>
                    </td>
                    <td>
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-info btn-sm">View</a>
                        
                        <form action="{{ route('projects.abort', $project) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">Abort</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $projects->links() }}
    </div>
@endsection
