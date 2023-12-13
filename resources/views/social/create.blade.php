@extends('layouts.app')

@section('content')
    <div class="create">
        <h1>Create a Post</h1>
        <form action="{{ route('social.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div>
                <label for="image"> Upload the image: </label>
                <input type="file" id="image" name="image" required>
            </div>
            <div>
                <label for="description">Description: </label>
                <br>
                <textarea name="description" id="description" cols="75" rows="10"></textarea>
            </div>

            <input type="submit" value="Post" class="post-bt">
        </form>
    </div>
@endsection