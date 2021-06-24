@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{{route('store.website.main.page')}}" method="POST"
          id="form_website_main_page_store"
          enctype="multipart/form-data">
    @csrf
    <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div
                class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">

                    <!--begin::Actions-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{trans('menu.home')}}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{trans('menu.website_main_page')}}
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
                                                            <h3>{{trans('settings.counter_one')}} </h3>
                                                            <hr/>
                                                            <br/>
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 col-form-label text-left">
                                                                    {{trans('settings.icon')}}</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="image-input image-input-outline"
                                                                        id="kt_counter_one_icon">
                                                                        <div class="image-input-wrapper"
                                                                             style="background-image: url({{asset(Storage::url(websiteMainPage()->counter_one_icon))}});"
                                                                        ></div>
                                                                        <label
                                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                            data-action="change" data-toggle="tooltip"
                                                                            title=""
                                                                            data-original-title="{{trans('general.change_image')}}">
                                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                                            <input type="file" name="counter_one_icon"
                                                                                   id="counter_one_icon"/>
                                                                            <input type="hidden"
                                                                                   name="counter_one_icon_remove"/>
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
                                                                          id="counter_one_icon_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--begin::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.text_ar')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="counter_one_text_ar"
                                                                        id="counter_one_text_ar" type="text"
                                                                        placeholder=" {{trans('settings.enter_text_ar')}}"
                                                                        autocomplete="off"
                                                                        value="{{ websiteMainPage()->counter_one_text_ar}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="counter_one_text_ar_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.text_en')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="counter_one_text_en"
                                                                        id="counter_one_text_en" type="text"
                                                                        placeholder=" {{trans('settings.enter_text_en')}}"
                                                                        autocomplete="off"
                                                                        value="{{ websiteMainPage()->counter_one_text_en}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="counter_one_text_en_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.number')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="counter_one_number"
                                                                        id="counter_one_number" type="text"
                                                                        placeholder=" {{trans('settings.enter_number')}}"
                                                                        autocomplete="off"
                                                                        value="{{websiteMainPage()->counter_one_number}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="counter_one_number_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                    </div>


                                                    <div class="card my-2">
                                                        <div class="card-body p-5">
                                                            <h3>{{trans('settings.counter_tow')}} </h3>
                                                            <hr/>
                                                            <br/>
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 col-form-label text-left">
                                                                    {{trans('settings.icon')}}</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="image-input image-input-outline"
                                                                        id="kt_counter_tow_icon">
                                                                        <div class="image-input-wrapper"
                                                                             style="background-image: url({{asset(Storage::url(websiteMainPage()->counter_tow_icon))}});"></div>
                                                                        <label
                                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                            data-action="change" data-toggle="tooltip"
                                                                            title=""
                                                                            data-original-title="{{trans('general.change_image')}}">
                                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                                            <input type="file" name="counter_tow_icon"
                                                                                   id="counter_tow_icon"/>
                                                                            <input type="hidden"
                                                                                   name="counter_tow_icon_remove"/>
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
                                                                          id="counter_tow_icon_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--begin::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.text_ar')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="counter_tow_text_ar"
                                                                        id="counter_tow_text_ar" type="text"
                                                                        placeholder=" {{trans('settings.enter_text_ar')}}"
                                                                        autocomplete="off"
                                                                        value="{{ websiteMainPage()->counter_tow_text_ar}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="counter_tow_text_ar_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.text_en')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="counter_tow_text_en"
                                                                        id="counter_tow_text_en" type="text"
                                                                        placeholder=" {{trans('settings.enter_text_en')}}"
                                                                        autocomplete="off"
                                                                        value="{{ websiteMainPage()->counter_tow_text_en}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="counter_tow_text_en_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.number')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="counter_tow_number"
                                                                        id="counter_tow_number" type="text"
                                                                        placeholder=" {{trans('settings.enter_number')}}"
                                                                        autocomplete="off"
                                                                        value="{{websiteMainPage()->counter_tow_number}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="counter_tow_number_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                    </div>


                                                    <div class="card my-2">
                                                        <div class="card-body p-5">
                                                            <h3>{{trans('settings.counter_three')}} </h3>
                                                            <hr/>
                                                            <br/>
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 col-form-label text-left">
                                                                    {{trans('settings.icon')}}</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="image-input image-input-outline"
                                                                        id="kt_counter_three_icon">
                                                                        <div class="image-input-wrapper"
                                                                             style="background-image: url({{asset(Storage::url(websiteMainPage()->counter_three_icon))}});"></div>
                                                                        <label
                                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                            data-action="change" data-toggle="tooltip"
                                                                            title=""
                                                                            data-original-title="{{trans('general.change_image')}}">
                                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                                            <input type="file" name="counter_three_icon"
                                                                                   id="counter_three_icon"/>
                                                                            <input type="hidden"
                                                                                   name="counter_three_icon_remove"/>
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
                                                                          id="counter_three_icon_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--begin::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.text_ar')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="counter_three_text_ar"
                                                                        id="counter_three_text_ar" type="text"
                                                                        placeholder=" {{trans('settings.enter_text_ar')}}"
                                                                        autocomplete="off"
                                                                        value="{{ websiteMainPage()->counter_three_text_ar}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="counter_three_text_ar_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.text_en')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="counter_three_text_en"
                                                                        id="counter_three_text_en" type="text"
                                                                        placeholder=" {{trans('settings.enter_text_en')}}"
                                                                        autocomplete="off"
                                                                        value="{{ websiteMainPage()->counter_three_text_en}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="counter_three_text_en_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.number')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="counter_three_number"
                                                                        id="counter_three_number" type="text"
                                                                        placeholder=" {{trans('settings.enter_number')}}"
                                                                        autocomplete="off"
                                                                        value="{{websiteMainPage()->counter_three_number}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="counter_three_number_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                    </div>


                                                    <div class="card my-2">
                                                        <div class="card-body p-5">
                                                            <h3>{{trans('settings.counter_four')}} </h3>
                                                            <hr/>
                                                            <br/>
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-xl-3 col-lg-3 col-form-label text-left">
                                                                    {{trans('settings.icon')}}</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div
                                                                        class="image-input image-input-outline"
                                                                        id="kt_counter_four_icon">
                                                                        <div class="image-input-wrapper"
                                                                             style="background-image: url({{asset(Storage::url(websiteMainPage()->counter_four_icon))}});"></div>
                                                                        <label
                                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                            data-action="change" data-toggle="tooltip"
                                                                            title=""
                                                                            data-original-title="{{trans('general.change_image')}}">
                                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                                            <input type="file" name="counter_four_icon"
                                                                                   id="counter_four_icon"/>
                                                                            <input type="hidden"
                                                                                   name="counter_four_icon_remove"/>
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
                                                                          id="counter_four_icon_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--begin::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.text_ar')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="counter_four_text_ar"
                                                                        id="counter_four_text_ar" type="text"
                                                                        placeholder=" {{trans('settings.enter_text_ar')}}"
                                                                        autocomplete="off"
                                                                        value="{{ websiteMainPage()->counter_four_text_ar}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="counter_four_text_ar_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->

                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.text_en')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="counter_four_text_en"
                                                                        id="counter_four_text_en" type="text"
                                                                        placeholder=" {{trans('settings.enter_text_en')}}"
                                                                        autocomplete="off"
                                                                        value="{{ websiteMainPage()->counter_four_text_en}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="counter_four_text_en_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->


                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('settings.number')}}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control form-control-solid form-control-lg"
                                                                        name="counter_four_number"
                                                                        id="counter_four_number" type="text"
                                                                        placeholder=" {{trans('settings.enter_number')}}"
                                                                        autocomplete="off"
                                                                        value="{{websiteMainPage()->counter_four_number}}"/>
                                                                    <span class="form-text text-danger"
                                                                          id="counter_four_number_error"></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                    </div>


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

        var counter_one_photo = new KTImageInput('kt_counter_one_icon');
        var conter_tow_photo = new KTImageInput('kt_counter_tow_icon');
        var conter_three_photo = new KTImageInput('kt_counter_three_icon');
        var counter_four_photo = new KTImageInput('kt_counter_four_icon');

        /////////////////////////////////////////////////////////////////////
        // submit
        $('body').on('submit', '#form_website_main_page_store', function (e) {
            e.preventDefault();
            ///////////////////////////////////////////////////////////////////////////
            $('#counter_one_icon_error').text('');
            $('#counter_one_text_ar_error').text('');
            $('#counter_one_text_en_error').text('');
            $('#counter_one_number_error').text('');
            $('#counter_tow_icon_error').text('');
            $('#counter_tow_text_ar_error').text('');
            $('#counter_tow_text_en_error').text('');
            $('#counter_tow_number_error').text('');
            $('#counter_three_icon_error').text('');
            $('#counter_three_text_ar_error').text('');
            $('#counter_three_text_en_error').text('');
            $('#counter_three_number_error').text('');
            $('#counter_four_icon_error').text('');
            $('#counter_four_text_ar_error').text('');
            $('#counter_four_text_en_error').text('');
            $('#counter_four_number_error').text('');


            $('#counter_one_icon').css('border-color', '');
            $('#counter_one_text_ar').css('border-color', '');
            $('#counter_one_text_en').css('border-color', '');
            $('#counter_one_number').css('border-color', '');
            $('#counter_tow_icon').css('border-color', '');
            $('#counter_tow_text_ar').css('border-color', '');
            $('#counter_tow_text_en').css('border-color', '');
            $('#counter_tow_number').css('border-color', '');
            $('#counter_three_icon').css('border-color', '');
            $('#counter_three_text_ar').css('border-color', '');
            $('#counter_three_text_en').css('border-color', '');
            $('#counter_three_number').css('border-color', '');
            $('#counter_four_icon').css('border-color', '');
            $('#counter_four_text_ar').css('border-color', '');
            $('#counter_four_text_en').css('border-color', '');
            $('#counter_four_number').css('border-color', '');
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
                    setTimeout(function () {
                        KTApp.unblockPage();
                    }, 1500);
                },// end beforeSend

                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        $.notifyClose();
                        notifySuccessOrError(data.msg, 'success');
                        setTimeout(function () {
                            window.location.href = "{!! route('website.main.page') !!}"
                        }, 2000)
                    }
                },// end success

                error: function (reject) {
                    KTApp.unblockPage();

                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key).css('border-color', '#F64E60');
                        $('#' + key + '_error').text(value[0]);
                    });//end each

                },// end error
                complete: function () {
                    KTApp.unblockPage();
                },// end complete

            });//end ajax
        });//end submit
    </script>
@endpush
