<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$pageTitle ?? ''}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/all.min.css" />
    <link rel="stylesheet" href="/css/bootstrap.rtl.min.css">
    <!-- <link rel="stylesheet" href="/css/tamim.css" /> -->
    <link rel="stylesheet" href="/css/alamindash.css" />
</head>
<body>
    <div class="page-container">
        <header class="page-header">
            <nav class="header-navbar navbar">
                <div class="container-fluid">
                    <button class="toggle"><i class="fa-sharp fa-solid fa-bars fa-fw"></i></button>
                    <a class="brand" href="{{route('home')}}">
                        <img src="{{url('imgs/alamin.png')}}" alt="logo">
                    </a>
                    <div class="tm-collapse">
                        <div class="d-flex align-items-center me-2 p-2">
                            <span class="me-2">
                                {{Auth::user()?->first_name .' '. Auth::user()?->last_name}}
                            </span>
                            <a class="btn btn-light hover" href="{{route('auth.logout')}}" title="تسجيل الخروج">
                                <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i>
                            </a>
                        </div>
                        <ul class="navbar-nav tm-nav">
                            <!-- <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="avatar" src="{{url('imgs/avatar.png')}}" alt="">
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="dropdown-item">action</a></li>
                                    <li><a href="#" class="dropdown-item">anther action</a></li>
                                    <li><a href="#" class="dropdown-item">anther action 3</a></li>
                                </ul> -->
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page-layout">
            <aside class="sidebar">
                <nav class="sidebar-nav">
                    <div class="main-nav">
                        <ul>
                            <li>
                                <a class="" href="{{route('dashboard')}}">
                                    <i class="fa-solid fa-chart-bar fa-fw"></i>
                                    <span>اللوحة</span>
                                </a>
                            </li>
                            <li>
                                <a href="#company-collapse" onclick="collapse(this.getAttributeNode('aria-controls').value)" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="company-collapse">
                                <i class="fa-solid fa-building fs-fw"></i>
                                    <span>هيكل الشركة</span>
                                </a>
                                <ul id="company-collapse" class="collapse ms-4">
                                    @can('viewAny', '\App\Models\Department')
                                    <li>
                                        <a class="" href="{{route('departments.index')}}">
                                        <i class="fa-solid fa-minimize fa-fw"></i>
                                            <span>أقسام الشركة</span>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('viewAny', '\App\Models\Employee')
                                    <li>
                                        <a class="" href="{{route('employees.index')}}">
                                        <i class="fa-solid fa-user-tie fa-fw"></i>
                                            <span>الموظفين</span>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('viewAny', '\App\Models\Task')
                                    <li>
                                        <a class="" href="{{route('tasks.index')}}">
                                        <i class="fa-solid fa-list-check fa-fw"></i>
                                            <span>مهام الموظفين</span>
                                        </a>
                                    </li>
                                    @endcan
                                </ul>
                            </li>
                            @can('viewAny', '\App\Models\Customer')
                            <li>
                                <a class="" href="{{route('customers.index')}}">
                                    <i class="fa-solid fa-users fa-fw"></i>
                                    <span>العملاء</span>
                                </a>
                            </li>
                            @endcan
                            <li>
                                <a href="#machines-collapse" onclick="collapse(this.getAttributeNode('aria-controls').value)" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="machines-collapse">
                                    <i class="fa-solid fa-gears fa-fw"></i>
                                    <span>المنتجات</span>
                                </a>
                                <ul class="collapse ms-4" id="machines-collapse">
                                    @can('viewAny', '\App\Models\Product')
                                    <li><a href="{{route('products.index')}}">المنتجات</a></li>
                                    @endcan
                                    @can('viewAny', 'App\Models\Category')
                                    <li><a href="{{route('categories.index')}}">فئات المنتجات</a></li>
                                    @endcan
                                    @can('viewAny', 'App\Models\ProductModel')
                                    <li><a href="{{route('models.index')}}">طرازات المنتجات</a></li>
                                    @endcan
                                    @can('viewAny', 'App\Models\Brand')
                                    <li><a href="{{route('brands.index')}}">العلامات التجارية</a></li>
                                    @endcan
                                </ul>
                            </li>
                            @can('viewAny', '\App\Models\Fixation')
                            <li>
                                <a class="" href="{{route('dashboard')}}">
                                    <i class="fa-solid fa-screwdriver-wrench fa-fw"></i>
                                    <span>الصيانات</span>
                                </a>
                            </li>
                            @endcan
                            @can('viewAny', '\App\Models\Indexation')
                            <li>
                                <a class="" href="{{route('dashboard')}}">
                                    <i class="fa-solid fa-file-lines fa-fw"></i>
                                    <span>المقايسات</span>
                                </a>
                            </li>
                            @endcan
                            @can('viewAny', '\App\Models\Report')
                            <li>
                                <a class="" href="{{route('dashboard')}}">
                                    <i class="fa-solid fa-file-signature fa-fw"></i>
                                    <span>التقارير</span>
                                </a>
                            </li>
                            @endcan
                            @can('viewAny', '\App\Models\Transport')
                            <li>
                                <a class="" href="{{route('dashboard')}}">
                                    <i class="fa-solid fa-van-shuttle fa-fw"></i>
                                    <span>الإنتقالات</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                    <div class="admin-nav border-top">
                        <ul>
                            @can('viewAny', '\App\Models\User')
                            <li>
                                <a class="" href="{{route('settings')}}">
                                    <i class="fa-solid fa-gear fa-fw"></i>
                                    <span>الإعدادات</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </nav>
            </aside>
            <div class="page-content">
                <div id="content-wrapper">
                    <main class="mb-5">
                        <div class="page-title row align-items-center mb-5 p-4 bg-body-secondary mx-0 shadow-sm">
                            <div class="page-title-heading col-sm-8 px-0">
                            <div class="page-title-head mb-3">
                                <h2 class="fs-3">{{$pageTitle ?? ''}}</h2>
                            </div>
                            <div class="page-title-subheading opacity-75">
                                <nav class="page-title-nav nav">
                                    <ol class="mb-0 d-flex flex-column flex-md-row">
                                        <li><a class="link-body-emphasis" href="{{route('dashboard')}}"><i class="fa-solid fa-house fa-fw"></i></a></li>
                                        @isset($navElements)
                                            @foreach ($navElements as $element => $link)
                                            @if ($loop->last)
                                            <li>{{$element}}</li>
                                            @break
                                            @endif
                                            <li><a class="link-body-emphasis" href="{{$link}}">{{$element}}</a></li>
                                            @endforeach
                                        @endisset
                                    </ol>
                                </nav>
                            </div>
                            </div>
                            <div class="page-title-actions col-sm-4">
                            
                            </div>
                        </div>
                        <div class="container">
                            <x-alerts.message :type="session('messageType') ?? null" :message="session('message') ?? null" />
                            @yield('content')
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <div class="page-overlay d-none"></div>
    <!-- Scripts -->
    <script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/tamim.js"></script>
</body>
</html>