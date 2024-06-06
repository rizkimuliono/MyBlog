@extends('layouts.app')

@section('title', 'My Blog')

@section('content')
    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="card post-card">
                    <img src="https://via.placeholder.com/750x300" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 150, $end='...') }}</p>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted in <a href="{{ route('category.show', $post->category->id) }}">{{ $post->category->name }}</a> on {{ $post->created_at->format('d M Y') }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="sidebar">
                <h4>Categories</h4>
                <ul class="list-group">
                    @foreach($categories as $category)
                        <li class="list-group-item"><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
