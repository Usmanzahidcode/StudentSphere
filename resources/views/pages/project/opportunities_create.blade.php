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

        <form action="{{ route('opportunities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-3">
                <label for="opportunity-title" class="form-label">Title:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                       id="opportunity-title" name="title"
                       placeholder="AI System for Detecting Diseases Through Facial Video Analysis"
                       value="{{ old('title') }}">
                @error('title')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3 position-relative">
                <!-- SS-AI -->
                <button type="button" class="btn floating-btn" id="floating-btn">AI Help</button>

                <div id="ai-modal" class="modal">
                    <div class="modal-content">
                        <span class="close-btn">&times;</span>
                        <h4>AI Query Instructions</h4>
                        <p>Use this box to enter your query, and AI will assist you in answering. Press Enter when
                            ready!</p>
                        <input type="text" class="form-control" id="ai-query-input" placeholder="Ask the AI...">
                        <button type="button" id="submit-query-btn" class="btn custom-btn">Submit Query</button>
                    </div>
                </div>

                <label for="opportunity-description-editor" class="form-label">Description:</label>
                <textarea class="form-control @error('description') is-invalid @enderror"
                          id="opportunity-description-editor" name="description" placeholder="The floor is yours!">
                    {{ old('description') }}
                </textarea>
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
                    <option value="tech" {{ old('category') == 'tech' ? 'selected' : '' }}>Tech</option>
                    <option value="ai" {{ old('category') == 'ai' ? 'selected' : '' }}>Artificial Intelligence</option>
                    <option value="machine-learning" {{ old('category') == 'machine-learning' ? 'selected' : '' }}>
                        Machine Learning
                    </option>
                    <option value="deep-learning" {{ old('category') == 'deep-learning' ? 'selected' : '' }}>Deep
                        Learning
                    </option>
                    <option value="computer-vision" {{ old('category') == 'computer-vision' ? 'selected' : '' }}>
                        Computer Vision
                    </option>
                    <option
                        value="natural-language-processing" {{ old('category') == 'natural-language-processing' ? 'selected' : '' }}>
                        Natural Language Processing
                    </option>
                    <option value="robotics" {{ old('category') == 'robotics' ? 'selected' : '' }}>Robotics</option>
                    <option value="data-science" {{ old('category') == 'data-science' ? 'selected' : '' }}>Data
                        Science
                    </option>
                    <option value="bioinformatics" {{ old('category') == 'bioinformatics' ? 'selected' : '' }}>
                        Bioinformatics
                    </option>
                    <option value="blockchain" {{ old('category') == 'blockchain' ? 'selected' : '' }}>Blockchain
                    </option>
                    <option value="cybersecurity" {{ old('category') == 'cybersecurity' ? 'selected' : '' }}>
                        Cyber security
                    </option>
                    <option value="cloud-computing" {{ old('category') == 'cloud-computing' ? 'selected' : '' }}>Cloud
                        Computing
                    </option>
                    <option value="web-development" {{ old('category') == 'web-development' ? 'selected' : '' }}>Web
                        Development
                    </option>
                    <option
                        value="mobile-app-development" {{ old('category') == 'mobile-app-development' ? 'selected' : '' }}>
                        Mobile App Development
                    </option>
                    <option
                        value="software-engineering" {{ old('category') == 'software-engineering' ? 'selected' : '' }}>
                        Software Engineering
                    </option>
                    <option value="virtual-reality" {{ old('category') == 'virtual-reality' ? 'selected' : '' }}>Virtual
                        Reality
                    </option>
                    <option value="augmented-reality" {{ old('category') == 'augmented-reality' ? 'selected' : '' }}>
                        Augmented Reality
                    </option>
                    <option value="game-development" {{ old('category') == 'game-development' ? 'selected' : '' }}>Game
                        Development
                    </option>
                    <option value="networking" {{ old('category') == 'networking' ? 'selected' : '' }}>Networking
                    </option>
                    <option
                        value="database-management" {{ old('category') == 'database-management' ? 'selected' : '' }}>
                        Database Management
                    </option>
                    <option value="software-testing" {{ old('category') == 'software-testing' ? 'selected' : '' }}>
                        Software Testing
                    </option>
                    <option value="ui-ux-design" {{ old('category') == 'ui-ux-design' ? 'selected' : '' }}>UI/UX
                        Design
                    </option>
                    <option value="digital-marketing" {{ old('category') == 'digital-marketing' ? 'selected' : '' }}>
                        Digital Marketing
                    </option>
                    <option value="automation" {{ old('category') == 'automation' ? 'selected' : '' }}>Automation
                    </option>
                    <option value="ethical-hacking" {{ old('category') == 'ethical-hacking' ? 'selected' : '' }}>Ethical
                        Hacking
                    </option>
                    <option value="devops" {{ old('category') == 'devops' ? 'selected' : '' }}>DevOps</option>
                    <option value="internet-of-things" {{ old('category') == 'internet-of-things' ? 'selected' : '' }}>
                        Internet of Things (IoT)
                    </option>
                    <option value="quantum-computing" {{ old('category') == 'quantum-computing' ? 'selected' : '' }}>
                        Quantum Computing
                    </option>
                    <option value="smart-cities" {{ old('category') == 'smart-cities' ? 'selected' : '' }}>Smart
                        Cities
                    </option>
                    <option value="edge-computing" {{ old('category') == 'edge-computing' ? 'selected' : '' }}>Edge
                        Computing
                    </option>
                    <option value="5g" {{ old('category') == '5g' ? 'selected' : '' }}>5G Technology</option>

                </select>
                @error('category')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <!-- File Upload -->
            <div class="mb-3">
                <label for="opportunity-file" class="form-label">Attach a file (optional):</label>
                <input class="form-control @error('file') is-invalid @enderror"
                       type="file" id="opportunity-file" name="file">
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

