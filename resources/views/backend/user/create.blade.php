@extends('backend.master')
@section('title', 'Thêm User')
@section('content.header', 'User')
@section('content.links.before', route('users.index'))
@section('content.before', 'User')
@section('content.after', 'Thêm Mới')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> Thêm User</h3>
                        </div>
                        <form class="form-horizontal" action="{{route('users.store')}}" method="post" >
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
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tên User <label style="color: red"> (*) </label></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Tên User" value="{{old('name')}}">
                                        @if($errors->has('name'))
                                            <p style="color: red"> {{$errors->first('name')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email <label style="color: red"> (*) </label></label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" name="email"
                                               placeholder="Email" value="{{old('email')}}">
                                        @if($errors->has('email'))
                                            <p style="color: red"> {{$errors->first('email')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Mật Khẩu<label style="color: red"> (*) </label></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="password"
                                               placeholder="Mật Khẩu" value="{{old('password')}}">
                                        @if($errors->has('password'))
                                            <p style="color: red"> {{$errors->first('password')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Chọn Role <label style="color: red"> (*) </label></label>
                                    <div class="col-sm-6">
                                        <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="roles[]">
                                            @foreach($roles as $id => $roles)
                                                <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('roles'))
                                            <p style="color: red"> {{$errors->first('roles')}} </p>
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


