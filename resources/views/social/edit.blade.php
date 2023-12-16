@extends('layouts.app')

@section('content')
    <div class="create">
        <h1>Edit your Post</h1>
        <form action="{{ route('social.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div>
                <label for="image"> Upload the image: </label>
                <input type="file" id="image" name="image">
            </div>
            <div>
                <label for="description">Description: </label>
                <br>
                <textarea name="description" id="description" cols="75" rows="10" value="{{ $post->description }}"></textarea>
            </div>

            <input type="submit" value="Save" class="edit-bt">
        </form>
    </div>
@endsection