@extends('layouts.accounts_page_layout')

@section('account_section')
    <h3>Password & Security</h3>

    <form action="{{ route('account.password.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                   id="current_password" name="current_password" required>
            @error('current_password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                   id="new_password" name="new_password" required>
            @error('new_password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                   id="new_password_confirmation" name="new_password_confirmation" required>
            @error('new_password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Password</button>
    </form>
@endsection
