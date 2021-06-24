@if($instance->file == null)
{{trans('tests.no_test_file')}}
@else
    <a href="{{Storage::url($instance->file) }}" target="_blank">
        {{trans('tests.file')}}
    </a>
@endif


