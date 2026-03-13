@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">Create Post</h1>

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf

        @include('admin.posts.form')

        <button class="btn btn-success mt-3">
            Create
        </button>

    </form>
@endsection
