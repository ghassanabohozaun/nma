@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div
            class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <!--begin::Actions-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">
                            {{trans('menu.trainings')}}
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">
                            {{trans('menu.show_all')}}
                        </a>
                    </li>
                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <a href="{{route('admin.trainings.create')}}"
                   class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                    <i class="fa fa-plus-square"></i>
                    {{trans('menu.add_new_training')}}
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
                                                    <th>@lang('trainings.photo')</th>
                                                    <th>@lang('trainings.title_ar')</th>
                                                    <th>@lang('trainings.title_en')</th>
                                                    <th>@lang('trainings.language')</th>
                                                    <th>@lang('trainings.started_date')</th>
                                                    <th>@lang('trainings.status')</th>
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

                        <form class="d-none" id="form_training_delete">
                            <input type="hidden" id="training_delete_id">
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



    <!-- begin Reset  Training  Modal -->
    <div class="modal fade" id="modal_reset_training" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="exampleModalLabel">{{trans('trainings.reset_training')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>

                <form action="{{route('admin.trainings.reset')}}"
                      method="POST" enctype="multipart/form-data"
                      id="form_reset_training">
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
                                            <div class="d-none form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    ID
                                                </label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input type="hidden" class="form-control"
                                                           id="id" name="id">
                                                </div>
                                            </div>
                                            <!--end::Group-->

                                            <br/>
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    {{trans('trainings.started_date')}}
                                                </label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group date">
                                                        <input type="text" class="form-control"
                                                               id="started_date" name="started_date"
                                                               readonly
                                                               placeholder="{{trans('trainings.enter_started_date')}}"/>
                                                        <div class="input-group-append">
                                                             <span class="input-group-text">
                                                                <i class="la la-calendar-check-o"></i>
                                                             </span>
                                                        </div>
                                                    </div>
                                                    <span class="form-text text-danger"
                                                          id="started_date_error"></span>
                                                </div>
                                                <!--end::Group-->
                                            </div>
                                            <!--end::Group-->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="" id="cancel_reset_training_btn"
                                class="btn btn-light-primary font-weight-bold">
                            {{trans('general.cancel')}}
                        </button>

                        <button type="submit" id="save_training_btn" class="btn btn-primary font-weight-bold">
                            {{trans('general.save')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Reset Training  Modal-->


@endsection
@push('js')

    <script
        src="{{asset('adminBoard/assets/plugins/custom/datatables/datatables.bundle.js')}}"
        type="text/javascript"></script>
    <script src="{{asset('adminBoard/assets/js/data_table.js')}}" type="text/javascript"></script>

    <script>
        window.data_url = "{{route('admin.get.trainings')}}";
        window.columns = [{data: "id"}, {data: "photo"},
             {data: "title_ar"}, {data: "title_en"},
            {data: "language"},{data: "started_date"},
            {data: "status"}, {data: "actions"}];
    </script>

    <script type="text/javascript">

        ////////////////////////////////////////////////
        ///////// Datepicker
        $('#started_date').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: true,
            clearBtn: false,
            orientation: "bottom auto",
            language: "{{LaravelLocalization::getCurrentLocale()}}",
            autoclose: true,
            todayHighlight: true,
        });

        ////////////////////////////////////////////////////////////////
        // Show Delete Notify
        $(document).on('click', '.delete_training_btn', function (e) {
            e.preventDefault();
            $.notifyClose();
            var id = $(this).data('id');
            $('#training_delete_id').val(id);

            notify_message = " <i class='fa fa-trash' style='color:white'></i> &nbsp; {{trans('general.ask_delete_record')}}<br /><br />" +
                "<button type='button' id='btn_training_delete'  class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.yes')}}</button> &nbsp;" +
                "<button type='button' id='btn_training_close' class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.no')}}</button>"

            notifyDelete(notify_message, 'danger')
        })

        ////////////////////////////////////////////////////////////////
        // close Delete Notify
        $('body').on('click', '#btn_training_close', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#training_delete_id').val('');
        });

        /////////////////////////////////////////////////////
        // Delete training
        $('body').on('click', '#btn_training_delete', function (e) {
            e.preventDefault();
            $.notifyClose();
            var id = $('#training_delete_id').val();

            $.ajax({
                url: "{{route('admin.trainings.destroy')}}",
                data: {id, id},
                dataType: "JSON",
                type: 'POST',
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
                        $('#training_delete_id').val('');
                        updateDataTable();
                    }
                    if (data.status == false) {
                        notifySuccessOrError(data.msg, 'warning');

                    }
                },
                complete: function () {
                    KTApp.unblockPage();
                }
            })
        })


        ////////////////////////////////////////////////////
        // Change Status
        $('body').on('click', '.change_status', function (e) {
            e.preventDefault();
            $.notifyClose();
            var id = $(this).data('id');

            $.ajax({
                url: "{{route('admin.trainings.change.status')}}",
                data: {id, id},
                type: 'post',
                dataType: 'JSON',
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        updateDataTable();
                    }
                }
            })
        })


        ////////////////////////////////////////////////////
        // reset training
        $('body').on('click', '.reset_training_btn', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#modal_reset_training').modal('show');
            var id = $(this).data('id');
            $('#form_reset_training').find('#id').val(id);
        });

        ///////////////////////////////////////////////////////////////////////////////////////////
        // close reset training  modal by cancel
        $('body').on('click', '#cancel_reset_training_btn', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#modal_reset_training').modal('hide');
            $('#form_reset_training')[0].reset();
            $('#started_date').css('border-color', '');
            $('#started_date_error').text('');
        });
        ///////////////////////////////////////////////////////////////////////////////////////////
        // Close reset training  modal By event
        $('#modal_reset_training').on('hidden.bs.modal', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#modal_reset_training').modal('hide');
            $('#form_reset_training')[0].reset();
            $('#started_date').css('border-color', '');
            $('#started_date_error').text('');
        });


        ///////////////////////////////////////////////////////////////////////////////////////////
        //  reset training
        $('#form_reset_training').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();


            ////////////////////////////////////////////////////////
            $('#started_date').css('border-color', '');
            $('#started_date_error').text('');
            ///////////////////////////////////////////////////////

            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,

                beforeSend: function () {
                    KTApp.block('#modal_reset_training .modal-content', {
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                    setTimeout(function () {
                        KTApp.unblock('#modal_reset_training .modal-content');
                    }, 500);
                },
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        $.notifyClose();
                        notifySuccessOrError(data.msg, 'success');
                        $('#modal_reset_training').modal('hide');
                        $('#form_reset_training')[0].reset();
                        updateDataTable();
                    }
                    if (data.status == false) {
                        notifySuccessOrError(data.msg, 'warning');
                    }
                },

                error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', 'red');
                    });
                },

                compelete: function () {
                    KTApp.unblock('#modal_reset_training .modal-content');
                }

            });//end ajax

        });//end submit

    </script>
@endpush

