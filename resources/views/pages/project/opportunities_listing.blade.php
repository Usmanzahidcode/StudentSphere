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

                        <a class="custom-btn btn"
                           href="{{ route('opportunities.show', ['opportunity' => $opportunity->id]) }}">
                            Interested
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="my-5">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($opportunities->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $opportunities->previousPageUrl() }}">Previous</a>
                            </li>
                        @endif

                        {{-- Page Numbers --}}
                        @foreach ($opportunities->links()->elements as $element)
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <li class="page-item {{ $opportunities->currentPage() == $page ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($opportunities->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $opportunities->nextPageUrl() }}">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Next</span>
                            </li>
                        @endif
                    </ul>

                </ul>
            </nav>
        </div>
@endsection

@push('scripts')

@endpush

