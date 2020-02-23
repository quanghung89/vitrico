@extends('backend.master')
@section('title', 'Cập Nhật Role')
@section('content.header', 'Role')
@section('content.links.before', route('roles.index'))
@section('content.before', 'Role')
@section('content.after', 'Cập Nhật')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> Cập Nhật Role</h3>
                        </div>
                        <form class="form-horizontal" action="{{route('roles.update', [$role->id])}}" method="post" >
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
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tên Role <label style="color: red"> (*) </label></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="title"
                                               placeholder="Tên Role" value="{{old('title', isset($role) ? $role->title : null)}}">
                                        @if($errors->has('title'))
                                            <p style="color: red"> {{$errors->first('title')}} </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1"></div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Chọn Permission</label>
                                    <div class="col-sm-6">
                                        <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="permissions[]">
                                            @foreach($permissions as $id => $permissions)
                                                <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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


