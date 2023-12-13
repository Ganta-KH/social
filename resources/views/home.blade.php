@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('social.create') }}" method="get">
            <input type="submit" value="  +  " class="add-post">
        </form>

        @foreach ($posts as $post)
            <h1>hi</h1>
            <img src="{{ asset($post->image) }}" alt="img">
        @endforeach
    </div>
@endsection
