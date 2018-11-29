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
                            我的关注榜
                        @else
                            他的关注榜
                        @endcan
                    </a>
                </h2>

                <!-- Text -->
                <p class="card-text text-center text-muted mb-4">
                    这个家伙很懒 什么都没有留下~~~
                </p>
                <hr>
                @if($followings->count()!=0)
                <div class="row">
                    @foreach($followings as $following)
                        <div class="col-4">
                            <div class=" align-items-center ">
                                <div class="">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <a href="{{route('member.user.show',$following)}}" class="card-avatar avatar avatar-lg mx-auto">
                                                    <img src="{{$following->icon}}" alt="" class="avatar-img rounded">
                                                </a>
                                            </div>

                                            <!-- Title -->
                                            <h2 class="card-title text-center mb-3">
                                                <a href="{{route('member.user.show',$following)}}">{{$following->name}}</a>
                                            </h2>

                                            <!-- Text -->
                                            <p class="card-text text-center text-muted mb-4">
                                                Medium is an online publishing platform developed by Evan Williams, and launched in August 2012.
                                            </p>
                                            <p class="card-text">
                                          <span class="badge badge-soft-secondary">
                                            粉丝:{{$following->fans->count()}}
                                          </span>
                                                <span class="badge badge-soft-secondary">
                                            关注:{{$following->following->count()}}
                                          </span>
                                            </p>

                                            <hr>

                                            <div class="row align-items-center">
                                                <div class="col">
                                                    @auth()
                                                        @can('isNotMine',$following)
                                                        <div class="col-auto">
                                                            <a href="{{route('member.attention',$following)}}" class="btn btn-block btn-sm btn-white">
                                                                @if($following->fans->contains(auth()->user()))
                                                                    取消关注
                                                                @else
                                                                    关注
                                                                @endif
                                                            </a>
                                                        </div>
                                                      @endcan
                                                    @endauth
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$followings->links()}}
                @else
                暂无关注
                @endif
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        require(['hdjs', 'bootstrap']);

        //上传图片
        function upImagePc() {
            require(['hdjs'], function (hdjs) {
                var options = {
                    multiple: false,//是否允许多图上传
                    //data是向后台服务器提交的POST数据
                    data: {name: '后盾人', year: 2099},
                };
                hdjs.image(function (images) {
                    //alert(1);
                    //将返回的图片路径写入到input表单的val值
                    //提交表单做头像修改
                    $("[name='icon']").val(images[0]);
                    //将上传返回的图片写入avatar-img元素的src
                    $(".avatar-img").attr('src', images[0]);
                    //触发表单提交
                    $('#editIocn').submit();
                }, options)
            });
        }
    </script>
    @endpush
