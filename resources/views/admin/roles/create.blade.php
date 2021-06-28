@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{!! route('admin.role.store') !!}" method="POST" id="form_role_add">
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
                            <a href="{{route('admin.roles')}}" class="text-muted">
                                {{trans('menu.permissions')}}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{trans('menu.add_new_permission')}}
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
                        <i class="fa fa-save"></i>
                        {{trans('general.save')}}
                    </button>

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
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0" id="card_languages_add">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">

                                        <div class="row justify-content-center">
                                            <div class="col-xl-9">

                                                <!--begin::body-->
                                                <div class="my-5">


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('roles.name')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="name" id="name" type="text"
                                                                placeholder=" {{trans('roles.enter_name')}}"
                                                                autocomplete="off"/>
                                                            <span class="form-text text-danger" id="name_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <div class="form-group row">
                                                        <label
                                                            class="col-3 col-form-label">{{trans('roles.permissions') }}</label>
                                                        <div class="col-9 col-form-label">
                                                            @foreach(config('global.permissions') as $name=>$value)
                                                                <div class="checkbox-inline">
                                                                    <label class="checkbox checkbox-primary">
                                                                        <input type="checkbox" name="permissions[]"
                                                                               id="permissions[]" value="{{$name}}">
                                                                        <span></span>
                                                                        {{$value}}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <span class="form-text text-danger"
                                                              id="permissions_error"></span>

                                                    </div>

                                                </div>
                                                <!--begin::body-->

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>

            </div>
        </div>
        <!--end::content-->

    </form>
@endsection

@push('js')
    <script type="text/javascript">

        ////////////////////////////////////////////////////


        $('#form_role_add').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();
            ///////////////////////////////////////////////////////////////////////////
            $('#name_error').text('');
            $('#permissions_error').text('');

            $('#name').css('border-color', '');
            ///////////////////////////////////////////////////////////////////////////

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
                    setTimeout(function () {
                        KTApp.unblockPage();
                    }, 1500);
                },

                success: function (data) {
                    console.log(data);

                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        setTimeout(function () {
                            window.location.href = "{!! route('admin.roles') !!}";
                        }, 2500)
                    }


                },

                error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                        $('html,body').animate({scrollTop: 20}, 300);
                    });
                },

                complete: function () {
                    KTApp.unblockPage();
                },
            });//end ajax

        });//end submit


    </script>
@endpush
