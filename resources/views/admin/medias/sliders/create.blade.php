@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{{route('admin.slider.store')}}" method="POST" id="form_sliders_add">
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
                            <a href="#" class="text-muted">
                                {{trans('menu.media')}}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{route('admin.sliders')}}" class="text-muted">
                                {{trans('menu.sliders')}}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.sliders.create')}}" class="text-muted">
                                {{trans('menu.add_new_slider')}}
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
                        <div class="card card-custom card-shadowless rounded-top-0" id="card_languages_add">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">

                                        <div class="row justify-content-center">
                                            <div class="col-xl-9">

                                                <!--begin::body-->
                                                <div class="my-5">


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('sliders.photo')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div
                                                                class="image-input image-input-outline"
                                                                id="kt_slider_photo">
                                                            <!--  style="background-image: url({{--asset(Storage::url(setting()->site_icon))--}})"-->
                                                                <div class="image-input-wrapper"
                                                                     ></div>
                                                                <label
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="change" data-toggle="tooltip" title=""
                                                                    data-original-title="{{trans('general.change_image')}}">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="photo" id="photo"
                                                                           class="table-responsive-sm">
                                                                    <input type="hidden" name="photo_remove"/>
                                                                </label>

                                                                <span
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="cancel" data-toggle="tooltip"
                                                                    title="Cancel avatar">
                                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                 </span>
                                                            </div>
                                                            <span
                                                                class="form-text text-muted">{{trans('general.image_format_allow')}}
                                                            </span>
                                                            <span
                                                                class="form-text text-info">{{trans('sliders.slider_size')}}
                                                            </span>
                                                            <span class="form-text text-danger"
                                                                  id="photo_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('sliders.language')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <select
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="language" id="language" type="text">

                                                                <option value="ar">
                                                                    {{trans('general.ar')}}
                                                                </option>

                                                                <option value="en">
                                                                    {{trans('general.en')}}
                                                                </option>
                                                                <option value="ar_en">
                                                                    {{trans('general.ar_en')}}
                                                                </option>
                                                            </select>
                                                            <span class="form-text text-danger"
                                                                  id="language_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('sliders.details_status')}}
                                                        </label>
                                                        <div class="col-lg-9 col-md-9" style="margin-top: 10px">
                                                            <div class="form-check pl-0 radio-inline">
                                                                <label class="radio radio-outline">
                                                                    <input type="radio" id="details_status"
                                                                           name="details_status"
                                                                           value="show"/>
                                                                    <span></span>
                                                                    {{trans('sliders.show')}}
                                                                </label>
                                                                <label class="radio radio-outline">
                                                                    <input type="radio" id="details_status"
                                                                           name="details_status" checked
                                                                           value="hide"/>
                                                                    <span></span>
                                                                    {{trans('sliders.hide')}}
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <!--begin::body-->

                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('sliders.button_status')}}
                                                        </label>
                                                        <div class="col-lg-9 col-md-9" style="margin-top: 10px">
                                                            <div class="form-check pl-0 radio-inline">
                                                                <label class="radio radio-outline">
                                                                    <input type="radio" id="button_status"
                                                                           name="button_status"
                                                                           value="show"/>
                                                                    <span></span>
                                                                    {{trans('sliders.show')}}
                                                                </label>
                                                                <label class="radio radio-outline">
                                                                    <input type="radio" id="button_status"
                                                                           name="button_status" checked
                                                                           value="hide"/>
                                                                    <span></span>
                                                                    {{trans('sliders.hide')}}
                                                                </label>

                                                            </div>
                                                        </div>
                                                        <!--begin::body-->

                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="services_treatments_section">
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {{trans('sliders.services')}}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <select
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="service_id"
                                                                    id="service_id">
                                                                    <option
                                                                        value="">{{trans('general.select_from_list')}}</option>


                                                                    @if( LaravelLocalization::getCurrentLocale() =='ar')
                                                                        @foreach(App\Models\Service::where('title_ar' ,'<>',null)->get() as $service)
                                                                            <option
                                                                                value="{{$service->id}}">{{$service->title_ar}}</option>
                                                                        @endforeach
                                                                        @else
                                                                        @foreach(App\Models\Service::where('title_en' ,'<>',null)->get() as $service)
                                                                            <option
                                                                                value="{{$service->id}}">{{$service->title_en}}</option>
                                                                        @endforeach
                                                                    @endif

                                                                </select>
                                                                <span class="form-text text-danger"
                                                                      id="service_id_error"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('sliders.order')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="order" id="order" type="text"
                                                                placeholder=" {{trans('sliders.enter_order')}}"
                                                                autocomplete="off"/>
                                                            <span class="form-text text-muted">
                                                             {{trans('sliders.exist_number')}}
                                                                &nbsp;
                                                                {{App\Models\Slider::select('order')->orderBy('order','desc')->pluck('order')}}

                                                            </span>

                                                            <span class="form-text text-danger" id="order_error"></span>
                                                        </div>

                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('sliders.title_ar')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="title_ar" id="title_ar" type="text"
                                                                placeholder=" {{trans('sliders.enter_title_ar')}}"
                                                                autocomplete="off"/>

                                                            <span class="form-text text-danger"
                                                                  id="title_ar_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('sliders.title_en')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="title_en" id="title_en" type="text"
                                                                placeholder=" {{trans('sliders.enter_title_en')}}"
                                                                autocomplete="off"/>

                                                            <span class="form-text text-danger"
                                                                  id="title_en_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('sliders.details_ar')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="5"
                                                                      class="form-control form-control-solid form-control-lg"
                                                                      name="details_ar" id="details_ar" type="text"
                                                                      placeholder=" {{trans('sliders.enter_details_ar')}}"
                                                                      autocomplete="off"></textarea>

                                                            <span class="form-text text-danger"
                                                                  id="details_ar_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('sliders.details_en')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="5"
                                                                      class="form-control form-control-solid form-control-lg"
                                                                      name="details_en" id="details_en" type="text"
                                                                      placeholder=" {{trans('sliders.enter_details_en')}}"
                                                                      autocomplete="off"></textarea>

                                                            <span class="form-text text-danger"
                                                                  id="details_en_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

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

        var slider_photo = new KTImageInput('kt_slider_photo');

        ///-------------------------------------------------------------------////
        $('.services_treatments_section').addClass('d-none');
        ///////////////////////////////////////////////////////////////
        $('input[type=radio][name=button_status]').change(function () {
            if (this.value == 'show') {
                $('.services_treatments_section').removeClass('d-none');
            } else if (this.value == 'hide') {
                $('.services_treatments_section').addClass('d-none');
            }
        });
        ///-------------------------------------------------------------------////


        $('#form_sliders_add').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();
            //////////////////////////////////////////////////////////////
            $('#title_ar').css('border-color', '');
            $('#title_en').css('border-color', '');
            $('#details_ar').css('border-color', '');
            $('#details_en').css('border-color', '');
            $('#language').css('border-color', '');
            $('#order').css('border-color', '');
            $('#photo').css('border-color', '');
            $('#service_id').css('border-color', '');


            $('#title_ar_error').text('');
            $('#title_en_error').text('');
            $('#details_ar_error').text('');
            $('#details_en_error').text('');
            $('#language_error').text('');
            $('#order_error').text('');
            $('#photo_error').text('');
            $('#service_id_error').text('');
            /////////////////////////////////////////////////////////////
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
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
                },//end beforeSend
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        setTimeout(function () {
                            window.location.href = "{{route('admin.sliders')}}"
                        }, 2500)
                    }
                },//end success

                error: function (reject) {
                    $.notifyClose();
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                        $('html, body').animate({scrollTop: 20}, 300);

                    });

                },//end error

                complete: function () {
                    KTApp.unblockPage();
                },//end complete

            });

        });//end submit


    </script>
@endpush
