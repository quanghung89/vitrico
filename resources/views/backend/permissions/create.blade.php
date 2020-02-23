@extends('backend.master')
@section('title', 'Thêm Permission')
@section('content.header', 'Permission')
@section('content.links.before', route('news.index'))
@section('content.before', 'Permission')
@section('content.after', 'Thêm Mới')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> Thêm Permission</h3>
                        </div>
                        <form class="form-horizontal" action="{{route('permissions.store')}}" method="post" >
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
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tên Permission</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="title"
                                               placeholder="Tên Permission" value="{{old('title')}}">
                                        @if($errors->has('title'))
                                            <p style="color: red"> {{$errors->first('title')}} </p>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-save"> </i> Lưu Mới
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


