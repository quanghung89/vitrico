@extends('backend.master')
@section('title', 'Thêm Thể Loại')
@section('content.header', 'Thể Loại')
@section('content.links.before', route('category.index'))
@section('content.before', 'Thể Loại')
@section('content.after', 'Thêm Mới')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> Thêm Thể Loại</h3>
                        </div>
                        <form class="form-horizontal" action="{{route('category.store')}}" method="post">
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
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tên Thể Loại <label style="color: red"> (*) </label></label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            placeholder="Tên Thể Loại"
                                            value="{{old('name')}}"
                                        >
                                        @if($errors->has('name'))
                                            <p style="color: red"> {{$errors->first('name')}} </p>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tiêu Đề <label style="color: red"> (*) </label></label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="title"
                                            placeholder="Tiêu Đề"
                                            value="{{old('title')}}"
                                        >
                                        @if($errors->has('title'))
                                            <p style="color: red"> {{$errors->first('title')}} </p>
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
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info"> <i class="fa fa-save"> </i> Lưu  Mới</button>
                                <div class="col-sm-3"></div>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

