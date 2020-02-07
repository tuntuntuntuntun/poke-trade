@extends('layout')

@section('content')
    <main>
        <div class="container">
            <p>{{ Auth::user()->name }}さんのマイページ</p>
            @foreach($posts as $post)
                <a href="{{ route('posts.detail', ['post' => $post->id]) }}">
                    <div class="mb-4 card">
                        @include('share.post')      
                        @include('share.auth')      
                    </div>
                </a>
            @endforeach
            </div>
        </div>
    </main>
@endsection