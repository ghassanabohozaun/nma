@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <style>
        .wizard.wizard-4 .wizard-nav .wizard-steps .wizard-step .wizard-wrapper .wizard-label {
            margin-right: 20px;
        }
    </style>

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Card-->
            <div class="card card-custom card-transparent">
                <div class="card-body p-0">
                    <!--begin::Wizard-->
                    <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first"
                         data-wizard-clickable="true">
                        <!--begin::Wizard Nav-->
                        <div class="wizard-nav">
                            <div class="wizard-steps">
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">
                                            1
                                        </div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">
                                                {!! trans('aides.beneficiary_basic_information') !!}
                                            </div>
                                            <div class="wizard-desc">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">
                                            2
                                        </div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">
                                                {!! trans('aides.beneficiary_address_and_work') !!}
                                            </div>
                                            <div class="wizard-desc">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">
                                            3
                                        </div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">
                                                {!! trans('aides.beneficiary_family') !!}
                                            </div>
                                            <div class="wizard-desc">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">
                                            4
                                        </div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">
                                                {!! trans('aides.review_and_submit') !!}
                                            </div>
                                            <div class="wizard-desc">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Nav-->

                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">
                                        <!--begin::Wizard Form-->
                                        <form class="form" id="kt_form">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" data-wizard-type="step-content"
                                                         data-wizard-state="current">
                                                        <h5 class="text-dark font-weight-bold mb-10">{!! trans('aides.beneficiary_basic_information_details') !!}
                                                            :</h5>
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.first_name') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="first_name" id="first_name"
                                                                    type="text" value=""
                                                                    placeholder="{!! trans('aides.enter_first_name') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.father_name') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="father_name" id="father_name" type="text"
                                                                    value=""
                                                                    placeholder="{!! trans('aides.enter_father_name') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.grandfather_name') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="grandfather_name" id="grandfather_name"
                                                                    type="text"
                                                                    placeholder="{!! trans('aides.enter_grandfather_name') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.family_name') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="family_name" id="family_name" type="text"
                                                                    placeholder="{!! trans('aides.enter_family_name') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.personal_id') !!}</label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input type="text"
                                                                       class="form-control form-control-solid form-control-lg"
                                                                       name="personal_id" value="" id="personal_id"
                                                                       placeholder="{!! trans('aides.enter_personal_id') !!}"
                                                                       autocomplete="off"/>
                                                                <span class="form-text text-muted">Enter valid  ID number(e.g: 801501213).</span>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.wife_name') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="wife_name" id="wife_name" type="text"
                                                                    placeholder="{!! trans('aides.enter_wife_name') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.wife_personal_id') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control form-control-solid form-control-lg"
                                                                    name="wife_personal_id" id="wife_personal_id" type="text"
                                                                    placeholder="{!! trans('aides.enter_wife_personal_id') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                    </div>
                                                    <!--end::Wizard Step 1-->

                                                    <!--begin::Wizard Step 2-->
                                                    <div class="my-5 step" data-wizard-type="step-content">
                                                        <h5 class="text-dark font-weight-bold mb-10 mt-5">User's Account
                                                            Details</h5>
                                                        <!--begin::Group-->

                                                        <!--end::Group-->
                                                        <!--begin::Group-->

                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-xl-3 col-lg-3">Communication</label>
                                                            <div class="col-xl-9 col-lg-9 col-form-label">
                                                                <div class="checkbox-inline">
                                                                    <label class="checkbox">
                                                                        <input name="communication" type="checkbox"/>
                                                                        <span></span>
                                                                        Email
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input name="communication" type="checkbox"/>
                                                                        <span></span>
                                                                        SMS
                                                                    </label>
                                                                    <label class="checkbox">
                                                                        <input name="communication" type="checkbox"/>
                                                                        <span></span>
                                                                        Phone
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <div class="separator separator-dashed my-10"></div>

                                                        <h5 class="text-dark font-weight-bold mb-10">User's Account
                                                            Settings</h5>

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-xl-3 col-lg-3">Login
                                                                verification</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <button type="button"
                                                                        class="btn btn-light-primary font-weight-bold btn-sm">
                                                                    Setup login verification
                                                                </button>
                                                                <div class="form-text text-muted mt-3">
                                                                    After you log in, you will be asked for additional
                                                                    information to confirm your identity and protect
                                                                    your account from being compromised.
                                                                    <a href="#">Learn more</a>.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-xl-3 col-lg-3">Password
                                                                reset verification</label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <div class="checkbox-inline">
                                                                    <label class="checkbox mb-2">
                                                                        <input type="checkbox"/>
                                                                        <span></span>
                                                                        Require personal information to reset your
                                                                        password.
                                                                    </label>
                                                                </div>
                                                                <div class="form-text text-muted">
                                                                    For extra security, this requires you to confirm
                                                                    your email or phone number when you reset your
                                                                    password.
                                                                    <a href="#" class="font-weight-bold">Learn more</a>.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row mt-10">
                                                            <label class="col-xl-3 col-lg-3"></label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <button type="button"
                                                                        class="btn btn-light-danger font-weight-bold btn-sm">
                                                                    Deactivate your account ?
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                    </div>
                                                    <!--end::Wizard Step 2-->

                                                    <!--begin::Wizard Step 3-->
                                                    <div class="my-5 step" data-wizard-type="step-content">
                                                        <h5 class="mb-10 font-weight-bold text-dark">Setup Your
                                                            Address</h5>

                                                        <!--begin::Group-->
                                                        <div class="form-group">
                                                            <label>Address Line 1</label>
                                                            <input type="text"
                                                                   class="form-control form-control-solid form-control-lg"
                                                                   name="address1" placeholder="Address Line 1"
                                                                   value="Address Line 1"/>
                                                            <span class="form-text text-muted">Please enter your Address.</span>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group">
                                                            <label>Address Line 2</label>
                                                            <input type="text"
                                                                   class="form-control form-control-solid form-control-lg"
                                                                   name="address2" placeholder="Address Line 2"
                                                                   value="Address Line 2"/>
                                                            <span class="form-text text-muted">Please enter your Address.</span>
                                                        </div>

                                                        <!--begin::Row-->
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <!--begin::Group-->
                                                                <div class="form-group">
                                                                    <label>Postcode</label>
                                                                    <input type="text"
                                                                           class="form-control form-control-solid form-control-lg"
                                                                           name="postcode" placeholder="Postcode"
                                                                           value="3000"/>
                                                                    <span class="form-text text-muted">Please enter your Postcode.</span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                            <!--begin::Group-->
                                                            <div class="col-xl-6">
                                                                <div class="form-group">
                                                                    <label>City</label>
                                                                    <input type="text"
                                                                           class="form-control form-control-solid form-control-lg"
                                                                           name="city" placeholder="City"
                                                                           value="Melbourne"/>
                                                                    <span class="form-text text-muted">Please enter your City.</span>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>
                                                        <!--end::Row-->

                                                        <!--begin::Row-->
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <!--begin::Group-->
                                                                <div class="form-group">
                                                                    <label>State</label>
                                                                    <input type="text"
                                                                           class="form-control form-control-solid form-control-lg"
                                                                           name="state" placeholder="State"
                                                                           value="VIC"/>
                                                                    <span class="form-text text-muted">Please enter your State.</span>
                                                                </div>
                                                                <!--end::Group-->
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <!--begin::Group-->

                                                                <!--end::Group-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Wizard Step 3-->

                                                    <!--begin::Wizard Step 4-->
                                                    <div class="my-5 step" data-wizard-type="step-content">
                                                        <h5 class="mb-10 font-weight-bold text-dark">Review your Details
                                                            and Submit</h5>

                                                        <!--begin::Item-->
                                                        <div class="border-bottom mb-5 pb-5">
                                                            <div class="font-weight-bolder  mb-3">
                                                                Your Account Details:
                                                            </div>
                                                            <div class="line-height-xl">
                                                                John Wick
                                                                <br/> Phone: +61412345678
                                                                <br/> Email: johnwick@reeves.com
                                                            </div>
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div class="border-bottom mb-5 pb-5">
                                                            <div class="font-weight-bolder  mb-3">
                                                                Your Address Details:
                                                            </div>
                                                            <div class="line-height-xl">
                                                                Address Line 1
                                                                <br/> Address Line 2
                                                                <br/> Melbourne 3000, VIC, Australia
                                                            </div>
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div>
                                                            <div class="font-weight-bolder ">
                                                                Payment Details:
                                                            </div>
                                                            <div class="line-height-xl">
                                                                Card Number: xxxx xxxx xxxx 1111
                                                                <br/> Card Name: John Wick
                                                                <br/> Card Expiry: 01/21
                                                            </div>
                                                        </div>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Wizard Step 4-->

                                                    <!--begin::Wizard Actions-->
                                                    <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                        <div class="mr-2">
                                                            <button type="button" id="prev-step"
                                                                    class="btn btn-light-primary font-weight-bolder px-9 py-4"
                                                                    data-wizard-type="action-prev">
                                                                Previous
                                                            </button>
                                                        </div>
                                                        <div>
                                                            <button type="button"
                                                                    class="btn btn-success font-weight-bolder px-9 py-4"
                                                                    data-wizard-type="action-submit">
                                                                Submit
                                                            </button>

                                                            <button type="button" id="next-step"
                                                                    class="btn btn-primary font-weight-bolder px-9 py-4"
                                                                    data-wizard-type="action-next">
                                                                Next
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!--end::Wizard Actions-->
                                                </div>
                                            </div>
                                        </form>
                                        <!--end::Wizard Form-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Wizard-->
                </div>

            </div>
        </div>
    </div>


@endsection

@push('js')

    <script src="{{asset('adminBoard/assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('adminBoard/assets/js/jquery.validate.js')}}"></script>

    <script src="{{asset('adminBoard/assets/js/add-user.js')}}"></script>


    <script type="text/javascript">

        var required = "{{ __('aides.required') }}";


        ////////////////////////////////////////////////////


        $('#form_role_add').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();
            ///////////////////////////////////////////////////////////////////////////
            $('#role_name_ar_error').text('');
            $('#role_name_en_error').text('');
            $('#permissions_error').text('');

            $('#role_name_ar').css('border-color', '');
            $('#role_name_en').css('border-color', '');
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
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {confirmButton: 'add_role_button'}
                        });
                        $('.add_role_button').click(function () {
                            window.location.href = "{{route('admin.roles')}}";
                        });
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
