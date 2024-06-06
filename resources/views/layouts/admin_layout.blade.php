<!DOCTYPE html>
<html>

<head>
    <title>Admin <title>@yield('title')</title>
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                @yield('title') Management
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-info btn-sm mr-2" href="{{ route('admin.dashboard') }}">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-info btn-sm mr-2" href="{{ route('menus.index') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('admin.logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" style="display:inline; cursor:pointer;">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        @yield('content')

    </div>
</body>

</html>
