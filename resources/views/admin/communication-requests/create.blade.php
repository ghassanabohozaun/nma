@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{{route('admin.communication.requests.store')}}" method="POST" id="form_communication_request_store"
          enctype="multipart/form-data">
    @csrf
    <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div
                class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">

                    <!--begin::Actions-->

                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.communication.requests')}}" class="text-muted">
                                {{trans('menu.communication_requests')}}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{route('admin.communication.requests.create')}}" class="text-muted">
                                {{trans('menu.add_new_communication_requests')}}
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
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('communicationRequests.sender')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="communication_sender" id="communication_sender" type="text"
                                                                placeholder=" {{trans('communicationRequests.enter_sender')}}"
                                                                autocomplete="off"/>
                                                            <span class="form-text text-danger"
                                                                  id="communication_sender_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('communicationRequests.email')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="communication_email" id="communication_email" type="text"
                                                                placeholder=" {{trans('communicationRequests.enter_email')}}"
                                                                autocomplete="off"/>
                                                            <span class="form-text text-danger"
                                                                  id="communication_email_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('communicationRequests.mobile')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="communication_mobile" id="communication_mobile" type="text"
                                                                placeholder=" {{trans('communicationRequests.enter_mobile')}}"
                                                                autocomplete="off"/>
                                                            <span class="form-text text-danger"
                                                                  id="communication_mobile_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('communicationRequests.title')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="communication_title" id="communication_title" type="text"
                                                                placeholder=" {{trans('communicationRequests.enter_title')}}"
                                                                autocomplete="off"/>
                                                            <span class="form-text text-danger"
                                                                  id="communication_title_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('communicationRequests.details')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="3"
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="communication_details" id="communication_details" type="text"
                                                                placeholder=" {{trans('communicationRequests.enter_details')}}"
                                                                autocomplete="off"></textarea>
                                                            <span class="form-text text-danger"
                                                                  id="communication_details_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('communicationRequests.status')}}
                                                        </label>

                                                        <div class="col-lg-9 col-xl-9 radio-inline">
                                                            <label class="radio radio-solid">
                                                                <input type="radio" name="communication_status" id="communication_status"
                                                                       value="1">
                                                                <span></span>
                                                                {{trans('communicationRequests.contacted')}}
                                                            </label>
                                                            <label class="radio radio-solid">
                                                                <input type="radio" name="communication_status" id="communication_status"
                                                                       checked="checked"
                                                                       value="0">
                                                                <span></span>
                                                                {{trans('communicationRequests.not_contacted')}}
                                                            </label>
                                                            <span class="form-text text-danger"
                                                                  id="communication_status_error"></span>
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

        //////////////////////////////////////////////////////
        $('#form_communication_request_store').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();

            ///////////////////////////////////////////////////////////////////////////
            $('#communication_sender_error').text('')
            $('#communication_email_error').text('')
            $('#communication_mobile_error').text('')
            $('#communication_title_error').text('')
            $('#communication_details_error').text('')
            $('#communication_status_error').text('')

            $('#communication_sender').css('border-color', '');
            $('#communication_email').css('border-color', '');
            $('#communication_mobile').css('border-color', '');
            $('#communication_title').css('border-color', '');
            $('#communication_details').css('border-color', '');
            $('#communication_status').css('border-color', '');
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
                        notifySuccessOrError(data.msg, 'success');
                        setTimeout(function (){
                            window.location.href="{{route('admin.communication.requests')}}";
                        },2000);
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
