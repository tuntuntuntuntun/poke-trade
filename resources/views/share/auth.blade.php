@if(Auth::check())
    @if(Auth::user()->id === $post->user_id)
        <div class="d-flex">
            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn">編集する</a>
            <a href="{{ route('posts.delete', ['post' => $post->id]) }}" class="btn">削除する</a>
        </div>
    @endif
@endif