@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">Posts</h1>

    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">
        Create Post
    </a>

    <table class="table table-bordered table-sm">

        <thead>
            <tr>
                <th>Image</th>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Published</th>
                <th width="200">Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($posts as $post)
                <tr>
                    <td>
                        @if($post->image)
                            <img src="{{ asset('storage/'.$post->image->path) }}" width="80">
                        @endif
                    </td>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>
                        {{ $post->published_at?->format('d.m.Y') }}<br>
                        @if($post->is_published)
                            <span class="badge bg-success">Published</span>
                        @else
                            <span class="badge bg-secondary">Draft</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form method="POST" action="{{ route('posts.destroy', $post) }}" style="display:inline-block">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm btn-danger">
                                Delete
                            </button>

                        </form>

                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>

    {{ $posts->links() }}
@endsection
