@extends('layouts.base_layout')

@section('content')
    <div class="container">
        <h2>Forum</h2>
        {{-- Create New Post --}}
        <div class="card mb-4">
            <div class="card-header">Create a New Post</div>
            <div class="card-body">
                <form action="{{ route('forums.store') }}" method="POST">
                    @csrf

                    <!-- Title Field -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}"
                            required>

                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Content Field -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea
                            name="content"
                            id="content"
                            class="form-control @error('content') is-invalid @enderror"
                            rows="3"
                            required>{{ old('content') }}</textarea>

                        @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </div>
        </div>


        {{-- Forum Posts List --}}
        <div class="list-group">
            @foreach($forumPosts as $post)
                <div class="list-group-item p-4 shadow-sm rounded border">
                    <!-- Post Title -->
                    <h5 class="fw-bold mb-2">{{ $post->title }}</h5>

                    <!-- Post Content -->
                    <p class="mb-2">{{ $post->content }}</p>

                    <!-- Post Meta -->
                    <small class="text-muted">
                        Posted by <strong>{{ $post->user->first_name }} {{ $post->user->last_name }}</strong> • {{ $post->created_at->diffForHumans() }}
                    </small>

                    <!-- Edit & Delete Buttons (Only for the Post Owner) -->
                    @if(auth()->id() === $post->user_id)
                        <div class="mt-3 d-flex gap-2">
                            <button class="btn btn-warning btn-sm" onclick="toggleEditForm({{ $post->id }})">
                                ✏️ Edit
                            </button>

                            <form action="{{ route('forums.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    🗑️ Delete
                                </button>
                            </form>
                        </div>

                        <!-- Hidden Edit Form -->
                        <div id="edit-form-{{ $post->id }}" class="mt-3 d-none p-3 border rounded bg-light">
                            <form action="{{ route('forums.update', $post) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-2">
                                    <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                                </div>
                                <div class="mb-2">
                                    <textarea name="content" class="form-control" rows="3" required>{{ $post->content }}</textarea>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-success btn-sm">💾 Save</button>
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="toggleEditForm({{ $post->id }})">
                                        ❌ Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>


        {{-- Pagination --}}
        <div class="mt-4">
            {{ $forumPosts->links() }}
        </div>
    </div>

    <script>
        function toggleEditForm(postId) {
            document.getElementById('edit-form-' + postId).classList.toggle('d-none');
        }
    </script>
@endsection
