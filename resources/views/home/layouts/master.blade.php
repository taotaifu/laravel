<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/libs/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/css/theme.min.css">
    <link rel="stylesheet" href="{{asset ('org/swiper-4.4.2')}}/dist/css/swiper.min.css">
     @stack('css')
    <title>{{hd_config('base.title')}}</title>
    {{--js--}}
    <script src="{{asset ('org/swiper-4.4.2')}}/dist/js/swiper.min.js"></script>
</head>
<body>
<!-- TOPNAV
================================================== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">

        <!-- Toggler -->
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Form -->
        <form class="form-inline mr-4 d-none d-lg-flex" action="{{route('home.search')}}">
            <div class="input-group input-group-rounded input-group-merge" data-toggle="lists" data-lists-values='["name"]'>

                <!-- Input -->
                <input type="text" name="wd" class="form-control form-control-prepended  dropdown-toggle search" data-toggle="dropdown" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fe fe-search"></i>
                    </div>
                </div>


            </div>
        </form>
        <!-- User -->
        <div class="navbar-user">
            @auth()
            <!-- Dropdown -->
            <div class="dropdown mr-4 d-none d-lg-flex">

                <!-- Toggle -->
                <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="icon  @if(auth ()->user()->unreadNotifications()->count()!=0)  active @endif">
                <i class="fe fe-bell"></i>
              </span>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                    <div class="card-header">

                        <div class="row align-items-center">

                            <div class="col">

                                <!-- Title -->
                                <h5 class="card-header-title">
                                    消息({{auth()->user()->unreadNotifications()->count()}})
                                </h5>

                            </div>
                            <div class="col-auto">

                                <!-- Link -->
                                <a href="{{route ('member.notify',auth ()->user ())}}" class="small">
                                    所有消息
                                </a>

                            </div>
                        </div> <!-- / .row -->

                    </div> <!-- / .card-header -->
                    <div class="card-body">

                        <!-- List group -->
                        <div class="list-group list-group-flush my--3">
                           @if(auth ()->user ()->unreadNotifications()->count()!=0)
                            @foreach(auth ()->user ()->unreadNotifications()->limit(5)->get() as  $notification)
                            <a class="list-group-item px-0" href="{{route('member.notify.show',$notification)}}">

                                <div class="row">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar avatar-sm">
                                            <img src="{{$notification['data']['user_icon']}}" alt="..." class="avatar-img rounded-circle">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Content -->
                                        <div class="small text-muted">
                                            <strong class="text-body">{{$notification['data']['user_name']}}</strong> 评论了
                                            <strong class="text-body">{{$notification['data']['article_title']}}</strong>
                                        </div>

                                    </div>
                                    <div class="col-auto">

                                        <small class="text-muted">
                                            {{$notification->created_at->diffForHumans()}}
                                        </small>

                                    </div>
                                </div> <!-- / .row -->

                            </a>
                            @endforeach
                            @else
                                <p class="text-muted text-center">暂无消息</p>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
            @endauth
            {{--文章添加--}}
            <div class="dropdown mr-4 d-none d-lg-flex">
                 {{--矢量图--}}
                <a href="{{route('home.article.create')}}" class="text-muted" >
                  <span class="icon ">
                    <i class="fe fe-edit-3"></i>
                  </span>
                </a>
            </div>
        {{--文章添加--}}
        <!-- 用户头像 Dropdown -->
            <div class="dropdown">
            @auth()
                <!-- Toggle -->
                    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{auth ()->user ()->icon}}" alt="..." class="avatar-img rounded-circle">
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route ('member.user.show',auth ()->user ())}}" class="dropdown-item">{{auth()->user()->name}}</a>
                        @can('view',auth()->user())
                            <a href="{{route('admin.management')}}" class="dropdown-item">后台管理</a>
                        @endcan
                        <hr class="dropdown-divider">
                        <a href="{{route('logout')}}" class="dropdown-item">注销登录</a>
                    </div>
                @else
                    <a href="{{route('login',['from'=>url()->full()])}}" class="btn btn-white btn-sm">登录</a>
                    <a href="{{route('register')}}" class="btn btn-white btn-sm">注册</a>
                @endauth
            </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse mr-auto order-lg-first" id="navbar">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <input type="search" class="form-control form-control-rounded" placeholder="Search" aria-label="Search">
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        首页
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#!" id="topnavPages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        文章管理
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="topnavPages">
                        <li>
                            <a class="dropdown-item" href="orders.html">
                                阅读
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('home.article.index')}}">文章列表</a>
                </li>
            </ul>

        </div>

    </div>
</nav>

<div class="main-content">

    @yield('content')

</div>

@include('layouts.hdjs')
@include('layouts.message')
<script>
    require(['bootstrap'])
    require(['swiper'])
</script>
@stack('js')
</body>
</html>