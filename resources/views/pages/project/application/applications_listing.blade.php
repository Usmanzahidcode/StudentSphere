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
    <div class="container py-5">
        <h3>Here are the latest applications for opportunity: <span
                class="text-success">{{ $opportunity->title }}</span></h3>

        @foreach($applications as $application)
            <p>Application by: {{ $application->user->first_name }} {{ $application->user->last_name }}</p>
            <div>
                {!! $application->body !!}
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')

@endpush

