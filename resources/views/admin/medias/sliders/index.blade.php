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
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">
                            {{trans('menu.media')}}
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">
                            {{trans('menu.sliders')}}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.sliders')}}" class="text-muted">
                            {{trans('menu.show_all')}}
                        </a>
                    </li>
                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">

                <a href="{{route('admin.sliders.create')}}"
                   class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                    <i class="fa fa-plus-square"></i>
                    {{trans('menu.add_new_slider')}}
                </a>
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

                            <style>
                                .datatable.datatable-default > .datatable-table > .datatable-body .datatable-row-detail .datatable-detail {
                                    margin-bottom: 5px;
                                }
                            </style>

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
                                                    <th>@lang('sliders.photo')</th>
                                                    <th>@lang('sliders.title_ar')</th>
                                                    <th>@lang('sliders.title_en')</th>
                                                    <th>@lang('sliders.language')</th>
                                                    <th>@lang('sliders.order')</th>
                                                    <th>@lang('sliders.details_status')</th>
                                                    <th>@lang('sliders.button_status')</th>
                                                    <th>@lang('sliders.status')</th>
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

                        <form class="d-none" id="form_slider_delete">
                            <input type="hidden" id="slider_delete_id">
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
@endsection
@push('js')

    <script
        src="{{asset('adminBoard/assets/plugins/custom/datatables/datatables.bundle.js')}}"
        type="text/javascript"></script>
    <script src="{{asset('adminBoard/assets/js/data_table.js')}}" type="text/javascript"></script>

    <script>
        window.data_url = "{{route('get.admin.sliders')}}";
        window.columns = [{data: "id"}, {data: "photo"}, {data: "title_ar"},
            {data: "title_en"}, {data: "language"},
            {data: "order"},{data: "details_status"},{data: "button_status"},
            {data: "status"}, {data: "actions"},];
    </script>


    <script type="text/javascript">

        //////////////////////////////////////////////////////
        // show delete slider notify
        $(document).on('click', '.delete_slider_btn', function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            $('#form_slider_delete').find('#slider_delete_id').val(id);

            $.notifyClose();
            notify_message = " <i class='fa fa-trash' style='color:white'></i> &nbsp; {{trans('general.ask_delete_record')}}<br /><br />" +
                "<button type='button' id='btn_slider_delete'  class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.yes')}}</button> &nbsp;" +
                "<button type='button' id='btn_slider_close' class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.no')}}</button>"

            notifyDelete(notify_message, 'danger')

        });//end click
        //////////////////////////////////////////////////////
        //  delete slider notify close
        $('body').on('click', '#btn_slider_close', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#form_slider_delete').find('#slider_delete_id').val('');
        });//end click

        //////////////////////////////////////////////////////
        //  delete slider
        $('body').on('click', '#btn_slider_delete', function (e) {
            e.preventDefault();
            $.notifyClose();

            var id = $('#form_slider_delete').find('#slider_delete_id').val();

            $.ajax({
                url: "{{route('admin.slider.destroy')}}",
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
                },
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        $('#form_slider_delete').find('#slider_delete_id').val('');
                        updateDataTable();
                    }
                }, // end success
                complete: function () {
                    KTApp.unblockPage();
                },//end complete


            });//end ajax
        });//end click

        /////////////////////////////////////////////////////////////////////////////////////
        // change Slider status
        $('body').on('click', '.change_status', function (e) {
            e.preventDefault();
            $.notifyClose();

            var id = $(this).data('id');

            $.ajax({
                url: "{{route('admin.slider.change.status')}}",
                data: {id: id},
                type: 'post',
                dataType: 'JSON',
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        updateDataTable();
                    }
                },//end success

            })


        });
    </script>
@endpush

@push('css')

@endpush
