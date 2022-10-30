<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Doc</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{ route('main.index') }}">Main</a>
                    <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
                    <a class="nav-link" href="{{ route('about.index') }}">About</a>
                    <a class="nav-link" href="{{ route('contact.index') }}">Contacts</a>
                </div>
            </div>
        </div>
    </nav>
</div>
<div class="container">
    @yield('content')
</div>
</body>
</html>
