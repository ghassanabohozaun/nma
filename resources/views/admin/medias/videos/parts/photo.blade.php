@if($instance->photo == null)
    <img src="http://img.youtube.com/vi/{{$instance->link}}/0.jpg"
         width="100" height="80"
         class="img-fluid img-thumbnail"/>
@else
    <img src="{{asset(Storage::url($instance->photo))}}"
         width="100" height="80"
         class="img-fluid img-thumbnail"/>
@endif




