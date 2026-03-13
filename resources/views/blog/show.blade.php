@extends('layouts.main')

@section('content')
    <article class="card">

        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image->path) }}" class="card-img-top">
        @endif

        <div class="card-body">

            <h1 class="mb-3">
                {{ $post->title }}
            </h1>

            <p class="text-muted">
                {{ $post->published_at->format('d.m.Y') }}
            </p>

            <div>
                {!! nl2br(e($post->content)) !!}
            </div>

        </div>

    </article>
@endsection
