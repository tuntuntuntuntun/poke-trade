@extends('layout')

@section('content')
    <main>
        <div class="container">
            <div class="mt-3 card">
                <div class="card-body">
                    <p style="font-size:0.8rem">投稿者: {{ $post->user->name }}</p>
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <div class="d-flex justify-content-left">
                        <p class="mr-4">欲しいポケモン: {{ $post->want }}</p>
                        <p>譲るポケモン: {{ $post->give }}</p>
                    </div>
                    <p style="font-size:0.8rem">{{ $post->created_at->format('Y年n月j日 H時i分') }}</p>
                </div>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn">削除する</button>
            </div>
        </div>
    </main>
@endsection