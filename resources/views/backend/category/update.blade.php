@extends('backend.master')
@section('title', 'Cập Nhật Thể Loại')
@section('content.header', 'Thể Loại')
@section('content.links.before', route('category.index'))
@section('content.before', 'Thể Loại')
@section('content.after', 'Cập Nhật')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> Cập Nhật Thể Loại</h3>
                        </div>
                        <form class="form-horizontal" action="{{route('category.update',[$category->id])}}" method="post">
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
                                        Tên Thể Loại <label style="color: red"> (*) </label>
                                    </label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            value="{{old('name', isset($category) ? $category->name: null)}}"
                                        >
                                        @if($errors->has('name'))
                                            <p style="color: red"> {{$errors->first('name')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                        Tiêu Đề <label style="color: red"> (*) </label>
                                    </label>
                                    <div class="col-sm-6">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="title"
                                            value="{{old('title', isset($category) ? $category->title: null)}}"
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
                                            <input type="radio" name="status"
                                                   id="radioSuccess1"
                                                   value='1'
                                                @if($category->status == \App\Models\Category::STATUS_ENABLE)
                                                    {{"checked"}}
                                                    @endif
                                            >
                                            <label for="radioSuccess1">
                                                Hiển Thị
                                            </label>
                                        </div>
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        <div class="icheck-success d-inline ">
                                            <input type="radio" name="status"
                                                   value="0"
                                                   id="radioSuccess2"
                                            @if($category->status == \App\Models\Category::STATUS_DISABLE)
                                                {{"checked"}}
                                                @endif
                                            >
                                            <label for="radioSuccess2"> Ẩn
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info"> <i class="fa fa-edit"> </i> Cập Nhật</button>
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

