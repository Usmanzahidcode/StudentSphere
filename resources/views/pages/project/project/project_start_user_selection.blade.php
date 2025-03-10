@extends('layouts.base_layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/project/opportunity_listing.css') }}">
@endpush

@section('title')
    Project initialization | StudentSphere
@endsection

@section('description')
    Start the project and select users
@endsection

@section('content')
    <form action="{{ route('projects.store', ['opportunity' => $opportunity]) }}" method="POST">
        @csrf
        <h3>Select Applicants to Start the Project</h3>

        <div class="d-flex flex-wrap gap-3">
            @foreach ($applications as $application)
                <div class="card p-3 col-6">
                    <div class="card-body">
                        <h5 class="card-title">{{ $application->user->first_name }} {{ $application->user->last_name }}</h5>
                        <p class="card-text">
                            <strong>Email:</strong> {{ $application->user->email }} <br>
                            <a href="#" class="btn btn-primary btn-sm py-1 px-5 rounded-pill">View Profile</a>
                        </p>
                        <div class="form-check">
                            <input type="checkbox" name="selected_applicants[]" value="{{ $application->user->id }}"
                                   id="applicant_{{ $application->user->id }}" class="form-check-input">
                            <label for="applicant_{{ $application->user->id }}" class="form-check-label">Select Applicant</label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <button type="submit" class="custom-btn mt-5 py-2 px-5">Start Project</button>
    </form>
@endsection

@push('scripts')

@endpush

