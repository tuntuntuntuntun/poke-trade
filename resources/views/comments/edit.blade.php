@extends('layout')

@section('content')
    <main>
        <div class="container">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('comments.edit', ['comment' => $comment->id, 'post' => $post->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="content">コメント</label>
                    <textarea name="content" id="content" cols="20" rows="5" class="form-control">{{ $comment->content }}</textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn">変更する</button>
                </div>
            </form>
        </div>
    </main>
@endsection