<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title', optional($post ?? null)->title) }}" class="form-control">
    @error('title')
        <div>{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content', optional($post ?? null)->content) }}</textarea>
    @error('content')
        <div>{{ $message }}</div>
    @enderror
</div>