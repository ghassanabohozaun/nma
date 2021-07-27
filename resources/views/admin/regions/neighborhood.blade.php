<!-- begin neighborhood Update Modal -->
<div class="modal fade" id="modal_neighborhood_update" data-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('regions.update_neighborhood')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            <form action="{!! route('neighborhood.update') !!}" method="POST" enctype="multipart/form-data"
                  id="form_neighborhood_update">
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
                                                   name="id" id="id_neighborhood_update" type="hidden"
                                                   placeholder="ID"
                                                   autocomplete="off"/>
                                        </div>
                                        <!--end::Group-->


                                        <!--begin::Group-->
                                        <div class="form-group ">
                                            <label class="col-form-label">
                                                {{trans('regions.neighborhood_name_ar')}}
                                            </label>
                                            <input class="form-control form-control-solid form-control-lg"
                                                   name="neighborhood_name_ar" id="neighborhood_name_ar_update"
                                                   type="text"
                                                   placeholder=" {{trans('regions.enter_neighborhood_name_ar')}}"
                                                   autocomplete="off"/>
                                            <span class="form-text text-danger"
                                                  id="neighborhood_name_ar_update_error"></span>
                                        </div>
                                        <!--end::Group-->


                                        <!--begin::Group-->
                                        <div class="form-group ">
                                            <label class="col-form-label">
                                                {{trans('regions.neighborhood_name_en')}}
                                            </label>
                                            <input class="form-control form-control-solid form-control-lg"
                                                   name="neighborhood_name_en" id="neighborhood_name_en_update"
                                                   type="text"
                                                   placeholder=" {{trans('regions.enter_neighborhood_name_en')}}"
                                                   autocomplete="off"/>
                                            <span class="form-text text-danger"
                                                  id="neighborhood_name_en_update_error"></span>
                                        </div>
                                        <!--end::Group-->

                                        <div class="form-group">
                                            <label class="col-form-label">{{trans('regions.city_id')}}</label>
                                            <select id="city_id_update" name="city_id"
                                                    class="form-control form-control-solid form-control-lg">
                                                <option value="">{{trans('general.select_from_list')}}</option>
                                            </select>
                                            <span class="form-text text-danger" id="city_id_update_error"></span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="#" id="cancel_update_neighborhood_btn"
                            class="btn btn-light-primary font-weight-bold">
                        {{trans('general.cancel')}}
                    </button>

                    <button type="submit" id="update_neighborhood_btn" class="btn btn-primary font-weight-bold">
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
        loadCityForUpdate();

        function loadCityForUpdate() {
            $.ajax({
                type: "get",
                url: "{!! route('get.all.cities') !!}",
            }).done(function (result) {
                console.log(result)
                $(result).each(function () {
                    if ("{{Lang()=='ar'}}") {
                        $("#city_id_update").append($('<option>', {
                            value: this.id,
                            text: this.city_name_ar,
                        }));
                    } else {
                        $("#city_id_update").append($('<option>', {
                            value: this.id,
                            text: this.city_name_en,
                        }));
                    }
                });
            });
        }


        ///////////////////////////////////////////////////////////////////////////////////////////
        // show update neighborhood  model Function
        $('body').on('click', '.neighborhood_edit_btn', function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                url: "{{route('neighborhood.edit')}}",
                data: {id, id},
                dataType: 'json',
                type: 'GET',
                success: function (data) {
                    $('#id_neighborhood_update').val(data.id);
                    $('#neighborhood_name_ar_update').val(data.neighborhood_name_ar);
                    $('#neighborhood_name_en_update').val(data.neighborhood_name_en);
                    $('#city_id_update').val(data.city_id);
                    resetNeighborhood();
                    $('#modal_neighborhood_update').modal('show');
                },
            })
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // close update neighborhood modal by cancel
        $('body').on('click', '#cancel_update_neighborhood_btn', function (e) {
            e.preventDefault();
            $('#modal_neighborhood_update').modal('hide');
            $('#neighborhood_name_ar_update_error').text("");
            $('#neighborhood_name_en_update_error').text("");
            $('#city_id_update_error').text("");

            $('#neighborhood_name_ar_update').css('border-color', '');
            $('#neighborhood_name_en_update').css('border-color', '');
            $('#city_id_update').css('border-color', '');

            $('#form_neighborhood_update')[0].reset();
        });
        /////////////////////////////////////////////////////////////////////////////////////
        // Close add test modal By event
        $('#modal_neighborhood_update').on('hidden.bs.modal', function (e) {
            e.preventDefault();
            $('#modal_neighborhood_update').modal('hide');
            $('#neighborhood_name_ar_update_error').text("");
            $('#neighborhood_name_en_update_error').text("");
            $('#city_id_update_error').text("");

            $('#neighborhood_name_ar_update').css('border-color', '');
            $('#neighborhood_name_en_update').css('border-color', '');
            $('#city_id_update').css('border-color', '');
            $('#form_neighborhood_update')[0].reset();
        });

        ///////////////////////////////////////////////////////////////////////////////////////////
        // update neighborhood Function
        $('#form_neighborhood_update').on('submit', function (e) {
            e.preventDefault();
            /////////////////////////////////////////////////////
            $('#neighborhood_name_ar_update_error').text("");
            $('#neighborhood_name_en_update_error').text("");
            $('#city_id_update_error').text("");

            $('#neighborhood_name_ar_update').css('border-color', '');
            $('#neighborhood_name_en_update').css('border-color', '');
            $('#city_id_update').css('border-color', '');
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
                            customClass: {confirmButton: 'update_neighborhood_button'}
                        });
                        $('.update_neighborhood_button').click(function () {
                            $('#modal_neighborhood_update').modal('hide');
                            $("#neighborhood_table").load(location.href + " #neighborhood_table");
                            $('#form_neighborhood_update')[0].reset();

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

