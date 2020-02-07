@extends('layout')

@section('content')
    <main>
        <div class="container">
            @include('share.post')
            <div class="mt-5">
                <a href="{{ route('comments.create', ['post' => $post->id]) }}" class="d-block btn">コメントをする</a>
            </div>

            <div class="mt-5 mb-3">
                <h2>コメント</h2>
                @foreach($comments as $comment)
                    <div class="card mt-3">
                        <div class="card-body">
                            <p style="font-size:0.8rem">投稿者: {{ $comment->user->name }}</p>
                            <p>{{ $comment->content }}</p>
                            <p style="font-size:0.8rem">{{ $comment->created_at->format('Y年n月j日 H時i分') }}</p>
                        </div>
                        <div>
                            @if(Auth::check())
                                @if(Auth::user()->id === $comment->user_id)
                                    <a href="{{ route('comments.edit', ['post' => $post->id, 'comment' => $comment->id]) }}" class="btn">編集する</a>
                                    <a href="{{ route('comments.delete', ['post' => $post->id, 'comment' => $comment->id]) }}" class="btn">削除する</a>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div> 
    </main>
@endsection