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
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Bảng Điều Khiển</p>
                    </a>
                </li>
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
                        <i class="nav-icon fas fa-th"></i>
                        <p>Trường Đại Học Hàn</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('category.index')}}" class="nav-link
                        @if (
                            Route::currentRouteName() == 'category.index' ||
                            Route::currentRouteName() ==  'category.create' ||
                            Route::currentRouteName() ==  'category.edit' )
                    {{'active'}}
                    @endif
                        ">
                        <i class="nav-icon fas fa-copy"></i>
                        <p> Loại Tin</p>
                    </a>
                </li>
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
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Tin Tức</p>
                    </a>
                </li>
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
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>Học Viên</p>
                    </a>
                </li>
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
                        <i class="nav-icon fas fa-images"></i>
                        <p>Banner</p>
                    </a>
                </li>
{{--                <li class="nav-item has-treeview">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon far fa-plus-square"></i>--}}
{{--                        <p>Cài đặt--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Tài khoản</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Favicon</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Footer</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a href="{{route('auth.logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Đăng Xuất</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
