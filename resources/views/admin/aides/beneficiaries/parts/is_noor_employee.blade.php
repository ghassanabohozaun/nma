@if( $instance->is_noor_employee == '1')
    <span class="label label-success label-inline mr-2">
      {!! trans('general.yes') !!}
</span>
@else
    <span class="label label-danger label-inline mr-2">
      {!! trans('general.no') !!}
</span>
@endif
