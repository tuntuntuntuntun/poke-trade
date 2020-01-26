@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body row">
                <ul class="col-7">
                    <li>欲しいポケモン: {{ $post->want }}</li>
                    <li>譲るポケモン: {{ $post->give }}</li>
                </ul>
                <div class="col-3 text-right">
                    <form action="{{ route('posts.delete', ['post_id' => $post->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">削除する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection