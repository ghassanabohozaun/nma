@if( $instance->deleted_at == null)
    <span class="label label-light-info label-inline mr-2">
      {!! trans('general.not_trashed') !!}
</span>
@else
    <span class="label label-light-danger label-inline mr-2">
 {!! trans('general.trashed') !!}
</span>
@endif

