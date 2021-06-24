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
                            {{trans('tests.questions')}}
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
                <a href="{{route('admin.test.question.create',$id)}}"
                   class="btn btn-primary btn-sm font-weight-bold font-size-base mr-1">
                    <i class="fa fa-plus-square"></i>
                    {{trans('tests.add_test_question')}}
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

                            <style>
                                .datatable.datatable-default > .datatable-table > .datatable-body .datatable-row-detail .datatable-detail {
                                    margin-bottom: 5px;
                                }
                            </style>


                            <!--begin: Datatable-->

                            <table class="table d-table" id="m_table_1">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('tests.test_question')</th>
                                    <th>@lang('tests.answer_count')</th>
                                    <th>@lang('general.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <!--end: Datatable-->
                        </div>

                        <form class="d-none" id="form_test_question_delete">
                            <input type="hidden" id="test_question_delete_id">
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

    <script src="{{asset('adminBoard/assets/plugins/custom/datatables/datatables.bundle.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('adminBoard/assets/js/data_table.js')}}" type="text/javascript"></script>

    <script>
        window.data_url = "{{route('get.admin.test.questions',$id)}}";
        window.columns = [{data: "id"}, {data: "test_question"},{data: "answer_count"}, {data: "options"}];
    </script>

    <script type="text/javascript">

        /////////////////////////////////////////////////////////////////////////////////////
        // show delete test Questions notify
        $(document).on('click', '.delete_test_question_btn', function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            $('#test_question_delete_id').val(id);

            $.notifyClose();
            notify_message = " <i class='fa fa-trash' style='color:white'></i> &nbsp; {{trans('general.ask_delete_record')}}<br /><br />" +
                "<button type='button' id='btn_test_question_delete'  class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.yes')}}</button> &nbsp;" +
                "<button type='button' id='btn_test_question_close' class=' btn btn-outline-light btn-sm m-btn m-btn--air m-btn--wide '" +
                ">{{trans('general.no')}}</button>"

            notifyDelete(notify_message, 'danger')

        });//end click
        /////////////////////////////////////////////////////////////////////////////////////
        //  close delete test Questions notify
        $('body').on('click', '#btn_test_question_close', function (e) {
            e.preventDefault();
            $.notifyClose();
            $('#test_question_delete_id').val('');
        });//end click
        /////////////////////////////////////////////////////////////////////////////////////
        //  delete test Questions
        $('body').on('click', '#btn_test_question_delete', function (e) {
            e.preventDefault();
            $.notifyClose();

            var id = $('#test_question_delete_id').val();

            $.ajax({
                url: "{{route('admin.test.question.destroy')}}",
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
                        $('#test_question_delete_id').val('');
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
