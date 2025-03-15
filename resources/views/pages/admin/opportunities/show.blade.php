@extends('layouts.admin_page_layout')

@section('admin_section')
    <div class="container">
        <h1>Opportunity Details</h1>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $opportunity->title }}</h3>
                <p class="card-text"><strong>Posted By:</strong> {{ $opportunity->user->first_name }} {{ $opportunity->user->last_name }}</p>
                <p class="card-text"><strong>Status:</strong>
                    <span class="badge text-white {{ $opportunity->status->value === 'approved' ? 'bg-success' : ($opportunity->status->value === 'rejected' ? 'bg-danger' : 'bg-warning') }}">
                        {{ ucfirst($opportunity->status->value) }}
                    </span>
                </p>
                <p class="card-text"><strong>Description:</strong> {!! $opportunity->description !!}</p>

                @if($opportunity->status->value === 'under_review')
                    <form action="{{ route('admin.opportunities.approve', $opportunity) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>

                    <form action="{{ route('admin.opportunities.reject', $opportunity) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                @endif

                <a href="{{ route('admin.opportunities') }}" class="btn btn-secondary">Back to Opportunities</a>
            </div>
        </div>
    </div>
@endsection
