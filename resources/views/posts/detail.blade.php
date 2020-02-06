@extends('layout')

@section('content')
    <div class="container">
        <p>投稿者: {{ $post->user->name }}</p>
        <ul>
            <li>欲しいポケモン: {{ $post->want }}</li>
            <li>譲るポケモン: {{ $post->give }}</li>
        </ul>

        <div class="text-right">
            @if(Auth::check())
                @if(Auth::user()->id === $post->user_id)
                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">編集する</a>
                    <a href="{{ route('posts.delete', ['post' => $post->id]) }}" class="btn btn-danger">削除する</a>
                @endif
            @endif
        </div>
        <div class="mt-5">
            <a href="{{ route('comments.create', ['post' => $post->id]) }}" class="d-block btn btn-primary">コメントをする</a>
        </div>

        <div class="mt-5 mb-3">
            <h2>コメント</h2>
            @foreach($comments as $comment)
                <div class="card mt-3">
                    <div class="card-body">
                        <p>{{ $comment->created_at->format('Y年n月j日 H時i分') }}</p>
                        <p>投稿者: {{ $comment->user->name }}</p>
                        <p>{{ $comment->content }}</p>
                    </div>
                    <div>
                        @if(Auth::check())
                            @if(Auth::user()->id === $comment->user_id)
                                <a href="{{ route('comments.edit', ['post' => $post->id, 'comment' => $comment->id]) }}">編集する</a>
                                <a href="{{ route('comments.delete', ['post' => $post->id, 'comment' => $comment->id]) }}">削除する</a>
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>      
@endsection