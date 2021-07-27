@extends('layouts.admin')
@section('title') @endsection
@section('content')


    <form class="form" action="{{route('store.admin.settings')}}" method="POST" id="form_settings_store"
          enctype="multipart/form-data">
    @csrf
    <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">


                    <!--begin::Actions-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('get.admin.settings')}}" class="text-muted">
                                {{trans('menu.settings')}}
                            </a>
                        </li>

                    </ul>

                    <!--end::Actions-->
                </div>
                <!--end::Info-->

                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">

                    <button type="submit"
                            class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                        <i class="fa fa-save"></i>
                        {{trans('general.save')}}
                    </button>

                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->


        <!--begin::content-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container-fluid ">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0" id="card_settings_store">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">

                                        <div class="row justify-content-center">
                                            <div class="col-xl-9">

                                                <!--begin::body-->
                                                <div class="my-5">

                                                    <div class="card my-2">
                                                        <div class="card-body p-5">
                                                            <h3>{{trans('settings.logo_and_icon')}} </h3>
                                                            <hr/>
                                                            <br/>
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 col-form-label text-left">{{trans('settings.site_icon')}}</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="image-input image-input-outline"
                                                                        id="kt_site_icon">
                                                                        <div class="image-input-wrapper"
                                                                             style="background-image: url({{asset(Storage::url(setting()->site_icon))}});"></div>
                                                                        <label
                                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                            data-action="change" data-toggle="tooltip"
                                                                            title=""
                                                                            data-original-title="{{trans('general.change_image')}}">
                                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                                            <input type="file" name="site_icon"
                                                                                   id="site_icon"/>
                                                                            <input type="hidden"
                                                                                   name="site_site_remove"/>
                                                                        </label>

                                                                        <span
                                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                            data-action="cancel" data-toggle="tooltip"
                                                                            title="Cancel avatar">
                                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                 </span>
                                                                    </div>
                                                                    <span
                                                                        class="form-text text-muted">{{trans('general.image_format_allow')}}</span>
                                                                    <span class="form-text text-danger"
                                                                          id="site_icon_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--begin::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 col-form-label text-left">{{trans('settings.site_logo')}}</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="image-input image-input-outline "
                                                                        id="kt_site_logo">
                                                                        <div class="image-input-wrapper"
                                                                             style="background-image: url({{asset(Storage::url(setting()->site_logo))}})"></div>
                                                                        <label
                                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                            data-action="change" data-toggle="tooltip"
                                                                            title=""
                                                                            data-original-title="{{trans('general.change_image')}}">
                                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                                            <input type="file" name="site_logo"
                                                                                   id="site_logo"/>
                                                                            <input type="hidden"
                                                                                   name="site_logo_remove"/>
                                                                        </label>

                                                                        <span
                                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                            data-action="cancel" data-toggle="tooltip"
                                                                            title="Cancel avatar">
                                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                 </span>
                                                                    </div>
                                                                    <span class="form-text text-muted">
                                                                {{trans('general.image_format_allow')}}
                                                              <span class="form-text text-danger"
                                                                    id="site_logo_error"></span>
                                                            </span>
                                                                </div>

                                                            </div>
                                                            <!--begin::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_name_ar')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="site_name_ar" id="site_name_ar"
                                                                        type="text"
                                                                        placeholder=" {{trans('settings.enter_site_name_ar')}}"
                                                                        autocomplete="off"
                                                                        value="{{ setting()->site_name_ar}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="site_name_ar_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_name_en')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="site_name_en" id="site_name_en"
                                                                        type="text"
                                                                        placeholder=" {{trans('settings.enter_site_name_en')}}"
                                                                        autocomplete="off"
                                                                        value="{{setting()->site_name_en}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="site_name_en_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                    </div>
                                                    <br/>


                                                    <div class="card my-2">
                                                        <div class="card-body p-5">
                                                            <h3>{{trans('settings.contact_us')}} </h3>
                                                            <hr/>
                                                            <br/>
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_email')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="site_email" id="site_email" type="text"
                                                                        placeholder=" {{trans('settings.enter_site_email')}}"
                                                                        autocomplete="off"
                                                                        value="{{ setting()->site_email}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="site_email_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_gmail')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="site_gmail" id="site_gmail" type="text"
                                                                        placeholder=" {{trans('settings.enter_site_gmail')}}"
                                                                        autocomplete="off"
                                                                        value="{{ setting()->site_gmail}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="site_gmail_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->


                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_facebook')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="site_facebook" id="site_facebook"
                                                                        type="text"
                                                                        placeholder=" {{trans('settings.enter_site_facebook')}}"
                                                                        autocomplete="off"
                                                                        value="{{ setting()->site_facebook}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="site_facebook_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_twitter')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="site_twitter" id="site_twitter"
                                                                        type="text"
                                                                        placeholder=" {{trans('settings.enter_site_twitter')}}"
                                                                        autocomplete="off"
                                                                        value="{{ setting()->site_twitter}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="site_twitter_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_youtube')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="site_youtube" id="site_youtube"
                                                                        type="text"
                                                                        placeholder=" {{trans('settings.enter_site_youtube')}}"
                                                                        autocomplete="off"
                                                                        value="{{ setting()->site_youtube}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="site_youtube_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->


                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_instagram')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="site_instagram" id="site_instagram"
                                                                        type="text"
                                                                        placeholder=" {{trans('settings.enter_site_instagram')}}"
                                                                        autocomplete="off"
                                                                        value="{{ setting()->site_instagram}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="site_instagram_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->


                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_linkedin')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="site_linkedin" id="site_linkedin"
                                                                        type="text"
                                                                        placeholder=" {{trans('settings.enter_site_linkedin')}}"
                                                                        autocomplete="off"
                                                                        value="{{ setting()->site_linkedin}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="site_linkedin_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->


                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_phone')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="site_phone" id="site_phone" type="text"
                                                                        placeholder=" {{trans('settings.enter_site_phone')}}"
                                                                        autocomplete="off"
                                                                        value="{{ setting()->site_phone}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="site_phone_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->


                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_mobile')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="site_mobile" id="site_mobile" type="text"
                                                                        placeholder=" {{trans('settings.enter_site_mobile')}}"
                                                                        autocomplete="off"
                                                                        value="{{ setting()->site_mobile}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="site_mobile_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_address_ar')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                            <textarea
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="site_address_ar" id="site_address_ar" type="text"
                                                                placeholder=" {{trans('settings.enter_site_address_ar')}}"
                                                                autocomplete="off">{{ setting()->site_address_ar}}</textarea>

                                                                    <span class="form-text text-danger"
                                                                          id="site_address_ar_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_address_en')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                            <textarea
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="site_address_en" id="site_address_en" type="text"
                                                                placeholder=" {{trans('settings.enter_site_address_en')}}"
                                                                autocomplete="off">{{ setting()->site_address_en}}</textarea>

                                                                    <span class="form-text text-danger"
                                                                          id="site_address_en_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                        </div>
                                                    </div>
                                                    <br/>

                                                    <div class="card my-2">
                                                        <div class="card-body p-5">
                                                            <h3>{{trans('settings.settings_section')}} </h3>
                                                            <hr/>
                                                            <br/>

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_language')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <select name="site_language" id="site_language"
                                                                            class="form-control form-control-solid form-control-lg">
                                                                        <option
                                                                            value="">{{trans('general.select_from_list')}}</option>
                                                                        <option
                                                                            value="ar" {{setting()->site_language == 'ar' ? 'selected' :''}}>{{trans('general.ar')}}</option>
                                                                        <option
                                                                            value="en" {{setting()->site_language == 'en' ? 'selected' :''}}>{{trans('general.en')}}</option>

                                                                    </select>
                                                                    <span class="form-text text-danger"
                                                                          id="site_language_error"></span>
                                                                </div>

                                                            </div>
                                                            <!--end::Group-->


                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_status')}}
                                                                </label>

                                                                <div class="col-lg-9 col-xl-9 radio-inline">
                                                                    <label class="radio radio-solid">
                                                                        <input type="radio" name="site_status"
                                                                               id="site_status"
                                                                               {{setting()->site_status == 1 ? 'checked':''}}
                                                                               value="1">
                                                                        <span></span>
                                                                        {{trans('general.open')}}
                                                                    </label>
                                                                    <label class="radio radio-solid">
                                                                        <input type="radio" name="site_status"
                                                                               id="site_status"
                                                                               {{setting()->site_status == 0 ? 'checked':''}}
                                                                               value="0">
                                                                        <span></span>
                                                                        {{trans('general.close')}}
                                                                    </label>
                                                                </div>

                                                                <span class="form-text text-danger"
                                                                      id="site_status_error"></span>
                                                            </div>
                                                            <!--end::Group-->


                                                        </div>
                                                    </div>
                                                    <br/>

                                                    <div class="card my-2">
                                                        <div class="card-body p-5">
                                                            <h3>{{trans('settings.seo_section')}} </h3>
                                                            <hr/>
                                                            <br/>
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_description_ar')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                            <textarea
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="site_description_ar" id="site_description_ar"
                                                                type="text"
                                                                placeholder=" {{trans('settings.enter_site_description_ar')}}"
                                                                autocomplete="off">{{ setting()->site_description_ar}}</textarea>

                                                                    <span class="form-text text-danger"
                                                                          id="site_description_ar_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->


                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_description_en')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                            <textarea
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="site_description_en" id="site_description_en"
                                                                type="text"
                                                                placeholder=" {{trans('settings.enter_site_description_en')}}"
                                                                autocomplete="off">{{ setting()->site_description_en}}</textarea>

                                                                    <span class="form-text text-danger"
                                                                          id="site_description_en_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->


                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_keywords_ar')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                            <textarea
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="site_keywords_ar" id="site_keywords_ar"
                                                                type="text"
                                                                placeholder=" {{trans('settings.enter_site_keywords_ar')}}"
                                                                autocomplete="off">{{ setting()->site_keywords_ar}}</textarea>

                                                                    <span class="form-text text-danger"
                                                                          id="site_keywords_ar_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->


                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.site_keywords_en')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                            <textarea
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="site_keywords_en" id="site_keywords_en"
                                                                type="text"
                                                                placeholder=" {{trans('settings.enter_site_keywords_en')}}"
                                                                autocomplete="off">{{ setting()->site_keywords_en}}</textarea>

                                                                    <span class="form-text text-danger"
                                                                          id="site_keywords_en_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->


                                                        </div>
                                                    </div>
                                                    <br/>
                                                </div>
                                                <!--begin::body-->


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>

            </div>
        </div>
        <!--end::content-->

    </form>
@endsection

@push('js')


    <script type="text/javascript">
        var site_icon = new KTImageInput('kt_site_icon');
        var site_logo = new KTImageInput('kt_site_logo');

        $('#form_settings_store').on('submit', function (e) {
            e.preventDefault();

            ///////////////////////////////////////////////////////////////////////////
            $('#site_name_ar_error').text('')
            $('#site_name_en_error').text('')
            $('#site_email_error').text('')
            $('#site_gmail_error').text('')
            $('#site_facebook_error').text('')
            $('#site_twitter_error').text('')
            $('#site_youtube_error').text('')
            $('#site_instagram_error').text('')
            $('#site_linkedin_error').text('')
            $('#site_phone_error').text('')
            $('#site_mobile_error').text('')
            $('#site_status_error').text('')
            $('#site_language_error').text('')
            $('#site_description_ar_error').text('')
            $('#site_description_en_error').text('')
            $('#site_keywords_ar_error').text('')
            $('#site_keywords_en_error').text('')
            $('#site_address_ar_error').text('')
            $('#site_address_en_error').text('')
            $('#site_icon_error').text('')
            $('#site_logo_error').text('')


            $('#site_name_ar').css('border-color', '');
            $('#site_name_en').css('border-color', '');
            $('#site_email').css('border-color', '');
            $('#site_gmail').css('border-color', '');
            $('#site_facebook').css('border-color', '');
            $('#site_twitter').css('border-color', '');
            $('#site_youtube').css('border-color', '');
            $('#site_instagram').css('border-color', '');
            $('#site_linkedin').css('border-color', '');
            $('#site_phone').css('border-color', '');
            $('#site_mobile').css('border-color', '');
            $('#site_status').css('border-color', '');
            $('#site_language').css('border-color', '');
            $('#site_description_ar').css('border-color', '');
            $('#site_description_en').css('border-color', '');
            $('#site_keywords_ar').css('border-color', '');
            $('#site_keywords_en').css('border-color', '');
            $('#site_address_ar').css('border-color', '');
            $('#site_address_en').css('border-color', '');
            $('#site_icon').css('border-color', '');
            $('#site_logo').css('border-color', '');
            ///////////////////////////////////////////////////////////////////////////

            var data = new FormData(this);
            var url = $(this).attr('action');
            var type = $(this).attr('method');

            $.ajax({
                url: url,
                data: data,
                dataType: 'json',
                type: type,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                },// end beforeSend

                success: function (data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {confirmButton: 'update_settings_button'}
                        });
                        $('.update_settings_button').click(function () {
                            $('html, body').animate({scrollTop: 5}, 300);
                        });
                    }

                },// end success

                error: function (reject) {
                    KTApp.unblockPage();
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key).css('border-color', '#F64E60');
                        $('#' + key + '_error').text(value[0]);
                        $('html, body').animate({scrollTop: 5}, 300);
                    });//end each


                },// end error
                complete: function () {
                    KTApp.unblockPage();
                },// end complete

            });//end ajax
        });//end submit
    </script>
@endpush
