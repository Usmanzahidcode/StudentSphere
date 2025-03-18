@extends('account.account_base')

@section('account_section')
    <h2>My Forum Posts</h2>

    @if($forumPosts->isEmpty())
        <p>You haven't created any forum posts yet.</p>
    @else
        <div class="list-group">
            @foreach($forumPosts as $post)
                <a href="{{ route('forums.show', $post->id) }}" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">{{ $post->title }}</h5>
                    <small class="text-muted">Posted on {{ $post->created_at->format('M d, Y') }}</small>
                </a>
            @endforeach
        </div>
    @endif
@endsection
