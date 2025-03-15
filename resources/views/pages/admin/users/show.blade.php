@extends('layouts.admin_page_layout')

@section('admin_section')
    <div class="container">
        <h1>User Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="card-text"><strong>Status:</strong>
                    <span class="badge text-white {{ $user->status->value === 'active' ? 'bg-success' : 'bg-danger' }}">
                        {{ ucfirst($user->status->value) }}
                    </span>
                </p>
                <p class="card-text"><strong>Gender:</strong> {{ ucfirst($user->gender) }}</p>
                <p class="card-text"><strong>Date of Birth:</strong> {{ $user->dob->format('Y-m-d') }}</p>
                <p class="card-text"><strong>LinkedIn:</strong> <a href="{{ $user->linkedin }}" target="_blank">{{ $user->linkedin }}</a></p>
                <p class="card-text"><strong>GitHub:</strong> <a href="{{ $user->github }}" target="_blank">{{ $user->github }}</a></p>
                <p class="card-text"><strong>Personal Site:</strong> <a href="{{ $user->personal_site }}" target="_blank">{{ $user->personal_site }}</a></p>

                {{-- Educational Background --}}
                @if($user->educationalBackground)
                    <h4 class="mt-4">Educational Background</h4>
                    <p class="card-text"><strong>Degree:</strong> {{ $user->educationalBackground->degree }}</p>
                    <p class="card-text"><strong>Institution:</strong> {{ $user->educationalBackground->institution }}</p>
                    <p class="card-text"><strong>Graduation Year:</strong> {{ $user->educationalBackground->date_of_completion }}</p>
                @else
                    <p class="text-muted">No educational background provided.</p>
                @endif

                {{-- Ban/Unban actions --}}
                @if($user->status->value === 'active')
                    <form action="{{ route('admin.users.ban', $user) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-warning">Ban User</button>
                    </form>
                @else
                    <form action="{{ route('admin.users.unban', $user) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">Unban User</button>
                    </form>
                @endif

                <a href="{{ route('admin.users') }}" class="btn btn-secondary">Back to Users</a>
            </div>
        </div>
    </div>
@endsection
