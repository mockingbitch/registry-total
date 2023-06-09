@php
    use App\Constants\Constant;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{__('register')}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendor/css/main.css')}}">
    <script src="{{asset('js/sweetalert.js')}}"></script>
    <!--===============================================================================================-->
    <style>
        body {
            font-family: "Literata", sans-serif !important;
        }
        .login100-form-title, .input100, .txt2, .text-error {
            font-family: "Literata", sans-serif !important;
        }
        .text-error {
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('backend/vendor/img/6.png')}}" alt="IMG">
            </div>
            <form method="post" class="login100-form validate-form">
                @csrf
					<span class="login100-form-title">
						<h1>{{__('register')}}</h1>
					</span>
                @if ($errors->has('email'))<p class="text-error">* {{$errors->first('name')}}</p>@endif
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="name" placeholder="{{__('name')}}" value="{{Request::old('name')}}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                    </span>
                </div>
                @if ($errors->has('email'))<p class="text-error">* {{$errors->first('email')}}</p>@endif
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="email" name="email" placeholder="{{__('email')}}" value="{{Request::old('email')}}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                @if ($errors->has('email'))<p class="text-error">* {{$errors->first('phone')}}</p>@endif
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="phone" placeholder="{{__('phone')}}" value="{{Request::old('phone')}}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                    </span>
                </div>
                @if ($errors->has('email'))<p class="text-error">* {{$errors->first('password')}}</p>@endif
                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="{{__('password')}}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                @if ($errors->has('email'))<p class="text-error">* {{$errors->first('confirmPassword')}}</p>@endif
                <div class="wrap-input100 validate-input" data-validate = "Confirm password is required">
                    <input class="input100" type="password" name="confirmPassword" placeholder="{{__('confirm_password')}}">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        <i class="fa fa-spinner" id="loader" style="display: none" aria-hidden="true"></i>
                        {{__('register')}}
                    </button>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="{{route('login')}}">
                        {{__('already_have_account')}}
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    @if (Session::has(Constant::MSG_SUCCESS))
        <script>
            swal('{{__('success')}}', '{{__('register_success')}}', "success");
        </script>
    @endif
</div>




<!--===============================================================================================-->
<script src="{{asset('backend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('backend/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('backend/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('backend/vendor/tilt/tilt.jquery.min.js')}}"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="{{asset('backend/vendor/js/main.js')}}"></script>
<script>
    $(function() {
        $( "form" ).submit(function() {
            $('#loader').show();
        });
    });
    </script>
</body>
</html>
