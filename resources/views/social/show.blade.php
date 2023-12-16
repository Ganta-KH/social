@extends('layouts.app')

@section('content')
    <div class="show">

        <div class="post">
            <img src="{{ asset($post->image) }}">

            <div class="func">
                <div class="func-1">
                    <a href=""><svg class="like" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>thumb-up-outline</title><path d="M5,9V21H1V9H5M9,21A2,2 0 0,1 7,19V9C7,8.45 7.22,7.95 7.59,7.59L14.17,1L15.23,2.06C15.5,2.33 15.67,2.7 15.67,3.11L15.64,3.43L14.69,8H21C22.11,8 23,8.9 23,10V12C23,12.26 22.95,12.5 22.86,12.73L19.84,19.78C19.54,20.5 18.83,21 18,21H9M9,19H18.03L21,12V10H12.21L13.34,4.68L9,9.03V19Z"/></svg></a>
                </div>
                <div class="func-2">
                    <form action="{{ route('social.edit', $post->id) }}" method="get" enctype="multipart/form-data">
                        <input type="image" src="/images/icons/edit.svg">
                    </form>
                    <form action="{{ route('social.delete', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="image" src="/images/icons/delete.svg">
                    </form>
                </div>
            </div>
            <hr>
            <div class="description">
                <h3><strong>Description:</strong></h3>
                <p>{{ $post->description }}</p>
            </div>
            <hr>
        </div>
        
        <form action="{{ route('comment.store', $post->id) }}" method="post">
            @csrf
            @method('post')
            <Label for="comment">Add a Comment:</Label>
            <textarea name="comment" id="comment" cols="100" rows="5" required></textarea>
            <input type="submit" value="Add" class="cmnt-bt">
        </form>

        <hr>

        <h1><strong>Comments</strong></h1>
        

        <div class="comments">
            @foreach ($comments as $comment)
                <div class="cmnt">
                    <h4><strong>{{ $comment->username }}</strong></h4>
                    <p>{{ $comment->comment }}</p>
                </div>
            @endforeach
        </div>
        
    </div>    
@endsection