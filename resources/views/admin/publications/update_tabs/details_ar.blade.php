<div class="tab-pane fade" id="publication_details_ar" role="tabpanel" aria-labelledby="publication_details_ar_tab">
    <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
        <div class="col-xl-12 col-xxl-10">

            <div class="row justify-content-center">
                <div class="col-xl-9">

                    <!--begin::body-->
                    <div class="my-5">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label>
                                {{trans('publications.title_ar')}}
                            </label>

                            <input type="text" class="form-control form-control-solid form-control-lg"
                                   name="title_ar" id="title_ar" value="{{$publication->title_ar}}"
                                   placeholder="{{trans('publications.enter_title_ar')}}"
                                   autocomplete="off">
                            <span class="form-text text-danger"
                                  id="title_ar_error"></span>

                        </div>
                        <!--end::Group-->


                        <!--begin::Group-->
                        <div class="form-group">
                            <label> {{trans('publications.details_ar')}}</label>
                            <textarea class="form-control details_ar"
                                      placeholder="{{trans('publications.enter_details_ar')}}"
                                      name="details_ar"
                                      id="details_ar">{{$publication->details_ar}}</textarea>
                            <span class="form-text text-danger"
                                  id="details_ar_error"></span>
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
        //////////////////////////////////////////////////////
        /// summernote
        $('.details_ar').summernote({
            height: 270,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            }
        });
        //////////////////////////////////////////////////////
    </script>
@endpush
