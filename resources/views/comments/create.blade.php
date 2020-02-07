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
            <form action="{{ route('comments.create', ['post' => $post->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="content">コメント</label>
                    <textarea name="content" id="content" cols="20" rows="5" class="form-control">{{ old('content') }}</textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn">投稿する</button>
                </div>

                <input type="hidden" name="post_id" value="{{ $post->id }}">
            </form>
        </div>
    </main>
@endsection