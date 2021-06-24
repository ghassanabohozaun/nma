@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div
            class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Actions-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">
                            {{trans('menu.communication_requests')}}
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">
                            {{trans('menu.show_all')}}
                        </a>
                    </li>
                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <a href="{{route('admin.communication.requests.create')}}"
                   class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                    <i class="fa fa-plus-square"></i>
                    {{trans('menu.add_new_communication_requests')}}
                </a>
                &nbsp;
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
                    <div class="card card-custom" id="card_posts">
                        <div class="card-body">

                            <!--begin: Datatable-->
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="dtable scroll">
                                            <!--begin: Datatable -->
                                            <table class="table d-table" id="m_table_1">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>@lang('communicationRequests.sender')</th>
                                                    <th>@lang('communicationRequests.email')</th>
                                                    <th>@lang('communicationRequests.mobile')</th>
                                                    <th>@lang('communicationRequests.title')</th>
                                                    <th>@lang('communicationRequests.details')</th>
                                                    <th>@lang('communicationRequests.send_date')</th>
                                                    <th>@lang('communicationRequests.status')</th>
                                                    <th>@lang('general.actions')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Datatable-->
                        </div>

                        <form class="d-none" id="form_communication_request_delete">
                            <input type="hidden" id="communication_request_delete_id">
                        </form>
                        <!--end::Form-->

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

    <!-- begin communication request message show Modal -->
    <div class="modal fade" id="modal_communication_request_message_show"
         data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('communicationRequests.send_message')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>

                <form method="POST" action="{{route('admin.communication.requests.send.message')}}"
                      id="form_communication_request_send_message"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">

                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0">
                            <!--begin::Body-->
                            <div class="card-body p-0">

                                <div class="col-xl-12 col-xxl-10">

                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">

                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="d-none col-xl-3 col-lg-3 col-form-label">
                                                    ID
                                                </label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input class="form-control form-control-solid form-control-lg"
                                                           name="id" id="id" type="hidden"
                                                           autocomplete="off"/>
                                                </div>

                                            </div>
                                            <!--end::Group-->

                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    {{trans('communicationRequests.title')}}
                                                </label>
                                                <div class="col-lg-9 col-xl-9">
                                                <textarea rows="3"
                                                          class="form-control form-control-solid form-control-lg"
                                                          name="title" id="title" type="text"
                                                          autocomplete="off"></textarea>
                                                </div>

                                            </div>
                                            <!--end::Group-->

                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    {{trans('communicationRequests.details')}}
                                                </label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <textarea rows="10"
                                                              class="form-control form-control-solid form-control-lg"
                                                              name="details" id="details" type="text"
                                                              autocomplete="off"></textarea>
                                                </div>

                                            </div>
                                            <!--end::Group-->

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="#" id="cancel_communication_request_btn"
                                class="btn btn-light-primary font-weight-bold">
                            {{trans('general.cancel')}}
                        </button>

                        <button type="submit" id="save_communication_request_btn"
                                class="btn btn-primary font-weight-bold">
                            {{trans('general.save')}}
                            <div class="spinner-border  spinner-border-sm text-warning  d-none loading_spinner"   id="loading_spinner" >
                                <span class="visually-hidden"></span>
                            </div>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- end communication request message show Modal-->



@endsection
@push('js')


    <script src="{{asset('adminBoard/assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>


    <script
        src="{{asset('adminBoard/assets/plugins/custom/datatables/datatables.bundle.js')}}"
        type="text/javascript"></script>

    <script src="{{asset('adminBoard/assets/js/data_table.js')}}" type="text/javascript"></script>



    <script>
        window.data_url = "{{route('get.admin.communication.requests')}}";
        window.columns = [{data: "id"}, {data: "communication_sender"},
            {data: "communication_email"}, {data: "communication_mobile"},
            {data: "communication_title"}, {data: "communication_details"},
            {data: "sendDate"},
            {data: "communication_status"}, {data: "options"}];
    </script>



    <script type="text/javascript">

        ////////////////////////////////////////////////////////////////////////////////////
        // show delete communication request notify
        $(document).on('click', '.delete_communication_request_btn', function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            $('#form_communication_request_delete').find('#communication_request_delete_id').val(id);


            $.notifyClose();
            notify_message = " <i class='fa fa-trash' style='color:white'></i> &nbsp; {{trans('general.ask_delete_record')}}<br /><br />" +
                "<button type='button' id='btn_communication_request_delete'  class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.yes')}}</button> &nbsp;" +
                "<button type='button' id='btn_communication_request_close' class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.no')}}</button>"

            notifyDelete(notify_message, 'danger')

        });//end click

        ////////////////////////////////////////////////////////////////////////////////////
        // close delete communication request notify
        $('body').on('click', '#btn_communication_request_close', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#form_service_delete').find('#service_delete_id').val('');
            $('#form_communication_request_delete').find('#communication_request_delete_id').val('');
        });//end click

        ////////////////////////////////////////////////////////////////////////////////////
        //  delete communication request
        $('body').on('click', '#btn_communication_request_delete', function (e) {
            e.preventDefault();
            $.notifyClose();

            var id = $('#form_communication_request_delete').find('#communication_request_delete_id').val();

            $.ajax({
                url: "{{route('admin.communication.requests.destroy')}}",
                data: {id, id},
                type: 'POST',
                dataType: 'json',
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
                        $('#form_communication_request_delete').find('#communication_request_delete_id').val('');
                        updateDataTable();
                    }

                }, // end success
                complete: function () {
                    KTApp.unblockPage();
                },//end complete


            });//end ajax
        });//end click

        ////////////////////////////////////////////////////////////////////////////////////
        //  change communication request status
        $(document).on('click', '.change_status', function (e) {
            e.preventDefault();
            $.notifyClose();
            var id = $(this).data('id');

            $.ajax({
                url: "{{route('admin.communication.requests.update.status')}}",
                data: {id, id},
                type: 'POST',
                dataType: 'json',
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
                        updateDataTable();
                    }
                }, // end success

                error: function (xhr, ajaxOptions, thrownError) {
                    if (xhr.status == 401) {
                        $.notifyClose();
                        notifySuccessOrError("{{trans('general.un_authorize_message')}}", 'warning');
                    }
                }, // end error

                complete: function () {
                    KTApp.unblockPage();
                },//end complete


            });//end ajax

        });

        ////////////////////////////////////////////////////////////////////////////////////
        //  show communication request send message modal
        $(document).on('click', '.communication_request_send_message_btn', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#id').val(id);
            $('#modal_communication_request_message_show').modal('show');

        });
        ////////////////////////////////////////////////////////////////////////////////////
        //  close communication request send message modal By cancel
        $('body').on('click', '#cancel_communication_request_btn', function (e) {
            e.preventDefault();
            $('#modal_communication_request_message_show').modal('hide');
            $('#form_communication_request_send_message')[0].reset();
        });
        ////////////////////////////////////////////////////////////////////////////////////
        //  close communication request send message modal By event
        $('#modal_communication_request_message_show').on('hidden.bs.modal', function (e) {
            e.preventDefault();
            $('#modal_communication_request_message_show').modal('hide');
            $('#form_communication_request_send_message')[0].reset();
        });

        document.addEventListener("DOMContentLoaded", function () {
            var elements = document.getElementsByTagName("INPUT");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function (e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity("{{--trans('tests.required')--}}");
                    }
                };
                elements[i].oninput = function (e) {
                    e.target.setCustomValidity("");
                };
            }
        })

        /////////////////////////////////////////////////////////////////////
        // Validation
        $('#form_communication_request_send_message').validate({
            rules: {
                title: {
                    required: true,
                },
                details: {
                    required: true,
                },
            },
            messages: {
                title: {
                    required: '{{trans('communicationRequests.required')}}',
                },
                details: {
                    required: '{{trans('communicationRequests.required')}}',
                }
            }
        });
        ////////////////////////////////////////////////////////////////////////////////////
        // communication request send message
        $(document).on('submit', 'form', function (e) {
            e.preventDefault();
            $.notifyClose();

            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                data: data,
                dataType: 'JSON',
                type: type,
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function () {
                    $('#loading_spinner').removeClass('d-none')
                   /* KTApp.block('#modal_communication_request_message_show .modal-content', {
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                    setTimeout(function () {
                        KTApp.unblock('#modal_communication_request_message_show .modal-content');
                    }, 500);*/
                },
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        $('#loading_spinner').addClass('d-none')
                        $('#modal_communication_request_message_show').modal('hide');
                        $('#form_communication_request_send_message')[0].reset();
                        updateDataTable();
                        notifySuccessOrError(data.msg, 'success');
                    }
                },
                complete: function () {
                    //KTApp.unblock('#modal_communication_request_message_show .modal-content');
                }
            });
        });


    </script>

@endpush

@push('css')

    <style>
        .form-group .error {
            color: #F64E60;
        }
    </style>
@endpush
