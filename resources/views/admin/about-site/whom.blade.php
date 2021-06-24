@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{{route('admin.about.site.whom.store')}}" method="POST" id="form_whom_store"
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
                                {{trans('menu.whom')}}
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
                                                    <div class="form-group">
                                                        <label> {{trans('aboutSite.whom_ar')}}</label>
                                                        <textarea class="form-control whom_ar"
                                                                  placeholder="{{trans('aboutSite.enter_whom_ar')}}"
                                                                  name="whom_ar"
                                                                  id="whom_ar">{{aboutSite()->whom_ar}}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="whom_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label> {{trans('aboutSite.whom_en')}}</label>
                                                        <textarea  class="form-control whom_en"
                                                                   placeholder="{{trans('aboutSite.enter_whom_en')}}"
                                                                   name="whom_en"
                                                                   id="whom_en">{{aboutSite()->whom_en}}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="whom_en_error"></span>
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
        $('.whom_ar').summernote({
            height: 270,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            },
        });
        $('.whom_en').summernote({
            height: 270,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            }
        });
        /////////////////////////////////////////////////////////////////////////////////////////
        //// Store Contact us
        $('#form_whom_store').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();
            /////////////////////////////////////////////////////////////////////////////////////////
            $('#whom_ar').css('border-color', '');
            $('#whom_en').css('border-color', '');

            $('#whom_ar_error').text('');
            $('#whom_en_error').text('');

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
                    setTimeout(function() {
                        KTApp.unblockPage();
                    }, 1500);

                },// end beforeSend

                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        $.notifyClose();
                        notifySuccessOrError(data.msg, 'success');
                        $('html, body').animate({scrollTop: 20}, 300);
                    }
                },// end success

                error: function (reject) {

                    KTApp.unblockPage();
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key).css('border-color', '#F64E60');
                        $('#' + key + '_error').text(value[0]);
                    });//end each
                    $('html, body').animate({scrollTop: 20}, 300);

                },// end error
                complete: function () {
                    KTApp.unblockPage();
                },// end complete

            });//end ajax


        })

    </script>
@endpush

@push('css')
@endpush
