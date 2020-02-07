@extends('layout')

@section('content')
    <main>
        <div class="container">
            <p>{{ Auth::user()->name }}さんのマイページ</p>
            @foreach($posts as $post)
                @include('share.post')         
            @endforeach
            </div>
        </div>
    </main>
@endsection