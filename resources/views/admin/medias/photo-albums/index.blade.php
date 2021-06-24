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
                            {{trans('menu.photo_albums')}}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.photo.albums')}}" class="text-muted">
                            {{trans('menu.show_all')}}
                        </a>
                    </li>
                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">

                <a href="{{route('admin.photo.albums.create')}}"
                   class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                    <i class="fa fa-plus-square"></i>
                    {{trans('menu.add_new_photo_album')}}
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
                                                    <th>@lang('photoAlbums.main_photo')</th>
                                                    <th>@lang('photoAlbums.title_ar')</th>
                                                    <th>@lang('photoAlbums.title_en')</th>
                                                    <th>@lang('photoAlbums.language')</th>
                                                    <th>@lang('photoAlbums.status')</th>
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

                        <form class="d-none" id="form_photo_album_delete">
                            <input type="hidden" id="photo_album_delete_id">
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


    <!-- begin Modal-->
    <div class="modal fade" id="model_other_album_photos_add" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('general.update')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>

                <div class="modal-body">

                    <!--begin::Card-->
                    <div class="card card-custom card-shadowless rounded-top-0">
                        <!--begin::Body-->
                        <div class="card-body p-0">

                            <div class="col-xl-12 col-xxl-10">

                                <div class="row justify-content-center">
                                    <div class="col-xl-12">

                                        <style type="text/css">
                                            .dropzone .dz-preview .dz-image img {
                                                width: 100px;
                                                height: 100px;
                                            }
                                        </style>

                                        <input type="text" id="photo_album_id_for_dropZone">


                                        <label style="font-weight:bold">{{trans('posts.other_photos')}}</label>
                                        <div class="dropzone dropzone-default dz-clickable"
                                             id="dropzoneFileUpload"></div>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- end Modal-->

    <!--end::content-->
@endsection
@push('js')

    <script
        src="{{asset('adminBoard/assets/plugins/custom/datatables/datatables.bundle.js')}}"
        type="text/javascript"></script>
    <script src="{{asset('adminBoard/assets/js/data_table.js')}}" type="text/javascript"></script>

    <script>
        window.data_url = "{{route('get.admin.photo.albums')}}";
        window.columns = [{data: "id"}, {data: "main_photo"}, {data: "title_ar"},
            {data: "title_en"}, {data: "language"}, {data: "status"},
            {data: "actions"},];
    </script>

    <script type="text/javascript">

        /////////////////////////////////////////////////////////////////////////////////////
        /// show photo album delete notify
        $(document).on('click', '.delete_photo_album_btn', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#form_photo_album_delete').find('#photo_album_delete_id').val(id);

            $.notifyClose();

            notify_message = " <i class='fa fa-trash' style='color:white'></i> &nbsp; {{trans('general.ask_delete_record')}}<br /><br />" +
                "<button type='button' id='btn_photo_album_delete'  class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.yes')}}</button> &nbsp;" +
                "<button type='button' id='btn_photo_album_close' class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.no')}}</button>"

            notifyDelete(notify_message, 'danger')

        });

        /////////////////////////////////////////////////////////////////////////////////////
        /// close photo album delete notify
        $('body').on('click', '#btn_photo_album_close', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#form_photo_album_delete').find('#photo_album_delete_id').val('');
        })

        /////////////////////////////////////////////////////////////////////////////////////
        /// delete photo album
        $('body').on('click', '#btn_photo_album_delete', function (e) {
            e.preventDefault();
            $.notifyClose();

            var id = $('#form_photo_album_delete').find('#photo_album_delete_id').val();

            $.ajax({
                url: "{{route('admin.photo.albums.destroy')}}",
                type: 'POST',
                data: {id, id},
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
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        $('#form_photo_album_delete').find('#photo_album_delete_id').val('');
                        updateDataTable();
                    }
                },//end  success
                complete: function () {
                    KTApp.unblockPage();
                },//end complete

            })

        })

        /////////////////////////////////////////////////////////////////////////////////////
        // change photo album status
        $('body').on('click', '.change_status', function (e) {
            e.preventDefault();
            $.notifyClose();

            var id = $(this).data('id');

            $.ajax({
                url: "{{route('admin.photo.albums.change.status')}}",
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
