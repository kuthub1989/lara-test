<div>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title', optional($post ?? null)->title) }}">
    @error('title')
        <div>{{ $message }}</div>
    @enderror
</div>
<div>
    <label for="content">Content</label>
    <textarea name="content" id="content" cols="30" rows="10">{{ old('content', optional($post ?? null)->content) }}</textarea>
    @error('content')
        <div>{{ $message }}</div>
    @enderror
</div>