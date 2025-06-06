@extends('layouts.base_layout')

@push('styles')

@endpush

@section('title')
    Opportunities | StudentSphere
@endsection

@section('description')
    Explore the latest opportunities
@endsection

@section('content')
            <h3 class="fw-bold">Apply for: <span class="text-success">{{ $opportunity->title }}</span></h3>
            <p class="text-muted">
                Submit your application to be considered for this opportunity.
                <span class="p-2 rounded-pill bg-dark text-white">Guidelines:</span> Ensure your application is complete,
                highlighting your relevant experience, skills, and motivation for applying.
            </p>


            <form action="{{ route('applications.store', ['opportunity' => $opportunity->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 position-relative">
                <label for="application-body-editor" class="form-label">Application body</label>
                <textarea class="form-control @error('body') is-invalid @enderror"
                          id="application-body-editor" name="body" placeholder="The floor is yours!">
                    {{ old('body') }}
                </textarea>
                @error('body')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <!-- File Upload -->
            <div class="mb-3">
                <label for="application-file" class="form-label">Attach a file (optional):</label>
                <input class="form-control @error('file') is-invalid @enderror"
                       type="file" id="application-file" name="file">
                @error('file')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mb-3 d-flex justify-content-end">
                <button type="submit" class="btn custom-btn py-2 px-5">Submit</button>
            </div>
        </form>
@endsection

@push('scripts')
    <script src="{{ asset('assets/javascript/tinymce/tinymce.min.js') }}"></script>

    <script>
        tinymce.init({
            selector: '#application-body-editor',
            plugins: [
                'codesample', 'link', 'lists', 'table', 'visualblocks', 'checklist'
            ],
            toolbar: 'undo redo | blocks | bold italic underline strikethrough | link table | checklist numlist bullist',
        });
    </script>
@endpush

