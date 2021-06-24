@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{{route('admin.about.spa.update')}}" method="POST"
          id="form_about_spa_update"
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
                                {{trans('menu.about_spa')}}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{trans('aboutSpa.update')}}
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
                                                    <div class="d-none form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            ID
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="id" id="id" type="hidden"
                                                                value="{{$aboutSpa->id}}"/>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('aboutSpa.language')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <select
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="language" id="language" type="text">

                                                                <option {{$aboutSpa->language == trans('general.ar') ? 'selected':''}}
                                                                    value="ar">
                                                                    {{trans('general.ar')}}
                                                                </option>

                                                                <option {{$aboutSpa->language == trans('general.en') ? 'selected':''}}
                                                                    value="en">
                                                                    {{trans('general.en')}}
                                                                </option>
                                                                <option {{$aboutSpa->language == trans('general.ar_en') ? 'selected':''}}
                                                                    value="ar_en">
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
                                                            {{trans('aboutSpa.title_ar')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="title_ar" id="title_ar" type="text"
                                                                placeholder=" {{trans('aboutSpa.enter_title_ar')}}"
                                                                autocomplete="off" value="{{$aboutSpa->title_ar}}"/>
                                                            <span class="form-text text-danger"
                                                                  id="title_ar_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('aboutSpa.title_en')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="title_en" id="title_en" type="text"
                                                                value="{{$aboutSpa->title_en}}"
                                                                placeholder=" {{trans('aboutSpa.enter_title_en')}}"
                                                                autocomplete="off"/>
                                                            <span class="form-text text-danger"
                                                                  id="title_en_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label> {{trans('aboutSpa.details_ar')}}</label>
                                                        <textarea class="form-control details_ar"
                                                                  placeholder="{{trans('aboutSpa.enter_details_ar')}}"
                                                                  name="details_ar"
                                                                  id="details_ar">{{$aboutSpa->details_ar}}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="details_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label> {{trans('aboutSpa.details_en')}}</label>
                                                        <textarea class="form-control details_en"
                                                                  placeholder="{{trans('aboutSpa.enter_details_en')}}"
                                                                  name="details_en"
                                                                  id="details_en">{{$aboutSpa->details_en}}</textarea>
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


        //////////////////////////////////////////////////////////////////////////
        // Store
        $('#form_about_spa_update').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();
            //////////////////////////////////////////////////////////////
            $('#title_ar_error').text('');
            $('#title_en_error').text('');
            $('#details_ar_error').text('');
            $('#details_en_error').text('');

            $('#title_ar').css('border-color', '');
            $('#title_en').css('border-color', '');
            $('#details_ar').css('border-color', '');
            $('#details_en').css('border-color', '');
            //////////////////////////////////////////////////////////////


            var data = new FormData(this);
            var url = $(this).attr('action');
            var type = $(this).attr('method');

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'JSON',
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
                },

                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        setTimeout(function () {
                            window.location.href = "{{route('admin.about.spa')}}";
                        }, 2500)
                    }
                },

                error: function (reject) {
                    $.notifyClose();
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', 'red');
                        $('body,html').animate({scrollTop: 20}, 300);
                    });
                },

                complete: function () {
                    KTApp.unblockPage();
                }
            })

        });

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
