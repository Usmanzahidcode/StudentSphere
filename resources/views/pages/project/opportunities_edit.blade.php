@extends('layouts.base_layout')

@push('styles')
    <style>
        /* Style the floating button */
        .floating-btn {
            position: absolute;
            z-index: 1000;
            bottom: 50px;
            right: 25px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: 0.3s ease;

            padding: 10px 50px;
        }

        .floating-btn:hover {
            background-color: #2b42a0;
            color: white;
        }

        /* Modal for AI instructions */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            margin: 15% auto;
            width: 50%;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .modal h4 {
            font-size: 20px;
            color: #364fc7;
        }

        .modal input {
            margin-top: 10px;
            padding: 10px;
            width: 100%;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .modal .btn {
            margin-top: 10px;
        }

        /* Close button */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color: #000;
            cursor: pointer;
        }

    </style>
@endpush

@section('title')
    Opportunities | StudentSphere
@endsection

@section('description')
    Explore the latest opportunities
@endsection

@section('content')
        <h3 class="fw-bold">Create Opportunity</h3>
        <p class="text-muted">This is your entry point to collaboration. <span
                class="p-2 rounded-pill bg-dark text-white">Guidelines: </span> Provide a clear and detailed opportunity
            description, outlining the project scope, requirements, and expectations for contributors.</p>

            <form action="{{ route('opportunities.update', $opportunity->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- Title -->
                <div class="mb-3">
                    <label for="opportunity-title" class="form-label">Title:</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           id="opportunity-title" name="title"
                           value="{{ old('title', $opportunity->title) }}">
                    @error('title')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="opportunity-description-editor" class="form-label">Description:</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                              id="opportunity-description-editor" name="description">{{ old('description', $opportunity->description) }}</textarea>
                    @error('description')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label for="opportunity-category" class="form-label">Category:</label>
                    <select class="form-select @error('category') is-invalid @enderror"
                            id="opportunity-category" name="category">
                        <option value="">Select a category</option>
                        @foreach(['tech', 'ai', 'machine-learning', 'deep-learning', 'computer-vision', 'natural-language-processing', 'robotics', 'data-science', 'bioinformatics', 'blockchain', 'cybersecurity', 'cloud-computing', 'web-development', 'mobile-app-development', 'software-engineering', 'virtual-reality', 'augmented-reality', 'game-development', 'networking', 'database-management', 'software-testing', 'ui-ux-design', 'digital-marketing', 'automation', 'ethical-hacking', 'devops', 'internet-of-things', 'quantum-computing', 'smart-cities', 'edge-computing', '5g'] as $category)
                            <option value="{{ $category }}" {{ old('category', $opportunity->category) == $category ? 'selected' : '' }}>
                                {{ ucwords(str_replace('-', ' ', $category)) }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <!-- File Upload -->
                <div class="mb-3">
                    <label for="opportunity-file" class="form-label">Attach a file (Only if you want to change the previous file):</label>
                    <input class="form-control @error('file') is-invalid @enderror"
                           type="file" id="opportunity-file" name="file">
                    @error('file')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn custom-btn py-2 px-5">Update</button>
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
            selector: '#opportunity-description-editor',
            plugins: [
                'codesample', 'link', 'lists', 'table', 'visualblocks', 'checklist'
            ],
            toolbar: 'undo redo | blocks | bold italic underline strikethrough | link table | checklist numlist bullist',
        });
    </script>
@endpush

