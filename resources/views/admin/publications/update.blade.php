@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{{route('admin.publications.update')}}" method="POST" id="form_publication_update"
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
                            <a href="{{route('admin.publications')}}" class="text-muted">
                                {{trans('menu.publications')}}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{trans('publications.update_publication')}}
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
                        <div class="card card-custom" id="card_languages">
                            <div class="card-body">

                                <div class="row justify-content-center ">
                                    <div class="col-xl-12">
                                        <!--begin::body-->
                                        <div class="my-5">
                                            <div class="alert alert-danger alert_errors d-none"
                                                 style="padding-top: 20px">
                                                <ul></ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <ul class="nav  nav-tabs" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="publication_settings_tab" data-toggle="tab"
                                           href="#publication_settings">
                                            <span class="nav-icon"><i class="flaticon2-settings"></i></span>
                                            <span class="nav-text">{{trans('publications.publication_settings_tab')}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="publication_details_ar_tab" data-toggle="tab"
                                           href="#publication_details_ar"
                                           aria-controls="profile">
                                            <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                            <span class="nav-text">{{trans('publications.publication_details_ar_tab')}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="publication_details_en_tab" data-toggle="tab"
                                           href="#publication_details_en"
                                           aria-controls="profile">
                                            <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                            <span class="nav-text">{{trans('publications.publication_details_en_tab')}}</span>
                                        </a>
                                    </li>
                                </ul>


                                <div class="tab-content mt-5">
                                    @include('admin.publications.update_tabs.settings')
                                    @include('admin.publications.update_tabs.details_ar')
                                    @include('admin.publications.update_tabs.details_en')
                                </div>


                            </div>


                        </div>
                        <!--end::Card-->


                    </div>

                </div>
                <!--end::Row-->


            </div>
            <!--end::Container-->

            <!--begin::Form-->


        </div>

        <!--end::content-->

    </form>

@endsection
@push('js')

    <script type="text/javascript">


        $('#form_publication_update').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();

            ////////////////////////////////////////////////////////////////////
            $('#language_error').text('');
            $('#photo_error').text('');
            $('#add_date_error').text('');
            $('#section_id_error').text('');
            $('#title_ar_error').text('');
            $('#details_ar_error').text('');
            $('#title_en_error').text('');
            $('#details_en_error').text('');

            $('#language').css('border-color', '');
            $('#photo').css('border-color', '');
            $('#add_date').css('border-color', '');
            $('#section_id').css('border-color', '');
            $('#title_ar').css('border-color', '');
            $('#details_ar').css('border-color', '');
            $('#title_en').css('border-color', '');
            $('#details_en').css('border-color', '');

            ///////////////////////////////////////////////////////////////////

            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                type: type,
                dataType: 'json',
                data: data,
                contentType: false,
                processData: false,
                cache: false,
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

                        $('.alert_errors').find('ul').empty();
                        $('.alert_errors').addClass('d-none');
                        notifySuccessOrError(data.msg, 'success');
                        setTimeout(function () {
                            window.location.href = "{{route('admin.publications')}}"
                        }, 2000)

                    }

                },//end success
                error: function (reject) {
                    KTApp.unblockPage();
                    $('html, body').animate({scrollTop: 20}, 300);
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0])
                        $('#' + key).css('border-color', '#F64E60 ')
                    });
                    PublicationPrintErrors(response.errors)
                },//end error
                complete: function () {
                    KTApp.unblockPage();
                },//end complete
            });//end ajax

        });//end submit
        ////////////////////////////////////
        ////// Print Errors Function
        function PublicationPrintErrors(msg) {

            $('.alert_errors').find('ul').empty();
            $('.alert_errors').removeClass('d-none');
            $('.alert_success').addClass('d-none');
            $('.loading_save_continue').addClass('d-none');
            $.each(msg, function (key, value) {
                $('.alert_errors').find('ul').append("<li>" + value + "</li>");
            });
        }

    </script>
@endpush
