@extends('layouts.base_layout')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/project/opportunity_create_ck.css') }}">
@endpush

@section('title')
    Opportunities | StudentSphere
@endsection

@section('description')
    Explore the latest opportunities
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('opportunities.store') }}" method="POST">
            @csrf
            <label for="opportunity-description-editor"></label>
            <textarea name="test" id="opportunity-description-editor"></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.tiny.cloud/1/gvkli3l4hpqe6jxr7h4k0npyxkkrauxo5a3keab297gfhhy9/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#opportunity-description-editor'
        });
    </script>
{{--    <script type="importmap">--}}
{{--        {--}}
{{--            "imports": {--}}
{{--                "ckeditor5": "{{ asset('assets/javascript/ckeditor5/ckeditor5.js') }}",--}}
{{--                "ckeditor5/": "{{ asset('assets/javascript/ckeditor5/') }}"--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}

{{--    <script type="module" src="{{ asset('assets/javascript/custom/opportunity_create.js') }}"></script>--}}
@endpush

