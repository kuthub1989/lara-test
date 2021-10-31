<div class="mb-3">
    <h6><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h6>

    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success">Edit</a>

    <form class="d-inline" action="{{ route('post.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
</div>

