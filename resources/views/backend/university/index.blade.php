@extends('backend.master')
@section('title', 'Danh Sách Trường Đại Học')
@section('content.header', 'Trường Đại Học')
@section('content.links.before', route('university.index'))
@section('content.before', 'Trường Đại Học')
@section('content.after', 'Danh Sách')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title" style="">
                        Danh Sách Trường Đại Học : {{$universitys ? $universitys->count() : 0}}
                    </h2>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="align:right">
                            <a href="{{route('university.create') }}" class="btn btn-primary">Thêm Trường Đại Học</a>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif
            <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu Đề</th>
                            <th>Tóm Tắt</th>
                            <th>Địa Chỉ</th>
                            <th>Ngày Thành Lập</th>
                            <th>Ngày Nhập Học</th>
                            <th>Học Phí</th>
                            <th>Trạng Thái</th>
                            <th>Hình ảnh</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if($universitys->count()!= null)
                                @foreach($universitys as $university)
                                    <tr>
                                        <td>{{$university['id']}}</td>
                                        <td>{{$university['title']}}</td>
                                        <td>{{$university['description']}}</td>
                                        <td>{{$university['address']}}</td>
                                        <td>{{$university['constitutive']}}</td>
                                        <td>{{$university['admission']}}</td>
                                        <td>{{$university['tuition']}}</td>
                                        <td>
                                            @if($university['status'] == \App\Models\News::STATUS_ENABLE)
                                                {{"Hiển Thị"}}
                                            @else
                                                {{"Ẩn"}}
                                            @endif
                                        </td>
                                        <td>
                                            <img
                                                src="@if (!$university->image)
                                                {{asset('upload/images/default/noimage.jpg')}}
                                                @else
                                                {{asset('upload/images/university').'/'.$university->image}}
                                                @endif"
                                                width="80px">
                                        </td>
                                        <td>
                                            <a
                                                class="btn btn-info btn-sm"
                                                href="{{route('university.edit',[$university['id']])}}"
                                            >
                                                <i class="fas fa-pencil-alt"></i>
                                                Sửa
                                            </a>

                                        </td>
                                        <td>
                                            <a
                                                class="btn btn-danger btn-sm"
                                                href="{{route('university.destroy',[$university['id']])}}"
                                                onclick="confirmDelete()"
                                            >
                                                <i class="fas fa-trash"></i>
                                                Xóa
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr >
                                    <td colspan="11" style="text-align: center"> Chưa có dữ liệu</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{$universitys->links()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

