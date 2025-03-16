@extends('layouts.base_layout')

@section('content')
    <div class="container">
        <h2>Forum</h2>

        {{-- Success message --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Create New Post --}}
        <div class="card mb-4">
            <div class="card-header">Create a New Post</div>
            <div class="card-body">
                <form action="{{ route('forums.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </div>
        </div>

        {{-- Forum Posts List --}}
        <div class="list-group">
            @foreach($forumPosts as $post)
                <div class="list-group-item">
                    <h5>{{ $post->title }}</h5>
                    <p>{{ $post->content }}</p>
                    <small>Posted by {{ $post->user->first_name }} {{ $post->user->last_name }} | {{ $post->created_at->diffForHumans() }}</small>

                    {{-- Edit & Delete (Only for the post owner) --}}
                    @if(auth()->id() === $post->user_id)
                        <div class="mt-2">
                            <!-- Edit Button (Shows Edit Form Below) -->
                            <button class="btn btn-warning btn-sm" onclick="toggleEditForm({{ $post->id }})">Edit</button>

                            <!-- Delete Form -->
                            <form action="{{ route('forums.destroy', $post) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>

                        <!-- Hidden Edit Form (Toggled on Edit Click) -->
                        <div id="edit-form-{{ $post->id }}" class="mt-3 d-none">
                            <form action="{{ route('forums.update', $post) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-2">
                                    <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                                </div>
                                <div class="mb-2">
                                    <textarea name="content" class="form-control" rows="2" required>{{ $post->content }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Save Changes</button>
                                <button type="button" class="btn btn-secondary btn-sm" onclick="toggleEditForm({{ $post->id }})">Cancel</button>
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
