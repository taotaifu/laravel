@extends('home.layouts.master')
@section('content')
   @push('css')
       <style>
           html, body {
               position: relative;
               height: 100%;

           }
           body {
               background: #eee;
               font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
               font-size: 14px;
               color:#000;
               margin: 0;
               padding: 0;
           }
           .swiper-container {
               width: 800px;
               height:400px;
               margin-left: auto;
               margin-right: auto;
           }
           .swiper-slide {
               text-align: center;
               font-size: 18px;
               background: #fff;

               /* Center slide text vertically */
               display: -webkit-box;
               display: -ms-flexbox;
               display: -webkit-flex;
               display: flex;
               -webkit-box-pack: center;
               -ms-flex-pack: center;
               -webkit-justify-content: center;
               justify-content: center;
               -webkit-box-align: center;
               -ms-flex-align: center;
               -webkit-align-items: center;
               align-items: center;
           }
       </style>
       @endpush
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-xl-8">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">

                        <!-- Header -->
                        <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="#!" class="avatar">
                                        <img src="{{asset ('org/images/11.jpg')}}" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="card-title mb-1">
                                        Dianna Smiley
                                    </h4>

                                    <!-- Time -->
                                    <p class="card-text small text-muted">
                                        <span class="fe fe-clock"></span> <time datetime="2018-05-24">4hr ago</time>
                                    </p>

                                </div>
                            </div> <!-- / .row -->
                        </div>

                        <!-- Text -->
                        <p class="mb-3">
                            I've been working on shipping the latest version of Launchday. The story I'm trying to focus on is something like "You're launching soon and need to be 100% focused on your product. Don't lose precious days designing, coding, and testing a product site. Instead, build one in minutes."
                        </p>

                        <p class="mb-4">
                            What do you y'all think? Would love some feedback from <a href="#!" class="badge badge-soft-primary">@Ab</a> or <a href="#!" class="badge badge-soft-primary">@Adolfo</a>?
                        </p>

                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($figures as $figure)
                                <div class="swiper-slide"><img src="{{$figure->icon}}"></div>
                                    @endforeach
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <hr>
                        <!-- 评论 -->
                        <div class="comment mb-3">
                            <div class="row">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a class="avatar" href="profile-posts.html">
                                        <img src="{{asset ('org/images/12.jpg')}}" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Body -->
                                    <div class="comment-body">

                                        <div class="row">
                                            <div class="col">

                                                <!-- Title -->
                                                <h5 class="comment-title">
                                                    Ab Hadley
                                                </h5>

                                            </div>
                                            <div class="col-auto">

                                                <!-- Time -->
                                                <time class="comment-time">
                                                    11:12
                                                </time>

                                            </div>
                                        </div> <!-- / .row -->

                                        <!-- Text -->
                                        <p class="comment-text">
                                            Looking good Dianna! I like the image grid on the left, but it feels like a lot to process and doesn't really <em>show</em> me what the product does? I think using a short looping video or something similar demo'ing the product might be better?
                                        </p>

                                    </div>

                                </div>
                            </div> <!-- / .row -->
                        </div>

                        <div class="comment mb-3">
                            <div class="row">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a class="avatar" href="profile-posts.html">
                                        <img src="{{asset ('org/images/13.jpg')}}" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Body -->
                                    <div class="comment-body">

                                        <div class="row">
                                            <div class="col">

                                                <!-- Title -->
                                                <h5 class="comment-title">
                                                    Adolfo Hess
                                                </h5>

                                            </div>
                                            <div class="col-auto">

                                                <!-- Time -->
                                                <time class="comment-time">
                                                    11:12
                                                </time>

                                            </div>
                                        </div> <!-- / .row -->

                                        <!-- Text -->
                                        <p class="comment-text">
                                            Any chance you're going to link the grid up to a public gallery of sites built with Launchday?
                                        </p>

                                    </div>

                                </div>
                            </div> <!-- / .row -->
                        </div>

                        <!-- Divider -->
                        <hr>

                        <!-- Form -->
                        <div class="row align-items-start">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar">
                                    <img src="{{asset ('org/images/13.jpg')}}" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Input -->
                                <form>
                                    <label class="sr-only">Leave a comment...</label>
                                    <textarea class="form-control" placeholder="Leave a comment" rows="2"></textarea>
                                </form>

                            </div>
                        </div> <!-- / .row -->

                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <!-- 动态 -->
                            <div class="row">
                                <div class="col-12">
                                    <!-- Files -->
                                    <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                                        <div class="card-header">
                                            <div class="row align-items-center col-xl-12">
                                                <div class="col">

                                                    <!-- Title -->
                                                    <h4 class="card-header-title">
                                                        动态
                                                    </h4>

                                                </div>
                                            </div> <!-- / .row -->
                                        </div>

                                        <div class="card-body">

                                            <!-- List group -->
                                            <div class="list-group list-group-flush my--3">
                                                @foreach($actives as $active)
                                                    @if($active['log_name'] =='article')
                                                        @include('home.layouts._article')
                                                    @elseif($active['log_name'] =='comment')
                                                        @include('home.layouts._comment')
                                                    @endif
                                                @endforeach
                                            </div>

                                        </div>
                                        <!-- List -->

                                    </div>
                                    {{$actives->links()}}
                                </div>

                            </div>
                <!-- Members -->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                    Members
                                </h4>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="card-body">

                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="profile-posts.html" class="avatar">
                                    <img src="{{asset ('org/images/14.jpg')}}" alt="..." class="avatar-img rounded-circle">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="profile-posts.html">Dianna Smiley</a>
                                </h4>

                                <!-- Time -->
                                <p class="card-text small">
                                    <span class="text-success">●</span> Online
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#!" class="dropdown-item">
                                            Action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Another action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Something else here
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Divider -->
                        <hr>

                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="profile-posts.html" class="avatar">
                                    <img src="{{asset ('org/images/15.jpg')}}" alt="..." class="avatar-img rounded-circle">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="profile-posts.html">Ab Hadley</a>
                                </h4>

                                <!-- Time -->
                                <p class="card-text small">
                                    <span class="text-success">●</span> Online
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#!" class="dropdown-item">
                                            Action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Another action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Something else here
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Divider -->
                        <hr>

                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="profile-posts.html" class="avatar">
                                    <img src="{{asset ('org/images/16.jpg')}}" alt="..." class="avatar-img rounded-circle">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="profile-posts.html">Adolfo Hess</a>
                                </h4>

                                <!-- Time -->
                                <p class="card-text small">
                                    <span class="text-danger">●</span> Offline
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#!" class="dropdown-item">
                                            Action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Another action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Something else here
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->

                        <!-- Divider -->
                        <hr>

                        <div class="row align-items-center">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <a href="profile-posts.html" class="avatar">
                                    <img src="{{asset ('org/images/13.jpg')}}" alt="..." class="avatar-img rounded-circle">
                                </a>

                            </div>
                            <div class="col ml--2">

                                <!-- Title -->
                                <h4 class="card-title mb-1">
                                    <a href="profile-posts.html">Daniela Dewitt</a>
                                </h4>

                                <!-- Time -->
                                <p class="card-text small">
                                    <span class="text-warning">●</span> Busy
                                </p>

                            </div>
                            <div class="col-auto">

                                <!-- Dropdown -->
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#!" class="dropdown-item">
                                            Action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Another action
                                        </a>
                                        <a href="#!" class="dropdown-item">
                                            Something else here
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- / .row -->

                    </div> <!-- / .card-body -->
                </div> <!-- / .card -->

            </div>
        </div> <!-- / .row -->
    </div>
@endsection

@push('js')
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            keyboard: {
                enabled: true,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endpush
