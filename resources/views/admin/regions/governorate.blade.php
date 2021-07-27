<!-- begin Governorate Update Modal -->
<div class="modal fade" id="modal_governorate_update" data-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('regions.update_governorate')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            <form action="{!! route('governorate.update') !!}" method="POST" enctype="multipart/form-data"
                  id="form_governorate_update">
                @csrf
                <div class="modal-body">

                    <!--begin::Card-->
                    <div class="card card-custom card-shadowless rounded-top-0">
                        <!--begin::Body-->
                        <div class="card-body p-0">

                            <div class="col-xl-12 col-xxl-10">

                                <div class="row justify-content-center">
                                    <div class="col-xl-12">

                                        <!--begin::Group-->
                                        <div class="d-none form-group ">
                                            <label class="col-form-label">
                                                ID
                                            </label>
                                            <input class="form-control form-control-solid form-control-lg"
                                                   name="id" id="id_governorate_update" type="hidden"
                                                   placeholder="ID"
                                                   autocomplete="off"/>
                                        </div>
                                        <!--end::Group-->


                                        <!--begin::Group-->
                                        <div class="form-group ">
                                            <label class="col-form-label">
                                                {{trans('regions.governorate_name_ar')}}
                                            </label>
                                            <input class="form-control form-control-solid form-control-lg"
                                                   name="governorate_name_ar" id="governorate_name_ar_update"
                                                   type="text"
                                                   placeholder=" {{trans('regions.enter_governorate_name_ar')}}"
                                                   autocomplete="off"/>
                                            <span class="form-text text-danger"
                                                  id="governorate_name_ar_update_error"></span>
                                        </div>
                                        <!--end::Group-->


                                        <!--begin::Group-->
                                        <div class="form-group ">
                                            <label class="col-form-label">
                                                {{trans('regions.governorate_name_en')}}
                                            </label>
                                            <input class="form-control form-control-solid form-control-lg"
                                                   name="governorate_name_en" id="governorate_name_en_update"
                                                   type="text"
                                                   placeholder=" {{trans('regions.enter_governorate_name_en')}}"
                                                   autocomplete="off"/>
                                            <span class="form-text text-danger"
                                                  id="governorate_name_en_update_error"></span>
                                        </div>
                                        <!--end::Group-->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="#" id="cancel_update_governorate_btn"
                            class="btn btn-light-primary font-weight-bold">
                        {{trans('general.cancel')}}
                    </button>

                    <button type="submit" id="update_governorate_btn" class="btn btn-primary font-weight-bold">
                        {{trans('general.save')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Test Add Modal-->

@push('js')

    <script type="text/javascript">
        ///////////////////////////////////////////////////////////////////////////////////////////
        // show update governorate  model Function
        $('body').on('click', '.governorate_edit_btn', function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                url: "{{route('governorate.edit')}}",
                data: {id, id},
                dataType: 'json',
                type: 'GET',
                success: function (data) {
                    $('#id_governorate_update').val(data.id);
                    $('#governorate_name_ar_update').val(data.governorate_name_ar);
                    $('#governorate_name_en_update').val(data.governorate_name_en);
                    resetGovernorate()
                    $('#modal_governorate_update').modal('show');
                },
            })
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // close update governorate modal by cancel
        $('body').on('click', '#cancel_update_governorate_btn', function (e) {
            e.preventDefault();
            $('#modal_governorate_update').modal('hide');
            $('#governorate_name_ar_update_error').text("");
            $('#governorate_name_en_update_error').text("");
            $('#governorate_name_ar_update').css('border-color', '');
            $('#governorate_name_en_update').css('border-color', '');
            $('#form_governorate_update')[0].reset();
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // Close add test modal By event
        $('#modal_governorate_update').on('hidden.bs.modal', function (e) {
            e.preventDefault();
            $('#modal_governorate_update').modal('hide');
            $('#governorate_name_ar_update_error').text("");
            $('#governorate_name_en_update_error').text("");
            $('#governorate_name_ar_update').css('border-color', '');
            $('#governorate_name_en_update').css('border-color', '');
            $('#form_governorate_update')[0].reset();
        });

        ///////////////////////////////////////////////////////////////////////////////////////////
        // update Governorate Function
        $('#form_governorate_update').on('submit', function (e) {
            e.preventDefault();
            /////////////////////////////////////////////////////
            $('#governorate_name_ar_update_error').text("");
            $('#governorate_name_en_update_error').text("");

            $('#governorate_name_ar_update').css('border-color', '');
            $('#governorate_name_en_update').css('border-color', '');
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
                            customClass: {confirmButton: 'update_governorate_button'}
                        });
                        $('.update_governorate_button').click(function () {
                            $('#modal_governorate_update').modal('hide');
                            $("#governorate_table").load(location.href + " #governorate_table");
                            $('#form_governorate_update')[0].reset();
                        });
                    }
                },

                error: function (reject) {
                    KTApp.unblockPage();
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, value) {
                        $('#' + key + '_update_error').text(value[0]);
                        $('#' + key + '_update').css('border-color', 'red');

                    });
                },
                complete: function () {
                    KTApp.unblockPage();
                }
            })

        })

    </script>
@endpush

