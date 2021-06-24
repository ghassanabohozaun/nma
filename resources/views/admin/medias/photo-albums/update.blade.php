@extends('layouts.admin')
@section('title') @endsection
@section('content')

    <form class="form" action="{{route('admin.photo.albums.update')}}" method="POST" id="form_photo_album_update">
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
                            <a href="#" class="text-muted">
                                {{trans('menu.media')}}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{route('admin.photo.albums')}}" class="text-muted">
                                {{trans('menu.photo_albums')}}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.photo.albums.edit',$photoAlbum->id)}}" class="text-muted">
                                {{trans('photoAlbums.photo_album_update')}}
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
                                                                value="{{$photoAlbum->id}}"/>

                                                            <span class="form-text text-danger"
                                                                  id="title_ar_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->

                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('photoAlbums.main_photo')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <div
                                                                class="image-input image-input-outline"
                                                                id="kt_main_photo_album">
                                                            <!--  style="background-image: url({{--asset(Storage::url(setting()->site_icon))--}})"-->
                                                                <div class="image-input-wrapper"
                                                                     @if(empty($photoAlbum->main_photo))
                                                                     style=""
                                                                     @else
                                                                     style=";background-image: url({{asset(Storage::url($photoAlbum->main_photo))}}"
                                                                    @endif
                                                                ></div>
                                                                <label
                                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                                    data-action="change" data-toggle="tooltip" title=""
                                                                    data-original-title="{{trans('general.change_image')}}">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="main_photo" id="main_photo"
                                                                           class="table-responsive-sm">
                                                                    <input type="hidden" name="main_photo_remove"/>
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
                                                                  id="main_photo_error"></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Group-->



                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('photoAlbums.language')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">

                                                            <select
                                                                class="form-control form-control-solid form-control-lg"
                                                                name="language" id="language" type="text">

                                                                <option
                                                                    value="ar" {{$photoAlbum->language == trans('general.ar') ? 'selected':''}}>
                                                                    {{trans('general.ar')}}
                                                                </option>

                                                                <option value="en" {{$photoAlbum->language == trans('general.en') ? 'selected':''}}>
                                                                    {{trans('general.en')}}
                                                                </option>
                                                                <option value="ar_en" {{$photoAlbum->language == trans('general.ar_en') ? 'selected':''}}>
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
                                                            {{trans('photoAlbums.title_ar')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="3"
                                                                      class="form-control form-control-solid form-control-lg"
                                                                      name="title_ar" id="title_ar" type="text"
                                                                      placeholder=" {{trans('photoAlbums.enter_title_ar')}}"
                                                                      autocomplete="off">{{$photoAlbum->title_ar}}</textarea>

                                                            <span class="form-text text-danger"
                                                                  id="title_ar_error"></span>

                                                        </div>
                                                    </div>
                                                    <!--end::Group-->


                                                    <!--begin::Group-->
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            {{trans('photoAlbums.title_en')}}
                                                        </label>
                                                        <div class="col-lg-9 col-xl-9">
                                                            <textarea rows="3"
                                                                      class="form-control form-control-solid form-control-lg"
                                                                      name="title_en" id="title_en" type="text"
                                                                      placeholder=" {{trans('photoAlbums.enter_title_en')}}"
                                                                      autocomplete="off">{{$photoAlbum->title_en}}</textarea>

                                                            <span class="form-text text-danger"
                                                                  id="title_en_error"></span>

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
        var main_photo_album = new KTImageInput('kt_main_photo_album');

        $('#form_photo_album_update').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();
            //////////////////////////////////////////////////////////////////
            $('#language_error').text('');
            $('#title_ar_error').text('');
            $('#title_en_error').text('');
            $('#main_photo_error').text('');

            $('#language').css('border-color', '');
            $('#title_ar').css('border-color', '');
            $('#title_en').css('border-color', '');
            $('#main_photo').css('border-color', '');
            //////////////////////////////////////////////////////////////////


            var data = new FormData(this);
            var url = $(this).attr('action');
            var type = $(this).attr('method');
            $.ajax({
                url: url,
                data: data,
                dataType: 'json',
                type: type,
                cache: false,
                contentType: false,
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

                },//end  beforeSend
                success: function (data) {
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        setTimeout(function () {
                            window.location.href = "{{route('admin.photo.albums')}}";
                        },2500)
                    }
                    console.log(data);
                },//end  success

                error: function (reject) {
                    $.notifyClose();
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', '#F64E60')
                    });

                },//end  error
                complete: function () {
                    KTApp.unblockPage();
                },//end complete
            });//end ajax
        })
    </script>

@endpush
