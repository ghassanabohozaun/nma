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
                        <a href="{{route('admin.tests')}}" class="text-muted">
                            {{trans('menu.tests')}}
                        </a>
                    </li>


                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">
                            {{trans('menu.scales')}}
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

                <a href="#" id="add_scale_btn"
                   class="btn btn-primary btn-sm font-weight-bold font-size-base mr-1">
                    <i class="fa fa-plus-square"></i>
                    {{trans('menu.add_new_scale')}}
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
                                                    <th>@lang('tests.photo')</th>
                                                    <th>@lang('tests.statement')</th>
                                                    <th>@lang('tests.evaluation')</th>
                                                    <th>@lang('tests.minimum')</th>
                                                    <th>@lang('tests.maximum')</th>
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

                        <form class="d-none" id="form_scale_delete">
                            <input type="hidden" id="scale_delete_id">
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

    <!-- begin Scale Add Modal -->
    <div class="modal fade" id="modal_scale_add" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('menu.add_new_scale')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>

                <form action="{!! route('admin.test.scales.store',$id) !!}" method="POST" enctype="multipart/form-data"
                      id="form_scale_add">
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
                                                    {{trans('tests.photo')}}
                                                </label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div
                                                        class="image-input image-input-outline"
                                                        id="kt_scale_photo" style="width: 100%;">
                                                    <!--  style="background-image: url({{--asset(Storage::url(setting()->site_icon))--}})"-->
                                                        <div class="image-input-wrapper " id="kt_scale_photo_wrapper"
                                                             style="width: 100%;"></div>
                                                        <label
                                                            class="btn btn-xs btn-icon btn-circle btn-white
                                                             btn-hover-text-primary btn-shadow"
                                                            data-action="change" data-toggle="tooltip" title=""
                                                            data-original-title="{{trans('general.change_image')}}">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input type="file" name="photo" id="photo"
                                                                   class="table-responsive-sm">
                                                            <input type="hidden" name="photo_remove"/>
                                                        </label>

                                                        <span
                                                            class="btn btn-xs btn-icon btn-circle
                                                            btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="cancel" data-toggle="tooltip"
                                                            title="Cancel avatar">
                                                             <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                             </span>
                                                    </div>
                                                    <span
                                                        class="form-text text-muted">{{trans('general.image_format_allow')}}
                                                            </span>
                                                    <span class="form-text text-danger"
                                                          id="photo_error">
                                                       </span>
                                                </div>
                                            </div>
                                            <!--end::Group-->

                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label> {{trans('tests.statement')}}</label>
                                                    <textarea class="form-control " rows="5"
                                                              placeholder="{{trans('tests.enter_statement')}}"
                                                              name="statement"
                                                              id="statement"></textarea>
                                                    <span class="form-text text-danger"
                                                          id="statement_error"></span>

                                                </div>

                                                <div class="col-lg-6">
                                                    <label> {{trans('tests.evaluation')}}</label>
                                                    <textarea class="form-control " rows="5"
                                                              placeholder="{{trans('tests.enter_evaluation')}}"
                                                              name="evaluation"
                                                              id="evaluation"></textarea>
                                                    <span class="form-text text-danger"
                                                          id="evaluation_error"></span>
                                                </div>
                                            </div>
                                            <!--end::Group-->


                                            <!--begin::Group-->
                                            <div class="form-group row">

                                                <div class="col-lg-6">
                                                    <label class="col-form-label">
                                                        {{trans('tests.minimum')}}
                                                    </label>
                                                    <input class="form-control form-control-solid form-control-lg"
                                                           name="minimum" id="minimum" type="number" min="0"
                                                           step="1"
                                                           placeholder=" {{trans('tests.enter_minimum')}}"
                                                           autocomplete="off"/>
                                                    <span class="form-text text-danger" id="minimum_error"></span>
                                                </div>

                                                <div class="col-lg-6">
                                                    <label class="col-form-label">
                                                        {{trans('tests.maximum')}}
                                                    </label>
                                                    <input class="form-control form-control-solid form-control-lg"
                                                           name="maximum" id="maximum" type="number" min="0"
                                                           step="1"
                                                           placeholder=" {{trans('tests.enter_maximum')}}"
                                                           autocomplete="off"/>
                                                    <span class="form-text text-danger" id="maximum_error"></span>
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
                        <button type="#" id="cancel_scale_btn" class="btn btn-light-primary font-weight-bold">
                            {{trans('general.cancel')}}
                        </button>

                        <button type="submit" id="save_scale_btn" class="btn btn-primary font-weight-bold">
                            {{trans('general.save')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Scale Add Modal-->


    <!-- begin Scales Update Modal -->
    <div class="modal fade" id="modal_scale_update" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{trans('tests.update_scale')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>

                <form action="{{route('admin.test.scales.update',$id)}}" method="POST" enctype="multipart/form-data"
                      id="form_scale_update">
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
                                                <div class="col-lg-12">
                                                    <label class="col-form-label">
                                                        ID
                                                    </label>
                                                    <input class="form-control form-control-solid form-control-lg"
                                                           name="id" id="id_update" type="hidden"
                                                           autocomplete="off"/>
                                                </div>
                                            </div>
                                            <!--end::Group-->

                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    {{trans('tests.photo')}}
                                                </label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div
                                                        class="image-input image-input-outline"
                                                        id="kt_scale_photo_update" style="width: 100%;">
                                                    <!--  style="background-image: url({{--asset(Storage::url(setting()->site_icon))--}})"-->
                                                        <div class="image-input-wrapper"
                                                             id="kt_scale_photo_update_wrapper"
                                                             style="width: 100%;"></div>
                                                        <label
                                                            class="btn btn-xs btn-icon btn-circle btn-white
                                                             btn-hover-text-primary btn-shadow"
                                                            data-action="change" data-toggle="tooltip" title=""
                                                            data-original-title="{{trans('general.change_image')}}">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input type="file" name="photo" id="photo_update"
                                                                   class="table-responsive-sm">
                                                            <input type="hidden" name="photo_remove"/>
                                                        </label>

                                                        <span
                                                            class="btn btn-xs btn-icon btn-circle
                                                            btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="cancel" data-toggle="tooltip"
                                                            title="Cancel avatar">
                                                             <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                             </span>
                                                    </div>
                                                    <span
                                                        class="form-text text-muted">{{trans('general.image_format_allow')}}
                                                            </span>
                                                    <span class="form-text text-danger"
                                                          id="photo_update_error">
                                                       </span>
                                                </div>
                                            </div>
                                            <!--end::Group-->

                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label> {{trans('tests.statement')}}</label>
                                                    <textarea class="form-control " rows="5"
                                                              placeholder="{{trans('tests.enter_statement')}}"
                                                              name="statement"
                                                              id="statement_update"></textarea>
                                                    <span class="form-text text-danger"
                                                          id="statement_update_error"></span>

                                                </div>

                                                <div class="col-lg-6">
                                                    <label> {{trans('tests.evaluation')}}</label>
                                                    <textarea class="form-control " rows="5"
                                                              placeholder="{{trans('tests.enter_evaluation')}}"
                                                              name="evaluation"
                                                              id="evaluation_update"></textarea>
                                                    <span class="form-text text-danger"
                                                          id="evaluation_update_error"></span>
                                                </div>
                                            </div>
                                            <!--end::Group-->


                                            <!--begin::Group-->
                                            <div class="form-group row">

                                                <div class="col-lg-6">
                                                    <label class="col-form-label">
                                                        {{trans('tests.minimum')}}
                                                    </label>
                                                    <input class="form-control form-control-solid form-control-lg"
                                                           name="minimum" id="minimum_update" type="number" min="0"
                                                           step="1"
                                                           placeholder=" {{trans('tests.enter_minimum')}}"
                                                           autocomplete="off"/>
                                                    <span class="form-text text-danger"
                                                          id="minimum_update_error"></span>
                                                </div>

                                                <div class="col-lg-6">
                                                    <label class="col-form-label">
                                                        {{trans('tests.maximum')}}
                                                    </label>
                                                    <input class="form-control form-control-solid form-control-lg"
                                                           name="maximum" id="maximum_update" type="number" min="0"
                                                           step="1"
                                                           placeholder=" {{trans('tests.enter_maximum')}}"
                                                           autocomplete="off"/>
                                                    <span class="form-text text-danger"
                                                          id="maximum_update_error"></span>
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
                        <button type="" id="cancel_update_scale_btn" class="btn btn-light-primary font-weight-bold">
                            {{trans('general.cancel')}}
                        </button>

                        <button type="submit" id="save_scale_btn" class="btn btn-primary font-weight-bold">
                            {{trans('general.save')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Test Update Modal-->


@endsection
@push('js')


    <script src="{{asset('adminBoard/assets/plugins/custom/datatables/datatables.bundle.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('adminBoard/assets/js/data_table.js')}}" type="text/javascript"></script>

    <script>
        window.data_url = "{{route('admin.get.test.scales',$id)}}";
        window.columns = [{data: "id"}, {data: "photo"},
            {data: "statement"}, {data: "evaluation"},
            {data: "minimum"}, {data: "maximum"},
            {data: "options"},];
    </script>

    <script type="text/javascript">
        //////////////////////////////////////////////////////
        var scale_photo = new KTImageInput('kt_scale_photo');
        var scale_photo_update = new KTImageInput('kt_scale_photo_update');

        /////////////////////////////////////////////////////////////////////////////////////
        /// Add Scales
        /////////////////////////////////////////////////////////////////////////////////////
        // show add scale modal
        $('body').on('click', '#add_scale_btn', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#modal_scale_add').modal('show');
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // close add scale modal by cancel
        $('body').on('click', '#cancel_scale_btn', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#modal_scale_add').modal('hide');
            $('#form_scale_add')[0].reset();
            $('#kt_scale_photo').find('#kt_scale_photo_wrapper').css('background-image', 'none')
            $('#statement_error').text('');
            $('#evaluation_error').text('');
            $('#minimum_error').text('');
            $('#maximum_error').text('');
            $('#photo_error').text();

            $('#statement').css('border-color', '');
            $('#evaluation').css('border-color', '');
            $('#minimum').css('border-color', '');
            $('#maximum').css('border-color', '');
            $('#photo').css('border-color', '');
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // Close add scale modal By event
        $('#modal_scale_add').on('hidden.bs.modal', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#modal_scale_add').modal('hide');
            $('#form_scale_add')[0].reset();
            $('#kt_scale_photo').find('#kt_scale_photo_wrapper').css('background-image', 'none')
            $('#statement_error').text('');
            $('#evaluation_error').text('');
            $('#minimum_error').text('');
            $('#maximum_error').text('');
            $('#photo_error').text();

            $('#statement').css('border-color', '');
            $('#evaluation').css('border-color', '');
            $('#minimum').css('border-color', '');
            $('#maximum').css('border-color', '');
            $('#photo').css('border-color', '');
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // add scale modal
        $('#form_scale_add').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();

            ///////////////////////////////////////////////////////////////
            $('#statement_error').text('');
            $('#evaluation_error').text('');
            $('#minimum_error').text('');
            $('#maximum_error').text('');
            $('#photo_error').text();

            $('#statement').css('border-color', '');
            $('#evaluation').css('border-color', '');
            $('#minimum').css('border-color', '');
            $('#maximum').css('border-color', '');
            $('#photo').css('border-color', '');
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
                    KTApp.block('#modal_scale_add .modal-content', {
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                    setTimeout(function () {
                        KTApp.unblock('#modal_scale_add .modal-content');
                    }, 500);
                },

                //start success
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        $('#modal_scale_add').modal('hide');
                        $('#form_scale_add')[0].reset();
                        $('#kt_scale_photo').find('#kt_scale_photo_wrapper').css('background-image', 'none')
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
                    KTApp.unblock('#modal_scale_add .modal-content');
                },

            });//end ajax
        });//end submit

        /////////////////////////////////////////////////////////////////////////////////////
        /// Update Scale
        /////////////////////////////////////////////////////////////////////////////////////
        // show update scale modal
        $('body').on('click', '.update_scale_btn', function (e) {
            e.preventDefault();
            $.notifyClose();
            var id = $(this).data('id');
            //$('#modal_scale_update').modal('show');

            $.ajax({
                url: "{{route('admin.test.scales.edit')}}",
                data: {id, id},
                dataType: 'json',
                type: 'GET',
                success: function (data) {
                    $('#id_update').val(data.id);
                    $('#statement_update').val(data.statement);
                    $('#evaluation_update').val(data.evaluation);
                    $('#minimum_update').val(data.minimum);
                    $('#maximum_update').val(data.maximum);

                    var photo = data.photo;
                    var url = '{{Storage::url('')}}' + photo;
                    $('#kt_scale_photo_update').css("background-image", "url(" + url + ")");
                    $('#modal_scale_update').modal('show');
                },

            })
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // close update scale modal by cancel
        $('body').on('click', '#cancel_update_scale_btn', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#modal_scale_update').modal('hide');
            $('#form_scale_update')[0].reset();

            $('#statement_update_error').text('');
            $('#evaluation_update_error').text('');
            $('#maximum_update_error').text('');
            $('#minimum_update_error').text('');
            $('#photo_update_error').text('');

            $('#statement_update').css('border-color', '');
            $('#evaluation_update').css('border-color', '');
            $('#maximum_update').css('border-color', '');
            $('#minimum_update').css('border-color', '');
            $('#photo_update').css('border-color', '');

        });
        /////////////////////////////////////////////////////////////////////////////////////
        // Close update scale modal By event
        $('#modal_scale_update').on('hidden.bs.modal', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#modal_scale_update').modal('hide');
            $('#form_scale_update')[0].reset();

            $('#statement_update_error').text('');
            $('#evaluation_update_error').text('');
            $('#maximum_update_error').text('');
            $('#minimum_update_error').text('');
            $('#photo_update_error').text('');

            $('#statement_update').css('border-color', '');
            $('#evaluation_update').css('border-color', '');
            $('#maximum_update').css('border-color', '');
            $('#minimum_update').css('border-color', '');
            $('#photo_update').css('border-color', '');
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // update scale modal
        $('#form_scale_update').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();
            ///////////////////////////////////////////////////////////////
            $('#statement_update_error').text('');
            $('#evaluation_update_error').text('');
            $('#maximum_update_error').text('');
            $('#minimum_update_error').text('');
            $('#photo_update_error').text('');

            $('#statement_update').css('border-color', '');
            $('#evaluation_update').css('border-color', '');
            $('#maximum_update').css('border-color', '');
            $('#minimum_update').css('border-color', '');
            $('#photo_update').css('border-color', '');
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
                    KTApp.block('#modal_scale_update .modal-content', {
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                    setTimeout(function () {
                        KTApp.unblock('#modal_scale_update .modal-content');
                    }, 500);
                },

                //start success
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        $('#modal_scale_update').modal('hide');
                        $('#form_scale_update')[0].reset();
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
                    KTApp.unblock('#modal_scale_update .modal-content');
                },

            });//end ajax
        });//end submit


        /////////////////////////////////////////////////////////////////////////////////////
        /// Delete Scale
        /////////////////////////////////////////////////////////////////////////////////////
        // show delete Scale notify
        $(document).on('click', '.delete_scale_btn', function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            $('#scale_delete_id').val(id);

            $.notifyClose();
            notify_message = " <i class='fa fa-trash' style='color:white'></i> &nbsp; {{trans('general.ask_delete_record')}}<br /><br />" +
                "<button type='button' id='btn_scale_delete'  class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.yes')}}</button> &nbsp;" +
                "<button type='button' id='btn_scale_close' class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.no')}}</button>"

            notifyDelete(notify_message, 'danger')

        });//end click
        /////////////////////////////////////////////////////////////////////////////////////
        //  close delete scale notify
        $('body').on('click', '#btn_scale_close', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#scale_delete_id').val('');
        });//end click
        /////////////////////////////////////////////////////////////////////////////////////
        //  delete scale
        $('body').on('click', '#btn_scale_delete', function (e) {
            e.preventDefault();
            $.notifyClose();

            var id = $('#scale_delete_id').val();

            $.ajax({
                url: "{{route('admin.test.scales.destroy')}}",
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
                        $('#scale_delete_id').val('');
                        updateDataTable();
                    }

                }, // end success
                complete: function () {
                    KTApp.unblockPage();
                },//end complete
            });//end ajax
        });//end click


    </script>
@endpush

@push('css')

@endpush
