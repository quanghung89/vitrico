<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{asset('/')}}" class="nav-link">Trang Chủ</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Liên Hệ</a>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                Tài Khoản  <i class="far fa-user"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="user-panel mt-1 pb-1 mb-1 ">
                    <!-- Message Start -->

                    <div class="image">
                        <img src="{{asset('backend/images/user/')}}/{{\Illuminate\Support\Facades\Auth::user()->image}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                    </div>
                    <!-- Message End -->
                </div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer"><i class="fas fa-angle-left right"></i>Cài đặt </a>
                <div class="dropdown-divider"></div>
                <a href="{{route('auth.logout')}}" class="dropdown-item dropdown-footer"><i class="far fa-user"></i>Đăng Xuất</a>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i--}}
{{--                    class="fas fa-th-large"></i></a>--}}
{{--        </li>--}}
    </ul>
</nav>
