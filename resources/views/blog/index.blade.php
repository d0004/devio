@extends('layouts.main')

@section('content')
    <h1 class="mb-4">Blog</h1>
    
    @if(request('search'))
        <a href="{{ route('blog.index') }}" class="btn btn-secondary mb-4">
            Reset search query
        </a>
    @endif

    <form class="mb-4" method="GET" action="{{ route('blog.index') }}">
        <div class="input-group">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Search posts..."
                value="{{ request('search') }}"
            >
            <button class="btn btn-primary">
                Search
            </button>
        </div>
    </form>

    

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-3">
                <div class="card mb-3">

                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image->path) }}" class="card-img-top">
                    @endif

                    <div class="card-body">

                        <h3 class="card-title">
                            {{ $post->title }}
                        </h3>

                        <p class="text-muted">
                            {{ $post->published_at->format('d.m.Y') }}
                        </p>

                        <p>
                            {{ $post->short_description }}
                        </p>

                        <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary">
                            Read more
                        </a>

                    </div>

                </div>
            </div>
        @endforeach
    </div>
    {{ $posts->links() }}
@endsection
