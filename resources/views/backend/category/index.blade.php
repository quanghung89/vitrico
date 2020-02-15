@extends('backend.master')
@section('title', 'Danh Sách Thể Loại')
@section('content.header', 'Thể Loại')
@section('content.links.before', route('category.index'))
@section('content.before', 'Thể Loại')
@section('content.after', 'danh sách')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh Sách Thể Loại : {{$listCategories ? $listCategories->count() : 0}}</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="align:right">
                            <a href="{{route('category.create') }}" class="btn btn-primary">Thêm Thể Loại</a>
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
                                <th>Trạng Thái</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($listCategories->count() != null)
                            @foreach($listCategories as $key => $listCategory)
                                <tr>
                                    <td>{{$listCategory['id']}}</td>
                                    <td>{{$listCategory['name']}}</td>
                                    <td>{{$listCategory['title']}}</td>
                                    <td>
                                        @if($listCategory['status'] == \App\Models\Category::STATUS_ENABLE)
                                        {{"Hiển Thị"}}
                                            @else
                                        {{"Ẩn"}}
                                            @endif
                                    </td>
                                    <td>
                                        <a href="{{route('category.edit',[$listCategory['id']])}}">
                                            <i class="fa fa-edit"></i>
                                            Sửa
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('category.destroy',[$listCategory['id']])}}" onclick="confirmDelete()">
                                            <i class="fa fa-trash-alt"></i>
                                            Xóa
                                        </a>
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

