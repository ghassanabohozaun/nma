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
                            {{trans('menu.tests')}}
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{route('admin.tests')}}" class="text-muted">
                            {{trans('menu.show_all')}}
                        </a>
                    </li>
                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">

                <a href="#" id="add_test_btn"
                   class="btn btn-primary btn-sm font-weight-bold font-size-base mr-1">
                    <i class="fa fa-plus-square"></i>
                    {{trans('menu.add_test')}}
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
                                                    <th>@lang('tests.test_photo')</th>
                                                    <th>@lang('tests.test_name')</th>
                                                    <th>@lang('tests.question_count')</th>
                                                    <th>@lang('tests.metrics_count')</th>
                                                    <th>@lang('tests.number_times_of_use')
                                                    <th>@lang('tests.file')</th>
                                                    <th>@lang('tests.added_date')</th>
                                                    <th>@lang('tests.status')</th>
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

                        <form class="d-none" id="form_test_delete">
                            <input type="hidden" id="test_delete_id">
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


    <!-- begin Test Add Modal -->
    <div class="modal fade" id="modal_test_add" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('menu.add_test')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>

                <form action="{{route('admin.test.store')}}" method="POST" enctype="multipart/form-data"
                      id="form_test_add">
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
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    {{trans('tests.test_photo')}}
                                                </label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div
                                                        class="image-input image-input-outline"
                                                        id="kt_test_photo" style="width: 100%;">
                                                    <!--  style="background-image: url({{--asset(Storage::url(setting()->site_icon))--}})"-->
                                                        <div class="image-input-wrapper" id="kt_test_photo_wrapper"
                                                             style="width: 100%;"></div>
                                                        <label
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="change" data-toggle="tooltip" title=""
                                                            data-original-title="{{trans('general.change_image')}}">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input type="file" name="test_photo" id="test_photo"
                                                                   class="table-responsive-sm">
                                                            <input type="hidden" name="test_photo_remove"/>
                                                        </label>

                                                        <span
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="cancel" data-toggle="tooltip"
                                                            title="Cancel avatar">
                                                             <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                             </span>
                                                    </div>
                                                    <span
                                                        class="form-text text-muted">{{trans('general.image_format_allow')}}
                                                            </span>
                                                    <span class="form-text text-danger"
                                                          id="test_photo_error">
                                                       </span>
                                                </div>
                                            </div>
                                            <!--end::Group-->

                                            <!--begin::Group-->
                                            <div class="form-group ">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    {{trans('tests.language')}}
                                                </label>
                                                <select
                                                    class="form-control form-control-solid form-control-lg"
                                                    name="language" id="language" type="text">
                                                    <option value="">
                                                        {{trans('general.select_from_list')}}
                                                    </option>
                                                    <option value="en">
                                                        {{trans('general.en')}}
                                                    </option>
                                                    <option value="ar">
                                                        {{trans('general.ar')}}
                                                    </option>
                                                </select>
                                                <span class="form-text text-danger" id="language_error"></span>
                                            </div>
                                            <!--end::Group-->

                                            <!--begin::Group-->
                                            <div class="form-group">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    {{trans('tests.test_name')}}
                                                </label>
                                                <input class="form-control form-control-solid form-control-lg"
                                                       name="test_name" id="test_name" type="text"
                                                       placeholder=" {{trans('tests.enter_test_name')}}"
                                                       autocomplete="off"/>
                                                <span class="form-text text-danger" id="test_name_error"></span>
                                            </div>
                                            <!--end::Group-->


                                            <!--begin::Group-->
                                            <div class="form-group">
                                                <label> {{trans('tests.test_details')}}</label>
                                                <textarea class="form-control " rows="5"
                                                          placeholder="{{trans('tests.enter_test_details')}}"
                                                          name="test_details"
                                                          id="test_details"></textarea>
                                                <span class="form-text text-danger"
                                                      id="test_details_error"></span>
                                            </div>
                                            <!--end::Group-->

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="#" id="cancel_test_btn" class="btn btn-light-primary font-weight-bold">
                            {{trans('general.cancel')}}
                        </button>

                        <button type="submit" id="save_test_btn" class="btn btn-primary font-weight-bold">
                            {{trans('general.save')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Test Add Modal-->


    <!-- begin Test Update Modal -->
    <div class="modal fade" id="modal_test_update" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('tests.update_test')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>

                <form action="{{route('admin.test.update')}}" method="POST" enctype="multipart/form-data"
                      id="form_test_update">
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
                                                    <input
                                                        class="form-control form-control-solid form-control-lg"
                                                        name="id" id="test_id_update" type="hidden"
                                                        autocomplete="off"/>
                                                </div>
                                            </div>
                                            <!--end::Group-->


                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    {{trans('tests.test_photo')}}
                                                </label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div
                                                        class="image-input image-input-outline"
                                                        id="kt_test_photo_update" style="width: 100%;">
                                                    <!--  style="background-image: url({{--asset(Storage::url(setting()->site_icon))--}})"-->
                                                        <div class="image-input-wrapper"
                                                             id="kt_test_photo_update_wrapper"
                                                             style="width: 100%;"></div>
                                                        <label
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="change" data-toggle="tooltip" title=""
                                                            data-original-title="{{trans('general.change_image')}}">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input type="file" name="test_photo" id="test_photo_update"
                                                                   class="table-responsive-sm">
                                                            <input type="hidden" name="test_photo_remove"/>
                                                        </label>

                                                        <span
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="cancel" data-toggle="tooltip"
                                                            title="Cancel avatar">
                                                             <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                             </span>
                                                    </div>
                                                    <span
                                                        class="form-text text-muted">{{trans('general.image_format_allow')}}
                                                            </span>
                                                    <span class="form-text text-danger"
                                                          id="test_photo_update_error">
                                                       </span>
                                                </div>
                                            </div>
                                            <!--end::Group-->

                                            <!--begin::Group-->
                                            <div class="form-group ">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    {{trans('tests.language')}}
                                                </label>
                                                <select
                                                    class="form-control form-control-solid form-control-lg"
                                                    name="language" id="language_update" type="text">
                                                    <option value="">
                                                        {{trans('general.select_from_list')}}
                                                    </option>
                                                    <option value="en">
                                                        {{trans('general.en')}}
                                                    </option>
                                                    <option value="ar">
                                                        {{trans('general.ar')}}
                                                    </option>
                                                </select>
                                                <span class="form-text text-danger" id="language_update_error"></span>
                                            </div>
                                            <!--end::Group-->

                                            <!--begin::Group-->
                                            <div class="form-group">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    {{trans('tests.test_name')}}
                                                </label>
                                                <input class="form-control form-control-solid form-control-lg"
                                                       name="test_name" id="test_name_update" type="text"
                                                       placeholder=" {{trans('tests.enter_test_name')}}"
                                                       autocomplete="off"/>
                                                <span class="form-text text-danger"
                                                      id="test_name_update_error"></span>
                                            </div>
                                            <!--end::Group-->


                                            <!--begin::Group-->
                                            <div class="form-group">
                                                <label> {{trans('tests.test_details')}}</label>
                                                <textarea class="form-control " rows="5"
                                                          placeholder="{{trans('tests.enter_test_details')}}"
                                                          name="test_details"
                                                          id="test_details_update"></textarea>
                                                <span class="form-text text-danger"
                                                      id="test_details_update_error"></span>
                                            </div>
                                            <!--end::Group-->


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="" id="cancel_update_test_btn" class="btn btn-light-primary font-weight-bold">
                            {{trans('general.cancel')}}
                        </button>

                        <button type="submit" id="save_test_btn" class="btn btn-primary font-weight-bold">
                            {{trans('general.save')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Test Update Modal-->



    <!-- begin Test File Add Modal -->
    <div class="modal fade" id="modal_test_file_add" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('tests.add_test_file')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>

                <form action="{!! route('admin.add.test.file') !!}" method="POST" enctype="multipart/form-data"
                      id="form_test_file_add">
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
                                                    <input class="form-control form-control-solid form-control-lg"
                                                           name="id" id="file_test_id" type="hidden"
                                                           autocomplete="off"/>
                                                </div>
                                            </div>
                                            <!--end::Group-->


                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-xl-2 col-lg-2 col-form-label">
                                                    {{trans('tests.file')}}
                                                </label>
                                                <div class="col-lg-10 col-xl-10">
                                                    <input
                                                        class="form-control form-control-solid form-control-lg"
                                                        type="file" name="file" id="file" placeholder=""/>
                                                    <span class="form-text text-danger"
                                                          id="file_error"></span>
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
                        <button id="cancel_test_file_add_btn" class="btn btn-light-primary font-weight-bold">
                            {{trans('general.cancel')}}
                        </button>

                        <button type="submit" id="test_file_add_btn" class="btn btn-primary font-weight-bold">
                            {{trans('general.save')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Test File Add Modal-->

@endsection
@push('js')


    <script src="{{asset('adminBoard/assets/plugins/custom/datatables/datatables.bundle.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('adminBoard/assets/js/data_table.js')}}" type="text/javascript"></script>

    <script>
        window.data_url = "{{route('get.admin.tests')}}";
        window.columns = [{data: "id"}, {data: "test_photo"}, {data: "test_name"},
            {data: "question_count"}, {data: "metrics_count"},
            {data: "number_times_of_use"}, {data: "file"}, {data: "added_date"},
            {data: "status"}, {data: "options"},];
    </script>

    <script type="text/javascript">


        //////////////////////////////////////////////////////
        var test_photo = new KTImageInput('kt_test_photo');
        var test_photo_update = new KTImageInput('kt_test_photo_update');
        //////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////
        /// Add Test
        /////////////////////////////////////////////////////////////////////////////////////
        // show add test modal
        $('body').on('click', '#add_test_btn', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#modal_test_add').modal('show');
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // close add test modal by cancel
        $('body').on('click', '#cancel_test_btn', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#modal_test_add').modal('hide');
            $('#form_test_add')[0].reset();
            $('#kt_test_photo').find('#kt_test_photo_wrapper').css('background-image', 'none')
            $('#test_name_error').text('');
            $('#test_details_error').text('');
            $('#test_photo_error').text('');
            $('#language_error').text('');

            $('#test_name').css('border-color', '');
            $('#test_details').css('border-color', '');
            $('#test_photo').css('border-color', '');
            $('#language').css('border-color', '');
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // Close add test modal By event
        $('#modal_test_add').on('hidden.bs.modal', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#modal_test_add').modal('hide');
            $('#form_test_add')[0].reset();
            $('#kt_test_photo').find('#kt_test_photo_wrapper').css('background-image', 'none')
            $('#test_name_error').text('');
            $('#test_details_error').text('');
            $('#test_photo_error').text('');
            $('#language_error').text('');

            $('#test_name').css('border-color', '');
            $('#test_details').css('border-color', '');
            $('#test_photo').css('border-color', '');
            $('#language').css('border-color', '');
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // add test modal
        $('#form_test_add').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();

            ///////////////////////////////////////////////////////////////
            $('#test_name_error').text('');
            $('#test_details_error').text('');
            $('#test_photo_error').text('');
            $('#language_error').text('');

            $('#test_name').css('border-color', '');
            $('#test_details').css('border-color', '');
            $('#test_photo').css('border-color', '');
            $('#language').css('border-color', '');
            ///////////////////////////////////////////////////////////////


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
                //start beforeSend
                beforeSend: function () {
                    KTApp.block('#modal_test_add .modal-content', {
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                    setTimeout(function () {
                        KTApp.unblock('#modal_test_add .modal-content');
                    }, 500);
                },

                //start success
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        $('#modal_test_add').modal('hide');
                        $('#form_test_add')[0].reset();
                        $('#kt_test_photo').find('#kt_test_photo_wrapper').css('background-image', 'none')
                        updateDataTable();
                    }
                },

                //start error
                error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', 'red');
                    });
                },

                //start complete
                complete: function () {
                    KTApp.unblock('#modal_test_add .modal-content');
                },

            });//end ajax
        });//end submit


        /////////////////////////////////////////////////////////////////////////////////////
        /// Update Test
        /////////////////////////////////////////////////////////////////////////////////////
        // show update test modal
        $('body').on('click', '.update_test_btn', function (e) {
            e.preventDefault();
            $.notifyClose();
            var id = $(this).data('id');

            $.ajax({
                url: "{{route('admin.test.edit')}}",
                data: {id, id},
                dataType: 'json',
                type: 'GET',
                success: function (data) {
                    $('#test_id_update').val(data.id);
                    $('#test_name_update').val(data.test_name);
                    $('#test_details_update').val(data.test_details);
                    $('#language_update').val(data.language);

                    var test_photo = data.test_photo;
                    var url = '{{Storage::url('')}}' + test_photo;
                    $('#kt_test_photo_update').css("background-image", "url(" + url + ")");

                    $('#modal_test_update').modal('show');
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    if (xhr.status == 401) {
                        $.notifyClose();
                        notifySuccessOrError("{{trans('general.un_authorize_message')}}", 'warning');
                    }
                }, // end error
            })
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // close update test modal by cancel
        $('body').on('click', '#cancel_update_test_btn', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#modal_test_update').modal('hide');
            $('#form_test_update')[0].reset();
            $('#test_name_update_error').text('');
            $('#test_details_update_error').text('');
            $('#language_update_error').text('');

            $('#test_name_update').css('border-color', '');
            $('#test_details_update').css('border-color', '');
            $('#language_update').css('border-color', '');
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // Close add test modal By event
        $('#modal_test_update').on('hidden.bs.modal', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#modal_test_update').modal('hide');
            $('#form_test_update')[0].reset();
            $('#test_name_update_error').text('');
            $('#test_details_update_error').text('');
            $('#language_update_error').text('');
            $('#test_name_update').css('border-color', '');
            $('#test_details_update').css('border-color', '');
            $('#language_update').css('border-color', '');
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // update test modal
        $('#form_test_update').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();
            ///////////////////////////////////////////////////////////////
            $('#test_name_update_error').text('');
            $('#test_details_update_error').text('');
            $('#language_update_error').text('');
            $('#test_name_update').css('border-color', '');
            $('#test_details_update').css('border-color', '');
            $('#language_update').css('border-color', '');
            ///////////////////////////////////////////////////////////////
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

                //start beforeSend
                beforeSend: function () {
                    KTApp.block('#modal_test_add .modal-content', {
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                    setTimeout(function () {
                        KTApp.unblock('#modal_test_add .modal-content');
                    }, 500);
                },

                //start success
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        $('#modal_test_update').modal('hide');
                        $('#form_test_update')[0].reset();
                        updateDataTable();
                    }
                },

                //start error
                error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_update_error').text(value[0]);
                        $('#' + key + '_update').css('border-color', 'red');
                    });
                },


                //start complete
                complete: function () {
                    KTApp.unblock('#modal_test_add .modal-content');
                },

            });//end ajax
        });//end submit


        /////////////////////////////////////////////////////////////////////////////////////
        /// Delete Test
        /////////////////////////////////////////////////////////////////////////////////////
        // show delete tests notify
        $(document).on('click', '.delete_test_btn', function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            $('#test_delete_id').val(id);

            $.notifyClose();
            notify_message = " <i class='fa fa-trash' style='color:white'></i> &nbsp; {{trans('general.ask_delete_record')}}<br /><br />" +
                "<button type='button' id='btn_test_delete'  class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.yes')}}</button> &nbsp;" +
                "<button type='button' id='btn_test_close' class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.no')}}</button>"

            notifyDelete(notify_message, 'danger')

        });//end click
        /////////////////////////////////////////////////////////////////////////////////////
        //  close delete test notify
        $('body').on('click', '#btn_test_close', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#test_delete_id').val('');
        });//end click
        /////////////////////////////////////////////////////////////////////////////////////
        //  delete test
        $('body').on('click', '#btn_test_delete', function (e) {
            e.preventDefault();
            $.notifyClose();

            var id = $('#test_delete_id').val();

            $.ajax({
                url: "{{route('admin.test.destroy')}}",
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
                        $('#test_delete_id').val('');
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
        });//end click


        /////////////////////////////////////////////////////////////////////////////////////
        // change test status
        $('body').on('click', '.change_status', function (e) {
            e.preventDefault();
            $.notifyClose();

            var id = $(this).data('id');

            $.ajax({
                url: "{{route('admin.test.change.status')}}",
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

        /////////////////////////////////////////////////////////////////////////////////////
        // add Test File
        $('body').on('click', '.add_file_btn', function (e) {
            e.preventDefault();
            $.notifyClose();
            var id = $(this).data('id');
            $('#file_test_id').val(id);
            $('#modal_test_file_add').modal('show');
        });

        /////////////////////////////////////////////////////////////////////////////////////
        // close add test file modal by cancel
        $('body').on('click', '#cancel_test_file_add_btn', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#modal_test_file_add').modal('hide');
            $('#form_test_file_add')[0].reset()

        });


        $('#modal_test_file_add').on('hidden.bs.modal', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#modal_test_file_add').modal('hide');
            $('#form_test_file_add')[0].reset()
        });

        /////////////////////////////////////////////////////////////////////////////////////
        // file Test Add
        $('#form_test_file_add').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();


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
                //start beforeSend
                beforeSend: function () {
                    KTApp.block('#modal_test_add .modal-content', {
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                    setTimeout(function () {
                        KTApp.unblock('#modal_test_add .modal-content');
                    }, 500);
                },


                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        $('#modal_test_file_add').modal('hide');
                        $('#form_test_file_add')[0].reset();
                        updateDataTable();
                    }
                },

                complete: function () {
                    KTApp.unblockPage();
                },

            })

        });


    </script>
@endpush

@push('css')

@endpush
