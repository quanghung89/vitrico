@extends('backend.master')
@section('title', 'Cập Nhật Tin Tức')
@section('content.header', 'Tin Tức')
@section('content.links.before', route('news.index'))
@section('content.before', 'Tin Tức')
@section('content.after', 'Cập Nhật')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> Cập Nhật Tin Tức</h3>
                        </div>
                        <form class="form-horizontal" action="{{route('news.update',[$new->id])}}" method="post" enctype="multipart/form-data">
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
                                    <label for="inputPassword3" class="col-sm-2 control-label">Loại tin tức</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="category">
                                            <option value="">-- Chọn Loại Tin --</option>
                                            @foreach($category as $cate)
                                                <option
                                                    value="{{$cate->id}}"
                                                    selected = {{$cate->id == $new->$cate ? "selected" : ''}}
                                                >
                                                    {{$cate->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category'))
                                            <p style="color: red"> {{$errors->first('category')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                        Tên<label style="color: red"> (*) </label>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text"
                                               class="form-control"
                                               name="name"
                                               placeholder="Tên"
                                               value="{{old('name', isset($new) ? $new->name: null)}}"
                                        >
                                        @if($errors->has('name'))
                                            <p style="color: red"> {{$errors->first('name')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tiêu Đề</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="title" value="{{old('title', isset($new) ? $new->title: null)}}">
                                        @if($errors->has('title'))
                                            <p style="color: red"> {{$errors->first('title')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tóm tắt nội dung</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="description"
                                            value="{{old('title', isset($new) ? $new->description: null)}}"
                                        >
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
                                            <input type="radio" name="status"
                                                   id="radioSuccess1"
                                                   value='1'
                                            @if($new->status == \App\Models\News::STATUS_ENABLE)
                                                {{"checked"}}
                                                @endif
                                            >
                                            <label for="radioSuccess1">
                                                Hiển Thị
                                            </label>
                                        </div>
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        &nbsp;
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        &nbsp;
                                        <div class="icheck-success d-inline ">
                                            <input type="radio" name="status"
                                                   id="radioSuccess2"
                                                   value='0'
                                            @if($new->status == \App\Models\News::STATUS_DISABLE)
                                                {{"checked"}}
                                                @endif
                                            >
                                            <label for="radioSuccess2">
                                                Ẩn
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
                                                <label for="inputEmail3" class="col-sm-2 control-label">Ảnh Hiện Tại</label> <br />
                                                <img
                                                    src="@if (!$new->image)
                                                    {{asset('upload/images/default/noimage.jpg')}}
                                                    @else
                                                    {{asset(\App\Models\News::URL_IMAGE_NEWS).'/'.$new->image}}
                                                    @endif"
                                                    width="200px">
                                                <input type="hidden" name="img_curr" value="{{$new['image']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Chọn Ảnh Mới</label>
                                                <input type="file" name="images" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Nội Dung</label>
                                    <textarea name="content" class="form-control " id="editor1">{{old('title', isset($new) ? $new->content: null)}}</textarea>
                                    @if($errors->has('content'))
                                        <p style="color: red"> {{$errors->first('content')}} </p>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-save"> </i> Cập Nhật
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

