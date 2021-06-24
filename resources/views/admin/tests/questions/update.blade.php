@extends('layouts.admin')
@section('title') @endsection
@section('content')
    <form class="form" action="{{route('admin.test.question.update')}}" method="POST" id="form_test_question_update"
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
                            <a href="#" class="text-muted">
                                {{trans('menu.tests')}}
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{route('admin.tests.questions',$testQuestion->test_id)}}" class="text-muted">
                                {{trans('tests.test_questions')}}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">
                                {{trans('tests.update_test_question')}}
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

                                        <!--begin::Question-->
                                        <div class="card my-2">
                                            <div class="card-body p-5">

                                                <!--begin::Group-->
                                                <div class="d-none form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Test ID
                                                    </label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input
                                                            class="form-control form-control-solid form-control-lg"
                                                            name="test_id" id="test_id" type="hidden"
                                                            value="{{$testQuestion->test_id}}"
                                                        />
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="d-none form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        Test Question
                                                    </label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input required
                                                            class="form-control form-control-solid form-control-lg"
                                                            name="test_question_id" id="test_question_id" type="hidden"
                                                            value="{{$id}}"
                                                        />
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input required class="form-control form-control-solid form-control-lg"
                                                               name="test_question" id="test_question" type="text"
                                                               placeholder=" {{trans('tests.enter_test_question')}}"
                                                               autocomplete="off"
                                                               value="{{$testQuestion->test_question}}"/>
                                                        <span class="form-text text-danger"
                                                              id="test_question_error"></span>
                                                    </div>
                                                </div>
                                                <!--end::Group-->


                                            </div>
                                        </div>
                                        <!--End::Question-->

                                        <!--begin::answers-->
                                        <div class="card my-2">
                                            <div class="card-body p-5">
                                                <div class="row justify-content-center">


                                                    <div class="col-lg-12 col-xl-12">

                                                        <!--begin::body-->
                                                        <div class="my-5">

                                                            <div class="answers_inputs_container">
                                                                @foreach($testAnswers as $testAnswer)
                                                                    <div class="form-group m-form__group row">

                                                                        <div class="col-lg-9">
                                                                            <label>{{trans('tests.answer_text')}}
                                                                                :</label>
                                                                            <input type="text" required
                                                                                   class="form-control m-input"
                                                                                   id="answer_text[]"
                                                                                   name="answer_text[]"
                                                                                   value="{{$testAnswer->answer_text}}"
                                                                                   placeholder="{{trans('tests.enter_answer_text')}}">
                                                                            <span
                                                                                class="m-form__help input_key-error text-danger"></span>
                                                                        </div>

                                                                        <div class="col-lg-2">
                                                                            <label>{{trans('tests.answer_value')}}
                                                                                :</label>
                                                                            <input type="number" required min="0" step="1"
                                                                                   class="form-control m-input"
                                                                                   id="answer_value"
                                                                                   name="answer_value[]"
                                                                                   value="{{$testAnswer->answer_value}}"
                                                                                   placeholder="{{trans('tests.enter_answer_value')}}">
                                                                            <span
                                                                                class="m-form__help input_value-error text-danger"></span>
                                                                        </div>


                                                                        <div class="col-lg-1" style="padding-top: 25px">
                                                                            <a href="#"
                                                                               class="remove_input btn btn-icon btn-light-danger btn-sm mr-2"><i
                                                                                    class="fa fa-trash"></i></a>

                                                                        </div>

                                                                    </div>
                                                                @endforeach

                                                            </div>

                                                            <div class="clearfix"></div>
                                                            <div class="form-group m-form__group row"
                                                                 style="margin-right: 2px">
                                                                <a href="#"
                                                                   class="add_input btn btn-icon btn-light-success btn-sm mr-2"><i
                                                                        class="fa fa-plus"></i></a>
                                                            </div>

                                                        </div>
                                                        <!--begin::body-->

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!--End::answers-->

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

        ////////////////////////////////////////////////////////////////
        // answer value keypress
       /* $("#answer_value").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $.notifyClose();
                notify_message = '{!! trans('general.only_number_allow') !!}';
                notifySuccessOrError(notify_message, 'warning');
                return false;
            }
        });*/

        ////////////////////////////////////////////////////////////////
        // Append Answer
        $('body').on('click', '.add_input', function (e) {

            e.preventDefault();

            $('.answers_inputs_container').append(
                '  <div class="form-group m-form__group row">' +
                '<div class="col-lg-9">' +
                '<label>{{trans('tests.answer_text')}}:</label>' +
                '<input type="text"  required class="form-control m-input"' +
                'id="answer_text[]"' +
                'name="answer_text[]"' +
                'value=""' +
                'placeholder="{{trans('tests.enter_answer_text')}}">' +
                '<span class="m-form__help input_key-error text-danger"></span>' +
                '</div>' +
                '<div class="col-lg-2">' +
                '<label>{{trans('tests.answer_value')}}:</label>' +
                '<input type="number" required min="0" step="1" class="form-control m-input"' +
                ' id="answer_value"' +
                ' name="answer_value[]"' +
                ' value=""' +
                ' placeholder="{{trans('tests.enter_answer_value')}}">' +
                ' <span class="m-form__help input_value-error text-danger"></span>' +
                ' </div>' +
                ' <div class="col-lg-1" style="padding-top: 25px">' +
                ' <a href="#" class="remove_input btn btn-icon btn-light-danger btn-sm mr-2"><i class="fa fa-trash"></i></a>' +
                ' </div>' +
                '</div>');
        });

        //// remove
        $('body').on('click', '.remove_input', function (e) {
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
        });

        //////////////////////////////////////////////////////
        /// update test Question Question
        $('#form_test_question_update').on('submit', function (e) {
            e.preventDefault();
            $.notifyClose();
            ////////////////////////////////////////////////////////////////////////
            $('#test_question').css('border-color', '');
            $('#test_question_error').text('')
            ////////////////////////////////////////////////////////////////////////
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
                        $('.alert_errors').find('ul').empty();
                        $('.alert_errors').addClass('d-none');
                        notifySuccessOrError(data.msg, 'success');
                        setTimeout(function () {
                            var id = $('#test_id').val();
                            window.location.href = '{{url("admin/tests-manage")}}' + '/' + id;
                        }, 2000)
                    } else {

                    }
                },//end success

                error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_error').text(value[0]);
                        $('#' + key).css('border-color', 'red');
                    });
                },

                complete: function () {
                    KTApp.unblockPage();
                },//end error

            });//end ajax
        });// end submit


    </script>
@endpush
