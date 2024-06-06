<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My Blog')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">My Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @foreach($menus as $menu)
                    <li class="nav-item">
                        @if($menu->link_type == 'custom')
                            <a class="nav-link" href="{{ $menu->link }}">{{ $menu->name }}</a>
                        @elseif($menu->link_type == 'post')
                            <a class="nav-link" href="{{ route('post.show', $menu->link_id) }}">{{ $menu->name }}</a>
                        @elseif($menu->link_type == 'category')
                            <a class="nav-link" href="{{ route('category.show', $menu->link_id) }}">{{ $menu->name }}</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-dark text-white mt-5">
        <p>&copy; 2024 My Blog. All rights reserved.</p>
    </footer>
</body>
</html>
