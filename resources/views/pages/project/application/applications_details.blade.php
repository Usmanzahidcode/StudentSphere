@extends('layouts.base_layout')

@push('styles')
@endpush

@section('title')
    {{ $opportunity->title }} | StudentSphere
@endsection

@section('description')
    See details for the Application for the opportunity: {{ $opportunity->title }}
@endsection

@section('content')
    <div class="container py-4">
        <h2 class="mb-3">Application is for: <span class="text-success">{{ $opportunity->title }}</span></h2>

        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Application Details</h3>
                <p><strong>Applicant:</strong> {{ $application->user->first_name }} {{ $application->user->last_name }}</p>
                <p><strong>Submitted on:</strong> {{ $application->created_at->format('d M Y, h:i A') }}</p>
                <p><strong>Application:</strong></p>
                <article>
                    {!! $application->body !!}
                </article>
                @if($application->file)
                    <div class="dropdown-divider my-5"></div>
                    <h3 class="mb-3">Documents:</h3>
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="card">
                            <div class="card-body">
                                <span class="bi-file-code-fill"></span>
                                {{ $application->file->name }}
                                <a class="btn btn-success rounded-pill ms-3"
                                   href="{{ route('files.download', ['file' => $application->file->id]) }}" target="_blank">Download</a>
                            </div>
                        </div>
                        <div class="col-6"></div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
