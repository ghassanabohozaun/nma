@extends('layouts.admin')
@section('title') @endsection
@section('css')@endsection
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
                            {{trans('menu.videos')}}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.videos')}}" class="text-muted">
                            {{trans('menu.show_all')}}
                        </a>
                    </li>
                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">

                <a href="{{route('admin.videos.create')}}"
                   class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                    <i class="fa fa-plus-square"></i>
                    {{trans('menu.add_new_video')}}
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
                                                    <th>@lang('videos.photo')</th>
                                                    <th>@lang('videos.title_ar')</th>
                                                    <th>@lang('videos.title_en')</th>
                                                    <th>@lang('videos.language')</th>
                                                    <th>@lang('videos.duration')</th>
                                                    <th>@lang('videos.status')</th>
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

                        <form class="d-none" id="form_video_delete">
                            <input type="hidden" id="slider_video_id">
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

    <!-- begin Modal-->
    <div class="modal fade" id="model_show_video" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>


                <!--begin::Card-->
                <div class="card card-custom card-shadowless rounded-top-0">
                    <!--begin::Body-->
                    <div class="card-body p-1">

                        <div class="col-xl-12 col-xxl-10">

                            <div class="row justify-content-center">

                                <div id="video_view"></div>

                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- end Modal-->

@endsection
@push('js')

    <script
        src="{{asset('adminBoard/assets/plugins/custom/datatables/datatables.bundle.js')}}"
        type="text/javascript"></script>
    <script src="{{asset('adminBoard/assets/js/data_table.js')}}" type="text/javascript"></script>

    <script>
        window.data_url = "{{route('get.admin.videos')}}";
        window.columns = [{data: "id"}, {data: "photo"},
            {data: "title_ar"}, {data: "title_en"},
            {data: "language"}, {data: "duration"},
            {data: "status"}, {data: "actions"},];
    </script>


    <script type="text/javascript">


        //////////////////////////////////////////////////////
        // show delete video notify
        $(document).on('click', '.delete_video_btn', function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            $('#form_video_delete').find('#slider_video_id').val(id);

            $.notifyClose();
            notify_message = " <i class='fa fa-trash' style='color:white'></i> &nbsp; {{trans('general.ask_delete_record')}}<br /><br />" +
                "<button type='button' id='btn_video_delete'  class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.yes')}}</button> &nbsp;" +
                "<button type='button' id='btn_video_close' class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.no')}}</button>"

            notifyDelete(notify_message, 'danger')

        });//end click

        //////////////////////////////////////////////////////
        //  delete video notify close
        $('body').on('click', '#btn_video_close', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#form_video_delete').find('#slider_video_id').val('');
        });//end click

        //////////////////////////////////////////////////////
        //  delete Video
        $('body').on('click', '#btn_video_delete', function (e) {
            e.preventDefault();
            $.notifyClose();

            var id = $('#form_video_delete').find('#slider_video_id').val();

            $.ajax({
                url: "{{route('admin.video.destroy')}}",
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
                        $('#form_video_delete').find('#slider_video_id').val('');
                        updateDataTable();
                    }
                }, // end success
                complete: function () {
                    KTApp.unblockPage();
                },//end complete


            });//end ajax
        });//end click


        /////////////////////////////////////////////////////////////////////////////////////
        // Close  Video show modal By event
        $('#model_show_video').on('hidden.bs.modal', function (e) {
            e.preventDefault();
            $.notifyClose();
            $("#video_view iframe").attr('src', '');
            $('#model_show_video').modal('hide');
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // show Video
        $(document).on('click', '.show_video_btn', function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            $('#video_view').empty();

            $.get("{{route('admin.video.view')}}", {id, id}, function (data) {
                console.log(data);

                $('#video_view').html('<div class="videoWrapper">' +
                    '<iframe  width="420" height="315" align="middle"' +
                    'src="https://www.youtube.com/embed/' + data.data.link + '"></iframe></div>');

                $('#model_show_video').modal('show');
            });
        });

        /////////////////////////////////////////////////////////////////////////////////////
        // change video status
        $('body').on('click', '.change_status', function (e) {
            e.preventDefault();
            $.notifyClose();

            var id = $(this).data('id');

            $.ajax({
                url: "{{route('admin.video.change.status')}}",
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
    <style>
        iframe {
            border: none;
            max-width: 100%;
            margin-top: 5px;
            margin-bottom: 5px;
            -moz-border-radius: 1px;
            -webkit-border-radius: 1px;
            border-radius: 1px;
            -moz-box-shadow: 4px 4px 5px #ffffff;
            -webkit-box-shadow: 4px 4px 14px #ffffff;
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=.2);
        }
    </style>
@endpush
