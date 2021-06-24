@if($instance->photo == null)
    @if($instance->gender == trans('general.male'))
        <img src="{{asset('site/assets/images/male.jpeg')}}"
             width="100" height="80"
             class="img-fluid img-thumbnail"/>
    @elseif($instance->gender == trans('general.female'))
        <img src="{{asset('site/assets/images/female.jpeg')}}"
             width="100" height="80"
             class="img-fluid img-thumbnail"/>
    @elseif($instance->gender == trans('general.others'))
        <img src="{{asset('site/assets/images/others.png')}}"
             width="100" height="80"
             class="img-fluid img-thumbnail"/>
    @endif
@else
    <img src="{{asset(Storage::url($instance->photo))}}"
         width="100" height="80"
         class="img-fluid img-thumbnail"/>
@endif




