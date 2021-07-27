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
                            {{trans('menu.beneficiaries')}}
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
                <a href="{!! route('aides.beneficiary.create') !!}"
                   class="btn btn-primary btn-sm font-weight-bold font-size-base  mr-1">
                    <i class="fa fa-plus-square"></i>
                    {{trans('menu.add_new_beneficiary')}}
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
                                                    <th>@lang('aides.full_name')</th>
                                                    <th>@lang('aides.personal_id')</th>
                                                    <th>@lang('aides.mobile')</th>
                                                    <th>@lang('aides.city')</th>
                                                    <th>@lang('aides.neighborhood')</th>
                                                    <th>@lang('aides.family_count')</th>
                                                    <th>@lang('aides.aides_count')</th>
                                                    <th>@lang('aides.is_noor_employee')</th>
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

                        <form class="d-none" id="form_beneficiary_delete">
                            <input type="hidden" id="role_beneficiary_id">
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


    <style>
        #m_table_1_filter{

        }
    </style>

@endsection
@push('js')

    <script
        src="{{asset('adminBoard/assets/plugins/custom/datatables/datatables.bundle.js')}}"
        type="text/javascript"></script>

    <script>
        window.columns = [{data: "id"},
            {data: "full_name"},
            {data: "personal_id"},
            {data: "mobile"},
            {data: "city"},
            {data: "neighborhood"},
            {data: "family_count"},
            {data: "aides_count"},
            {data: "is_noor_employee"},
            {data: "actions"},
        ];

        loadBeneficiary();
        function loadBeneficiary(){
            $("#m_table_1").DataTable({
                //dom: "<Bfrtip>",
                dom: "B<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        text: 'PDF',
                        footer: true,
                    },
                    {
                        extend: 'print',
                        text: 'print',
                        footer: true,
                    },
                    {
                        extend: 'csv',
                        text: 'csv',
                        footer: true,
                    },
                    {
                        extend: 'excel',
                        text: 'excel',
                        footer: true,
                    },
                ],

                responsive: !0,
                //dom: "<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
                lengthMenu: [5, 10, 25, 50],
                pageLength: 10,
                language: window.lang,
                searchDelay: 500,
                processing: !0,
                serverSide: !0,
                select: false,
                searching: true,
                order: [[1, "asc"]],
                ajax:{
                    url:"{{route('get.aides.beneficiaries')}}",
                    data: {personal_id: '801501313'}
                },
                columns: window.columns,
            })
        }
    </script>


    <script type="text/javascript">
        ///////////////////////////////////////////////////////////////////////
        // Show delete role notify
        $(document).on('click', '.beneficiary_delete_btn', function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: "{{trans('general.ask_delete_record')}}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "{{trans('general.yes')}}",
                cancelButtonText: "{{trans('general.no')}}",
                reverseButtons: false,
                allowOutsideClick: false,
            }).then(function (result) {
                if (result.value) {
                    //////////////////////////////////////
                    // Delete role
                    $.ajax({
                        url: '{!! route('aides.beneficiary.destroy') !!}',
                        data: {id, id},
                        type: 'post',
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            if (data.status == true) {
                                Swal.fire({
                                    title: "{!! trans('general.deleted') !!}",
                                    text: "{!! trans('general.delete_success_message') !!}",
                                    icon: "success",
                                    allowOutsideClick: false,
                                    customClass: {confirmButton: 'delete_beneficiary_button'}
                                });
                                $('.delete_beneficiary_button').click(function () {
                                    $('#m_table_1').DataTable().clear().destroy();
                                    loadBeneficiary();
                                });
                            }
                            if (data.status == false) {
                                Swal.fire({
                                    title: "{!! trans('general.cancelled') !!}",
                                    text: data.msg,
                                    icon: "warning",
                                    allowOutsideClick: false,
                                });

                            }
                        },//end success
                    });

                } else if (result.dismiss === "cancel") {
                    Swal.fire({
                        title: "{!! trans('general.cancelled') !!}",
                        text: "{!! trans('general.cancelled_message') !!}",
                        icon: "error",
                        allowOutsideClick: false,
                        customClass: {confirmButton: 'cancel_delete_role_button'}
                    })
                }
            });
        });




    </script>
@endpush


