@extends('layouts.admin_layout')

@section('title', 'Creete Post')

@section('content')

        <h1>Create Post</h1>
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Content:</label>
                <textarea name="content" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Category:</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    @endsection
