<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{trans('login.login')}}</title>
    <link rel="shortcut icon" href="{{asset(\Illuminate\Support\Facades\Storage::url(setting()->site_icon))}}"/>

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('adminBoard/adminLogin/assets/css/materialdesignicons.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('adminBoard/adminLogin/assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('adminBoard/adminLogin/assets/css/login.css') !!}">
</head>
<body>
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">


                <div class="col-md-7">
                    <img src="{{asset('adminBoard/adminLogin/assets/images/login1.jpg')}}" alt="login"
                         class="login-card-img">
                </div>

                <div class="col-md-5" style="text-align: center">
                    <div class="card-body" dir="{!!LaravelLocalization::getCurrentLocale() =='ar'?'rtl':'ltr'!!}">
                        <div class="brand-wrapper">
                            @if(!empty(setting()->site_logo))
                                <a href="#" class="brand-logo" style="margin-top: 10px">
                                    <img src="{{asset(Storage::url(setting()->site_logo))}}" width="100" height="90">
                                </a>
                            @else
                                <img src="{!! asset('adminBoard/adminLogin/assets/images/logo.svg') !!}" alt="logo"
                                     class="logo">
                            @endif

                        </div>
                        <div class="clearfix"></div>

                        <form class="form" id="kt_login_singin_form" action="{{route('admin.login')}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            @if(\Illuminate\Support\Facades\Session::has('error'))
                                <div class="alert alert-danger font-size-h2 font-weight-bold" role="alert">
                                    {{\Illuminate\Support\Facades\Session::get('error')}}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="email" class="sr-only">{!! trans('login.email') !!}</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="{!! trans('login.enter_email') !!}">
                                @error('email')
                                <span class="text-danger error_msg"
                                      style="float: {!!LaravelLocalization::getCurrentLocale() =='ar' ? 'right': 'left'!!}">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">{!! trans('login.password') !!}</label>
                                <input type="password" name="password" id="password" class="form-control"
                                       placeholder="***********">
                                @error('password')
                                <span class="text-danger error_msg">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="clearfix"></div>
                            <div class="form-group mb-4"
                                 style="float: {!!LaravelLocalization::getCurrentLocale() =='ar' ? 'right': 'left'!!}">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline m-0 text-muted">
                                        <input type="checkbox" name="rememberMe" id="rememberMe">
                                        <span></span>
                                        {{trans('login.remember_me')}}
                                    </label>
                                </div>
                            </div>

                            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit"
                                   value="{{trans('login.login')}}">
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</main>
<script src="{!! asset('adminBoard/adminLogin/assets/js/jquery-3.4.1.min.js')!!}"></script>
<script src="{!! asset('adminBoard/adminLogin/assets/js/popper.min.js')!!}"></script>
<script src="{!! asset('adminBoard/adminLogin/assets/js/bootstrap.min.js')!!}"></script>
</body>
</html>
