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
        <h1 class="fw-bold">{{ $project->opportunity->title }}</h1>
        @if (auth()->id() === $project->opportunity->user_id)
            <form action="{{ route('projects.abort', $project) }}" method="post" class="d-inline">
                @csrf
                @method('PATCH')
                <input type="submit" value="Abort Project" class="text-danger border-0 bg-transparent"/>
            </form>

            <form action="{{ route('projects.complete', $project) }}" method="post" class="d-inline">
                @csrf
                @method('PATCH')
                <input type="submit" value="Complete Project" class="text-success border-0 bg-transparent"/>
            </form>
        @endif



        <div class="mb-4"></div>

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
           class="btn btn-primary mb-4">
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
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-secondary text-white me-3">{{ $member->email }}</span>

                                    <!-- Remove Action (Visible for Author) -->
                                    {{--TODO: Add the proepr route here--}}
                                    @if (auth()->id() === $project->opportunity->user_id)
                                        <form action="{{ route('projects.remove-member', $project) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="user_id" value="{{ $member->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                        </form>
                                    @endif

                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

    </div>

    {{-- Chat --}}
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Project Chat</h5>
        </div>
        <div class="card-body" style="max-height: 350px; overflow-y: auto;">
            @php
                $messages = [
                    ['name' => 'Nonu Bhai', 'text' => 'Bawa g Sialkot', 'time' => '12 Jan 2024, 1 AM'],
                    ['name' => 'Ali Raza', 'text' => 'Koi update hai?', 'time' => '12 Jan 2024, 1:05 AM'],
                    ['name' => 'Fatima Noor', 'text' => 'Working on the UI changes.', 'time' => '12 Jan 2024, 1:10 AM'],
                    ['name' => 'Hassan Khan', 'text' => 'Backend almost done!', 'time' => '12 Jan 2024, 1:15 AM'],
                    ['name' => 'Sara Ahmed', 'text' => 'Need help with database schema.', 'time' => '12 Jan 2024, 1:20 AM'],
                    ['name' => 'Usman Ali', 'text' => 'Testing phase initiated.', 'time' => '12 Jan 2024, 1:25 AM'],
                    ['name' => 'Ayesha Tariq', 'text' => 'Found a bug in form validation.', 'time' => '12 Jan 2024, 1:30 AM'],
                    ['name' => 'Bilal Saeed', 'text' => 'Let’s have a quick meeting.', 'time' => '12 Jan 2024, 1:35 AM'],
                    ['name' => 'Zain Malik', 'text' => 'Deployment scheduled for tomorrow.', 'time' => '12 Jan 2024, 1:40 AM'],
                    ['name' => 'Maria Khan', 'text' => 'Great work team! 🎉', 'time' => '12 Jan 2024, 1:45 AM'],
                ];
            @endphp

            @foreach ($messages as $message)
                <div class="mb-3 p-2 rounded bg-light">
                    <strong class="text-primary">{{ $message['name'] }}:</strong> {{ $message['text'] }}
                    <small class="text-muted d-block">{{ $message['time'] }}</small>
                </div>
            @endforeach
        </div>
        <div class="card-footer bg-light">
            <form action="#" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="message" class="form-control" placeholder="Type a message..." required>
                    <button class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>

@endsection



@push('scripts')

@endpush

