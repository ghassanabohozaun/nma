@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{{route('admin.about.site.contact.us.store')}}" method="POST" id="form_contact_us_store"
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
                                {{trans('menu.contact_us')}}
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
                                                        <label> {{trans('aboutSite.contact_us_ar')}}</label>
                                                        <textarea class="form-control contact_us_ar"
                                                                  placeholder="{{trans('aboutSite.enter_contact_us_ar')}}"
                                                                  name="contact_us_ar"
                                                                  id="contact_us_ar">{{aboutSite()->contact_us_ar}}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="contact_us_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label> {{trans('aboutSite.contact_us_en')}}</label>
                                                        <textarea  class="form-control contact_us_en"
                                                                  placeholder="{{trans('aboutSite.enter_contact_us_en')}}"
                                                                  name="contact_us_en"
                                                                  id="contact_us_en">{{aboutSite()->contact_us_en}}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="contact_us_en_error"></span>
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
        $('.contact_us_ar').summernote({
            height: 270,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            },
        });
        $('.contact_us_en').summernote({
            height: 270,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            }
        });
        /////////////////////////////////////////////////////////////////////////////////////////
        //// Store Contact us
        $('#form_contact_us_store').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();
            /////////////////////////////////////////////////////////////////////////////////////////
            $('#contact_us_ar').css('border-color', '');
            $('#contact_us_en').css('border-color', '');

            $('#contact_us_ar_error').text('');
            $('#contact_us_en_error').text('');

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
                        $('html, body').animate({scrollTop: 20}, 300);
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
@endpush
