<div>
    {{ $post->title }}

    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
</div>

