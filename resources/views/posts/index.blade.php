@extends('layout')

@section('content')
    <main>
        <div class="container">
            <nav class="panel panel-default">
                <div class="panel-heading">投稿一覧</div>
                <div class="panel-body">
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
            </nav>
        </div>
    </main>
@endsection