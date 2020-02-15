@extends('backend.master')
@section('title', 'Cập Nhật Học Viên')
@section('content.header', 'Học Viên')
@section('content.links.before', route('account.index'))
@section('content.before', 'Học Viên')
@section('content.after', 'Thêm Mới')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> Cập Nhật Thể Loại</h3>
                        </div>
                        <form class="form-horizontal" action="{{route('account.update',[$account->id])}}" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <div class="card-body">

                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <h6> <label style="color: red"> (*) </label> Là thông tin bắt buộc nhập </h6>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                        Họ Và Tên  <label style="color: red"> (*) </label>
                                    </label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            placeholder="Họ Và Tên"
                                            value="{{old('title', isset($account) ? $account->name: null)}}"
                                        >
                                        @if($errors->has('name'))
                                            <p style="color: red"> {{$errors->first('name')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                        Tên Đăng Nhập  <label style="color: red"> (*) </label>
                                    </label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="username"
                                            placeholder="Tên Đăng Nhập"
                                            value="{{old('username', isset($account) ? $account->username: null)}}"
                                        >
                                        @if($errors->has('username'))
                                            <p style="color: red"> {{$errors->first('username')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                        Email <label style="color: red"> (*) </label>
                                    </label>
                                    <div class="col-sm-6">
                                        <input
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            placeholder="Email"
                                            value="{{old('email', isset($account) ? $account->email: null)}}"
                                        >
                                        @if($errors->has('email'))
                                            <p style="color: red"> {{$errors->first('email')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Mật Khẩu</label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="password"
                                            placeholder="Mật Khẩu"
                                            value="{{old('password')}}"
                                        >
                                        @if($errors->has('password'))
                                            <p style="color: red"> {{$errors->first('password')}} </p>
                                        @endif
                                    </div>
                                    <div class="col-sm-2">Mặc định là : 12345678</div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Địa Chỉ</label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="address"
                                            placeholder="Địa Chỉ"
                                            value="{{old('address', isset($account) ? $account->address: null)}}"
                                        >
                                        @if($errors->has('address'))
                                            <p style="color: red"> {{$errors->first('address')}} </p>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Số Điện Thoại</label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="phone"
                                            placeholder="Số Điện Thoại"
                                            value="{{old('phone', isset($account) ? $account->phone: null)}}"
                                        >
                                        @if($errors->has('phone'))
                                            <p style="color: red"> {{$errors->first('phone')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                        Số Chứng Minh Thư / Hộ Chiếu <label style="color: red"> (*) </label>
                                    </label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="no_cmt"
                                            placeholder="Số Chứng Minh Thư / Hộ Chiếu"
                                            value="{{old('no_cmt', isset($account) ? $account->no_cmt: null)}}"
                                        >
                                        @if($errors->has('no_cmt'))
                                            <p style="color: red"> {{$errors->first('no_cmt')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Trạng Thái</label>
                                    <div class="form-group col-sm-6">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" name="status" value="1" checked="checked" id="radioSuccess1">
                                            <label for="radioSuccess1">
                                                Hiển Thị
                                            </label>
                                        </div>
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        <div class="icheck-success d-inline ">
                                            <input type="radio" name="status"  value="0" id="radioSuccess2">
                                            <label for="radioSuccess2"> Ẩn
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Hình Ảnh</label>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Ảnh Hiện Tại</label><br />
                                                <img
                                                    src="@if (!$account->image)
                                                    {{asset('upload/images/default/noimage.jpg')}}
                                                    @else
                                                    {{asset('upload/images/account'.'/'.$account->image)}}
                                                    @endif"
                                                    width="200px">
                                                <input type="hidden" name="img_curr" value="{{$account['image']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Chọn Ảnh Mới</label>
                                                <input type="file" name="images" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info"> <i class="fa fa-save"> </i> Cập Nhật</button>
                                <div class="col-sm-3"></div>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
@endsection

