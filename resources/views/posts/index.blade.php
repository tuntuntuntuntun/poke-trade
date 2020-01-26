@extends('layout')

@section('content')
    <main>
        <div class="container">
            <h2 class="card-title">投稿の一覧</h2>
            <div class="list-group">
                @foreach($posts as $post)
                    <div class="list-group-item">
                        <ul>
                            <li>欲しいポケモン: {{ $post->want }}</li>
                            <li>譲るポケモン: {{ $post->give }}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection