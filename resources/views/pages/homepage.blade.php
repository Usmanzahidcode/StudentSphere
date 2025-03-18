@extends('layouts.base_layout')

@section('title')
    Welcome to StudentSphere | Empower Your Future
@endsection

@section('description')
    StudentSphere: Your gateway to opportunities, connections, and career growth. Join now!
@endsection

@section('content')
    <div class="container text-center py-5">

        <!-- 🚀 Hero Section -->
        <div class="hero bg-gradient-primary text-white p-5 rounded shadow-lg">
            <h1 class="display-3 fw-bold">Your Future Starts Here 🚀</h1>
            <p class="lead mt-3">Join thousands of ambitious students, connect with mentors, and seize life-changing opportunities.</p>
            <a href="{{ route('register.form') }}" class="btn btn-lg btn-warning fw-bold px-5 py-3 mt-3">Get Started Now</a>
        </div>

        <!-- 🌟 Core Values -->
        <div class="my-5">
            <h2 class="fw-bold text-primary">Why Join <span class="text-warning">StudentSphere?</span></h2>
            <p class="text-muted">A powerful platform built for students who dream big.</p>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="feature-box p-4 rounded shadow-sm bg-light">
                        <h4 class="fw-bold text-primary">📚 Learn & Grow</h4>
                        <p class="text-muted">Gain knowledge, sharpen skills, and stay ahead in your career.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box p-4 rounded shadow-sm bg-light">
                        <h4 class="fw-bold text-primary">🌎 Connect & Network</h4>
                        <p class="text-muted">Engage with peers, mentors, and industry leaders globally.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box p-4 rounded shadow-sm bg-light">
                        <h4 class="fw-bold text-primary">🚀 Unlock Opportunities</h4>
                        <p class="text-muted">Find exclusive internships, scholarships, and projects.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 🔥 Latest Opportunities -->
        <div class="opportunities-section bg-light p-5 rounded shadow-sm">
            <h2 class="fw-bold text-primary">🔥 Featured Opportunities</h2>
            <p class="text-muted">Grab the latest internships, scholarships, and career-changing programs.</p>

            <div class="row">
                @foreach($latestOpportunities as $opportunity)
                    <div class="col-md-4">
                        <div class="opportunity-card p-4 rounded shadow bg-white">
                            <h5 class="fw-bold">{{ $opportunity->title }}</h5>
                            <p class="text-muted">{!! Str::limit($opportunity->description, 100) !!}</p>
                            <a href="{{ route('opportunities.show', $opportunity->id) }}" class="btn btn-sm btn-primary">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 💬 Forum Discussions -->
        <div class="forum-section my-5">
            <h2 class="fw-bold text-primary">💬 Trending Discussions</h2>
            <p class="text-muted">Stay inspired with hot topics from fellow students.</p>

            <div class="list-group">
                @foreach($latestForumPosts as $post)
                    <a class="list-group-item list-group-item-action shadow-sm">
                        <h5 class="fw-bold mb-1">{{ $post->title }}</h5>
                        <p class="text-muted">{{ Str::limit($post->content, 120) }}</p>
                        <small class="text-muted">Posted {{ $post->created_at->diffForHumans() }}</small>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- 🎯 Call to Action -->
        <div class="cta-section text-center my-5">
            <h2 class="fw-bold">Don't Just Watch. Take Action! 💡</h2>
            <p class="text-muted">Join StudentSphere and start your journey today.</p>
            <a href="{{ route('register.form') }}" class="btn btn-lg btn-warning fw-bold px-5 py-3">🚀 Get Started Now</a>
        </div>

    </div>
@endsection
