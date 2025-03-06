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

    <script>
        document.getElementById('floating-btn').addEventListener('click', function () {
            document.getElementById('ai-modal').style.display = 'block';
        });

        document.querySelector('.close-btn').addEventListener('click', function () {
            document.getElementById('ai-modal').style.display = 'none';
        });

        document.getElementById('submit-query-btn').addEventListener('click', function () {
            const query = document.getElementById('ai-query-input').value;

            if (query.trim() !== "") {
                // Construct the URL dynamically using Blade syntax
                // TODO: Either remove the AI code from this page or change t he route to the generator of application bogy
                const url = `{{ route('ss-ai.opportunity-description') }}?query=${encodeURIComponent(query)}`;

                fetch(url, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.response);
                        tinymce.activeEditor.setContent(data.data.response)
                        document.getElementById('ai-modal').style.display = 'none';
                    })
                    .catch(error => console.error('Error was:', error));
            }
        });


        document.getElementById('ai-query-input').addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                document.getElementById('submit-query-btn').click();
            }
        });
    </script>

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

