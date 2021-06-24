@extends('layouts.admin')
@section('title') @endsection
@section('content')
    <form class="form" action="{{route('admin.test.metrics.store')}}" method="POST" id="form_test_metrics_store"
          enctype="multipart/form-data">
    @csrf
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
                            <a href="{{route('admin.test.metrics.index',$id)}}" class="text-muted">
                                {{trans('tests.test_metrics')}}
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
                        <div class="card card-custom card-shadowless rounded-top-0" id="card_settings_store">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">


                                        <!--begin::Group-->
                                        <div class="d-none form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                Test ID
                                            </label>
                                            <div class="col-lg-9 col-xl-9">
                                                <input
                                                    class="form-control form-control-solid form-control-lg"
                                                    name="test_id" id="test_id" type="hidden"
                                                    value="{{$id}}"
                                                />
                                            </div>
                                        </div>
                                        <!--end::Group-->


                                        <!--begin::metrics-->
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12 col-xl-12">
                                                <!--begin::body-->
                                                <div class="my-5">

                                                    <div class="metric_inputs_container">

                                                        @forelse($metrics as $metric)
                                                            <div class="form-group m-form__group row">
                                                                <!--begin::statement-->
                                                                <div class="col-lg-6">
                                                                    <label>{{trans('tests.statement')}}
                                                                        :</label>
                                                                    <textarea rows="4" type="text" required
                                                                              class="form-control m-input"
                                                                              id="statement[]"
                                                                              name="statement[]"
                                                                              value=""
                                                                              autocomplete="off"
                                                                              placeholder="{{trans('tests.enter_statement')}}">{{$metric->statement}}</textarea>
                                                                </div>
                                                                <!--end::statement-->

                                                                <!--begin::evaluation-->
                                                                <div class="col-lg-3">
                                                                    <label>{{trans('tests.evaluation')}}
                                                                        :</label>
                                                                    <textarea rows="4" type="text" required
                                                                              class="form-control m-input"
                                                                              id="evaluation[]"
                                                                              name="evaluation[]"
                                                                              value=""
                                                                              autocomplete="off"
                                                                              placeholder="{{trans('tests.enter_evaluation')}}">{{$metric->evaluation}}</textarea>
                                                                </div>
                                                                <!--end::evaluation-->

                                                                <!--begin::maximum and minimum-->
                                                                <div class="col-lg-2">

                                                                    <!--begin::minimum-->
                                                                    <label>{{trans('tests.minimum')}}
                                                                        :</label>
                                                                    <input type="number" required min="0" step="1"
                                                                           class="form-control m-input"
                                                                           id="minimum"
                                                                           name="minimum[]"
                                                                           value="{{$metric->minimum}}"
                                                                           autocomplete="off"
                                                                           placeholder="{{trans('tests.enter_minimum')}}">
                                                                    <!--end:: minimum-->

                                                                    <!--begin::maximum -->
                                                                    <label>{{trans('tests.maximum')}}
                                                                        :</label>
                                                                    <input type="number" required min="0" step="1"
                                                                           class="form-control m-input"
                                                                           id="maximum"
                                                                           name="maximum[]"
                                                                           value="{{$metric->maximum}}"
                                                                           autocomplete="off"
                                                                           placeholder="{{trans('tests.enter_maximum')}}">
                                                                </div>
                                                                <!--end::maximum and minimum-->

                                                                <div class="col-lg-1" style="padding-top: 25px">
                                                                    <a href="#"
                                                                       class="remove_metric_input btn btn-icon btn-light-danger btn-sm mr-2"><i
                                                                            class="fa fa-trash"></i></a>

                                                                </div>

                                                            </div>
                                                        @empty
                                                            <div class="form-group m-form__group row">
                                                                <!--begin::statement-->
                                                                <div class="col-lg-6">
                                                                    <label>{{trans('tests.statement')}}
                                                                        :</label>
                                                                    <textarea rows="4" type="text" required
                                                                              class="form-control m-input"
                                                                              id="statement[]"
                                                                              name="statement[]"
                                                                              value=""
                                                                              autocomplete="off"
                                                                              placeholder="{{trans('tests.enter_statement')}}"></textarea>
                                                                </div>
                                                                <!--end::statement-->

                                                                <!--begin::evaluation-->
                                                                <div class="col-lg-3">
                                                                    <label>{{trans('tests.evaluation')}}
                                                                        :</label>
                                                                    <textarea rows="4" type="text" required
                                                                              class="form-control m-input"
                                                                              id="evaluation[]"
                                                                              name="evaluation[]"
                                                                              value=""
                                                                              autocomplete="off"
                                                                              placeholder="{{trans('tests.enter_evaluation')}}"></textarea>
                                                                </div>
                                                                <!--end::evaluation-->

                                                                <!--begin::maximum and minimum-->
                                                                <div class="col-lg-2">

                                                                    <!--begin::minimum-->
                                                                    <label>{{trans('tests.minimum')}}
                                                                        :</label>
                                                                    <input type="number" required min="0" step="1"
                                                                           class="form-control m-input"
                                                                           id="minimum"
                                                                           name="minimum[]"
                                                                           value=""
                                                                           autocomplete="off"
                                                                           placeholder="{{trans('tests.enter_minimum')}}">
                                                                    <!--end:: minimum-->

                                                                    <!--begin::maximum -->
                                                                    <label>{{trans('tests.maximum')}}
                                                                        :</label>
                                                                    <input type="number" required min="0" step="1"
                                                                           class="form-control m-input"
                                                                           id="maximum"
                                                                           name="maximum[]"
                                                                           value=""
                                                                           autocomplete="off"
                                                                           placeholder="{{trans('tests.enter_maximum')}}">
                                                                </div>
                                                                <!--end::maximum and minimum-->

                                                                <div class="col-lg-1" style="padding-top: 25px">
                                                                    <a href="#"
                                                                       class="remove_metric_input btn btn-icon btn-light-danger btn-sm mr-2"><i
                                                                            class="fa fa-trash"></i></a>

                                                                </div>
                                                            </div>
                                                        @endforelse


                                                    </div>

                                                    <div class="clearfix"></div>
                                                    <div class="form-group m-form__group row"
                                                         style="margin-right: 2px">
                                                        <a href="#"
                                                           class="add_metric_input btn btn-icon btn-light-success btn-sm mr-2"><i
                                                                class="fa fa-plus"></i></a>
                                                    </div>

                                                </div>
                                                <!--begin::body-->

                                            </div>
                                        </div>
                                        <!--End::metrics-->
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


    <script src="{{asset('adminBoard/assets/js/jquery.validate.js')}}"></script>



    <script type="text/javascript">

        ////////////////////////////////////////////////////////////////
        // Append Metric
        $('body').on('click', '.add_metric_input', function (e) {

            e.preventDefault();

            $('.metric_inputs_container').append(
                '    <div class="form-group m-form__group row">' +
                '    <!--begin::statement-->' +
                '     <div class="col-lg-6">' +
                '     <label>{{trans('tests.statement')}}' +
                '    :</label>' +
                '    <textarea rows="4" required type="text"' +
                '               class="form-control m-input"' +
                '               id="statement[]"' +
                '               name="statement[]"' +
                '               value=""  autocomplete="off"' +
                '               placeholder="{{trans('tests.enter_statement')}}"></textarea>' +
                '               </div>' +
                '               <!--end::statement-->' +
                '               <!--begin::evaluation-->' +
                '                <div class="col-lg-3">' +
                '            <label>{{trans('tests.evaluation')}}' +
                '              :</label>' +
                '               <textarea rows="4"  required type="text"' +
                '                             class="form-control m-input"' +
                '                            id="evaluation[]"' +
                '                             name="evaluation[]"' +
                '                              value="" autocomplete="off"' +
                '                              placeholder="{{trans('tests.enter_evaluation')}}"></textarea>' +
                '                   </div>' +
                '                 <!--end::evaluation-->' +
                '             <!--begin::maximum and minimum-->' +
                '          <div class="col-lg-2">' +
                '                <!--begin::minimum-->' +
                '                     <label>{{trans('tests.minimum')}}' +
                '                   :</label>' +
                '                    <input type="number" required  min="0" step="1"' +
                '                class="form-control m-input" ' +
                '              id="minimum"' +
                '                name="minimum[]"' +
                '                   value=""  autocomplete="off"' +
                '                     placeholder="{{trans('tests.enter_minimum')}}">' +
                '                  <!--end:: minimum-->' +
                '                <!--begin::maximum -->' +
                '                <label>{{trans('tests.maximum')}}' +
                '              :</label>' +
                '            <input type="number" required min="0" step="1"' +
                '           class="form-control m-input"' +
                '          id="maximum"' +
                '          name="maximum[]"' +
                '      value=""  autocomplete="off"' +
                '     placeholder="{{trans('tests.enter_maximum')}}">' +
                '         </div>' +
                '           <!--end::maximum and minimum-->' +
                '       <div class="col-lg-1" style="padding-top: 25px">' +
                '        <a href="#"' +
                '                class="remove_metric_input btn btn-icon btn-light-danger btn-sm mr-2"><i' +
                '                class="fa fa-trash"></i></a>' +
                '               </div>' +
                '            </div>');
        });

        //// remove
        $('body').on('click', '.remove_metric_input', function (e) {
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
        });
        //////////////////////////////////////////////////////
        /// store test Question Question
        $('#form_test_metrics_store').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();
            var data = new FormData(this);
            var url = $(this).attr('action');
            var type = $(this).attr('method');

            $.ajax({
                url: url,
                data: data,
                type: type,
                dataType: 'json',
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
                },//end beforeSend

                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        notifySuccessOrError(data.msg, 'success');
                        setTimeout(function () {
                            window.location.href = "{{route('admin.tests')}}"
                        }, 2000)
                    }
                    if (data.status == false) {
                        notifySuccessOrError(data.msg, 'warning');
                    }
                },//end success


                complete: function () {
                    KTApp.unblockPage();
                },//end error

            });//end ajax
        });// end submit

        ////////////////////////////////////////////////////////////////
        // minimum keypress
        /* $("#minimum").keypress(function (e) {
             $.notifyClose();
             if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
              notify_message = '{{-- trans('general.only_number_allow') --}}';
                notifySuccessOrError(notify_message, 'warning');
                return false;
            }
        });
        */
        ////////////////////////////////////////////////////////////////

    </script>
@endpush
