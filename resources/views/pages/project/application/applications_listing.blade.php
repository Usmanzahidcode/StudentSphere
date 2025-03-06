@extends('layouts.base_layout')

@push('styles')

@endpush

@section('title')
    Applications for {{ $opportunity->title }} | StudentSphere
@endsection

@section('description')
    Applications page for the opportunity: {{ $opportunity->title }}
@endsection

@section('content')
        <h3 class="mb-5">
            Here are the latest applications for opportunity:
            <span class="text-success">{{ $opportunity->title }}</span>
        </h3>

        <div class="py-2 d-flex flex-wrap gap-5">
            @foreach($applications as $application)
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <p>Application
                                by: {{ $application->user?->first_name }} {{ $application->user?->last_name }}</p>
                            <p>Applied at: {{ $application->created_at->format('d M Y, h:i A') }}</p>
                            <a class="custom-btn btn"
                               href="{{ route('applications.show', ['opportunity' => $opportunity, 'application' => $application]) }}">
                                Details of the application
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection

@push('scripts')

@endpush

