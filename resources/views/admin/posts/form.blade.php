<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $post->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Slug</label>
    <input type="text" class="form-control" readonly disabled value="{{ $post->slug ?? '' }}">
</div>

<div class="row mb-3">
    <div class="col-sm-6">
        <label class="form-label">Image</label>
        <input
            type="file"
            name="image"
            class="form-control"
            accept="image/*"
        >
    </div>
    <div class="col-sm-6">
        @if($post->image)
            <img src="{{ asset('storage/'.$post->image->path) }}" height="200">
        @endif
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Short description</label>
    <textarea name="short_description" class="form-control" rows="3">{{ old('short_description', $post->short_description ?? '') }}</textarea>
</div>


<div class="mb-3">
    <label class="form-label">Content</label>
    <textarea name="content" class="form-control" rows="8">{{ old('content', $post->content ?? '') }}</textarea>
</div>


<div class="mb-3">
    <label class="form-label">Publish date</label>
    <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at', isset($post) && $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
</div>
