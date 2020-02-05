@extends('layout')

@section('content')
    <main>
        <div class="container">
            <h2 class="card-title">投稿の一覧</h2>

            <!-- 検索したときのみ表示 -->
            @if(!(is_null(Request::get('want')) && is_null(Request::get('give'))))
                <p>検索件数: {{ $posts->total() }}件</p>
                
                @if($posts->total() === 0)
                    <a href="{{ route('posts.index') }}">トップページに戻る</a>
                @endif
            @endif

            <div class="list-group">
                @foreach($posts as $post)
                    <div class="list-group-item mt-3">
                        投稿者: {{ $post->user->name }}
                        <ul>
                            <li>欲しいポケモン: {{ $post->want }}</li>
                            <li>譲るポケモン: {{ $post->give }}</li>
                        </ul>

                        @if(Auth::check())
                            @if(Auth::user()->id === $post->user_id)
                                <a href="{{ route('posts.edit', ['post' => $post->id]) }}">編集する</a>
                                <a href="{{ route('posts.delete', ['post' => $post->id]) }}">削除する</a>
                            @endif
                        @endif
                    </div>      
                @endforeach
                <p>{{ $posts->appends(['want' => Request::get('want'), 'give' => Request::get('give')])->links() }}</p>
            </div>
        </div>
    </main>
@endsection