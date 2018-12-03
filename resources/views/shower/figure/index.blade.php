@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- Header -->
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
                                <a href="{{route ('shower.figure.index')}}" class="nav-link active">
                                    展示列表
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{route ('shower.figure.create')}}" class="nav-link ">
                                    添加列表
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="table-responsive mb-0" data-toggle="lists" data-lists-values="[&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]">
                <table class="table table-sm table-nowrap card-table">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>轮播图名字</th>
                        <th>图片</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($figures as $figure)
                        <tr>
                            <td>{{$figure['id']}}</td>
                            <td>{{$figure['name']}}</td>
                            <td><img width="80" src="{{$figure['icon']}}"></td>

                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="First group">

                                    <a href="{{route ('shower.figure.edit',$figure)}}" class="btn btn-white" value="{{$figure['id']}}">编辑</a>

                                    <button onclick="del(this)" type="figure" class="btn btn-white" value="{{$figure['id']}}">删除</button>
                                    <form action="{{route ('shower.figure.destroy',$figure)}}" method="post">
                                        @csrf  @method('DELETE')
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$figures->appends(['figure' => Request::query('figure')])->links()}}
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script>
        function del(obj) {
            require(['https://cdn.bootcss.com/sweetalert/2.1.2/sweetalert.min.js'], function (swal) {
                swal("确定删除?", {
                    icon: 'warning',
                    buttons: {
                        cancel: "取消",
                        defeat: '确定',
                    },
                }).then((value) => {
                    switch (value) {
                        case "defeat":
                            $(obj).next('form').submit();
                            break;
                        default:

                    }
                });
            })
        }
    </script>
@endpush
