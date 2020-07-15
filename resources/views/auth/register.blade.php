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


<div class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-right">
            <span class="sr-only">Toggle navbar</span>
            <i class="icon-grid3"></i>
        </button>
{{--        <a class="navbar-brand" href="#"><img src="images/logo.png" alt="Londinium"></a>--}}
    </div>
</div>


<div class="login-wrapper">
        <div class="popup-header" style="margin-top: -60px;">
            <a href="#" class="pull-left"><i class="icon-user-plus"></i></a>
            <span class="text-semibold">User Register</span>
            <div class="btn-group pull-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></a>
                <ul class="dropdown-menu icons-right dropdown-menu-right">
                    <li><a href="#"><i class="icon-people"></i> Change user</a></li>
                    <li><a href="#"><i class="icon-info"></i> Forgot password?</a></li>
                    <li><a href="#"><i class="icon-support"></i> Contact admin</a></li>
                    <li><a href="#"><i class="icon-wrench"></i> Settings</a></li>
                </ul>
            </div>
        </div>
        <div class="well">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group has-feedback">
                    <label for="name">Username</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Username" autofocus>
                    <i class="icon-users form-control-feedback"></i>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="form-group has-feedback">
                    <label for="type">Type</label>
                    <select class="form-control @error('type') is-invalid @enderror" name="type">
                        <option value="" selected hidden>SELECT ONE</option>
                        <option value="1">USER</option>
                        <option value="2">TRUCK USER</option>
                    </select>
                    <i class="icon-tag form-control-feedback"></i>
                </div>

                <div class="form-group has-feedback">
                    <label for="email">Email</label>
                    <input placeholder="Username" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <i class="icon-mail3 form-control-feedback"></i>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group has-feedback">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    <i class="icon-lock form-control-feedback"></i>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group has-feedback">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password">
                    <i class="icon-lock form-control-feedback"></i>
                </div>

                <div class="row form-actions">
                    <div class="col-xs-6"></div>

                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-warning pull-right"><i class="icon-menu2"></i> Register</button>
                    </div>
                </div>
            </form>
        </div>
</div>
</body>
</html>
