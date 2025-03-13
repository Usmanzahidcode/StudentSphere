@extends('layouts.accounts_page_layout')

@section('account_section')
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title mb-3">Account Details</h4>
            <p><strong>Full Name:</strong> {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Account Created:</strong> {{ auth()->user()->created_at->format('d M Y') }}</p>
        </div>
    </div>

    <div class="card mt-3 shadow-sm">
        <div class="card-body">
            <h4 class="card-title">Dangerous</h4>
            <p class="mb-3">The actions below are irreversible!</p>
            <form action="{{ route('account.delete') }}" method="POST" onsubmit="return confirm('Are you sure? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Account</button>
            </form>
        </div>
    </div>
@endsection
