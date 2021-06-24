
<a href="{{route('admin.add.other.album.photos',$instance->id)}}" class="btn btn-hover-primary btn-icon btn-pill "
   title="{{trans('photoAlbums.add_other_album_photos')}}">
    <i class="fa fa-plus-square fa-1x"></i>
</a>


<a href="{{route('admin.photo.albums.edit',$instance->id)}}" class="btn btn-hover-primary btn-icon btn-pill "
   title="{{trans('general.edit')}}">
    <i class="fa fa-edit fa-1x"></i>
</a>

<a href="#" class="btn btn-hover-danger btn-icon btn-pill delete_photo_album_btn" data-id="{{$instance->id}}"
   title="{{trans('general.delete')}}">
    <i class="fa fa-trash fa-1x"></i>
</a>


