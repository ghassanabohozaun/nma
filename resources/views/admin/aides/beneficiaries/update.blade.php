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
                                        <form class="form update_beneficiary_form" id="kt_form"
                                              action="{{route('aides.beneficiary.update')}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">

                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" data-wizard-type="step-content"
                                                         data-wizard-state="current">
                                                        <h5 class="text-dark font-weight-bold mb-10">{!! trans('aides.beneficiary_basic_information_details') !!}
                                                            :</h5>
                                                        <!--begin::Group-->
                                                        <div class="d-none form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                ID
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="id" id="id_update"
                                                                    type="hidden" value="{!! $beneficiary->id !!}"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.first_name') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="first_name" id="first_name"
                                                                    type="text" value="{!! $beneficiary->first_name !!}"
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
                                                                    class="form-control  form-control-lg"
                                                                    name="father_name" id="father_name" type="text"
                                                                    value="{!! $beneficiary->father_name !!}"
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
                                                                    class="form-control  form-control-lg"
                                                                    name="grandfather_name" id="grandfather_name"
                                                                    type="text"
                                                                    value="{!! $beneficiary->grandfather_name !!}"
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
                                                                    class="form-control  form-control-lg"
                                                                    name="family_name" id="family_name" type="text"
                                                                    value="{!! $beneficiary->family_name !!}"
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
                                                                       class="form-control  form-control-lg"
                                                                       name="personal_id" id="personal_id"
                                                                       value="{!! $beneficiary->personal_id !!}"
                                                                       placeholder="{!! trans('aides.enter_personal_id') !!}"
                                                                       autocomplete="off"/>
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
                                                                    class="form-control  form-control-lg"
                                                                    name="wife_name" id="wife_name" type="text"
                                                                    value="{!! $beneficiary->wife_name !!}"
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
                                                                    class="form-control  form-control-lg"
                                                                    name="wife_personal_id" id="wife_personal_id"
                                                                    type="text"
                                                                    value="{!! $beneficiary->wife_personal_id !!}"
                                                                    placeholder="{!! trans('aides.enter_wife_personal_id') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                    </div>
                                                    <!--end::Wizard Step 1-->


                                                    <!--begin::Wizard Step 2-->
                                                    <div class="my-5 step" data-wizard-type="step-content">
                                                        <h5 class="text-dark font-weight-bold mb-10 mt-5">
                                                            {!! trans('aides.beneficiary_address_details')!!}
                                                        </h5>

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {{ trans('aides.governorate') }}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <select class="form-control" name="governorate"
                                                                        id="governorate">
                                                                    <option
                                                                        value="">{!! trans('general.select_from_list') !!}</option>
                                                                    @foreach(\App\Models\Governorate::get() as $governorate)
                                                                        <option value="{{$governorate->id}}"
                                                                            {{$beneficiary->beneficiaryAddress->governorate == old('governorate',$governorate->id) ? 'selected': ''}}>
                                                                            {{Lang()=='ar'?$governorate->governorate_name_ar:$governorate->governorate_name_en}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {{ trans('aides.city') }}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <select class="form-control" name="city"
                                                                        id="city">
                                                                    <option value="">
                                                                        {!! trans('general.select_from_list') !!}
                                                                    </option>
                                                                    @foreach(\App\Models\City::get() as $city)
                                                                        <option value="{{$city->id}}"
                                                                            {{$beneficiary->beneficiaryAddress->city == old('city',$city->id) ? 'selected': ''}}>
                                                                            {{Lang()=='ar'?$city->city_name_ar:$city->city_name_en}}
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {{ trans('aides.neighborhood') }}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <select class="form-control" name="neighborhood"
                                                                        id="neighborhood">
                                                                    <option value="">
                                                                        {!! trans('general.select_from_list') !!}
                                                                    </option>

                                                                    @foreach(\App\Models\Neighborhood::get() as $neighborhood)
                                                                        <option value="{{$neighborhood->id}}"
                                                                            {{$beneficiary->beneficiaryAddress->neighborhood == old('neighborhood',$neighborhood->id) ? 'selected': ''}}>
                                                                            {{Lang()=='ar'?$neighborhood->neighborhood_name_ar:$neighborhood->neighborhood_name_en}}
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {{ trans('aides.address_details') }}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <textarea class="form-control" name="address_details"
                                                                          id="address_details"
                                                                          placeholder="{{trans('aides.enter_address_details')}}"
                                                                          autocomplete="off"
                                                                          rows="3">{!! $beneficiary->beneficiaryAddress->address_details !!}</textarea>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->


                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.mobile') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="mobile" id="mobile" type="text"
                                                                    value="{!! $beneficiary->beneficiaryAddress->mobile !!}"
                                                                    placeholder="{!! trans('aides.enter_mobile') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->


                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.mobile_tow') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="mobile_tow" id="mobile_tow" type="text"
                                                                    value="{!! $beneficiary->beneficiaryAddress->mobile_tow !!}"
                                                                    placeholder="{!! trans('aides.enter_mobile_tow') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <div class="separator separator-dashed my-10"></div>


                                                        <h5 class="text-dark font-weight-bold mb-10">
                                                            {!! trans('aides.beneficiary_work_details') !!}
                                                        </h5>

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {{trans('aides.job_status')}}
                                                            </label>
                                                            <div class="col-lg-9 col-md-9" style="margin-top: 10px">
                                                                <div class="form-check pl-0 radio-inline">
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio" id="job_status"
                                                                               name="job_status"
                                                                               {{$beneficiary->beneficiaryJob->job_status == trans('aides.permanent')?'checked':''}}
                                                                               value="permanent"/>
                                                                        <span></span>
                                                                        {{trans('aides.permanent')}}
                                                                    </label>
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio" id="job_status"
                                                                               name="job_status"
                                                                               {{$beneficiary->beneficiaryJob->job_status == trans('aides.daily')?'checked':''}}
                                                                               value="daily"/>
                                                                        <span></span>
                                                                        {{trans('aides.daily')}}
                                                                    </label>
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio" id="job_status"
                                                                               name="job_status"
                                                                               {{$beneficiary->beneficiaryJob->job_status == trans('aides.unemployment')?'checked':''}}
                                                                               value="unemployment"/>
                                                                        <span></span>
                                                                        {{trans('aides.unemployment')}}
                                                                    </label>
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio" id="job_status"
                                                                               name="job_status"
                                                                               {{$beneficiary->beneficiaryJob->job_status == trans('aides.Unemployed')?'checked':''}}
                                                                               value="Unemployed"/>
                                                                        <span></span>
                                                                        {{trans('aides.Unemployed')}}
                                                                    </label>

                                                                </div>
                                                            </div>
                                                            <!--begin::body-->

                                                        </div>
                                                        <!--end::Group-->



                                                        <!--begin::Group-->
                                                            <div class="form-group row job_class_section">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {{trans('aides.job_class')}}
                                                                </label>
                                                                <div class="col-lg-9 col-md-9" style="margin-top: 10px">
                                                                    <div class="form-check pl-0 radio-inline">
                                                                        <label class="radio radio-outline">
                                                                            <input type="radio" id="job_class"
                                                                                   name="job_class" class="job_class"
                                                                                   {{$beneficiary->beneficiaryJob->job_class == trans('aides.gaza_government')?'checked':''}}
                                                                                   value="gaza_government"/>
                                                                            <span></span>
                                                                            {{trans('aides.gaza_government')}}
                                                                        </label>
                                                                        <label class="radio radio-outline">
                                                                            <input type="radio" id="job_class"
                                                                                   name="job_class" class="job_class"
                                                                                   {{$beneficiary->beneficiaryJob->job_class == trans('aides.west_bank_government')?'checked':''}}
                                                                                   value="west_bank_government"/>
                                                                            <span></span>
                                                                            {{trans('aides.west_bank_government')}}
                                                                        </label>
                                                                        <label class="radio radio-outline">
                                                                            <input type="radio" id="job_class"
                                                                                   name="job_class" class="job_class"
                                                                                   {{$beneficiary->beneficiaryJob->job_class == trans('aides.unrwa')?'checked':''}}
                                                                                   value="unrwa"/>
                                                                            <span></span>
                                                                            {{trans('aides.unrwa')}}
                                                                        </label>
                                                                        <label class="radio radio-outline">
                                                                            <input type="radio" id="job_class"
                                                                                   name="job_class" class="job_class"
                                                                                   {{$beneficiary->beneficiaryJob->job_class == trans('aides.private_job')?'checked':''}}
                                                                                   value="private_job"/>
                                                                            <span></span>
                                                                            {{trans('aides.private_job')}}
                                                                        </label>

                                                                        <label
                                                                            class="radio radio-outline job_class_none">
                                                                            <input type="radio" id="job_class_none"
                                                                                   name="job_class" class="job_class"
                                                                                   {{$beneficiary->beneficiaryJob->job_class == trans('aides.none')?'checked':''}}
                                                                                   value="none"/>
                                                                            <span></span>
                                                                            {{trans('aides.none')}}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <!--begin::body-->

                                                            </div>
                                                            <!--end::Group-->


                                                    <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {{trans('aides.benefit_from_agency_coupon')}}
                                                            </label>
                                                            <div class="col-lg-9 col-md-9" style="margin-top: 10px">
                                                                <div class="form-check pl-0 radio-inline">
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio"
                                                                               id="benefit_from_agency_coupon"
                                                                               name="benefit_from_agency_coupon"
                                                                               {{$beneficiary->beneficiaryJob->benefit_from_agency_coupon == '1'?'checked':''}}
                                                                               value="1"/>
                                                                        <span></span>
                                                                        {{trans('general.yes')}}
                                                                    </label>
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio"
                                                                               id="benefit_from_agency_coupon"
                                                                               name="benefit_from_agency_coupon"
                                                                               {{$beneficiary->beneficiaryJob->benefit_from_agency_coupon == '0'?'checked':''}}
                                                                               value="0"/>
                                                                        <span></span>
                                                                        {{trans('general.no')}}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <!--begin::body-->

                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {{trans('aides.benefit_from_social_affairs')}}
                                                            </label>
                                                            <div class="col-lg-9 col-md-9" style="margin-top: 10px">
                                                                <div class="form-check pl-0 radio-inline">
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio"
                                                                               id="benefit_from_social_affairs"
                                                                               name="benefit_from_social_affairs"
                                                                               {{$beneficiary->beneficiaryJob->benefit_from_social_affairs == '1'?'checked':''}}
                                                                               value="1"/>
                                                                        <span></span>
                                                                        {{trans('general.yes')}}
                                                                    </label>
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio"
                                                                               id="benefit_from_social_affairs"
                                                                               name="benefit_from_social_affairs"
                                                                               {{$beneficiary->beneficiaryJob->benefit_from_social_affairs == '0'?'checked':''}}
                                                                               value="0"/>
                                                                        <span></span>
                                                                        {{trans('general.no')}}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <!--begin::body-->

                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {{trans('aides.is_noor_employee')}}
                                                            </label>
                                                            <div class="col-lg-9 col-md-9" style="margin-top: 10px">
                                                                <div class="form-check pl-0 radio-inline">
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio"
                                                                               id="is_noor_employee"
                                                                               name="is_noor_employee"
                                                                               {{$beneficiary->beneficiaryJob->is_noor_employee == '1'?'checked':''}}
                                                                               value="1"/>
                                                                        <span></span>
                                                                        {{trans('general.yes')}}
                                                                    </label>
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio"
                                                                               id="is_noor_employee"
                                                                               name="is_noor_employee"
                                                                               {{$beneficiary->beneficiaryJob->is_noor_employee == '0'?'checked':''}}
                                                                               value="0"/>
                                                                        <span></span>
                                                                        {{trans('general.no')}}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <!--begin::body-->

                                                        </div>
                                                        <!--end::Group-->


                                                    </div>
                                                    <!--end::Wizard Step 2-->


                                                    <!--begin::Wizard Step 3-->
                                                    <div class="my-5 step" data-wizard-type="step-content">
                                                        <h5 class="mb-10 font-weight-bold text-dark">
                                                            {{trans('aides.beneficiary_family_details')}}
                                                        </h5>


                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {{trans('aides.family_status')}}
                                                            </label>
                                                            <div class="col-lg-9 col-md-9" style="margin-top: 10px">
                                                                <div class="form-check pl-0 radio-inline">
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio"
                                                                               id="family_status"
                                                                               name="family_status"
                                                                               {{$beneficiary->beneficiaryFamily->family_status == trans('aides.very_week')?'checked':''}}
                                                                               value="very_week"/>
                                                                        <span></span>
                                                                        {{trans('aides.very_week')}}
                                                                    </label>
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio"
                                                                               id="family_status"
                                                                               name="family_status"
                                                                               {{$beneficiary->beneficiaryFamily->family_status == trans('aides.week')?'checked':''}}
                                                                               value="week"/>
                                                                        <span></span>
                                                                        {{trans('aides.week')}}
                                                                    </label>
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio"
                                                                               id="family_status"
                                                                               name="family_status"
                                                                               {{$beneficiary->beneficiaryFamily->family_status == trans('aides.medium')?'checked':''}}
                                                                               value="medium"/>
                                                                        <span></span>
                                                                        {{trans('aides.medium')}}
                                                                    </label>
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio"
                                                                               id="family_status"
                                                                               name="family_status"
                                                                               {{$beneficiary->beneficiaryFamily->family_status == trans('aides.good')?'checked':''}}
                                                                               value="good"/>
                                                                        <span></span>
                                                                        {{trans('aides.good')}}
                                                                    </label>
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio"
                                                                               id="family_status"
                                                                               name="family_status"
                                                                               {{$beneficiary->beneficiaryFamily->family_status == trans('aides.very_good')?'checked':''}}
                                                                               value="very_good"/>
                                                                        <span></span>
                                                                        {{trans('aides.very_good')}}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <!--begin::body-->

                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.family_count') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="family_count" id="family_count"
                                                                    type="text"
                                                                    value="{!! $beneficiary->beneficiaryFamily->family_count !!}"
                                                                    placeholder="{!! trans('aides.enter_family_count') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.family_male_count') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="family_male_count" id="family_male_count"
                                                                    type="text"
                                                                    value="{!! $beneficiary->beneficiaryFamily->family_male_count !!}"
                                                                    placeholder="{!! trans('aides.enter_family_male_count') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.family_female_male_count') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="family_female_male_count"
                                                                    id="family_female_male_count" type="text"
                                                                    value="{!! $beneficiary->beneficiaryFamily->family_female_male_count !!}"
                                                                    placeholder="{!! trans('aides.enter_family_female_male_count') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.family_count_less_than_18') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="family_count_less_than_18"
                                                                    id="family_count_less_than_18" type="text"
                                                                    value="{!! $beneficiary->beneficiaryFamily->family_count_less_than_18 !!}"
                                                                    placeholder="{!! trans('aides.enter_family_count_less_than_18') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.family_male_count_less_than_18') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="family_male_count_less_than_18"
                                                                    id="family_male_count_less_than_18" type="text"
                                                                    value="{!! $beneficiary->beneficiaryFamily->family_male_count_less_than_18 !!}"
                                                                    placeholder="{!! trans('aides.enter_family_male_count_less_than_18') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.family_female_count_less_than_18') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="family_female_count_less_than_18"
                                                                    id="family_female_count_less_than_18"
                                                                    type="text"
                                                                    value="{!! $beneficiary->beneficiaryFamily->family_female_count_less_than_18 !!}"
                                                                    placeholder="{!! trans('aides.enter_family_female_count_less_than_18') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->


                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {{trans('aides.family_with_disabled')}}
                                                            </label>
                                                            <div class="col-lg-9 col-md-9" style="margin-top: 10px">
                                                                <div class="form-check pl-0 radio-inline">
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio"
                                                                               id="family_with_disabled"
                                                                               name="family_with_disabled"
                                                                               {{$beneficiary->beneficiaryFamily->family_with_disabled == '1'?'checked':''}}
                                                                               value="1"/>
                                                                        <span></span>
                                                                        {{trans('general.yes')}}
                                                                    </label>
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio"
                                                                               id="family_with_disabled"
                                                                               name="family_with_disabled"
                                                                               {{$beneficiary->beneficiaryFamily->family_with_disabled == '0'?'checked':''}}
                                                                               value="0"/>
                                                                        <span></span>
                                                                        {{trans('general.no')}}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <!--begin::body-->

                                                        </div>
                                                        <!--end::Group-->

                                                        <div class="family_disabled_section">
                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {!! trans('aides.disabled_count') !!}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control  form-control-lg"
                                                                        name="disabled_count"
                                                                        id="disabled_count" type="text"
                                                                        value="{{$beneficiary->beneficiaryFamily->disabled_count }}"
                                                                        placeholder="{!! trans('aides.enter_disabled_count') !!}"
                                                                        autocomplete="off"/>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->


                                                            <!--begin::Group-->
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                                    {!! trans('aides.disabled_less_than_18_count') !!}
                                                                </label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input
                                                                        class="form-control  form-control-lg"
                                                                        name="disabled_less_than_18_count"
                                                                        id="disabled_less_than_18_count" type="text"
                                                                        value="{{$beneficiary->beneficiaryFamily->disabled_less_than_18_count }}"
                                                                        placeholder="{!! trans('aides.enter_disabled_less_than_18_count') !!}"
                                                                        autocomplete="off"/>
                                                                </div>
                                                            </div>
                                                            <!--end::Group-->
                                                        </div>


                                                        <!--begin::Group-->
                                                        <div class="form-group row">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {{trans('aides.family_with_patients')}}
                                                            </label>
                                                            <div class="col-lg-9 col-md-9" style="margin-top: 10px">
                                                                <div class="form-check pl-0 radio-inline">
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio"
                                                                               id="family_with_patients"
                                                                               name="family_with_patients"
                                                                               {{$beneficiary->beneficiaryFamily->family_with_patients == '1'?'checked':''}}
                                                                               value="1"/>
                                                                        <span></span>
                                                                        {{trans('general.yes')}}
                                                                    </label>
                                                                    <label class="radio radio-outline">
                                                                        <input type="radio"
                                                                               id="family_with_patients"
                                                                               name="family_with_patients"
                                                                               {{$beneficiary->beneficiaryFamily->family_with_patients == '0'?'checked':''}}
                                                                               value="0"/>
                                                                        <span></span>
                                                                        {{trans('general.no')}}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <!--begin::body-->

                                                        </div>
                                                        <!--end::Group-->

                                                        <!--begin::Group-->
                                                        <div class="form-group row patients_section">
                                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                                {!! trans('aides.patients_count') !!}
                                                            </label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input
                                                                    class="form-control  form-control-lg"
                                                                    name="patients_count"
                                                                    id="patients_count" type="text"
                                                                    value="{{$beneficiary->beneficiaryFamily->patients_count }}"
                                                                    placeholder="{!! trans('aides.enter_patients_count') !!}"
                                                                    autocomplete="off"/>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->

                                                    </div>
                                                    <!--end::Wizard Step 3-->


                                                    <!--begin::Wizard Step 4-->
                                                    <div class="my-5 step" data-wizard-type="step-content">
                                                        <h5 class="mb-10 font-weight-bold text-dark">
                                                            {{trans('general.review_your_details_and_submit')}}
                                                        </h5>
                                                    </div>
                                                    <!--end::Wizard Step 4-->


                                                    <!--begin::Wizard Actions-->
                                                    <div
                                                        class="d-flex justify-content-between border-top pt-10 mt-15">
                                                        <div class="mr-2">
                                                            <button type="button" id="prev-step"
                                                                    class="btn btn-light-primary font-weight-bolder px-9 py-4"
                                                                    data-wizard-type="action-prev">
                                                                {!! trans('general.previous') !!}
                                                            </button>
                                                        </div>
                                                        <div>
                                                            <button type="submit" data-wizard-type="action-submit"
                                                                    class="btn btn-success font-weight-bolder px-9 py-4">
                                                                {!! trans('general.submit') !!}
                                                            </button>

                                                            <button type="button" id="next-step"
                                                                    class="btn btn-primary font-weight-bolder px-9 py-4"
                                                                    data-wizard-type="action-next">
                                                                {!! trans('general.next') !!}
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
    <script src="{{asset('adminBoard/assets/js/beneficiary.js')}}"></script>


    <script type="text/javascript">


        ///////////////////////////////////////////////////////////////////////////////////////
        // Wizard
        var _wizardEl;
        var _wizard;
        var _validations = [];

        // Private Functions
        var _initWizard = function () {
            // Initialize form wizard
            _wizard = new KTWizard(_wizardEl, {
                startStep: 1, // initial active step number
                clickableSteps: true  // allow step clicking
            });

            // Validation before going to next page
            _wizard.on('beforeNext', function (wizard) {
                // Don't go to the next step yet
                _wizard.stop();

                // Validate form
                var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        _wizard.goNext();
                        KTUtil.scrollTop();
                    } else {
                        Swal.fire({
                            text: "{{trans('general.validation_error_message')}}",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "{{trans('general.ok_got_it')}}",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light"
                            }
                        }).then(function () {
                            KTUtil.scrollTop();
                        });
                    }
                });
            });

            // Change Event
            _wizard.on('change', function (wizard) {
                KTUtil.scrollTop();
            });
        }

        ///////////////////////////////////////////////////////////////////////////////////////
        // get City By Governorate ID
        $('#governorate').on('change', function () {
            var governorate_id = this.value
            $('#city')
                .empty()
                .append('<option selected="selected" value="">{{trans('general.select_from_list')}}</option>');
            getCityByGovernorateID(governorate_id)
        });

        function getCityByGovernorateID($id) {
            $.ajax({
                type: "get",
                url: "{!! route('get.city.by.governorate.id') !!}",
                data: {id: $id}

            }).done(function (result) {
                console.log(result)
                $(result).each(function () {
                    if ("{{Lang()=='ar'}}") {
                        $("#city").append($('<option>', {
                            value: this.id,
                            text: this.city_name_ar,
                        }));
                    } else {
                        $("#city").append($('<option>', {
                            value: this.id,
                            text: this.city_name_en,
                        }));
                    }
                });
            });

        }


        ///////////////////////////////////////////////////////////////////////////////////////
        // get Neighborhood By City ID
        $('#city').on('change', function () {
            var city_id = this.value
            $('#neighborhood')
                .empty()
                .append('<option selected="selected" value="">{{trans('general.select_from_list')}}</option>');
            getNeighborhoodByCityID(city_id)
        });

        function getNeighborhoodByCityID($id) {
            $.ajax({
                type: "get",
                url: "{!! route('get.neighborhood.by.city.id') !!}",
                data: {id: $id}

            }).done(function (result) {
                console.log(result)
                $(result).each(function () {
                    if ("{{Lang()=='ar'}}") {
                        $("#neighborhood").append($('<option>', {
                            value: this.id,
                            text: this.neighborhood_name_ar,
                        }));
                    } else {
                        $("#neighborhood").append($('<option>', {
                            value: this.id,
                            text: this.neighborhood_name_en,
                        }));
                    }
                });
            });

        }

        ///////////////////////////////////////////////////////////////////////////////////////
        // Job Status Radio Button Change
        // $('.job_class_section').addClass('d-none');
        ///////////////////////////////////////////////////////////////
        $('input[type=radio][name=job_status]').change(function () {
            if (this.value == "permanent") {
                $('.job_class').prop('checked', false);
                $('.job_class_section').removeClass('d-none');
            } else {
                $('#job_class_none').prop('checked', true);
                // $('.job_class').prop('checked', false);
                $('.job_class_section').addClass('d-none');
            }
        });

        ///////////////////////////////////////////////////////////////////////////////////////
        // Family Disabled Button Change
        //$('.family_disabled_section').addClass('d-none');
        ///////////////////////////////////////////////////////////////
        $('input[type=radio][name=family_with_disabled]').change(function () {
            if (this.value == "1") {
                $('#disabled_count').removeClass("is-valid");
                $('#disabled_less_than_18_count').removeClass("is-valid");
                $('.family_disabled_section').removeClass('d-none');
            } else {
                $('#disabled_count').val("0");
                $('#disabled_less_than_18_count').val("0");
                $('.family_disabled_section').addClass('d-none');
            }
        });
        ///////////////////////////////////////////////////////////////////////////////////////
        // Family Disabled Button Change
        //$('.patients_section').addClass('d-none');
        ///////////////////////////////////////////////////////////////
        $('input[type=radio][name=family_with_patients]').change(function () {
            if (this.value == "1") {
                $('#patients_count').removeClass("is-valid");
                $('.patients_section').removeClass('d-none');
            } else {
                $('#patients_count').val("0");
                $('.patients_section').addClass('d-none');
            }
        });


        ////////////////////////////////////////////////////
        $('.update_beneficiary_form').on('submit', function (e) {
            e.preventDefault();

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
                },
                success: function (data) {
                    KTApp.unblockPage();
                    console.log(data);
                    if (data.status == true) {
                        Swal.fire({
                            title: data.msg,
                            text: "",
                            icon: "success",
                            allowOutsideClick: false,
                            customClass: {confirmButton: 'update_beneficiary_button'}
                        });
                        $('.update_beneficiary_button').click(function () {
                            //window.location.href = "{{route('aides.beneficiaries')}}";
                        });
                    }
                },
                complete: function () {
                    KTApp.unblockPage();
                },
            });//end ajax

        });//end submit


    </script>
@endpush
