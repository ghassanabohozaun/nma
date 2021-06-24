@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{{route('admin.about.site.who.are.we.store')}}" method="POST"
          id="form_who_are_we_store"
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
                                {{trans('menu.who_are_we')}}
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
                                                        <label class="col-xl-2 col-lg-2 col-form-label">
                                                            {{trans('aboutSite.brochure')}}
                                                        </label>
                                                        <div class="col-lg-10 col-xl-10">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                type="file" name="brochure"
                                                                id="brochure"
                                                                placeholder=""/>
                                                            <span class="form-text text-danger"
                                                                  id="brochure_error"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row ">
                                                        <label class="col-xl-2 col-lg-2 col-form-label">
                                                        </label>
                                                        <div class="col-lg-10 col-xl-10 brochure_div">
                                                            @if(!empty(whoWeAre()->brochure))
                                                                <p>
                                                                    <a href="{{Storage::url(whoWeAre()->brochure) }}">
                                                                        {{trans('aboutSite.download_brochure')}}
                                                                    </a>
                                                                </p>
                                                            @else
                                                                <p class="text-danger">{{trans('aboutSite.no_brochure_exist')}}</p>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label> {{trans('aboutSite.who_are_we_ar')}}</label>
                                                        <textarea class="form-control who_are_we_ar"
                                                                  placeholder="{{trans('aboutSite.enter_who_are_we_ar')}}"
                                                                  name="who_are_we_ar"
                                                                  id="who_are_we_ar">{{whoWeAre()->who_are_we_ar}}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="who_are_we_ar_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group">
                                                        <label> {{trans('aboutSite.who_are_we_en')}}</label>
                                                        <textarea class="form-control who_are_we_en"
                                                                  placeholder="{{trans('aboutSite.enter_who_are_we_en')}}"
                                                                  name="who_are_we_en"
                                                                  id="who_are_we_en">{{whoWeAre()->who_are_we_en}}</textarea>
                                                        <span class="form-text text-danger"
                                                              id="who_are_we_en_error"></span>
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
        $('.who_are_we_ar').summernote({
            height: 270,   //set editable area's height

            codemirror: { // codemirror options
                theme: 'monokai'
            },

        });
        $('.who_are_we_en').summernote({
            height: 270,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            }
        });

        /////////////////////////////////////////////////////////////////////////////////////////
        //// Store who are we
        $('#form_who_are_we_store').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();
            /////////////////////////////////////////////////////////////////////////////////////////
            $('#who_are_we_ar').css('border-color', '');
            $('#who_are_we_en').css('border-color', '');
            $('#brochure').css('border-color', '');


            $('#who_are_we_ar_error').text('');
            $('#who_are_we_en_error').text('');
            $('#brochure_error').text('');

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
                        $('.brochure_div').load(location.href + ' .brochure_div');
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
@endpush
