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
            <form action="{{ route('posts.create') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">タイトル</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="want">欲しいポケモン</label>
                    <input type="text" id="want" name="want" class="form-control" value="{{ old('want') }}">
                </div>
                <div class="form-group">
                    <label for="give">譲るポケモン</label>
                    <input type="text" id="give" name="give" class="form-control" value="{{ old('give') }}">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn">投稿する</button>
                </div>
            </form>
        </div>
    </main>
@endsection