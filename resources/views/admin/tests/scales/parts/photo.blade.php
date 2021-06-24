@if($instance->photo == null)
    <img src="{{asset('adminBoard/images/no_image2.png')}}"
         style="width: 120px; height: 80px"
         class=" img-thumbnail"/>
@else
    <img src="{{asset(\Illuminate\Support\Facades\Storage::url($instance->photo))}}"
         style="width: 120px; height: 60px"
         class=" img-thumbnail"/>
@endif


