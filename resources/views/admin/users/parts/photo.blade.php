@if($instance->photo == null)
    @if($instance->gender == trans('general.male'))
        <img src="{{asset('adminBoard/images/male.jpeg')}}"
             width="80" height="80"
             class="img-fluid img-thumbnail"/>
    @else
        <img src="{{asset('adminBoard/images/female.jpeg')}}"
             width="80" height="80"
             class="img-fluid img-thumbnail"/>
    @endif


@else
    <img src="{{asset(Storage::url($instance->photo))}}"
         width="80" height="80"
         class="img-fluid img-thumbnail"/>
@endif




