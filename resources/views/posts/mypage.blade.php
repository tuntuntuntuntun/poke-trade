@extends('layout')

@section('content')
    <main>
        <div class="container">
            <p>{{ Auth::user()->name }}さんのマイページ</p>
            <h2 class="card-title">投稿の一覧</h2>
            <div class="list-group">
                @foreach($posts as $post)
                    <div class="list-group-item mt-3">
                        <p><a href="{{ route('posts.detail', ['post' => $post]) }}">この投稿を見る</a></p>
                        <p>{{ $post->created_at->format('Y年n月j日 H時i分') }}</p>
                        <p>投稿者: {{ $post->user->name }}</p>
                        <ul>
                            <li>欲しいポケモン: {{ $post->want }}</li>
                            <li>譲るポケモン: {{ $post->give }}</li>
                        </ul>
                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}">編集する</a>
                        <a href="{{ route('posts.delete', ['post' => $post->id]) }}">削除する</a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection