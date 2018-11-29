@extends('home.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @include('member.layouts.menu')

            <div class="card col-sm-9">

                <div class="text-center mt-5">
                    <a href="" class="card-avatar avatar avatar-lg mx-auto">
                        <img src="{{$user->icon}}" alt="" class="avatar-img rounded">
                    </a>
                </div>

                <!-- Title -->
                <h2 class="card-title text-center mb-3">
                    <a href="">
                        @can('isMine',$user)
                            我的收藏榜
                        @else
                            他的收藏榜
                        @endcan
                    </a>
                </h2>

                <!-- Text -->
                <p class="card-text text-center text-muted mb-4">
                    这个家伙很懒 什么都没有留下，空空如也~~~
                </p>
                <hr>
                @if($collectsData->count()!=0)
                    <div class="row">
                                <div class="col-sm-9">
                                    <div class="container-fluid mt-0">
                                                    <!-- Nav -->
                                                    <ul class="nav nav-tabs nav-overflow header-tabs mt-0">
                                                        <li class="nav-item">
                                                            <a href="{{route('member.mycollect',[$user,'type'=>'article'])}}" class="nav-link ">
                                                                文章
                                                            </a>
                                                        </li>
                                                    </ul>

                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <!-- Files -->
                                                <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                                                    <div class="card-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <!-- Title -->
                                                                <h4 class="card-header-title">
                                                                    @can('isMine',$user)
                                                                        我的收藏文章
                                                                    @else
                                                                        他的收藏文章
                                                                    @endcan
                                                                </h4>
                                                            </div>
                                                        </div> <!-- / .row -->
                                                    </div>
                                                    <div class="card-body">

                                                        <!-- List -->
                                                        <ul class="list-group list-group-lg list-group-flush list my--4">
                                                            @foreach($collectsData as $collect)
                                                                <li class="list-group-item px-0">

                                                                    <div class="row align-items-center">
                                                                        <div class="col-auto">
                                                                            <!-- Avatar -->
                                                                            <a href="{{route('member.user.show',$collect->belongsModel->user)}}" class="avatar avatar-sm">
                                                                                <img src="{{$collect->belongsModel->user->icon}}" alt="..." class="avatar-img rounded">
                                                                            </a>

                                                                        </div>
                                                                        <div class="col ml--2">

                                                                            <!-- Title -->
                                                                            <h4 class="card-title mb-1 name">
                                                                                <a href="http://laravel-cms.edu/home/article/1">
                                                                                    {{$collect->belongsModel->title}}</a>
                                                                            </h4>

                                                                            <p class="card-text small mb-1">
                                                                                <a href="http://laravel-cms.edu/member/user/29" class="text-secondary mr-2">
                                                                                    <i class="fa fa-user-circle" aria-hidden="true"></i> {{$collect->belongsModel->user->name}}
                                                                                </a>

                                                                                <i class="fa fa-clock-o" aria-hidden="true"></i> {{$collect->belongsModel->created_at->diffForHumans()}}

                                                                            </p>

                                                                        </div>
                                                                        <div class="col-auto">

                                                                            <!-- Dropdown -->
                                                                            <div class="dropdown">
                                                                                <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fe fe-more-vertical"></i>
                                                                                </a>
                                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                                    <a href="" class="dropdown-item">
                                                                                        查看详情
                                                                                    </a>
                                                                                    <a href="" class="dropdown-item">
                                                                                        编辑
                                                                                    </a>
                                                                                    <a href="javascript:;" onclick="del(this)" class="dropdown-item">
                                                                                        删除
                                                                                    </a>
                                                                                    <form action="" method="post">
                                                                                        <input type="hidden" name="_token" value="QGUQZ8LogH2jmBQKMfnkF2qIyWVqcSZSSAJBBfVM"> <input type="hidden" name="_method" value="DELETE"></form>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div> <!-- / .row -->
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                {{$collectsData->appends(['type'=>Request::query('type')])->links()}}
                                            </div>
                                            @else
                                                暂无收藏
                                            @endif
                                        </div>
                                    </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

@endpush


