@extends('backend.master')
@section('title', 'Cập Nhật Banner')
@section('content.header', 'Thể Loại')
@section('content.links.before', route('slide.index'))
@section('content.before', 'Banner')
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
                        <form
                            class="form-horizontal"
                            action="{{route('slide.update', [$slide->id])}}"
                            method="post"
                            enctype="multipart/form-data"
                        >
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
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tiêu Đề</label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="title"
                                            placeholder="Tiêu Đề"
                                            value="{{old('title', isset($slide) ? $slide->title: null)}}"
                                        >
                                        @if($errors->has('title'))
                                            <p style="color: red"> {{$errors->first('title')}} </p>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">URL</label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="link"
                                            placeholder="URL"
                                            value="{{old('link', isset($slide) ? $slide->link: null)}}"
                                        >
                                        @if($errors->has('link'))
                                            <p style="color: red"> {{$errors->first('link')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                        Hình ảnh
                                        <label style="color: red"> (*) </label>
                                    </label>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <input
                                                type="file"
                                                name="image"
                                                class="form-control-file"
                                                value="{{old('image')}}"
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Trạng Thái</label>
                                    <div class="form-group col-sm-6">
                                        <div class="icheck-success d-inline">
                                            <input
                                                type="radio"
                                                name="status"
                                                value="1"
                                                checked="checked"
                                                id="radioSuccess1"
                                            >
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
                                                    src="@if (!$slide->image)
                                                    {{asset('upload/images/default/noimage.jpg')}}
                                                    @else
                                                    {{asset('upload/images/slide'.'/'.$slide->image)}}
                                                    @endif"
                                                    width="200px">
                                                <input type="hidden" name="img_curr" value="{{$slide['image']}}">
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
    </div>
@endsection

