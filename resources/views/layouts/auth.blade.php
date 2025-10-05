<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$pageTitle}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/all.min.css" />
    <link rel="stylesheet" href="/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="/css/auth-style.css" />
</head>
<body>
    <div class="wrapper d-flex flex-column align-items-center justify-content-center">
        <div class="logo">
            <a href="{{route('home')}}">
                <img src="/imgs/alamin.png" alt="">
            </a>
        </div>
        @yield('content')
    </div>
</body>
</html>