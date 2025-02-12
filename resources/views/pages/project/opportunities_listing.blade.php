@extends('layouts.base_layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/project/opportunity_listing.css') }}">
@endpush

@section('title')
    Opportunities | StudentSphere
@endsection

@section('description')
    Explore the latest opportunities
@endsection

@section('content')
    <div class="container my-5 min-vh-100">
        <div class="d-flex justify-content-between">
            <div>
                <h3>Opportunities</h3>
                <p>Look and select the opportunities that resonate with you interests and submit application.</p>
            </div>
            <div class="d-flex flex-column justify-content-center">
                <a href="{{ route('opportunities.create') }}" class="bi-plus-circle-fill custom-icon fs-5 me-3"> Add an
                    opportunity</a>
            </div>
        </div>
        <div class="py-2 d-flex flex-column gap-5">
            @foreach($opportunities->items() as $opportunity)
                <div class="card">
                    <div class="card-body">
                        <p>
                            <span class="rounded-pill bg-success text-white py-2 px-4">
                                {{ Str::title(str_replace('-', ' ', $opportunity->category)) }}
                            </span>

                        </p>
                        <h3>
                            {{ $opportunity->title }}
                        </h3>
                        <p>
                            {{ Str::limit(strip_tags($opportunity->description), 500) }}
                        </p>

                        <a class="custom-btn btn" href="{{ route('opportunities.show', ['opportunity' => $opportunity->id]) }}">
                            Interested
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="my-5">
            {{ $opportunities->links() }}
        </div>
    </div>
@endsection

@push('scripts')

@endpush

