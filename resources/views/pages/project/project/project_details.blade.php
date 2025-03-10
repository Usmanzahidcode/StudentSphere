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
    <pre>{{ print_r($project->toArray(), true) }}</pre>

@endsection

@push('scripts')

@endpush

