@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form enctype="multipart/form-data" action="{{route('admin.upload.center.store')}}" method="POST"
          id="form_upload_center">
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
                            <a href="{{route('admin.upload.center')}}" class="text-muted">
                                {{trans('menu.upload_center')}}
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
                        <i class="fa fa-plus-square"></i>
                        {{trans('general.add')}}
                    </button>

                </div>
                <!--end::Toolbar-->

            </div>
        </div>
        <!--end::Subheader-->

        <!--begin::content-->
        <div class="d-flex flex-column-fluid" style="margin-bottom: 5px">
            <!--begin::Container-->
            <div class=" container-fluid ">

                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom" id="card_posts">
                            <div class="card-body">

                                <div class="row justify-content-center px-2   px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">

                                        <div class="row justify-content-center">
                                            <div class="col-xl-9">

                                                <!--begin::body-->
                                                <div class="my-5">
                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('dashboard.file')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                       id="file" name="file">
                                                                <label
                                                                    class="custom-file-label"
                                                                    id="file_label"  {{trans('general.choose_file')}}</label>
                                                            </div>

                                                            <span class="form-text text-danger" id="file_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->

        </div>
        <!--end::content-->

    </form>


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
                            <div id="upload_center_datatable"
                                 class="datatable datatable-bordered datatable-head-custom">
                                <table>
                                    <thead>
                                    <tr>
                                        <th title="id"></th>
                                        <th title="file_name"></th>
                                        <th title="file_mimes_type"></th>
                                        <th title="actions"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!--end: Datatable-->
                        </div>
                        <!--begin::Form-->

                        <form class="d-none" id="form_upload_center_delete">
                            <input type="hidden" id="upload_center_delete_id">
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


    <script type="text/javascript">

        /////////////////////////////////////////////////////////////////////////////////
        /// Posts Datatable
        var datatable = $('#upload_center_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{{route('get.admin.upload.center.files')}}',
                        method: 'GET',
                        contentType: 'application/json',
                        map: function (raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },

                serverPaging: false,
                serverFiltering: false,
                serverSorting: false,

            },

            // layout definition
            layout: {
                scroll: false,
                footer: false,
            },

            translate: {
                records: {
                    processing: "{{trans('general.please_wait')}}",
                    noRecords: "{{trans('general.no_record_found')}}",
                },

                toolbar: {
                    pagination: {
                        items: {
                            default: {
                                first: "{{trans('general.first')}}",
                                prev: "{{trans('general.prev')}}",
                                next: "{{trans('general.next')}}",
                                last: "{{trans('general.last')}}",
                                more: "{{trans('general.more')}}",
                                input: "{{trans('general.input')}}",
                                select: "{{trans('general.select')}}",
                            },


                        },

                    },

                },

            },
            // column sorting
            sortable: true,
            pagination: true,

            // columns definition
            columns: [
                {
                    field: 'id',
                    title: '#',

                },
                {
                    field: 'file_name',
                    title: '{{trans('dashboard.file_name')}}',
                },
                {
                    field: 'file_mimes_type',
                    title: '{{trans('dashboard.file_mimes_type')}}',
                },
                {
                    field: 'actions',
                    title: '{{trans('general.actions')}}',
                    sortable: false,
                    width: 130,
                    overflow: 'visible',
                    textAlign: 'center',
                    template: function (row, index, datatable) {


                        var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
                        return '<a href="#" class="btn btn-hover-primary btn-icon  btn-pill copy_file_full_path"    data-id="' + row.id + '" title="{{trans('general.copy')}}">\
                        <i class="la la-copy"></i>\
                    </a>\
                    <a href="#" class="btn btn-hover-danger btn-icon btn-pill delete_upload_center_file_btn"  data-id="' + row.id + '" title="{{trans('general.delete')}}">\
                        <i class="la la-trash"></i>\
                    </a>';
                    },
                }],

        });

        datatable.sort('id', 'desc')

        ///////////////////////////////////////////////////////////////////////////////////////
        /// Add Upload Center File
        $('#form_upload_center').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();

            ////////////////////////////////////////////////////////////
            $('#file_error').html('');
            $('#file_label').css('border-color', '');
            ////////////////////////////////////////////////////////////

            var data = new FormData(this);
            var url = $(this).attr('action');
            var type = $(this).attr('method');
            $.ajax({
                url: url,
                type: type,
                data: data,
                dataType: 'json',
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                },//end beforeSend
                success: function (data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        datatable.reload();
                        $('#file_label').html('');
                    }
                    if (data.errors) {
                        if (data.errors.file) {
                            $('#file_error').html(data.errors.file[0]);
                            $('#file_label').css('border-color', '#F64E60 ');
                        }
                    }
                },//end success


                complete: function () {
                    KTApp.unblockPage();
                },//end complete

            });
        });

        ///////////////////////////////////////////////////////////////////////////////////////
        /// show Upload Center File Delete Notify
        $('body').on('click', '.delete_upload_center_file_btn', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#form_upload_center_delete').find('#upload_center_delete_id').val(id);

            notify_message = " <i class='fa fa-trash' style='color:white'></i> &nbsp; {{trans('general.ask_delete_record')}}<br /><br />" +
                "<button type='button' id='btn_upload_center_file_delete'  class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.yes')}}</button> &nbsp;" +
                "<button type='button' id='btn_upload_center_file_close' class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.no')}}</button>"

            notifyDelete(notify_message, 'danger')

        });

        ///////////////////////////////////////////////////////////////////////////////////////
        /// close Upload Center File Delete Notify
        $('body').on('click', '#btn_upload_center_file_close', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#form_upload_center_delete').find('#upload_center_delete_id').val('');
        });

        ///////////////////////////////////////////////////////////////////////////////////////
        /// Delete Upload Center File
        $('body').on('click', '#btn_upload_center_file_delete', function (e) {
            e.preventDefault();
            $.notifyClose();
            var id = $('#form_upload_center_delete').find('#upload_center_delete_id').val();

            $.ajax({
                url: "{{route('admin.upload.center.destroy')}}",
                data: {id, id},
                dataType: 'json',
                type: 'POST',
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                },//end beforeSend
                success: function (data) {
                    KTApp.unblockPage();
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        datatable.reload();
                        $('#form_upload_center_delete').find('#upload_center_delete_id').val('');
                    }
                },//end success
                complete: function () {
                    KTApp.unblockPage();
                },//end complete
            })
        })
        ///////////////////////////////////////////////////////////////////////////////////////
        /// copy_file_full_path
        $('body').on('click', '.copy_file_full_path', function (e) {
            e.preventDefault();
            $.notifyClose();

            var id = $(this).data('id');

            $.get("{{route('get.admin.upload.center.file.by.id')}}", {id, id}, function (data) {

                if (data.status == true) {

                    //////////////////////////////////////////////////////
                    /// Start clipboard
                    var copyText = "{{url('/')}}/storage/" + data.data.full_path_after_upload;
                    var el = document.createElement('textarea');
                    el.value = copyText;
                    el.setAttribute('readonly', '');
                    el.style = {
                        position: 'absolute',
                        left: '-9999px'
                    };
                    document.body.appendChild(el);
                    el.select();
                    document.execCommand('copy');
                    document.body.removeChild(el);
                    notifySuccessOrError("{{trans('general.copied')}}", 'success');

                }
            });


        })

    </script>
@endpush

@push('css')

@endpush
