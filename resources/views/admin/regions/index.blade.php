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
                        <a href="" class="text-muted">
                            {{trans('menu.regions')}}
                        </a>
                    </li>

                </ul>

                <!--end::Actions-->
            </div>
            <!--end::Info-->


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
                    <div class="card card-custom card-shadowless rounded-top-0" id="card_settings_store">
                        <!--begin::Body-->


                        <!--begin::Card-->
                        <div class="card card-custom ">
                            <div class="card-body ">

                                <br/>
                                <!--begin::radio-->
                                <div class="form-group" style="margin-left: auto;margin-right: auto;">
                                    <div class="radio-inline ">
                                        <label class="radio radio-rounded">
                                            <input type="radio" checked="checked" name="regions" id="regions"
                                                   value="governorate"/>
                                            <span></span>
                                            {{trans('regions.governorate')}}
                                        </label>
                                        <label class="radio radio-rounded">
                                            <input type="radio" name="regions" id="regions" value="city"/>
                                            <span></span>
                                            {{trans('regions.city')}}
                                        </label>
                                        <label class="radio radio-rounded">
                                            <input type="radio" name="regions" id="regions" value="neighborhood"/>
                                            <span></span>
                                            {{trans('regions.neighborhood')}}
                                        </label>
                                    </div>
                                </div>
                                <!--end::radio-->

                            </div>
                        </div>
                        <!--end::Card-->

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
    <!--end::content-->


    <br/>
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

                                    <!--begin: Governorate-->
                                    <div class="col-12 governorate_section ">

                                        <!--begin::Governorate Section-->
                                        <div class="col-md-12 governorate_append_section card"
                                             style="padding: 15px 10px 2px 10px;margin-left: auto;margin-right: auto;margin-bottom: 50px">
                                        </div>
                                        <!--end::Governorate Section-->


                                        <div class="table-responsive-lg">
                                            <table class="table" id="governorate_table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{!! trans('regions.governorate_name_ar') !!}</th>
                                                    <th scope="col">{!! trans('regions.governorate_name_en') !!}</th>
                                                    <th scope="col">{!! trans('general.actions') !!}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($Governorates as $key=>$Governorate)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$Governorate->governorate_name_ar}}</td>
                                                        <td>{{$Governorate->governorate_name_en}}</td>
                                                        <td>
                                                            <a href="#"
                                                               class="btn btn-hover-primary btn-icon btn-pill governorate_edit_btn"
                                                               data-id="{{$Governorate->id}}"
                                                               title="{{trans('general.edit')}}">
                                                                <i class="fa fa-edit fa-1x"></i>
                                                            </a>

                                                            <a href="#"
                                                               class="btn btn-hover-danger btn-icon btn-pill governorate_delete_btn"
                                                               data-id="{{$Governorate->id}}"
                                                               title="{{trans('general.delete')}}">
                                                                <i class="fa fa-trash fa-1x"></i>
                                                            </a>

                                                        </td>
                                                    </tr>
                                                @empty
                                                    <h2 class="text-center text-warning">No Content</h2>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--end: Governorate-->


                                    <!--begin: City-->
                                    <div class="col-12 city_section">
                                        <!--begin::City Section-->
                                        <div class="col-md-12 city_append_section card" style=" padding: 15px 10px 2px 10px;
                                        margin-left: auto;margin-right: auto;margin-bottom: 50px">
                                        </div>
                                        <!--end::City Section-->


                                        <div class="table-responsive-lg">
                                            <table class="table" id="city_table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{!! trans('regions.city_name_ar') !!}</th>
                                                    <th scope="col">{!! trans('regions.city_name_en') !!}</th>
                                                    <th scope="col">{!! trans('regions.governorate_id') !!}</th>
                                                    <th scope="col">{!! trans('general.actions') !!}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($Cities as $key=>$City)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$City->city_name_ar}}</td>
                                                        <td>{{$City->city_name_en}}</td>
                                                        <td>{{Lang()=='ar'?$City->governorate->governorate_name_ar:$City->governorate->governorate_name_en}}</td>
                                                        <td>
                                                            <a href="#"
                                                               class="btn btn-hover-primary btn-icon btn-pill city_edit_btn"
                                                               data-id="{{$City->id}}"
                                                               title="{{trans('general.edit')}}">
                                                                <i class="fa fa-edit fa-1x"></i>
                                                            </a>

                                                            <a href="#"
                                                               class="btn btn-hover-danger btn-icon btn-pill city_delete_btn"
                                                               data-id="{{$City->id}}"
                                                               title="{{trans('general.delete')}}">
                                                                <i class="fa fa-trash fa-1x"></i>
                                                            </a>

                                                        </td>
                                                    </tr>
                                                @empty
                                                    <h2 class="text-center text-warning">No Content</h2>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <!--end: City-->


                                    <!--begin: City-->
                                    <div class="col-12 neighborhood_section">

                                        <!--begin::Neighborhood Section-->
                                        <div class="col-md-12 neighborhood-append_section card"
                                             style="padding: 15px 10px 2px 10px;margin-left: auto;margin-right: auto;margin-bottom: 50px">
                                        </div>
                                        <!--end::Neighborhood Section-->

                                        <div class="table-responsive-lg">
                                            <table class="table" id="neighborhood_table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{!! trans('regions.neighborhood_name_ar') !!}</th>
                                                    <th scope="col">{!! trans('regions.neighborhood_name_en') !!}</th>
                                                    <th scope="col">{!! trans('regions.city_id') !!}</th>
                                                    <th scope="col">{!! trans('general.actions') !!}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($Neighborhoods as $key=>$Neighborhood)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$Neighborhood->neighborhood_name_ar}}</td>
                                                        <td>{{$Neighborhood->neighborhood_name_en}}</td>
                                                        <td>{{Lang()=='ar'?$Neighborhood->city->city_name_ar:$Neighborhood->city->city_name_en}}</td>

                                                        <td>
                                                            <a href="#"
                                                               class="btn btn-hover-primary btn-icon btn-pill neighborhood_edit_btn"
                                                               data-id="{{$Neighborhood->id}}"
                                                               title="{{trans('general.edit')}}">
                                                                <i class="fa fa-edit fa-1x"></i>
                                                            </a>

                                                            <a href="#"
                                                               class="btn btn-hover-danger btn-icon btn-pill neighborhood_delete_btn"
                                                               data-id="{{$Neighborhood->id}}"
                                                               title="{{trans('general.delete')}}">
                                                                <i class="fa fa-trash fa-1x"></i>
                                                            </a>

                                                        </td>
                                                    </tr>
                                                @empty
                                                    <h2 class="text-center text-warning">No Content</h2>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <!--end: City-->

                                </div>
                            </div>
                            <!--end: Datatable-->

                        </div>

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


    @include('admin.regions.governorate')
    @include('admin.regions.city')
    @include('admin.regions.neighborhood')




@endsection

@push('js')
    <script
        src="{{asset('adminBoard/assets/plugins/custom/datatables/datatables.bundle.js')}}"
        type="text/javascript"></script>
    <script src="{{asset('adminBoard/assets/js/data_table.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
        appendGovernorate();
        appendCity();
        appendNeighborhood();
        ///////////////////////////////////////////////////////////////////////////////////////////
        // Radio Buttons
        $('.city_section').addClass('d-none');
        $('.neighborhood_section').addClass('d-none');
        $('input[type=radio][name=regions]').change(function () {
            if (this.value == 'governorate') {
                $('.governorate_section').removeClass('d-none');
                $('.city_section').addClass('d-none');
                $('.neighborhood_section').addClass('d-none');
                resetGovernorate();
                $("#governorate_table").load(location.href + " #governorate_table");

            } else if (this.value == 'city') {
                $('.city_section').removeClass('d-none');
                $('.governorate_section').addClass('d-none');
                $('.neighborhood_section').addClass('d-none');
                resetCity();
                loadGovernorate();
                $("#city_table").load(location.href + " #city_table");

            } else if (this.value == 'neighborhood') {
                $('.neighborhood_section').removeClass('d-none');
                $('.governorate_section').addClass('d-none');
                $('.city_section').addClass('d-none');
                resetNeighborhood();
                loadCity();
                $("#neighborhood_table").load(location.href + " #neighborhood_table");
            }
        });

        ///////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////// Governorate ////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////
        // Add Governorate Function
        $('#add_governorate_form').on('submit', function (e) {
            e.preventDefault();
            /////////////////////////////////////////////////////
            $('#governorate_name_ar_error').text("");
            $('#governorate_name_en_error').text("");

            $('#governorate_name_ar').css('border-color', '');
            $('#governorate_name_en').css('border-color', '');
            /////////////////////////////////////////////////////

            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                },
                success: function (data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: 'success',
                            allowOutsideClick: false,
                            customClass: {confirmButton: 'add_governorate_button'}
                        });
                        $('.add_governorate_button').click(function () {
                            $('#add_governorate_form')[0].reset();
                            $("#governorate_table").load(location.href + " #governorate_table");
                        });
                    }
                },

                error: function (reject) {
                    KTApp.unblockPage();
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', 'red');

                    });
                },
                complete: function () {
                    KTApp.unblockPage();
                }
            })

        })

        ///////////////////////////////////////////////////////////////////////////////////////////
        // load Governorate Function
        function loadGovernorate() {
            $.ajax({
                type: "get",
                url: "{!! route('get.all.governorates') !!}",

            }).done(function (result) {
                console.log(result)
                $(result).each(function () {
                    if ("{{Lang()=='ar'}}") {
                        $("#governorate_id").append($('<option>', {
                            value: this.id,
                            text: this.governorate_name_ar,
                        }));
                    } else {
                        $("#governorate_id").append($('<option>', {
                            value: this.id,
                            text: this.governorate_name_en,
                        }));
                    }
                });
            });

        }

        ///////////////////////////////////////////////////////////////////////////////////////////
        // reset Governorate Function
        function resetGovernorate() {
            $('#governorate_name_ar_error').text("");
            $('#governorate_name_en_error').text("");
            $('#governorate_name_ar').css('border-color', '');
            $('#governorate_name_en').css('border-color', '');
            $('#add_governorate_form')[0].reset();
        }

        ///////////////////////////////////////////////////////////////////////////////////////////
        // append Governorate Function
        function appendGovernorate() {
            $('.governorate_append_section').append(' <form method="POST" action="{{route('governorate.store')}}"' +
                'enctype="multipart/form-data"' +
                'id="add_governorate_form">' +
                '@csrf' +
                '<div class="mt-2">' +
                '<div class="form-group row">' +
                '<div class="col-md-4">' +
                '<label class="font-weight-bold">' +
                '{{trans('regions.governorate_name_ar')}}' +
                ' </label>' +
                ' <input type="text" id="governorate_name_ar"' +
                ' name="governorate_name_ar"' +
                ' class="form-control form-control-solid form-control-lg"' +
                ' placeholder="{!! trans('regions.enter_governorate_name_ar') !!}"' +
                ' autocomplete="off">' +
                ' <span class="form-text text-danger"' +
                ' id="governorate_name_ar_error"></span>' +
                ' </div>' +
                '<div class="col-md-4">' +
                ' <label class="font-weight-bold">' +
                '  {{trans('regions.governorate_name_en')}}' +
                ' </label>' +
                ' <input type="text" id="governorate_name_en"' +
                '     name="governorate_name_en"' +
                '   class="form-control form-control-solid form-control-lg"' +
                '   placeholder="{!! trans('regions.governorate_name_en') !!}"' +
                '   autocomplete="off">' +
                '                          <span class="form-text text-danger"' +
                '                               id="governorate_name_en_error"></span>' +
                '</div>' +
                '<div class="col-md-3">' +
                '   <label>&nbsp;</label>' +
                ' <button type="submit"' +
                '         class="form-control form-control-lg  btn-primary  ">' +
                '    {{trans('general.save')}}' +
                ' </button>' +
                '</div>' +
                ' </div>' +
                ' </div>' +
                ' </form>');
        }

        ///////////////////////////////////////////////////////////////////////////////////////////
        // delete Governorate Function
        $('body').on('click', '.governorate_delete_btn', function (e) {
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
                    // Delete Governorate
                    $.ajax({
                        url: '{!! route('governorate.destroy') !!}',
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
                                    customClass: {confirmButton: 'delete_governorate_button'}
                                });
                                $('.delete_governorate_button').click(function () {
                                    $("#governorate_table").load(location.href + " #governorate_table");
                                });
                            }

                            if (data.status == false) {
                                Swal.fire({
                                    title: "{!! trans('general.error') !!}",
                                    text: data.msg,
                                    icon: "error",
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
                        customClass: {confirmButton: 'cancel_delete_governorate_button'}
                    })
                }
            });

        });


        ///////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////// City  ///////////////////////////////////////////////

        ///////////////////////////////////////////////////////////////////////////////////////////
        // Add City Function
        $('#add_city_form').on('submit', function (e) {
            e.preventDefault();
            /////////////////////////////////////////////////////
            $('#city_name_ar_error').text("");
            $('#city_name_en_error').text("");
            $('#governorate_id_error').text("");

            $('#city_name_ar').css('border-color', '');
            $('#city_name_en').css('border-color', '');
            $('#governorate_id').css('border-color', '');

            /////////////////////////////////////////////////////

            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                },
                success: function (data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: 'success',
                            allowOutsideClick: false,
                            customClass: {confirmButton: 'add_city_button'}
                        });
                        $('.add_city_button').click(function () {
                            $('#add_city_form')[0].reset();
                            $("#city_table").load(location.href + " #city_table");

                        });
                    }
                },
                error: function (reject) {
                    KTApp.unblockPage();
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', 'red');

                    });
                },
                complete: function () {
                    KTApp.unblockPage();
                }
            })
        })
        ///////////////////////////////////////////////////////////////////////////////////////////
        // load City Function
        function loadCity() {
            $.ajax({
                type: "get",
                url: "{!! route('get.all.cities') !!}",
            }).done(function (result) {
                console.log(result)
                $(result).each(function () {
                    if ("{{Lang()=='ar'}}") {
                        $("#city_id").append($('<option>', {
                            value: this.id,
                            text: this.city_name_ar,
                        }));
                    } else {
                        $("#city_id").append($('<option>', {
                            value: this.id,
                            text: this.city_name_en,
                        }));
                    }
                });
            });
        }

        ///////////////////////////////////////////////////////////////////////////////////////////
        // reset City Function
        function resetCity() {
            $('#governorate_id')
                .empty()
                .append('<option selected="selected" value="">{{trans('general.select_from_list')}}</option>');
            $('#city_name_ar_error').text("");
            $('#city_name_en_error').text("");
            $('#governorate_id_error').text("");

            $('#city_name_ar').css('border-color', '');
            $('#city_name_en').css('border-color', '');
            $('#governorate_id').css('border-color', '');
            $('#add_city_form')[0].reset();
        }

        ///////////////////////////////////////////////////////////////////////////////////////////
        // delete City Function
        $('body').on('click', '.city_delete_btn', function (e) {
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
                    // Delete Governorate
                    $.ajax({
                        url: '{!! route('city.destroy') !!}',
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
                                    customClass: {confirmButton: 'delete_city_button'}
                                });
                                $('.delete_city_button').click(function () {
                                    $("#city_table").load(location.href + " #city_table");
                                });
                            }

                            if (data.status == false) {
                                Swal.fire({
                                    title: "{!! trans('general.error') !!}",
                                    text: data.msg,
                                    icon: "error",
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
                        customClass: {confirmButton: 'cancel_delete_city_button'}
                    })
                }
            });

        });

        ///////////////////////////////////////////////////////////////////////////////////////////
        // append City Function
        function appendCity() {
            $('.city_append_section').append('<form action="{!! route('city.store') !!}" method="POST"' +
                'enctype="multipart/form-data"' +
                'id="add_city_form">' +
                ' @csrf' +
                ' <div class="mt-2">' +
                '<!--begin::Input-->' +
                '<div class="form-group row">' +
                '<div class="col-md-3">' +
                '<label class="font-weight-bold">' +
                ' {{trans('regions.city_name_ar')}}' +
                '</label>' +
                ' <input type="text" id="city_name_ar" name="city_name_ar"' +
                '   class="form-control form-control-solid form-control-lg"' +
                '  placeholder="{!! trans('regions.enter_city_name_ar') !!}"' +
                '  autocomplete="off">' +
                ' <span class="form-text text-danger"' +
                ' id="city_name_ar_error"></span>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<label class="font-weight-bold">' +
                '  {{trans('regions.city_name_en')}}' +
                '</label>' +
                '<input type="text" id="city_name_en" name="city_name_en"' +
                '  class="form-control form-control-solid form-control-lg"' +
                '  placeholder="{!! trans('regions.enter_city_name_en') !!}"' +
                ' autocomplete="off">' +
                ' <span class="form-text text-danger"' +
                ' id="city_name_en_error"></span>' +
                ' </div>' +

                ' <div class="col-md-3">' +
                '  <label' +
                '    class="font-weight-bold">{{trans('regions.governorate_id')}}</label>' +
                '<select id="governorate_id" name="governorate_id"' +
                '        class="form-control form-control-solid form-control-lg">' +
                ' </select>' +
                ' <span class="form-text text-danger"' +
                '      id="governorate_id_error"></span>' +
                '</div>' +

                '<div class="col-md-2">' +
                '    <label>&nbsp;</label>' +
                '   <button type="submit"' +
                '          class="form-control form-control-lg  btn-primary  ">' +
                '      {{trans('general.save')}}' +
                '  </button>' +
                ' </div>' +
                ' </div>' +
                ' </div>' +
                ' </form>')
        }

        ///////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////// neighborhood  ///////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////
        // Add Neighborhood Function

        $('#add_neighborhood_form').on('submit', function (e) {
            e.preventDefault();
            /////////////////////////////////////////////////////
            $('#neighborhood_name_ar_error').text("");
            $('#neighborhood_name_en_error').text("");
            $('#city_id_error').text("");

            $('#neighborhood_name_ar').css('border-color', '');
            $('#neighborhood_name_en').css('border-color', '');
            $('#city_id').css('border-color', '');
            /////////////////////////////////////////////////////

            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: "{{trans('general.please_wait')}}",
                    });
                },
                success: function (data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: 'success',
                            allowOutsideClick: false,
                            customClass: {confirmButton: 'add_neighborhood_button'}
                        });
                        $('.add_neighborhood_button').click(function () {
                            $('#add_neighborhood_form')[0].reset();
                            $("#neighborhood_table").load(location.href + " #neighborhood_table");
                        });
                    }
                },

                error: function (reject) {
                    KTApp.unblockPage();
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', 'red');

                    });
                },
                complete: function () {
                    KTApp.unblockPage();
                }
            })

        });

        ///////////////////////////////////////////////////////////////////////////////////////////
        // reset neighborhood Function
        function resetNeighborhood() {
            $('#city_id')
                .empty()
                .append('<option selected="selected" value="">{{trans('general.select_from_list')}}</option>');
            $('#neighborhood_name_ar_error').text("");
            $('#neighborhood_name_en_error').text("");
            $('#city_id_error').text("");

            $('#neighborhood_name_ar').css('border-color', '');
            $('#neighborhood_name_en').css('border-color', '');
            $('#city_id').css('border-color', '');

            $('#add_neighborhood_form')[0].reset();
        }

        ///////////////////////////////////////////////////////////////////////////////////////////
        // delete neighborhood Function
        $('body').on('click', '.neighborhood_delete_btn', function (e) {
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
                    // Delete Governorate
                    $.ajax({
                        url: '{!! route('neighborhood.destroy') !!}',
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
                                    customClass: {confirmButton: 'delete_neighborhood_button'}
                                });
                                $('.delete_neighborhood_button').click(function () {
                                    $("#neighborhood_table").load(location.href + " #neighborhood_table");
                                });
                            }

                            if (data.status == false) {
                                Swal.fire({
                                    title: "{!! trans('general.error') !!}",
                                    text: data.msg,
                                    icon: "error",
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
                        customClass: {confirmButton: 'cancel_delete_city_button'}
                    })
                }
            });

        });

        ///////////////////////////////////////////////////////////////////////////////////////////
        // reset neighborhood
        function appendNeighborhood() {
            $('.neighborhood-append_section').append('<form action="{!! route('neighborhood.store') !!}" method="POST"' +
                'enctype="multipart/form-data"' +
                'id="add_neighborhood_form">' +
                '@csrf' +
                '<div class="mt-2">' +
                ' <div class="form-group row">' +
                ' <div class="col-md-3">' +
                ' <label class="font-weight-bold">' +
                ' {{trans('regions.neighborhood_name_ar')}}' +
                ' </label>' +
                '<input type="text" id="neighborhood_name_ar"' +
                ' name="neighborhood_name_ar"' +
                ' class="form-control form-control-solid form-control-lg"' +
                ' placeholder="{!! trans('regions.enter_neighborhood_name_ar') !!}"' +
                ' autocomplete="off">' +
                ' <span class="form-text text-danger"' +
                '    id="neighborhood_name_ar_error"></span>' +
                '</div>' +

                '<div class="col-md-3">' +
                '<label ' +
                'class="font-weight-bold">{{trans('regions.neighborhood_name_en')}}</label>' +
                '<input type="text" id="neighborhood_name_en"' +
                ' name="neighborhood_name_en"' +
                ' class="form-control form-control-solid form-control-lg"' +
                'placeholder="{!! trans('regions.enter_neighborhood_name_en') !!}"' +
                'autocomplete="off">' +
                '<span class="form-text text-danger"' +
                ' id="neighborhood_name_en_error"></span>' +
                '</div>' +

                ' <div class="col-md-3">' +
                ' <label class="font-weight-bold">' +
                '   {{trans('regions.city_id')}}' +
                ' </label>' +
                '<select id="city_id" name="city_id"' +
                '       class="form-control form-control-solid form-control-lg">' +
                ' </select>' +
                ' <span class="form-text text-danger"' +
                '     id="city_id_error"></span>' +
                '</div>' +

                ' <div class="col-md-2">' +
                '  <label>&nbsp;</label>' +
                '<button type="submit"' +
                ' class="form-control form-control-lg  btn-primary  ">' +
                '{{trans('general.save')}}' +
                ' </button>' +
                '</div>' +
                '</div>' +

                '</div>' +
                '</form>')
        }
    </script>
@endpush
