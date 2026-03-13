@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">Edit Post</h1>

    <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.posts.form')

        <button class="btn btn-primary mt-3">
            Update
        </button>

    </form>
@endsection
