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
                    <label for="want">欲しいポケモン</label>
                    <input type="text" id="want" name="want" class="form-control" value="{{ old('want') }}">
                </div>
                <div class="form-group">
                    <label for="give">譲るポケモン</label>
                    <input type="text" id="give" name="give" class="form-control" value="{{ old('give') }}">
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">投稿する</button>
                </div>
            </form>
        </div>
    </main>
@endsection