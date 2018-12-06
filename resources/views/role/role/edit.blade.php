@extends('admin.layouts.master')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">

                <!-- Header -->
                <div class="header mt-md-5">
                    <div class="header-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h1 class="header-title">
                                    角色管理
                                </h1>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form class="mb-4" method="post" action="{{route ('role.role.store')}}">
                @csrf
                <!-- Project name -->
                    <div class="form-group">
                        <label>角色中文名称</label>
                        <input type="text" name="title" class="form-control text-muted" value="请输入角色中文名称">
                    </div>
                    <div class="form-group">
                        <label>角色英文名称</label>
                        <input type="text" name="name" class="form-control text-muted" value="请输入角色英文名称">
                    </div>
                    <!-- Buttons -->
                    <button type="submit" class="btn btn-block btn-primary">
                        保存数据
                    </button>

                </form>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">

                <!-- Header -->
                <div class="header mt-md-5">
                    <div class="header-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h1 class="header-title">
                                   角色管理
                                </h1>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form class="mb-4" method="post" action="{{route ('role.role.edit',$role)}}">
                @csrf
                <!-- Project name -->
                    <div class="form-group">
                        <label>角色中文名称</label>
                        <input type="text" name="title" class="form-control" value="{{$role['title']}}">
                    </div>
                    <div class="form-group">
                        <label>角色英文名称</label>
                        <input type="text" name="title" class="form-control" value="{{$role['name']}}">
                    </div>
                    <!-- Buttons -->
                    <button  class="btn btn-block btn-primary">
                        保存数据
                    </button>

                </form>

            </div>
        </div>
    </div>
@endsection

