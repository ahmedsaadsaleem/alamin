<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>{{$pageTitle}}</title>
      <link rel="stylesheet" href="/css/normalize.css">
      <link rel="stylesheet" href="/css/all.min.css">
      <link rel="stylesheet" href="/css/bootstrap.rtl.min.css">
      <link rel="stylesheet" href="/css/alamin.css">
   </head>
   <body>
      <div class="page-container">
         <header class="page-header">
            <div class="container">
            <div class="logo">
               <a href=""><img src="/imgs/alamin.png" alt="alamin"></a>
            </div>
            <nav class="header-nav nav align-items-center flex-grow-1">
               <div class="">
                  <ul class="nav-menu mb-0">
                  <li><a class="nav-link" href="{{route('home')}}">Home</a></li>
                  <li><a class="nav-link" href="{{route('home')}}">Services</a></li>
                  <li><a class="nav-link" href="{{route('home')}}">About</a></li>
                  <li><a class="nav-link" href="{{route('home')}}">Solutions</a></li>
                  <li><a class="nav-link" href="{{route('home')}}">Contact</a></li>
                  <li><a class="nav-link" href="{{route('dashboard')}}">Dashboard</a></li>
                  </ul>
               </div>
               <div class="control d-flex me-auto">
                  @guest
                  <ul class="mb-0">
                  <li><a class="nav-link" href="{{route('auth.login')}}">Log In</a></li>
                  <li><a class="nav-link" href="{{route('auth.register')}}">Register</a></li>
                  </ul>
                  @endguest
                  @auth
                  {{Auth::user()->first_name}}
                  <ul class="mb-0">
                  <li><a class="" href="{{route('auth.logout')}}" title="Logout">
                     <i class="fa-solid fa-right-from-bracket"></i>
                  </a></li>
                  </ul>
                  @endauth
               </div>
            </nav>
            </div>
         </header>
         <div class="page-content">
            @yield('content')
         </div>
         <footer class="page-footer">
            <div class="container">
            footer
            </div> 
         </footer>
      </div>
      <script type="text/javascript" src="/js/tamim.js"></script>
   </body>
</html>