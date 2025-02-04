@extends('layouts.base_layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/project/opportunity_listing.css') }}">
@endpush

@section('title')
    Opportunities | StudentSphere
@endsection

@section('description')
    Explore the latest opportunities
@endsection

@section('content')
    <div class="container my-5 min-vh-100">
        <div class="d-flex justify-content-between">
            <div>
                <h3>Opportunities</h3>
                <p>Look and select the opportunities that resonate with you interests and submit application.</p>
            </div>
            <div class="d-flex flex-column justify-content-center">
                <a href="{{ route('opportunities.create') }}" class="bi-plus-circle-fill custom-icon fs-5 me-3"> Add an opportunity</a>
            </div>
        </div>
        <div class="py-2 d-flex flex-column gap-5">
            <div class="card opportunity-card">
                <div class="card-body">
                    <h3>
                        Collaborative Web Development Project: Building a Cutting-Edge E-Commerce Platform from Scratch
                    </h3>
                    <p>
                        We are seeking talented developers, designers, and project managers to collaborate on an
                        exciting web development project. The goal is to create a fully functional e-commerce platform
                        from scratch, using modern technologies like React, Node.js, and MongoDB. This project will
                        provide hands-on experience in full-stack development, UI/UX design, and team-based project
                        management. If you're passionate about building innovative solutions and working with a team,
                        this is the perfect opportunity for you. Let’s create something amazing together!
                    </p>
                    <button class="custom-btn btn">
                        Submit application
                    </button>
                </div>
            </div>
            <div class="card opportunity-card">
                <div class="card-body">
                    <h3>
                        Collaborative Web Development Project: Building a Cutting-Edge E-Commerce Platform from Scratch
                    </h3>
                    <p>
                        We are seeking talented developers, designers, and project managers to collaborate on an
                        exciting web development project. The goal is to create a fully functional e-commerce platform
                        from scratch, using modern technologies like React, Node.js, and MongoDB. This project will
                        provide hands-on experience in full-stack development, UI/UX design, and team-based project
                        management. If you're passionate about building innovative solutions and working with a team,
                        this is the perfect opportunity for you. Let’s create something amazing together!
                    </p>
                    <button class="custom-btn btn">
                        Submit application
                    </button>
                </div>
            </div>
            <div class="card opportunity-card">
                <div class="card-body">
                    <h3>
                        Collaborative Web Development Project: Building a Cutting-Edge E-Commerce Platform from Scratch
                    </h3>
                    <p>
                        We are seeking talented developers, designers, and project managers to collaborate on an
                        exciting web development project. The goal is to create a fully functional e-commerce platform
                        from scratch, using modern technologies like React, Node.js, and MongoDB. This project will
                        provide hands-on experience in full-stack development, UI/UX design, and team-based project
                        management. If you're passionate about building innovative solutions and working with a team,
                        this is the perfect opportunity for you. Let’s create something amazing together!
                    </p>
                    <button class="custom-btn btn">
                        Submit application
                    </button>
                </div>
            </div>
            <div class="card opportunity-card">
                <div class="card-body">
                    <h3>
                        Collaborative Web Development Project: Building a Cutting-Edge E-Commerce Platform from Scratch
                    </h3>
                    <p>
                        We are seeking talented developers, designers, and project managers to collaborate on an
                        exciting web development project. The goal is to create a fully functional e-commerce platform
                        from scratch, using modern technologies like React, Node.js, and MongoDB. This project will
                        provide hands-on experience in full-stack development, UI/UX design, and team-based project
                        management. If you're passionate about building innovative solutions and working with a team,
                        this is the perfect opportunity for you. Let’s create something amazing together!
                    </p>
                    <button class="custom-btn btn">
                        Submit application
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush

