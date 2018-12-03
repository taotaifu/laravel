@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid" id="app">
        <!-- 头部开始 -->
        <div class="header mt-md-2">
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Title -->
                        <h2 class="header-title">
                            轮播图管理
                        </h2>

                    </div>

                </div> <!-- / .row -->
                <div class="row align-items-center">
                    <div class="col">

                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="{{route('shower.figure.index')}}" class="nav-link ">
                                    展示列表
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{route('shower.figure.create')}}" class="nav-link active">
                                    添加列表
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{--头部结束--}}
        {{--中间内容开始--}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="container-fluid">
                            <!-- Header -->
                            <div class="header mt--3">
                                <div class="header-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <!-- Title -->
                                            <h2 class="header-title">
                                                轮播图管理
                                            </h2>

                                        </div>

                                    </div> <!-- / .row -->
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-12">
                                    <form method="post" action="{{route('shower.figure.store')}}">
                                        <div class="card">

                                            @csrf
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">轮播图名称</label>
                                                    <input type="text" name="name" class="form-control" value="{{$figure['name']}}"id="exampleInputEmail1" placeholder="">
                                                </div>

                                                <label for="exampleInputEmail1">图片上传</label>
                                                <div class="input-group mb-1">
                                                    <input class="form-control" name='icon' value="{{$figure['icon']}}">
                                                    <div class="input-group-append">
                                                        <button onclick="upImagePc(this)"  class="btn btn-secondary" type="button">单图上传</button>
                                                    </div>
                                                </div>
                                                <div style="display: inline-block;position: relative;width:260px">
                                                    <img src="{{asset('org/images/1.jpeg')}}" class="img-responsive img-thumbnail avatar-img" width="150">
                                                    <em class="close" style="position: absolute;top: 3px;right: 8px;" title="删除这张图片"
                                                        onclick="removeImg(this)">×</em>
                                                </div>
                                                <hr>
                                                <button type="submit" class="btn btn-primary">保存</button>
                                                <textarea name="data" hidden id="" cols="30" rows="10">@{{ menus }}</textarea>

                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--中间内容结束--}}
        {{--@{{ currentMenu }}--}}
    </div>
@endsection
@push('js')
    <script>
        require['hdjs','bootstrap'];
        function upImagePc() {
            require(['hdjs'], function (hdjs) {
                var options = {
                    multiple: false,//是否允许多图上传
                    //data是向后台服务器提交的POST数据
                    data: {name: '后盾人', year: 2099},
                };
                hdjs.image(function (images) {
                    // alert(1);
                    // 提交表单做头像修改
                    $("[name='icon']").val(images[0]);
                    $(".avatar-img").attr('src', images[0]);
                    $('#imgIcon').submit();
                }, options)
            });
        }

    </script>
@endpush

