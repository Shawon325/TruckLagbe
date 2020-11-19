<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    <title>Login</title>
    @include('Backend.layouts.backend_css')
    @include('Backend.layouts.backend_js')
</head>

<body class="full-width page-condensed">



<div class="login-wrapper">
        <div class="popup-header" style="margin-top: -60px;">
            <a href="{{route('register')}}" class="pull-left"><i class="icon-user-plus"></i></a>
            <span class="text-semibold">User Login</span>
        </div>
        
        
        <div class="well">
            <div class="mt-5">
                <p>Email: <span>shawon@gmail.com</span></p>
                <p>Pass: <span>ssssssss</span></p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group has-feedback">
                    <label for="name">E-Mail</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group has-feedback">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>





                <div class="row form-actions">
                    <div class="col-xs-6">
                       <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>

                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-warning ">Login</button>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <a class="btn btn-link" href="{{route('register')}}">Create an account</a>
                </div>
            </form>
        </div>
</div>

</body>
</html>
