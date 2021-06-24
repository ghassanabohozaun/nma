<div class="tab-pane fade  show active" id="publication_settings" role="tabpanel"
     aria-labelledby="publication_settings_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">

                    <!--begin::body-->
                    <div class="my-5">


                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{trans('sections.language')}}
                            </label>
                            <div class="col-lg-9 col-xl-9">

                                <select
                                    class="form-control form-control-solid form-control-lg"
                                    name="language" id="language" type="text">

                                    <option value="ar">
                                        {{trans('general.ar')}}
                                    </option>

                                    <option value="en">
                                        {{trans('general.en')}}
                                    </option>
                                    <option value="ar_en">
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
                                {{trans('publications.add_date')}}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="input-group date">
                                    <input type="text" class="form-control"
                                           id="add_date" name="add_date"
                                           readonly placeholder="{{trans('publications.enter_add_date')}}"/>
                                    <div class="input-group-append">
							         <span class="input-group-text">
								        <i class="la la-calendar-check-o"></i>
							         </span>
                                    </div>
                                </div>
                                <span class="form-text text-danger"
                                      id="add_date_error"></span>
                            </div>
                            <!--end::Group-->
                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{trans('publications.section_id')}}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <select class="form-control form-control-solid form-control-lg"
                                        name="section_id" id="section_id" type="text">
                                    <option value="">{{trans('general.select_from_list')}}</option>

                                    @if( LaravelLocalization::getCurrentLocale() =='ar')
                                        @foreach(App\Models\Section::where('title_ar','<>',null)->get() as $section)
                                            <option
                                                value="{{$section->id}}">
                                                {{$section->title_ar}}
                                            </option>
                                        @endforeach
                                    @else
                                        @foreach(App\Models\Section::where('title_en','<>',null)->get() as $section)
                                            <option
                                                value="{{$section->id}}">
                                                {{$section->title_en}}
                                            </option>
                                        @endforeach
                                    @endif


                                </select>
                                <span class="form-text text-danger"
                                      id="section_id_error"></span>
                            </div>
                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                {{trans('publications.photo')}}
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <div
                                    class="image-input image-input-outline"
                                    id="kt_publication_photo">
                                <!--  style="background-image: url({{--asset(Storage::url(setting()->site_icon))--}})"-->
                                    <div class="image-input-wrapper"
                                    ></div>
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
                                        title="Cancel avatar"><i class="ki ki-bold-close icon-xs text-muted"></i>
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

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@push('js')


    <script type="text/javascript">

        /////////////////////////////////////////////////////////////
        var publication_photo = new KTImageInput('kt_publication_photo');
        ////////////////////////////////////////////////////////////
        ///////// Datepicker
        $('#add_date').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: true,
            clearBtn: false,
            orientation: "bottom auto",
            language: "{{ LaravelLocalization::getCurrentLocale()}}",
            autoclose: true,
            todayHighlight: true,
        });
    </script>
@endpush

