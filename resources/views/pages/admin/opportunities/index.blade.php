@extends('layouts.admin_page_layout')

@section('admin_section')
    <div class="container">
        <h3>Opportunities</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Posted By</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($opportunities as $opportunity)
                <tr>
                    <td>{{ $opportunity->title }}</td>
                    <td>{{ $opportunity->user->first_name }} {{ $opportunity->user->last_name }}</td>
                    <td>
                        <span class="badge text-white
                            {{ $opportunity->status->value === 'approved' ? 'bg-success' :
                               ($opportunity->status->value === 'rejected' ? 'bg-danger' : 'bg-warning') }}">
                            {{ ucfirst($opportunity->status->value) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.opportunities.show', $opportunity) }}" class="btn text-white btn-info btn-sm">View</a>

                        <form action="{{ route('admin.opportunities.approve', $opportunity) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                        </form>

                        <form action="{{ route('admin.opportunities.reject', $opportunity) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $opportunities->links() }}
    </div>
@endsection
