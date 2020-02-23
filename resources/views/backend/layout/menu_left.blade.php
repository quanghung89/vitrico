<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">ADMIN-VITRICO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('dashboard.index')}}" class="nav-link
                        @if (Route::currentRouteName() == 'dashboard.index')
                    {{'active'}}
                    @endif
                        ">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>Bảng Điều Khiển</p>
                    </a>
                </li>
                @can('university_view')
                    <li class="nav-item">
                        <a href="{{route('university.index')}}"
                           class="nav-link
                                @if (
                                     Route::currentRouteName() == 'university.index' ||
                                     Route::currentRouteName() ==  'university.create' ||
                                     Route::currentRouteName() ==  'university.edit')
                           {{'active'}}
                           @endif
                               ">
                            <i class="nav-icon fa fa-th"></i>
                            <p>Trường Đại Học Hàn</p>
                        </a>
                    </li>
                @endcan

                @can('category_view')
                <li class="nav-item has-treeview">
                    <a href="{{route('category.index')}}" class="nav-link
                        @if (
                            Route::currentRouteName() == 'category.index' ||
                            Route::currentRouteName() ==  'category.create' ||
                            Route::currentRouteName() ==  'category.edit' )
                    {{'active'}}
                    @endif
                        ">
                        <i class="nav-icon fa fa-copy"></i>
                        <p> Loại Tin</p>
                    </a>
                </li>
                @endcan

                @can('new_view')
                <li class="nav-item has-treeview">
                    <a href="{{route('news.index')}}"
                       class="nav-link
                            @if (
                                Route::currentRouteName() == 'news.index'||
                                Route::currentRouteName() == 'news.create'||
                                Route::currentRouteName() == 'news.edit'
                            )
                       {{'active'}}
                       @endif
                           ">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>Tin Tức</p>
                    </a>
                </li>
                @endcan

                @can('student_view')
                <li class="nav-item has-treeview">
                    <a href="{{route('account.index')}}"
                       class="nav-link
                            @if (
                                Route::currentRouteName() == 'account.index'||
                                Route::currentRouteName() == 'account.create'||
                                Route::currentRouteName() == 'account.edit'
                            )
                       {{'active'}}
                       @endif
                           ">
                        <i class="nav-icon fa fa-address-book"></i>
                        <p>Học Viên</p>
                    </a>
                </li>
                @endcan

                @can('banner_view')
                <li class="nav-item has-treeview">
                    <a href="{{route('slide.index')}}"
                       class="nav-link
                            @if (
                                Route::currentRouteName() == 'slide.index'||
                                Route::currentRouteName() == 'slide.create'||
                                Route::currentRouteName() == 'slide.edit'
                            )
                       {{'active'}}
                       @endif
                           ">
                        <i class="nav-icon fa fa-images"></i>
                        <p>Banner</p>
                    </a>
                </li>
                @endcan

                @can('permission_view')
                <li class="nav-item has-treeview">
                    <a href="{{route('permissions.index')}}"
                       class="nav-link
                            @if (
                                Route::currentRouteName() == 'permissions.index'||
                                Route::currentRouteName() == 'permissions.create'||
                                Route::currentRouteName() == 'permissions.edit'
                            )
                       {{'active'}}
                       @endif
                           ">
                        <i class="nav-icon fa fa-drum-steelpan"></i>
                        <p>Permission</p>
                    </a>
                </li>
                @endcan

                @can('role_view')
                <li class="nav-item has-treeview">
                    <a href="{{route('roles.index')}}"
                       class="nav-link
                            @if (
                                Route::currentRouteName() == 'roles.index'||
                                Route::currentRouteName() == 'roles.create'||
                                Route::currentRouteName() == 'roles.edit'
                            )
                       {{'active'}}
                       @endif
                           ">
                        <i class="nav-icon fas fa-dice-d20"></i>
                        <p>Role</p>
                    </a>
                </li>
                @endcan

                @can('user_view')
                <li class="nav-item has-treeview">
                    <a href="{{route('users.index')}}"
                       class="nav-link
                            @if (
                                Route::currentRouteName() == 'users.index'||
                                Route::currentRouteName() == 'users.create'||
                                Route::currentRouteName() == 'users.edit'
                            )
                       {{'active'}}
                       @endif
                           ">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>

                @endcan

{{--                @can('setting_view')--}}
{{--                <li class="nav-item has-treeview">--}}
{{--                    <a href="{{route('settings.index')}}"--}}
{{--                       class="nav-link--}}
{{--                            @if (--}}
{{--                                Route::currentRouteName() == 'settings.index'||--}}
{{--                                Route::currentRouteName() == 'settings.create'||--}}
{{--                                Route::currentRouteName() == 'settings.edit'--}}
{{--                            )--}}
{{--                       {{'active'}}--}}
{{--                       @endif--}}
{{--                           ">--}}
{{--                        <i class="nav-icon fa fa-cogs"></i>--}}
{{--                        <p>Cài đặt</p>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                @endcan--}}
                <li class="nav-item">
                    <a href="{{route('auth.logout')}}" class="nav-link">
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p>Đăng Xuất</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
