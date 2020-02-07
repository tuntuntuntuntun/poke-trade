@extends('layout')

@section('styles')
    <style>
        /* ページネーションのスタイル */
        main nav a, nav span {
            color: black!important;
        }
        main nav .active span {
            border-color: rgba(0, 0, 0, 0.2)!important;
            background-color: rgba(0, 0, 0, 0.2)!important;
        }
    </style>
@endsection

@section('content')
    <main>
        <div class="container">
            <!-- 検索したときのみ表示 -->
            @if(!(is_null(Request::get('want')) && is_null(Request::get('give'))))
                <p>検索件数: {{ $posts->total() }}件</p>
                
                @if($posts->total() === 0)
                    <a href="{{ route('posts.index') }}">トップページに戻る</a>
                @endif
            @endif

            @foreach($posts as $post)
                <div class="mb-4 card">
                    <a href="{{ route('posts.detail', ['post' => $post->id]) }}">
                        @include('share.post')
                        @include('share.auth')
                    </a>
                </div>
            @endforeach
            <p>{{ $posts->appends(['want' => Request::get('want'), 'give' => Request::get('give')])->links() }}</p>
        </div>
    </main>
@endsection