@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">ログイン</h2>
                @if($errors->any())
                    <div class="alert alert-anger">
                        @foreach($errors->all() as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn">送信</button>
                </div>
                </form>
            </div>
        </div>
        <div class="mt-3 text-center">
            <a href="{{ route('password.request') }}" style="color:black">パスワードの変更はこちらから</a>
        </div>
    </div>
@endsection