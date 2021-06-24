@if( $instance->button_status == trans('sliders.show'))
    <span class="label label-light-info label-inline mr-2">
    {!! $instance->button_status !!}
</span>
@else
    <span class="label label-light-danger label-inline mr-2">
    {!! $instance->button_status !!}
</span>
@endif

