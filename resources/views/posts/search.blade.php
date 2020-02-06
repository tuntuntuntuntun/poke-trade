@extends('layout')

@section('content')
    <main>
        <div class="container">
            <form method="get" action="{{ route('posts.index') }}">
                <div class="form-group">
                    <label for="want">欲しいポケモン</label>
                    <input type="text" name="want" class="form-control">
                </div>
                <div class="form-group">
                    <label for="give">譲るポケモン</label>
                    <input type="text" name="give" class="form-control">
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">検索</button>
                </div>
            </form>
        </div>
    </main>
@endsection