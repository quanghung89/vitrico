<!DOCTYPE html>
<html lang="en">
<head>
    <title>Du Học Vitrico</title>
    @include('login.header_login')
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: {{asset('/login/images/bg-01.jpg')}}">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <form action="" class="login100-form validate-form" method="post">
                {{ csrf_field() }}
					<span class="login100-form-title p-b-49" style="font-family: 'Helvetica Neue', sans-serif">
						{{trans("Đăng Nhập Admin")}}
					</span>
                @if (session('status'))
                    <ul>
                        <li class="text-danger"> {{ session('status') }}</li>
                    </ul>
                @endif
                <div class="wrap-input100 m-b-23" data-validate = "Hãy nhập Email ">
                    <span class="label-input100">Email :</span>
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>
                <p style="color: red">{{ $errors->first('email') }}</p>
                <div class="wrap-input100 " data-validate="Hãy nhập mật khẩu">
                    <span class="label-input100">Mật khẩu :</span>
                    <input class="input100" type="password" name="password" placeholder="Mật khẩu">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>
                <p style="color: red">{{ $errors->first('password') }}</p>
                <div class="text-right p-t-8 p-b-31">
                    <a href="#">
                        Quên mật khẩu ?
                    </a>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">
                            Đăng Nhập
                        </button>
                    </div>
                </div>

                <div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Tạo Tài Khoản
						</span>
                </div>

                <div class="flex-c-m">
                    <a href="#" class="login100-social-item bg1">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="login100-social-item bg2">
                        <i class="fa fa-twitter"></i>
                    </a>

                    <a href="#" class="login100-social-item bg3">
                        <i class="fa fa-google"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="dropDownSelect1"></div>
@include('login.footer')
</body>
</html>
