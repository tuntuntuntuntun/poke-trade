@extends('layout')

@section('content')
    <main>
        <div class="container">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('posts.edit', ['post' => $post->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">タイトル</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') ?? $post->title }}">
                </div>
                <div class="form-group">
                    <label for="want">欲しいポケモン</label>
                    <input type="text" id="want" name="want" class="form-control" value="{{ old('want') ?? $post->want }}">
                </div>
                <div class="form-group">
                    <label for="give">譲るポケモン</label>
                    <input type="text" id="give" name="give" class="form-control" value="{{ old('give') ?? $post->give }}">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn">変更する</button>
                </div>
            </form>
        </div>
    </main>
@endsection