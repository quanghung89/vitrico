@extends('backend.master')
@section('title', 'Danh Sách Học Viên')
@section('content.header', 'Học Viên')
@section('content.links.before', route('account.index'))
@section('content.before', 'Học Viên')
@section('content.after', 'danh sách')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh Sách Học Viên : {{$listAccounts ? $listAccounts->count() : 0}}</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="align:right">
                            <a href="{{route('account.create') }}" class="btn btn-primary">Thêm Học Viên</a>
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
                            <th>Họ Và Tên</th>
                            <th>Tên Đăng Nhập</th>
                            <th>Email</th>
                            <th>Địa Chỉ</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Số Chứng Minh Thư</th>
                            <th>trạng thái</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($listAccounts->count() != null)
                            @foreach($listAccounts as $key => $listAccount)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$listAccount['name']}}</td>
                                    <td>{{$listAccount['username']}}</td>
                                    <td>{{$listAccount['email']}}</td>
                                    <td>{{$listAccount['address']}}</td>
                                    <td>{{$listAccount['phone']}}</td>
                                    <td>
                                        <img
                                            src="@if (!$listAccount->image)
                                            {{asset('upload/images/default/noimage.jpg')}}
                                            @else
                                            {{asset('upload/images/account/')}}/{{$listAccount['image']}}
                                            @endif"
                                            width="80px">
                                    </td>
                                    <td>{{$listAccount['no_cmt']}}</td>
                                    <td>
                                        @if($listAccount['status'] == \App\Models\Accounts::ACCOUNT_STATUS_ENABLE)
                                            {{"Hiển Thị"}}
                                        @else
                                            {{"Ẩn"}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('account.edit',[$listAccount['id']])}}">
                                            <i class="fa fa-edit"></i>
                                            Sửa
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('account.destroy',[$listAccount['id']])}}" onclick="confirmDelete()">
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
    </div>
@endsection

