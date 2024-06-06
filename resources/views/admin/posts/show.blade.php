@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card post-card">
                <img src="https://via.placeholder.com/750x300" class="card-img-top" alt="...">
                <div class="card-body">
                    <h1 class="card-title">{{ $post->title }}</h1>
                    <p class="card-text">{{ $post->content }}</p>
                </div>
                <div class="card-footer text-muted">
                    Posted in <a href="{{ route('category.show', $post->category->id) }}">{{ $post->category->name }}</a> on {{ $post->created_at->format('d M Y') }}
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="sidebar">
                <h4>Post Categories</h4>
                <ul class="list-group">
                    @foreach($categories as $category)
                        <li class="list-group-item"><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
