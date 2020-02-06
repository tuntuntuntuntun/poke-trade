@extends('layout')

@section('content')
    <main>
        <div class="container">
            <div class="card">
                <div class="card-body row">
                    <p class="card-text">{{ $comment->content }}</p>
                </div>
            </div>
            <div class="text-right mt-3">
                <form action="{{ route('comments.delete', ['post' => $post->id, 'comment' => $comment->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">削除する</button>
                </form>
            </div>
        </div>
    </main>
@endsection