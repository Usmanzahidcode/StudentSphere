@extends('layouts.accounts_page_layout')

@section('account_section')
    <h2>My Forum Posts</h2>

    {{-- Forum Posts List --}}
    @if($forumPosts->isEmpty())
        <p>You haven't created any forum posts yet.</p>
    @else
        <div class="list-group">
            @foreach($forumPosts as $post)
                <div class="list-group-item p-4 shadow-sm rounded border">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <!-- Post Title -->
                            <h5 class="fw-bold mb-2">{{ $post->title }}</h5>

                            <!-- Post Content -->
                            <p class="mb-2">{{ $post->content }}</p>

                            <!-- Post Meta -->
                            <small class="text-muted">
                                Posted {{ $post->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>

                    <!-- Edit & Delete Buttons (Only for the Post Owner) -->
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
                            @method('PATCH')
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
                </div>
            @endforeach
        </div>
    @endif

    <script>
        function toggleEditForm(postId) {
            document.getElementById('edit-form-' + postId).classList.toggle('d-none');
        }
    </script>
@endsection
