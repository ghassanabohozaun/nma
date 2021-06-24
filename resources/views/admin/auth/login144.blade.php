@extends('layouts.login')
@section('title')
    {{trans('login.login')}}
@stop
@section('content')
    <!--begin::Login-->
    <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Content-->
        <div
            class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
            <!--begin::Wrapper-->
            <div class="login-content d-flex flex-column pt-lg-0 pt-12">
                <!--begin::Logo-->
                <a href="#" class="login-logo pb-xl-20 pb-15 text-center">
                    @if(!setting()->site_logo)
                        <span style="font-size: 25px;font-weight: bolder">{{trans('login.site_logo')}}</span>

                    @else
                        <span class="text-danger font-weight-bolder" style="font-size: 20px">
                                  <img src="{{(\Illuminate\Support\Facades\Storage::url(setting()->site_logo))}}"
                                       class="img-fluid" width="120" height="100">
                    </span>
                    @endif


                </a>
                <!--end::Logo-->


                @if(\Illuminate\Support\Facades\Session::has('error'))
                    <div class="alert alert-danger font-size-h2 font-weight-bold" role="alert">
                        {{\Illuminate\Support\Facades\Session::get('error')}}
                    </div>
            @endif

            <!--begin::Signin-->
                <div class="login-form">
                    <!--begin::Form-->
                    <form class="form" id="kt_login_singin_form" action="{{route('admin.login')}}" method="POST"
                          enctype="multipart/form-data">
                    @csrf
                    <!--begin::Title-->
                        <div class="pb-5 pb-lg-15">
                            <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg text-center">{{trans('login.login')}}</h3>
                        <!-- <div class="text-muted font-weight-bold font-size-h4">
                                {{--trans('login.new_here')--}}?
                                <a href="#"
                                   class="text-primary font-weight-bolder">{{--trans('login.create_account')--}}</a>
                            </div>-->
                        </div>
                        <!--begin::Title-->


                        <!--begin::Form group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">{{trans('login.email')}}</label>
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0"
                                   type="text" name="email" autocomplete="off"/>
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <!--end::Form group-->

                        <!--begin::Form group-->
                        <div class="form-group">
                            <div class="d-flex justify-content-between mt-n5">
                                <label
                                    class="font-size-h6 font-weight-bolder
                                    text-dark pt-5">{{trans('login.password')}}</label>

                            <!--<a href="#"
                                   class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">
                                    {{--trans('login.forget_password')--}} ?
                                </a>-->

                            </div>
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0"
                                   type="password" name="password" autocomplete="off"/>
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <!--end::Form group-->

                        <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-3">
                            <div class="checkbox-inline">
                                <label class="checkbox checkbox-outline m-0 text-muted">
                                    <input type="checkbox" name="rememberMe" id="rememberMe">
                                    <span></span>
                                    {{trans('login.remember_me')}}
                                </label>
                            </div>
                        </div>

                        <!--begin::Action-->
                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="kt_login_singin_form_submit_button"
                                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                                {{trans('login.login')}}
                            </button>

                        </div>
                        <!--end::Action-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Signin-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--begin::Content-->



        <!--begin::Aside-->
        <div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
            <div class="login-conteiner bgi-no-repeat
             @if( LaravelLocalization::getCurrentLocale() =='ar')
                bgi-position-x-left
                 @else
                bgi-position-x-right
                @endif
                bgi-position-y-bottom"
                 style=" background-image: url('{{asset('adminBoard/images/login/log.svg')}}'); margin-top: -20px">
                <!--begin::Aside title-->

                @if( LaravelLocalization::getCurrentLocale() =='ar')
                    <h5 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-bold display5   text-white">


                        {!! setting()->site_name_ar !!}

                    </h5>

                @else
                    <h5 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-bold display5 display1-lg text-white">
                        {!! setting()->site_name_en !!}
                    </h5>
            @endif
            <!--end::Aside title-->
            </div>
        </div>
        <!--end::Aside-->
    </div>
    <!--end::Login-->
@stop
@push('css')


    <style>
        .login.login-4 .login-aside {
            background: linear-gradient(-147.04deg, #47aede 0.74%, #23648D 99.61%);
            width: 700px;
        }
        .pl-10, .px-10 {
            padding-right: 12rem !important;
        }
        @media (max-width: 767px) {
            .pl-10, .px-10 {
                padding-right: 16rem !important;
            }
        }

    </style>
@endpush
