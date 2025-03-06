@extends('layouts.base_layout')

@push('styles')

@endpush

@section('title')
    {{ $opportunity->title }} | StudentSphere
@endsection

@section('description')
    See details for the Opportunity: {{ $opportunity->title }}
@endsection

@section('content')
        <p>
            <span class="rounded-pill bg-success text-white py-2 px-4">
                {{ Str::title(str_replace('-', ' ', $opportunity->category)) }}
            </span>
        </p>
        <h3 class="fw-bold">{{ $opportunity->title }}</h3>
        <p>Created at: {{ $opportunity->created_at }}</p>
        @if($opportunity->user_id===auth()->id())
            <div class="d-flex gap-3">
                <a href="{{ route('opportunities.edit', ['opportunity' => $opportunity->id]) }}">Edit</a>
                <form action="{{ route('opportunities.delete', ['opportunity' => $opportunity->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="text-danger border-0 bg-transparent"/>
                </form>
                <a href="{{ route('applications.index', ['opportunity' => $opportunity->id]) }}">List of Applicants ({{ $opportunity->applications()->count() }})</a>
            </div>
        @endif
        <div class="dropdown-divider my-5"></div>
        <div>
            {!! $opportunity->description !!}
        </div>

        @if($opportunity->file)
            <div class="dropdown-divider my-5"></div>
            <h3 class="mb-3">Documents:</h3>
            <div class="d-flex justify-content-start align-items-center">
                <div class="card">
                    <div class="card-body">
                        <span class="bi-file-code-fill"></span>
                        {{ $opportunity->file->name }}
                        <a class="btn btn-success rounded-pill ms-3"
                           href="{{ route('files.download', ['file' => $opportunity->file->id]) }}">Download</a>
                    </div>
                </div>
                <div class="col-6"></div>
            </div>
        @endif

        <div class="mt-5"></div>
        <a class="custom-btn mt-5 py-2 px-5" href="#">Apply</a>
@endsection

@push('scripts')

@endpush

