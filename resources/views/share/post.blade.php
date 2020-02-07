<div class="mt-3 card">
    <a href="{{ route('posts.detail', ['post' => $post]) }}" style="color:black;">
        <div class="card-body">
            <p style="font-size:0.8rem">投稿者: {{ $post->user->name }}</p>
            <h2 class="card-title">{{ $post->title }}</h2>
            <div class="d-flex justify-content-left">
                <p class="mr-4">欲しいポケモン: {{ $post->want }}</p>
                <p>譲るポケモン: {{ $post->give }}</p>
            </div>
            <p style="font-size:0.8rem">{{ $post->created_at->format('Y年n月j日 H時i分') }}</p>
        </div>
    </a>
    @if(Auth::check())
        @if(Auth::user()->id === $post->user_id)
            <div class="d-flex">
                <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn">編集する</a>
                <a href="{{ route('posts.delete', ['post' => $post->id]) }}" class="btn">削除する</a>
            </div>
        @endif
    @endif
</div>