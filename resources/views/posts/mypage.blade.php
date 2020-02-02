@extends('layout')

@section('content')
    <main>
        <div class="container">
            <p>{{ Auth::user()->name }}さんのマイページ</p>
            <h2 class="card-title">投稿の一覧</h2>
            <div class="list-group">
                @foreach($posts as $post)
                    <div class="list-group-item mt-3">
                        <ul>
                            <li>欲しいポケモン: {{ $post->want }}</li>
                            <li>譲るポケモン: {{ $post->give }}</li>
                        </ul>
                        <a href="{{ route('posts.edit', ['post_id' => $post->id]) }}">編集する</a>
                        <a href="{{ route('posts.delete', ['post_id' => $post->id]) }}">削除する</a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection