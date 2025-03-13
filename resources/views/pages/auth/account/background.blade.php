@extends('layouts.accounts_page_layout')

@section('account_section')
    <h3>Background Information</h3>
    <form action="{{ route('account.background.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="institution" class="form-label">Institution</label>
            <input type="text" class="form-control @error('institution') is-invalid @enderror"
                   id="institution" name="institution"
                   value="{{ old('institution', auth()->user()->educationalBackground->institution ?? '') }}">
            @error('institution')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="degree" class="form-label">Degree</label>
            <input type="text" class="form-control @error('degree') is-invalid @enderror"
                   id="degree" name="degree"
                   value="{{ old('degree', auth()->user()->educationalBackground->degree ?? '') }}">
            @error('degree')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="field_of_study" class="form-label">Field of Study</label>
            <input type="text" class="form-control @error('field_of_study') is-invalid @enderror"
                   id="field_of_study" name="field_of_study"
                   value="{{ old('field_of_study', auth()->user()->educationalBackground->field_of_study ?? '') }}">
            @error('field_of_study')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date_of_completion" class="form-label">Date of Completion</label>
            <input type="date" class="form-control @error('date_of_completion') is-invalid @enderror"
                   id="date_of_completion" name="date_of_completion"
                   value="{{ old('date_of_completion', auth()->user()->educationalBackground->date_of_completion ?? '') }}">
            @error('date_of_completion')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Background Info</button>
    </form>
@endsection
