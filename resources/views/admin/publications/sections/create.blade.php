@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{{route('admin.sections.store')}}" method="POST" id="form_sections_add">
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
                            <a href="{{route('admin.sections')}}" class="text-muted">
                                {{trans('menu.sections')}}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{trans('menu.add_new_section')}}
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
                                                            {{trans('sections.language')}}
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
                                                            {{trans('sections.title_ar')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="title_ar" id="title_ar" type="text"
                                                                placeholder=" {{trans('sections.enter_title_ar')}}"
                                                                autocomplete="off"/>

                                                            <span class="form-text text-danger"
                                                                  id="title_ar_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('sections.title_en')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="title_en" id="title_en" type="text"
                                                                placeholder=" {{trans('sections.enter_title_en')}}"
                                                                autocomplete="off"/>

                                                            <span class="form-text text-danger"
                                                                  id="title_en_error"></span>

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

        ////////////////////////////////////////////////////

        var section_photo = new KTImageInput('kt_section_photo');


        $('#form_sections_add').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();
            //////////////////////////////////////////////////////////////
            $('#title_ar').css('border-color', '');
            $('#title_en').css('border-color', '');
            $('#language').css('border-color', '');

            $('#title_ar_error').text('');
            $('#title_en_error').text('');
            $('#language_error').text('');
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
                            window.location.href = "{{route('admin.sections')}}"
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
