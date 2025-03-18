@extends('layouts.admin_page_layout')

@section('admin_section')
    <h2>Manage Forum Posts</h2>

    @if($forumPosts->isEmpty())
        <p>No forum posts available.</p>
    @else
        <div class="list-group">
            @foreach($forumPosts as $post)
                <div class="list-group-item p-4 shadow-sm rounded border mb-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <!-- Post Title -->
                            <h5 class="fw-bold mb-2">{{ $post->title }}</h5>

                            <!-- Post Content -->
                            <p class="mb-2">{{ $post->content }}</p>

                            <!-- Post Meta -->
                            <small class="text-muted">
                                Posted by <strong>{{ $post->user->first_name }} {{ $post->user->last_name }}</strong>
                                • {{ $post->created_at->diffForHumans() }}
                            </small>

                            <!-- Post Status -->
                            <div class="mt-1">
                                <span class="badge text-white {{ $post->status->value === 'published' ? 'bg-success' : 'bg-warning' }}">
                                    {{ ucfirst($post->status->value) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Admin Controls -->
                    <div class="mt-3 d-flex gap-2">
                        @if($post->status->value === 'under_review')
                            <form action="{{ route('admin.forums.approve', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">✔ Approve</button>
                            </form>
                        @endif

                        <form action="{{ route('admin.forums.destroy', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑 Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $forumPosts->links() }}
        </div>
    @endif
@endsection
