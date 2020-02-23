@extends('backend.master')
@section('title', 'Danh Sách Banner')
@section('content.header', 'Banner')
@section('content.links.before', route('category.index'))
@section('content.before', 'Banner')
@section('content.after', 'danh sách')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh Sách Banner : {{$listSlides ? $listSlides->count() : 0}}</h3>
                    <div class="card-tools">
                        @can('banner_create')
                            <div class="input-group input-group-sm" style="align:right">
                                <a href="{{route('slide.create') }}" class="btn btn-primary">Thêm Banner</a>
                            </div>
                        @endcan
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
                            <th>Trạng Thái</th>
                            <th>URL</th>
                            <th>Hình Ảnh</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($listSlides->count() != null)
                            @foreach($listSlides as $key => $listSlide)
                                <tr>
                                    <td>{{$listSlide['id']}}</td>
                                    <td>{{$listSlide['title']}}</td>
                                    <td>
                                        @if($listSlide['status'] == \App\Models\Slide::SLIDE_STATUS_ENABLE)
                                            {{"Hiển Thị"}}
                                        @else
                                            {{"Ẩn"}}
                                        @endif
                                    </td>
                                    <td>{{$listSlide['link']}}</td>
                                    <td>
                                        <img
                                            src="@if (!$listSlide->image)
                                            {{asset('upload/images/default/noimage.jpg')}}
                                            @else
                                            {{asset('upload/images/slide/')}}/{{$listSlide['image']}}
                                            @endif"
                                            width="80px">
                                    </td>
                                    <td>
                                        @can('banner_edit')
                                            <a href="{{route('slide.edit',[$listSlide['id']])}}">
                                                <i class="fa fa-edit"></i>
                                                Sửa
                                            </a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('banner_delete')
                                            <a href="{{route('slide.destroy',[$listSlide['id']])}}"
                                               onclick="confirmDelete()">
                                                <i class="fa fa-trash-alt"></i>
                                                Xóa
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="11" style="text-align: center"> Chưa có dữ liệu</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
@endsection

