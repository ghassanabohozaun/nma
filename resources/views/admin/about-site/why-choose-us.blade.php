@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{{route('admin.about.site.why.choose.us.store')}}" method="POST"
          id="form_why_choose_us_store"
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
                            <a href="#" class="text-muted">
                                {{trans('menu.about_site')}}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{trans('menu.why_choose_us')}}
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


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">{{trans('aboutSite.photo')}}</label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div
                                                                class="image-input image-input-outline"
                                                                id="kt_why_choose_us_photo">
                                                                <div class="image-input-wrapper"
                                                                     style="background-image: url({{asset(Storage::url(whyChooseUs()->photo))}});"></div>
                                                                <label
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="change" data-toggle="tooltip" title=""
                                                                    data-original-title="{{trans('general.change_image')}}">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="photo" id="photo"/>
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
                                                                class="form-text text-muted">{{trans('general.image_format_allow')}}</span>
                                                            <span class="form-text text-danger"
                                                                  id="photo_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--begin::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('aboutSite.title_ar')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="title_ar" id="title_ar" type="text"
                                                                placeholder=" {{trans('aboutSite.enter_title_ar')}}"
                                                                autocomplete="off"
                                                                value="{{whyChooseUs()->title_ar}}"/>

                                                            <span class="form-text text-danger"
                                                                  id="title_ar_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('aboutSite.title_en')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="title_en" id="title_en" type="text"
                                                                placeholder=" {{trans('aboutSite.enter_title_en')}}"
                                                                autocomplete="off"
                                                                value="{{whyChooseUs()->title_en}}"/>

                                                            <span class="form-text text-danger"
                                                                  id="title_en_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label> {{trans('aboutSite.details_ar')}}</label>
                                                        <textarea class="form-control details_ar"
                                                                  placeholder="{{trans('aboutSite.enter_details_ar')}}"
                                                                  name="details_ar"
                                                                  id="details_ar">{{whyChooseUs()->details_ar}}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="details_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label> {{trans('aboutSite.details_en')}}</label>
                                                        <textarea class="form-control details_en"
                                                                  placeholder="{{trans('aboutSite.enter_details_en')}}"
                                                                  name="details_en"
                                                                  id="details_en">{{whyChooseUs()->details_en}}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="details_en_error"></span>
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
        //////////////////////////////////////////////////////
        /// summernote
        $('.details_ar').summernote({
            height: 270,   //set editable area's height

            codemirror: { // codemirror options
                theme: 'monokai'
            },

        });
        $('.details_en').summernote({
            height: 270,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            }
        });

        var why_choose_us_photo = new KTImageInput('kt_why_choose_us_photo');

        /////////////////////////////////////////////////////////////////////////////////////////
        //// Store Why Choose Us
        $('#form_why_choose_us_store').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();
            /////////////////////////////////////////////////////////////////////////////////////////
            $('#title_ar').css('border-color', '');
            $('#title_en').css('border-color', '');
            $('#details_ar').css('border-color', '');
            $('#details_en').css('border-color', '');


            $('#title_ar_error').text('');
            $('#title_en_error').text('');
            $('#details_ar_error').text('');
            $('#details_en_error').text('');

            /////////////////////////////////////////////////////////////////////////////////////////

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
                        $('html, body').animate({scrollTop: 20}, 300)
                    }
                },

                error: function (reject) {
                    KTApp.unblockPage();
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60')
                    });
                    $('html, body').animate({scrollTop: 20}, 300);

                },//end error

                complete: function () {
                    KTApp.unblockPage();
                },

            });


        })

    </script>
@endpush

@push('css')
    <style>
        .whom_ar > .note-editable {
            background-color: #F64E60;
            color: white;
        }
    </style>

@endpush
