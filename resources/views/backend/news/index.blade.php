@extends('backend.master')
@section('title', 'Danh Sách Tin Tức')
@section('content.header', 'Tin Tức')
@section('content.links.before', route('news.index'))
@section('content.before', 'Tin Tức')
@section('content.after', 'Danh Sách')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh Sách Tin Tức : {{$news ? $news->count() : 0}}</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="align:right">
                            <a href="{{route('news.create') }}" class="btn btn-primary">Thêm Tin Tức</a>
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
                            <th>Tên</th>
                            <th>Tiêu Đề</th>
                            <th>Tóm Tắt</th>
                            <th>Trạng Thái</th>
                            <th>Hình ảnh</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($news->count() != null)
                            @foreach($news as $new)
                                <tr>
                                    <td>{{$new['id']}}</td>
                                    <td>{{$new->name}}</td>
                                    <td>{{$new['title']}}</td>
                                    <td>{{$new['description']}}</td>
                                    <td>
                                        @if($new['status'] == \App\Models\News::STATUS_ENABLE)
                                            {{"Hiển Thị"}}
                                        @else
                                            {{"Ẩn"}}
                                        @endif
                                    </td>
                                    <td>
                                        <img
                                            src="@if (!$new->image)
                                                {{asset('upload/images/default/noimage.jpg')}}
                                                @else
                                                {{asset(\App\Models\News::URL_IMAGE_NEWS).'/'.$new->image}}
                                                @endif"
                                            width="80px">
                                    </td>
                                    <td>
                                        <a href="{{route('news.edit',[$new['id']])}}">
                                            <i class="fa fa-edit"></i>
                                            Sửa
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('news.destroy',[$new['id']])}}" onclick="confirmDelete()">
                                            <i class="fa fa-trash-alt"></i>
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
                    {{$news->links()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

