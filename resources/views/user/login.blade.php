
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/libs/flatpickr/dist/flatpickr.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/assets')}}/css/theme.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>登录</title>
</head>
<body class="d-flex align-items-center bg-white border-top-2 border-primary">

<!-- CONTENT
================================================== -->
<div class="container-fluid">
    <div class="row align-items-center justify-content-center">
        <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5">

            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
                登录
            </h1>

            <!-- Subheading -->
            <p class="text-muted text-center mb-5">
                登录帐号社区参与交流与学习
            </p>

            <!-- Form -->
            <form method="post" action="{{route('login')}}">
                @csrf
                <div class="form-group">
                    <!-- Label -->
                    <label>
                        邮箱
                    </label>
                    <!-- Input -->
                    <input type="email" value="729589198@qq.com" name="email" class="form-control" placeholder="请输入邮箱">
                </div>
                <div class="form-group">
                    <!-- Label -->
                    <label>
                        密码
                    </label>
                    <!-- Input -->
                    <input type="password" name="password" class="form-control" placeholder="请输入密码">
                </div>
                <div class="form-check mb-3" >
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" value="1">
                    <label class="form-check-label" for="remember">记住我</label>
                </div>

                <!-- Submit -->
                <button class="btn btn-lg btn-block btn-primary mb-3">
                    登录
                </button>

                <!-- Link -->
                <div class="text-center">
                    <small class="text-muted text-center">
                        还没账号 ? <a href="{{route('register')}}">注册</a>
                        <a href="{{route('password_reset')}}">重置密码</a>
                        <a href="{{route('home')}}">返回首页</a>
                    </small>
                </div>

            </form>

        </div>
        <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">

            <!-- Image -->
            <div class="bg-cover vh-100 mt--1 mr--3" style="background-image: url({{asset('org/Dashkit-1.1.2/assets')}}/img/covers/auth-side-cover.jpg);"></div>

        </div>
    </div> <!-- / .row -->
</div>
@include('layouts.hdjs')
@include('layouts.message')
<script>
    require(['hdjs','bootstrap'], function (hdjs) {
        let option = {
            //按钮
            el: '#bt',
            //后台链接
            url: '{{route('code.send')}}',
            //验证码等待发送时间
            timeout: 10,
            //表单，手机号或邮箱的INPUT表单
            input: '[name="email"]'
        };
        hdjs.validCode(option);
    })
</script>
</body>
</html>