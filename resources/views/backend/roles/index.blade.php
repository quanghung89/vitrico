@extends('backend.master')
@section('title', 'Danh Sách Role')
@section('content.header', 'Role')
@section('content.links.before', route('roles.index'))
@section('content.before', 'Role')
@section('content.after', 'Danh Sách')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh Sách Role : {{$roles ? $roles->count() : 0}}</h3>
                    <div class="card-tools">
                        @can('role_create')
                            <div class="input-group input-group-sm" style="align:right">
                                <a href="{{route('roles.create') }}" class="btn btn-primary">Thêm Role</a>
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
                            <th>Tên Role</th>
                            <th>Permission</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($roles->count() > 0)
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role['id']}}</td>
                                    <td>{{$role['title']}}</td>
                                    <td>
                                        @foreach($role->permissions as $key => $item)
                                            <span class="badge badge-info">{{ $item->title }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @can('role_edit')
                                            <a href="{{route('roles.edit',[$role->id])}}">
                                                <i class="fa fa-edit"></i>
                                                Sửa
                                            </a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('role_delete')
                                            <a href="{{route('roles.destroy',[$role['id']])}}"
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

                        {{--                        {{dd($roles)}}--}}
                        </tbody>
                    </table>
                    {{$roles->links()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

