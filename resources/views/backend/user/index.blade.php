@extends('backend.master')
@section('title', 'Danh Sách User')
@section('content.header', 'User')
@section('content.links.before', route('users.index'))
@section('content.before', 'User')
@section('content.after', 'Danh Sách')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh Sách User : {{$users ? $users->count() : 0}}</h3>
                    <div class="card-tools">
                        @can('user_create')
                            <div class="input-group input-group-sm" style="align:right">
                                <a href="{{route('users.create') }}" class="btn btn-primary">Thêm User</a>
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
                            <th>Email</th>
                            <th>Role</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users->count() != null)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user['id']}}</td>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>
                                        @foreach($user->roles as $key => $item)
                                            <span class="badge badge-info">{{ $item->title }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @can('user_edit')
                                            <a href="{{route('users.edit',[$user->id])}}">
                                                <i class="fa fa-edit"></i>
                                                Sửa
                                            </a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('user_delete')
                                            <a href="{{route('users.destroy',[$user['id']])}}"
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
                    {{$users->links()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

