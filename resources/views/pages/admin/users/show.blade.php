@extends('layouts.admin_page_layout')

@section('content')
    <div class="container">
        <h1 class="mb-4">Users</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                            <span class="badge {{ $user->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($user->status) }}
                            </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-primary btn-sm">View</a>
                        @if($user->status === 'active')
                            <form action="{{ route('admin.users.ban', $user) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Ban</button>
                            </form>
                        @else
                            <form action="{{ route('admin.users.unban', $user) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Unban</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
    </div>
@endsection
