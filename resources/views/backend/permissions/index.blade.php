@extends('backend.master')
@section('title', 'Danh Sách Permission')
@section('content.header', 'Permission')
@section('content.links.before', route('permissions.index'))
@section('content.before', 'Permission')
@section('content.after', 'Danh Sách')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh Sách Permission : {{$permissions ? $permissions->count() : 0}}</h3>
                    <div class="card-tools">
                        @can('permission_create')
                            <div class="input-group input-group-sm" style="align:right">
                                <a href="{{route('permissions.create') }}" class="btn btn-primary">Thêm Permission</a>
                            </div>
                        @endcan
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
                            <th>Tên</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($permissions->count() != null)
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{$permission['id']}}</td>
                                    <td>{{$permission['title']}}</td>
                                    <td>
                                        @can('permission_edit')
                                            <a href="{{route('permissions.edit',[$permission->id])}}">
                                                <i class="fa fa-edit"></i>
                                                Sửa
                                            </a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('permission_delete')
                                            <a href="{{route('permissions.destroy',[$permission['id']])}}"
                                               onclick="confirmDelete()">
                                                <i class="fa fa-trash-alt"></i>
                                                Xóa
                                            </a>
                                        @endcan
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
                    {{$permissions->links()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

