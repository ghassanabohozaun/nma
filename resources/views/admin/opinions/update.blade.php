@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{{route('admin.clients.opinions.update')}}" method="POST" id="form_opinions_update">
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
                            <a href="{{route('admin.clients.opinions')}}" class="text-muted">
                                {{trans('menu.clients_opinions')}}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{trans('opinions.update_opinion')}}
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
                                                    <div class="d-none form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            ID
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="id" id="id" type="hidden"
                                                                value="{{$clientOpinion->id}}"/>
                                                        </div>

                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('opinions.photo')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div
                                                                class="image-input image-input-outline"
                                                                id="kt_opinion_photo">

                                                                <div class="image-input-wrapper"
                                                                     style="background-image: url({{asset(Storage::url($clientOpinion->photo))}});"></div>
                                                                <label
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="change" data-toggle="tooltip" title=""
                                                                    data-original-title="{{trans('general.change_image')}}">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="photo" id="photo"
                                                                           class="table-responsive-sm">
                                                                    <input type="hidden" name="photo_remove"/>
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
                                                                  id="photo_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('opinions.language')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <select
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="language" id="language" type="text">

                                                                <option
                                                                    value="ar" {{$clientOpinion->language == trans('general.ar') ?'selected':'' }}>
                                                                    {{trans('general.ar')}}
                                                                </option>

                                                                <option
                                                                    value="en" {{$clientOpinion->language == trans('general.en') ?'selected':'' }}>
                                                                    {{trans('general.en')}}
                                                                </option>
                                                                <option
                                                                    value="ar_en" {{$clientOpinion->language == trans('general.ar_en') ?'selected':'' }}>
                                                                    {{trans('general.ar_en')}}
                                                                </option>

                                                            </select>
                                                            <span class="form-text text-danger"
                                                                  id="language_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('opinions.client_name_ar')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="client_name_ar" id="client_name_ar" type="text"
                                                                placeholder=" {{trans('opinions.enter_client_name_ar')}}"
                                                                autocomplete="off"
                                                                value="{{$clientOpinion->client_name_ar}}"/>
                                                            <span class="form-text text-danger"
                                                                  id="client_name_ar_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('opinions.client_name_en')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="client_name_en" id="client_name_en" type="text"
                                                                placeholder=" {{trans('opinions.enter_client_name_en')}}"
                                                                autocomplete="off"
                                                                value="{{$clientOpinion->client_name_en}}"/>

                                                            <span class="form-text text-danger"
                                                                  id="client_name_en_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('opinions.client_age')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="client_age" id="client_age" type="text"
                                                                value="{{$clientOpinion->client_age}}"
                                                                placeholder=" {{trans('opinions.enter_client_age')}}"
                                                                autocomplete="off"/>

                                                            <span class="form-text text-danger"
                                                                  id="client_age_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('opinions.country')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <select
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="country" id="country" type="text">
                                                                <option value='ad'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ad" data-title="Andorra">
                                                                    Andorra
                                                                </option>
                                                                <option value='ae'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ae"
                                                                        data-title="United Arab Emirates">United Arab
                                                                    Emirates
                                                                </option>
                                                                <option value='af'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag af"
                                                                        data-title="Afghanistan">Afghanistan
                                                                </option>
                                                                <option value='ag'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ag"
                                                                        data-title="Antigua and Barbuda">Antigua and
                                                                    Barbuda
                                                                </option>
                                                                <option value='ai'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ai" data-title="Anguilla">
                                                                    Anguilla
                                                                </option>
                                                                <option value='al'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag al" data-title="Albania">
                                                                    Albania
                                                                </option>
                                                                <option value='am'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag am" data-title="Armenia">
                                                                    Armenia
                                                                </option>
                                                                <option value='an'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag an"
                                                                        data-title="Netherlands Antilles">Netherlands
                                                                    Antilles
                                                                </option>
                                                                <option value='ao'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ao" data-title="Angola">
                                                                    Angola
                                                                </option>
                                                                <option value='aq'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag aq" data-title="Antarctica">
                                                                    Antarctica
                                                                </option>
                                                                <option value='ar'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ar" data-title="Argentina">
                                                                    Argentina
                                                                </option>
                                                                <option value='as'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag as"
                                                                        data-title="American Samoa">American Samoa
                                                                </option>
                                                                <option value='at'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag at" data-title="Austria">
                                                                    Austria
                                                                </option>
                                                                <option value='au'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag au" data-title="Australia">
                                                                    Australia
                                                                </option>
                                                                <option value='aw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag aw" data-title="Aruba">Aruba
                                                                </option>
                                                                <option value='ax'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ax"
                                                                        data-title="Aland Islands">Aland Islands
                                                                </option>
                                                                <option value='az'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag az" data-title="Azerbaijan">
                                                                    Azerbaijan
                                                                </option>
                                                                <option value='ba'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ba"
                                                                        data-title="Bosnia and Herzegovina">Bosnia and
                                                                    Herzegovina
                                                                </option>
                                                                <option value='bb'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bb" data-title="Barbados">
                                                                    Barbados
                                                                </option>
                                                                <option value='bd'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bd" data-title="Bangladesh">
                                                                    Bangladesh
                                                                </option>
                                                                <option value='be'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag be" data-title="Belgium">
                                                                    Belgium
                                                                </option>
                                                                <option value='bf'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bf"
                                                                        data-title="Burkina Faso">Burkina Faso
                                                                </option>
                                                                <option value='bg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bg" data-title="Bulgaria">
                                                                    Bulgaria
                                                                </option>
                                                                <option value='bh'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bh" data-title="Bahrain">
                                                                    Bahrain
                                                                </option>
                                                                <option value='bi'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bi" data-title="Burundi">
                                                                    Burundi
                                                                </option>
                                                                <option value='bj'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bj" data-title="Benin">Benin
                                                                </option>
                                                                <option value='bm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bm" data-title="Bermuda">
                                                                    Bermuda
                                                                </option>
                                                                <option value='bn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bn"
                                                                        data-title="Brunei Darussalam">Brunei Darussalam
                                                                </option>
                                                                <option value='bo'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bo" data-title="Bolivia">
                                                                    Bolivia
                                                                </option>
                                                                <option value='br'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag br" data-title="Brazil">
                                                                    Brazil
                                                                </option>
                                                                <option value='bs'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bs" data-title="Bahamas">
                                                                    Bahamas
                                                                </option>
                                                                <option value='bt'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bt" data-title="Bhutan">
                                                                    Bhutan
                                                                </option>
                                                                <option value='bv'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bv"
                                                                        data-title="Bouvet Island">Bouvet Island
                                                                </option>
                                                                <option value='bw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bw" data-title="Botswana">
                                                                    Botswana
                                                                </option>
                                                                <option value='by'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag by" data-title="Belarus">
                                                                    Belarus
                                                                </option>
                                                                <option value='bz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag bz" data-title="Belize">
                                                                    Belize
                                                                </option>
                                                                <option value='ca'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ca" data-title="Canada">
                                                                    Canada
                                                                </option>
                                                                <option value='cc'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cc"
                                                                        data-title="Cocos (Keeling) Islands">Cocos
                                                                    (Keeling)
                                                                    Islands
                                                                </option>
                                                                <option value='cd'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cd"
                                                                        data-title="Democratic Republic of the Congo">
                                                                    Democratic
                                                                    Republic of the Congo
                                                                </option>
                                                                <option value='cf'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cf"
                                                                        data-title="Central African Republic">Central
                                                                    African
                                                                    Republic
                                                                </option>
                                                                <option value='cg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cg" data-title="Congo">Congo
                                                                </option>
                                                                <option value='ch'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ch"
                                                                        data-title="Switzerland">Switzerland
                                                                </option>
                                                                <option value='ci'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ci"
                                                                        data-title="Cote D'Ivoire (Ivory Coast)">Cote
                                                                    D'Ivoire
                                                                    (Ivory Coast)
                                                                </option>
                                                                <option value='ck'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ck"
                                                                        data-title="Cook Islands">Cook Islands
                                                                </option>
                                                                <option value='cl'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cl" data-title="Chile">Chile
                                                                </option>
                                                                <option value='cm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cm" data-title="Cameroon">
                                                                    Cameroon
                                                                </option>
                                                                <option value='cn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cn" data-title="China">China
                                                                </option>
                                                                <option value='co'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag co" data-title="Colombia">
                                                                    Colombia
                                                                </option>
                                                                <option value='cr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cr" data-title="Costa Rica">
                                                                    Costa Rica
                                                                </option>
                                                                <option value='cs'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cs"
                                                                        data-title="Serbia and Montenegro">Serbia and
                                                                    Montenegro
                                                                </option>
                                                                <option value='cu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cu" data-title="Cuba">Cuba
                                                                </option>
                                                                <option value='cv'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cv" data-title="Cape Verde">
                                                                    Cape Verde
                                                                </option>
                                                                <option value='cx'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cx"
                                                                        data-title="Christmas Island">Christmas Island
                                                                </option>
                                                                <option value='cy'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cy" data-title="Cyprus">
                                                                    Cyprus
                                                                </option>
                                                                <option value='cz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag cz"
                                                                        data-title="Czech Republic">Czech Republic
                                                                </option>
                                                                <option value='de'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag de" data-title="Germany">
                                                                    Germany
                                                                </option>
                                                                <option value='dj'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag dj" data-title="Djibouti">
                                                                    Djibouti
                                                                </option>
                                                                <option value='dk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag dk" data-title="Denmark">
                                                                    Denmark
                                                                </option>
                                                                <option value='dm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag dm" data-title="Dominica">
                                                                    Dominica
                                                                </option>
                                                                <option value='do'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag do"
                                                                        data-title="Dominican Republic">Dominican
                                                                    Republic
                                                                </option>
                                                                <option value='dz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag dz" data-title="Algeria">
                                                                    Algeria
                                                                </option>
                                                                <option value='ec'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ec" data-title="Ecuador">
                                                                    Ecuador
                                                                </option>
                                                                <option value='ee'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ee" data-title="Estonia">
                                                                    Estonia
                                                                </option>
                                                                <option value='eg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag eg" data-title="Egypt">Egypt
                                                                </option>
                                                                <option value='eh'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag eh"
                                                                        data-title="Western Sahara">Western Sahara
                                                                </option>
                                                                <option value='er'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag er" data-title="Eritrea">
                                                                    Eritrea
                                                                </option>
                                                                <option value='es'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag es" data-title="Spain">Spain
                                                                </option>
                                                                <option value='et'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag et" data-title="Ethiopia">
                                                                    Ethiopia
                                                                </option>
                                                                <option value='fi'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag fi" data-title="Finland">
                                                                    Finland
                                                                </option>
                                                                <option value='fj'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag fj" data-title="Fiji">Fiji
                                                                </option>
                                                                <option value='fk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag fk"
                                                                        data-title="Falkland Islands (Malvinas)">
                                                                    Falkland
                                                                    Islands (Malvinas)
                                                                </option>
                                                                <option value='fm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag fm"
                                                                        data-title="Federated States of Micronesia">
                                                                    Federated
                                                                    States of Micronesia
                                                                </option>
                                                                <option value='fo'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag fo"
                                                                        data-title="Faroe Islands">Faroe Islands
                                                                </option>
                                                                <option value='fr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag fr" data-title="France">
                                                                    France
                                                                </option>
                                                                <option value='fx'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag fx"
                                                                        data-title="France, Metropolitan">France,
                                                                    Metropolitan
                                                                </option>
                                                                <option value='ga'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ga" data-title="Gabon">Gabon
                                                                </option>
                                                                <option value='gb'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gb"
                                                                        data-title="Great Britain (UK)"
                                                                        selected="selected">
                                                                    Great Britain (UK)
                                                                </option>
                                                                <option value='gd'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gd" data-title="Grenada">
                                                                    Grenada
                                                                </option>
                                                                <option value='ge'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ge" data-title="Georgia">
                                                                    Georgia
                                                                </option>
                                                                <option value='gf'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gf"
                                                                        data-title="French Guiana">French Guiana
                                                                </option>
                                                                <option value='gh'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gh" data-title="Ghana">Ghana
                                                                </option>
                                                                <option value='gi'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gi" data-title="Gibraltar">
                                                                    Gibraltar
                                                                </option>
                                                                <option value='gl'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gl" data-title="Greenland">
                                                                    Greenland
                                                                </option>
                                                                <option value='gm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gm" data-title="Gambia">
                                                                    Gambia
                                                                </option>
                                                                <option value='gn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gn" data-title="Guinea">
                                                                    Guinea
                                                                </option>
                                                                <option value='gp'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gp" data-title="Guadeloupe">
                                                                    Guadeloupe
                                                                </option>
                                                                <option value='gq'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gq"
                                                                        data-title="Equatorial Guinea">Equatorial Guinea
                                                                </option>
                                                                <option value='gr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gr" data-title="Greece">
                                                                    Greece
                                                                </option>
                                                                <option value='gs'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gs"
                                                                        data-title="S. Georgia and S. Sandwich Islands">
                                                                    S.
                                                                    Georgia and S. Sandwich Islands
                                                                </option>
                                                                <option value='gt'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gt" data-title="Guatemala">
                                                                    Guatemala
                                                                </option>
                                                                <option value='gu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gu" data-title="Guam">Guam
                                                                </option>
                                                                <option value='gw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gw"
                                                                        data-title="Guinea-Bissau">Guinea-Bissau
                                                                </option>
                                                                <option value='gy'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag gy" data-title="Guyana">
                                                                    Guyana
                                                                </option>
                                                                <option value='hk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag hk" data-title="Hong Kong">
                                                                    Hong Kong
                                                                </option>
                                                                <option value='hm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag hm"
                                                                        data-title="Heard Island and McDonald Islands">
                                                                    Heard
                                                                    Island and McDonald Islands
                                                                </option>
                                                                <option value='hn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag hn" data-title="Honduras">
                                                                    Honduras
                                                                </option>
                                                                <option value='hr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag hr"
                                                                        data-title="Croatia (Hrvatska)">Croatia
                                                                    (Hrvatska)
                                                                </option>
                                                                <option value='ht'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ht" data-title="Haiti">Haiti
                                                                </option>
                                                                <option value='hu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag hu" data-title="Hungary">
                                                                    Hungary
                                                                </option>
                                                                <option value='id'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag id" data-title="Indonesia">
                                                                    Indonesia
                                                                </option>
                                                                <option value='ie'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ie" data-title="Ireland">
                                                                    Ireland
                                                                </option>
                                                                <option value='il'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag il" data-title="Israel">
                                                                    Israel
                                                                </option>
                                                                <option value='in'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag in" data-title="India">India
                                                                </option>
                                                                <option value='io'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag io"
                                                                        data-title="British Indian Ocean Territory">
                                                                    British
                                                                    Indian Ocean Territory
                                                                </option>
                                                                <option value='iq'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag iq" data-title="Iraq">Iraq
                                                                </option>
                                                                <option value='ir'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ir" data-title="Iran">Iran
                                                                </option>
                                                                <option value='is'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag is" data-title="Iceland">
                                                                    Iceland
                                                                </option>
                                                                <option value='it'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag it" data-title="Italy">Italy
                                                                </option>
                                                                <option value='jm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag jm" data-title="Jamaica">
                                                                    Jamaica
                                                                </option>
                                                                <option value='jo'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag jo" data-title="Jordan">
                                                                    Jordan
                                                                </option>
                                                                <option value='jp'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag jp" data-title="Japan">Japan
                                                                </option>
                                                                <option value='ke'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ke" data-title="Kenya">Kenya
                                                                </option>
                                                                <option value='kg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag kg" data-title="Kyrgyzstan">
                                                                    Kyrgyzstan
                                                                </option>
                                                                <option value='kh'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag kh" data-title="Cambodia">
                                                                    Cambodia
                                                                </option>
                                                                <option value='ki'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ki" data-title="Kiribati">
                                                                    Kiribati
                                                                </option>
                                                                <option value='km'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag km" data-title="Comoros">
                                                                    Comoros
                                                                </option>
                                                                <option value='kn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag kn"
                                                                        data-title="Saint Kitts and Nevis">Saint Kitts
                                                                    and Nevis
                                                                </option>
                                                                <option value='kp'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag kp"
                                                                        data-title="Korea (North)">Korea (North)
                                                                </option>
                                                                <option value='kr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag kr"
                                                                        data-title="Korea (South)">Korea (South)
                                                                </option>
                                                                <option value='kw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag kw" data-title="Kuwait">
                                                                    Kuwait
                                                                </option>
                                                                <option value='ky'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ky"
                                                                        data-title="Cayman Islands">Cayman Islands
                                                                </option>
                                                                <option value='kz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag kz" data-title="Kazakhstan">
                                                                    Kazakhstan
                                                                </option>
                                                                <option value='la'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag la" data-title="Laos">Laos
                                                                </option>
                                                                <option value='lb'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag lb" data-title="Lebanon">
                                                                    Lebanon
                                                                </option>
                                                                <option value='lc'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag lc"
                                                                        data-title="Saint Lucia">Saint Lucia
                                                                </option>
                                                                <option value='li'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag li"
                                                                        data-title="Liechtenstein">Liechtenstein
                                                                </option>
                                                                <option value='lk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag lk" data-title="Sri Lanka">
                                                                    Sri Lanka
                                                                </option>
                                                                <option value='lr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag lr" data-title="Liberia">
                                                                    Liberia
                                                                </option>
                                                                <option value='ls'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ls" data-title="Lesotho">
                                                                    Lesotho
                                                                </option>
                                                                <option value='lt'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag lt" data-title="Lithuania">
                                                                    Lithuania
                                                                </option>
                                                                <option value='lu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag lu" data-title="Luxembourg">
                                                                    Luxembourg
                                                                </option>
                                                                <option value='lv'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag lv" data-title="Latvia">
                                                                    Latvia
                                                                </option>
                                                                <option value='ly'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ly" data-title="Libya">Libya
                                                                </option>
                                                                <option value='ma'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ma" data-title="Morocco">
                                                                    Morocco
                                                                </option>
                                                                <option value='mc'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mc" data-title="Monaco">
                                                                    Monaco
                                                                </option>
                                                                <option value='md'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag md" data-title="Moldova">
                                                                    Moldova
                                                                </option>
                                                                <option value='mg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mg" data-title="Madagascar">
                                                                    Madagascar
                                                                </option>
                                                                <option value='mh'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mh"
                                                                        data-title="Marshall Islands">Marshall Islands
                                                                </option>
                                                                <option value='mk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mk" data-title="Macedonia">
                                                                    Macedonia
                                                                </option>
                                                                <option value='ml'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ml" data-title="Mali">Mali
                                                                </option>
                                                                <option value='mm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mm" data-title="Myanmar">
                                                                    Myanmar
                                                                </option>
                                                                <option value='mn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mn" data-title="Mongolia">
                                                                    Mongolia
                                                                </option>
                                                                <option value='mo'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mo" data-title="Macao">Macao
                                                                </option>
                                                                <option value='mp'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mp"
                                                                        data-title="Northern Mariana Islands">Northern
                                                                    Mariana
                                                                    Islands
                                                                </option>
                                                                <option value='mq'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mq" data-title="Martinique">
                                                                    Martinique
                                                                </option>
                                                                <option value='mr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mr" data-title="Mauritania">
                                                                    Mauritania
                                                                </option>
                                                                <option value='ms'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ms" data-title="Montserrat">
                                                                    Montserrat
                                                                </option>
                                                                <option value='mt'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mt" data-title="Malta">Malta
                                                                </option>
                                                                <option value='mu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mu" data-title="Mauritius">
                                                                    Mauritius
                                                                </option>
                                                                <option value='mv'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mv" data-title="Maldives">
                                                                    Maldives
                                                                </option>
                                                                <option value='mw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mw" data-title="Malawi">
                                                                    Malawi
                                                                </option>
                                                                <option value='mx'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mx" data-title="Mexico">
                                                                    Mexico
                                                                </option>
                                                                <option value='my'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag my" data-title="Malaysia">
                                                                    Malaysia
                                                                </option>
                                                                <option value='mz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag mz" data-title="Mozambique">
                                                                    Mozambique
                                                                </option>
                                                                <option value='na'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag na" data-title="Namibia">
                                                                    Namibia
                                                                </option>
                                                                <option value='nc'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag nc"
                                                                        data-title="New Caledonia">New Caledonia
                                                                </option>
                                                                <option value='ne'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ne" data-title="Niger">Niger
                                                                </option>
                                                                <option value='nf'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag nf"
                                                                        data-title="Norfolk Island">Norfolk Island
                                                                </option>
                                                                <option value='ng'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ng" data-title="Nigeria">
                                                                    Nigeria
                                                                </option>
                                                                <option value='ni'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ni" data-title="Nicaragua">
                                                                    Nicaragua
                                                                </option>
                                                                <option value='nl'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag nl"
                                                                        data-title="Netherlands">Netherlands
                                                                </option>
                                                                <option value='no'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag no" data-title="Norway">
                                                                    Norway
                                                                </option>
                                                                <option value='np'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag np" data-title="Nepal">Nepal
                                                                </option>
                                                                <option value='nr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag nr" data-title="Nauru">Nauru
                                                                </option>
                                                                <option value='nu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag nu" data-title="Niue">Niue
                                                                </option>
                                                                <option value='nz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag nz"
                                                                        data-title="New Zealand (Aotearoa)">New Zealand
                                                                    (Aotearoa)
                                                                </option>
                                                                <option value='om'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag om" data-title="Oman">Oman
                                                                </option>
                                                                <option value='pa'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pa" data-title="Panama">
                                                                    Panama
                                                                </option>
                                                                <option value='pe'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pe" data-title="Peru">Peru
                                                                </option>
                                                                <option value='pf'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pf"
                                                                        data-title="French Polynesia">French Polynesia
                                                                </option>
                                                                <option value='pg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pg"
                                                                        data-title="Papua New Guinea">Papua New Guinea
                                                                </option>
                                                                <option value='ph'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ph"
                                                                        data-title="Philippines">Philippines
                                                                </option>
                                                                <option value='pk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pk" data-title="Pakistan">
                                                                    Pakistan
                                                                </option>
                                                                <option value='pl'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pl" data-title="Poland">
                                                                    Poland
                                                                </option>
                                                                <option value='pm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pm"
                                                                        data-title="Saint Pierre and Miquelon">Saint
                                                                    Pierre and
                                                                    Miquelon
                                                                </option>
                                                                <option value='pn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pn" data-title="Pitcairn">
                                                                    Pitcairn
                                                                </option>
                                                                <option value='pr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pr"
                                                                        data-title="Puerto Rico">Puerto Rico
                                                                </option>
                                                                <option value='ps'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ps"
                                                                        data-title="Palestinian Territory">Palestinian
                                                                    Territory
                                                                </option>
                                                                <option value='pt'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pt" data-title="Portugal">
                                                                    Portugal
                                                                </option>
                                                                <option value='pw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag pw" data-title="Palau">Palau
                                                                </option>
                                                                <option value='py'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag py" data-title="Paraguay">
                                                                    Paraguay
                                                                </option>
                                                                <option value='qa'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag qa" data-title="Qatar">Qatar
                                                                </option>
                                                                <option value='re'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag re" data-title="Reunion">
                                                                    Reunion
                                                                </option>
                                                                <option value='ro'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ro" data-title="Romania">
                                                                    Romania
                                                                </option>
                                                                <option value='ru'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ru"
                                                                        data-title="Russian Federation">Russian
                                                                    Federation
                                                                </option>
                                                                <option value='rw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag rw" data-title="Rwanda">
                                                                    Rwanda
                                                                </option>
                                                                <option value='sa'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sa"
                                                                        data-title="Saudi Arabia">Saudi Arabia
                                                                </option>
                                                                <option value='sb'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sb"
                                                                        data-title="Solomon Islands">Solomon Islands
                                                                </option>
                                                                <option value='sc'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sc" data-title="Seychelles">
                                                                    Seychelles
                                                                </option>
                                                                <option value='sd'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sd" data-title="Sudan">Sudan
                                                                </option>
                                                                <option value='se'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag se" data-title="Sweden">
                                                                    Sweden
                                                                </option>
                                                                <option value='sg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sg" data-title="Singapore">
                                                                    Singapore
                                                                </option>
                                                                <option value='sh'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sh"
                                                                        data-title="Saint Helena">Saint Helena
                                                                </option>
                                                                <option value='si'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag si" data-title="Slovenia">
                                                                    Slovenia
                                                                </option>
                                                                <option value='sj'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sj"
                                                                        data-title="Svalbard and Jan Mayen">Svalbard and
                                                                    Jan
                                                                    Mayen
                                                                </option>
                                                                <option value='sk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sk" data-title="Slovakia">
                                                                    Slovakia
                                                                </option>
                                                                <option value='sl'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sl"
                                                                        data-title="Sierra Leone">Sierra Leone
                                                                </option>
                                                                <option value='sm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sm" data-title="San Marino">
                                                                    San Marino
                                                                </option>
                                                                <option value='sn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sn" data-title="Senegal">
                                                                    Senegal
                                                                </option>
                                                                <option value='so'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag so" data-title="Somalia">
                                                                    Somalia
                                                                </option>
                                                                <option value='sr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sr" data-title="Suriname">
                                                                    Suriname
                                                                </option>
                                                                <option value='st'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag st"
                                                                        data-title="Sao Tome and Principe">Sao Tome and
                                                                    Principe
                                                                </option>
                                                                <option value='su'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag su"
                                                                        data-title="USSR (former)">USSR (former)
                                                                </option>
                                                                <option value='sv'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sv"
                                                                        data-title="El Salvador">El Salvador
                                                                </option>
                                                                <option value='sy'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sy" data-title="Syria">Syria
                                                                </option>
                                                                <option value='sz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag sz" data-title="Swaziland">
                                                                    Swaziland
                                                                </option>
                                                                <option value='tc'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tc"
                                                                        data-title="Turks and Caicos Islands">Turks and
                                                                    Caicos
                                                                    Islands
                                                                </option>
                                                                <option value='td'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag td" data-title="Chad">Chad
                                                                </option>
                                                                <option value='tf'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tf"
                                                                        data-title="French Southern Territories">French
                                                                    Southern
                                                                    Territories
                                                                </option>
                                                                <option value='tg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tg" data-title="Togo">Togo
                                                                </option>
                                                                <option value='th'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag th" data-title="Thailand">
                                                                    Thailand
                                                                </option>
                                                                <option value='tj'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tj" data-title="Tajikistan">
                                                                    Tajikistan
                                                                </option>
                                                                <option value='tk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tk" data-title="Tokelau">
                                                                    Tokelau
                                                                </option>
                                                                <option value='tl'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tl"
                                                                        data-title="Timor-Leste">Timor-Leste
                                                                </option>
                                                                <option value='tm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tm"
                                                                        data-title="Turkmenistan">Turkmenistan
                                                                </option>
                                                                <option value='tn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tn" data-title="Tunisia">
                                                                    Tunisia
                                                                </option>
                                                                <option value='to'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag to" data-title="Tonga">Tonga
                                                                </option>
                                                                <option value='tp'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tp" data-title="East Timor">
                                                                    East Timor
                                                                </option>
                                                                <option value='tr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tr" data-title="Turkey">
                                                                    Turkey
                                                                </option>
                                                                <option value='tt'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tt"
                                                                        data-title="Trinidad and Tobago">Trinidad and
                                                                    Tobago
                                                                </option>
                                                                <option value='tv'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tv" data-title="Tuvalu">
                                                                    Tuvalu
                                                                </option>
                                                                <option value='tw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tw" data-title="Taiwan">
                                                                    Taiwan
                                                                </option>
                                                                <option value='tz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag tz" data-title="Tanzania">
                                                                    Tanzania
                                                                </option>
                                                                <option value='ua'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ua" data-title="Ukraine">
                                                                    Ukraine
                                                                </option>
                                                                <option value='ug'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ug" data-title="Uganda">
                                                                    Uganda
                                                                </option>
                                                                <option value='uk'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag uk"
                                                                        data-title="United Kingdom">United Kingdom
                                                                </option>
                                                                <option value='um'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag um"
                                                                        data-title="United States Minor Outlying Islands">
                                                                    United
                                                                    States Minor Outlying Islands
                                                                </option>
                                                                <option value='us'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag us"
                                                                        data-title="United States">United States
                                                                </option>
                                                                <option value='uy'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag uy" data-title="Uruguay">
                                                                    Uruguay
                                                                </option>
                                                                <option value='uz'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag uz" data-title="Uzbekistan">
                                                                    Uzbekistan
                                                                </option>
                                                                <option value='va'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag va"
                                                                        data-title="Vatican City State (Holy See)">
                                                                    Vatican City
                                                                    State (Holy See)
                                                                </option>
                                                                <option value='vc'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag vc"
                                                                        data-title="Saint Vincent and the Grenadines">
                                                                    Saint
                                                                    Vincent and the Grenadines
                                                                </option>
                                                                <option value='ve'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ve" data-title="Venezuela">
                                                                    Venezuela
                                                                </option>
                                                                <option value='vg'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag vg"
                                                                        data-title="Virgin Islands (British)">Virgin
                                                                    Islands
                                                                    (British)
                                                                </option>
                                                                <option value='vi'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag vi"
                                                                        data-title="Virgin Islands (U.S.)">Virgin
                                                                    Islands (U.S.)
                                                                </option>
                                                                <option value='vn'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag vn" data-title="Viet Nam">
                                                                    Viet Nam
                                                                </option>
                                                                <option value='vu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag vu" data-title="Vanuatu">
                                                                    Vanuatu
                                                                </option>
                                                                <option value='wf'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag wf"
                                                                        data-title="Wallis and Futuna">Wallis and Futuna
                                                                </option>
                                                                <option value='ws'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ws" data-title="Samoa">Samoa
                                                                </option>
                                                                <option value='ye'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag ye" data-title="Yemen">Yemen
                                                                </option>
                                                                <option value='yt'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag yt" data-title="Mayotte">
                                                                    Mayotte
                                                                </option>
                                                                <option value='yu'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag yu"
                                                                        data-title="Yugoslavia (former)">Yugoslavia
                                                                    (former)
                                                                </option>
                                                                <option value='za'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag za"
                                                                        data-title="South Africa">South Africa
                                                                </option>
                                                                <option value='zm'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag zm" data-title="Zambia">
                                                                    Zambia
                                                                </option>
                                                                <option value='zr'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag zr"
                                                                        data-title="Zaire (former)">Zaire (former)
                                                                </option>
                                                                <option value='zw'
                                                                        data-image="images/msdropdown/icons/blank.gif"
                                                                        data-imagecss="flag zw" data-title="Zimbabwe">
                                                                    Zimbabwe
                                                                </option>
                                                            </select>

                                                            <span class="form-text text-danger"
                                                                  id="country_error"></span>

                                                        </div>
                                                        <span class="form-text text-danger"
                                                              id="country_error"></span>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('opinions.gender')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <select
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="gender" id="gender" type="text">

                                                                <option value="">
                                                                    {{trans('general.select_from_list')}}
                                                                </option>

                                                                <option value="male"
                                                                    {{$clientOpinion->gender == trans('general.male') ? 'selected':''}}>
                                                                    {{trans('opinions.male')}}
                                                                </option>

                                                                <option value="female"
                                                                    {{$clientOpinion->gender == trans('general.female') ? 'selected':''}}>
                                                                    {{trans('opinions.female')}}
                                                                </option>

                                                                <option value="others"
                                                                    {{$clientOpinion->gender == trans('general.others') ? 'selected':''}}>
                                                                    {{trans('opinions.others')}}
                                                                </option>

                                                            </select>
                                                            <span class="form-text text-danger"
                                                                  id="gender_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('opinions.job_title_ar')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="job_title_ar" id="job_title_ar" type="text"
                                                                placeholder=" {{trans('opinions.enter_job_title_ar')}}"
                                                                autocomplete="off"
                                                                value="{{$clientOpinion->job_title_ar}}"/>

                                                            <span class="form-text text-danger"
                                                                  id="job_title_ar_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('opinions.job_title_en')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <input
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="job_title_en" id="job_title_en" type="text"
                                                                placeholder=" {{trans('opinions.enter_job_title_en')}}"
                                                                autocomplete="off"
                                                                value="{{$clientOpinion->job_title_en}}"/>
                                                            <span class="form-text text-danger"
                                                                  id="job_title_en_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('opinions.rating')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <select
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="rating" id="rating" type="text">

                                                                <option value="">
                                                                    {{trans('general.select_from_list')}}
                                                                </option>

                                                                <option
                                                                    value="1" {{$clientOpinion->rating == '1'?'selected':''}} >
                                                                    {{trans('opinions.one_star')}}
                                                                </option>

                                                                <option
                                                                    value="2" {{$clientOpinion->rating == '2'?'selected':''}}>
                                                                    {{trans('opinions.two_star')}}
                                                                </option>
                                                                <option
                                                                    value="3" {{$clientOpinion->rating == '3'?'selected':''}}>
                                                                    {{trans('opinions.three_star')}}
                                                                </option>
                                                                <option
                                                                    value="4" {{$clientOpinion->rating == '4'?'selected':''}}>
                                                                    {{trans('opinions.four_star')}}
                                                                </option>
                                                                <option
                                                                    value="5" {{$clientOpinion->rating == '5'?'selected':''}}>
                                                                    {{trans('opinions.five_star')}}
                                                                </option>


                                                            </select>
                                                            <span class="form-text text-danger"
                                                                  id="rating_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('opinions.opinion_ar')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="5"
                                                                      class="form-control form-control-solid form-control-lg"
                                                                      name="opinion_ar" id="opinion_ar" type="text"
                                                                      placeholder=" {{trans('opinions.enter_opinion_ar')}}"
                                                                      autocomplete="off">{{$clientOpinion->opinion_ar}}</textarea>
                                                            <span class="form-text text-danger"
                                                                  id="opinion_ar_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('opinions.opinion_en')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="5"
                                                                      class="form-control form-control-solid form-control-lg"
                                                                      name="opinion_en" id="opinion_en" type="text"
                                                                      placeholder=" {{trans('opinions.enter_opinion_en')}}"
                                                                      autocomplete="off">{{$clientOpinion->opinion_en}}</textarea>
                                                            <span class="form-text text-danger"
                                                                  id="opinion_en_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


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

        var opinion_photo = new KTImageInput('kt_opinion_photo');


        $('#form_opinions_update').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();
            //////////////////////////////////////////////////////////////
            $('#title_ar').css('border-color', '');
            $('#photo').css('border-color', '');
            $('#language').css('border-color', '');
            $('#opinion_ar').css('border-color', '');
            $('#opinion_en').css('border-color', '');
            $('#client_name_ar').css('border-color', '');
            $('#client_name_en').css('border-color', '');
            $('#client_age').css('border-color', '');
            $('#country').css('border-color', '');
            $('#gender').css('border-color', '');
            $('#job_title_ar').css('border-color', '');
            $('#job_title_en').css('border-color', '');
            $('#rating').css('border-color', '');


            $('#photo_error').text('');
            $('#language_error').text('');
            $('#opinion_ar_error').text('');
            $('#opinion_en_error').text('');
            $('#client_name_ar_error').text('');
            $('#client_name_en_error').text('');
            $('#client_age_error').text('');
            $('#country_error').text('');
            $('#gender_error').text('');
            $('#job_title_ar_error').text('');
            $('#job_title_en_error').text('');
            $('#rating_error').text('');
            /////////////////////////////////////////////////////////////
            var data = new FormData(this);
            var type = $(this).attr('method');
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
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
                },//end beforeSend
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        setTimeout(function () {
                            window.location.href = "{{route('admin.clients.opinions')}}"
                        }, 2500)
                    }
                },//end success

                error: function (reject) {
                    $.notifyClose();
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60');
                        $('html, body').animate({scrollTop: 20}, 300);
                    });

                },//end error

                complete: function () {
                    KTApp.unblockPage();
                },//end complete

            });

        });//end submit


    </script>
@endpush
