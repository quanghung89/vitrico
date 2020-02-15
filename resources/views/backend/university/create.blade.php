@extends('backend.master')
@section('title', 'Thêm Trường Đại Học')
@section('content.header', 'Trường Đại Học')
@section('content.links.before', route('university.index'))
@section('content.before', 'Trường Đại Học')
@section('content.after', 'Thêm Mới')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> Thêm Trường Đại Học</h3>
                        </div>
                        <form
                            class="form-horizontal"
                            action="{{route('university.store')}}"
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
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                        Địa Chỉ  <label style="color: red"> (*) </label>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="address"
                                               placeholder="Địa Chỉ" value="{{old('address')}}">
                                        @if($errors->has('address'))
                                            <p style="color: red"> {{$errors->first('address')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                        Tiêu Đề <label style="color: red"> (*) </label>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text"
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
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                        Tóm tắt nội dung  <label style="color: red"> (*) </label>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="description"
                                               placeholder="Tóm tắt nội dung" value="{{old('description')}}">
                                        @if($errors->has('description'))
                                            <p style="color: red"> {{$errors->first('description')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                                    <div class="form-group col-sm-6">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" name="status" value="1" checked="checked"
                                                   id="radioSuccess1">
                                            <label for="radioSuccess1">
                                                Hiển Thị
                                            </label>
                                        </div>
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        &nbsp;
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        &nbsp;
                                        <div class="icheck-success d-inline ">
                                            <input type="radio" name="status" value="0" id="radioSuccess2">
                                            <label for="radioSuccess2"> Ẩn
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Ngày thành lập</label>
                                    <div class="col-sm-6">
                                        <div class="mb-3 form-group">
                                            <input
                                                type="date"
                                                name="constitutive"
                                                class="ui-datepicker-buttonpane form-control"
                                                value="{{old('constitutive')}}"
                                            >
                                            @if($errors->has('constitutive'))
                                                <p style="color: red"> {{$errors->first('constitutive')}} </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Ngày Nhập học</label>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <input
                                                type="date"
                                                name="admission"
                                                class="ui-datepicker-buttonpane form-control"
                                                value="{{old('admission')}}"
                                            >
                                            @if($errors->has('admission'))
                                                <p style="color: red"> {{$errors->first('admission')}} </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Học phí</label>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <input
                                                type="number"
                                                name="tuition"
                                                class="form-control"
                                                value="{{old('tuition')}}"
                                            >
                                            @if($errors->has('tuition'))
                                                <p style="color: red"> {{$errors->first('tuition')}} </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                        <label for="inputEmail3" class="col-sm-2 control-label">
                                            Hình ảnh <label style="color: red"> (*) </label>
                                        </label>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <input
                                                type="file"
                                                name="image"
                                                class="form-control-file"
                                                value="{{old('image')}}"
                                            >
                                            @if($errors->has('image'))
                                                <p style="color: red"> {{$errors->first('image')}} </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Nội Dung : </label> <label style="color: red"> (*) </label>
                                    <textarea name="content" class="form-control " id="editor1">
                                        {{ old('content') }}
                                    </textarea>
                                    @if($errors->has('content'))
                                        <p style="color: red"> {{$errors->first('content')}} </p>
                                    @endif
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-save"> </i> Lưu Mới
                                    </button>
                                    <div class="col-sm-3"></div>
                                </div>
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


