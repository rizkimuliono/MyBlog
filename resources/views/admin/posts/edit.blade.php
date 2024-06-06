
@extends('layouts.admin_layout')

@section('title', 'Edit Post')

@section('content')

        <h1>Edit Post</h1>
        <form method="POST" action="{{ route('posts.update', $post->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
                <label>Content:</label>
                <textarea name="content" class="form-control" required>{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <label>Category:</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    @endsection
