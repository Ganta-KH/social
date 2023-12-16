@extends('layouts.app')

@section('content')

    <form action="{{ route('social.create') }}" method="get">
        <input type="submit" value="  +  " class="add-post">
    </form>

    <div class="home">
        @foreach ($posts as $post)
            <div class="card shadow-sm">
                <form action="{{ route('social.show', $post) }}" method="get">
                    <input type="image" src="{{ asset($post->image) }}">
                </form>

                <div class="func">
                    <div class="func-1">
                        <a href=""><svg class="like" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>thumb-up-outline</title><path d="M5,9V21H1V9H5M9,21A2,2 0 0,1 7,19V9C7,8.45 7.22,7.95 7.59,7.59L14.17,1L15.23,2.06C15.5,2.33 15.67,2.7 15.67,3.11L15.64,3.43L14.69,8H21C22.11,8 23,8.9 23,10V12C23,12.26 22.95,12.5 22.86,12.73L19.84,19.78C19.54,20.5 18.83,21 18,21H9M9,19H18.03L21,12V10H12.21L13.34,4.68L9,9.03V19Z"/></svg></a>
                        <form action="{{ route('social.show', $post->id) }}" method="get">
                            <input type="image" src="/images/icons/comment.svg">
                        </form>
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

                {{-- <div class="func">
                    <div class="func-1">
                        <a href=""><svg class="like" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>thumb-up-outline</title><path d="M5,9V21H1V9H5M9,21A2,2 0 0,1 7,19V9C7,8.45 7.22,7.95 7.59,7.59L14.17,1L15.23,2.06C15.5,2.33 15.67,2.7 15.67,3.11L15.64,3.43L14.69,8H21C22.11,8 23,8.9 23,10V12C23,12.26 22.95,12.5 22.86,12.73L19.84,19.78C19.54,20.5 18.83,21 18,21H9M9,19H18.03L21,12V10H12.21L13.34,4.68L9,9.03V19Z"/></svg></a>
                        <a href=""><svg class="comment" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>comment-outline</title><path d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9M10,16V19.08L13.08,16H20V4H4V16H10Z" /></svg></a>
                    </div>
                    <div class="func-2">
                        <a href=""><svg class="edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>image-edit-outline</title><path d="M22.7 14.3L21.7 15.3L19.7 13.3L20.7 12.3C20.8 12.2 20.9 12.1 21.1 12.1C21.2 12.1 21.4 12.2 21.5 12.3L22.8 13.6C22.9 13.8 22.9 14.1 22.7 14.3M13 19.9V22H15.1L21.2 15.9L19.2 13.9L13 19.9M11.21 15.83L9.25 13.47L6.5 17H13.12L15.66 14.55L13.96 12.29L11.21 15.83M11 19.9V19.05L11.05 19H5V5H19V11.31L21 9.38V5C21 3.9 20.11 3 19 3H5C3.9 3 3 3.9 3 5V19C3 20.11 3.9 21 5 21H11V19.9Z" /></svg></a>
                        <a href=""><svg class="delete" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>delete-outline</title><path d="M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19M8,9H16V19H8V9M15.5,4L14.5,3H9.5L8.5,4H5V6H19V4H15.5Z" /></svg></a>
                    </div>
                </div> --}}
            </div>
        @endforeach
        
        {{-- @foreach ($posts as $post)
            <h1>hi</h1>
            <img src="{{ asset($post->image) }}" alt="img">
        @endforeach --}}
    </div>
@endsection
