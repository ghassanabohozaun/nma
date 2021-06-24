<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoAlbumsRequest;
use App\Http\Requests\PhotoAlbumsUpdateRequest;
use App\Http\Resources\PhotoAlbumResource;
use App\Models\PhotoAlbum;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoAlbumsController extends Controller
{
    use GeneralTrait;

    /////////////////////////////////////////////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.photo_albums');
        return view('admin.medias.photo-albums.index', compact('title'));
    }

    /////////////////////////////////////////////////////////////////////////////////////////
    /// get Photo Albums
    public function getPhotoAlbums(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = PhotoAlbum::orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = PhotoAlbumResource::collection($list);
        $recordsTotal = PhotoAlbum::get()->count();
        $recordsFiltered = PhotoAlbum::get()->count();
        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr
        ]);
    }

    /////////////////////////////////////////////////////////////////////////////////////////
    /// create
    public function create()
    {
        $title = trans('menu.add_new_photo_album');
        return view('admin.medias.photo-albums.create', compact('title'));
    }

    /////////////////////////////////////////////////////////////////////////////////////////
    /// store
    public function store(PhotoAlbumsRequest $request)
    {

        try {
            if ($request->has('main_photo')) {
                $main_photo_path = $request->file('main_photo')->store('photo_albums');
            } else {
                $main_photo_path = '';
            }

            if ($request->language == 'ar') {

                PhotoAlbum::create([
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => null,
                    'main_photo' => $main_photo_path,
                ]);

            } elseif ($request->language == 'en') {

                PhotoAlbum::create([
                    'language' => $request->language,
                    'title_ar' => null,
                    'title_en' => $request->title_en,
                    'main_photo' => $main_photo_path,
                ]);

            } elseif ($request->language == 'ar_en') {
                PhotoAlbum::create([
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => $request->title_en,
                    'main_photo' => $main_photo_path,
                ]);
            }
            return $this->returnSuccessMessage(trans('general.add_success_message'));

        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }


    }

    /////////////////////////////////////////////////////////////////////////////////////////
    /// edit
    public function edit($id = null)
    {
        $title = trans('photoAlbums.photo_album_update');
        $photoAlbum = PhotoAlbum::find($id);
        if (!$photoAlbum) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.medias.photo-albums.update', compact('title', 'photoAlbum'));
    }

    /////////////////////////////////////////////////////////////////////////////////////////
    /// update
    public function update(PhotoAlbumsUpdateRequest $request)
    {

        try {
            $photoAlbum = PhotoAlbum::find($request->id);
            if (!$photoAlbum) {
                return redirect()->route('admin.not.found');
            }

            if ($request->has('main_photo')) {
                if (!empty($photoAlbum->main_photo)) {
                    Storage::delete($photoAlbum->main_photo);
                    $main_photo_path = $request->file('main_photo')->store('photo_albums');
                } else {
                    $main_photo_path = $request->file('main_photo')->store('photo_albums');
                }
            } else {
                if (!empty($photoAlbum->main_photo)) {
                    $main_photo_path = $photoAlbum->main_photo;
                } else {
                    $main_photo_path = '';
                }
            }

            if ($request->language == 'ar') {

                $photoAlbum->update([
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => null,
                    'main_photo' => $main_photo_path,
                ]);

            } elseif ($request->language == 'en') {

                $photoAlbum->update([
                    'language' => $request->language,
                    'title_ar' => null,
                    'title_en' => $request->title_en,
                    'main_photo' => $main_photo_path,
                ]);

            } elseif ($request->language == 'ar_en') {
                $photoAlbum->update([
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => $request->title_en,
                    'main_photo' => $main_photo_path,
                ]);
            }
            return $this->returnSuccessMessage(trans('general.update_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');

        }


    }

    /////////////////////////////////////////////////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {

        try {
            if ($request->ajax()) {
                $photo_album = PhotoAlbum::find($request->id);
                if (!$photo_album) {
                    return redirect()->route('admin.not.found');
                }
                ////////////////////  delete Main Album Photo
                if (!empty($photo_album->main_photo)) {
                    Storage::delete($photo_album->main_photo);
                }
                ////////////////////  delete other Album Photos
                $files = File::where('relation_id', $request->id)->get();
                foreach ($files as $file) {
                    Storage::delete($file->full_path_after_upload);
                    $file->delete();
                    Storage::deleteDirectory($file->file_path);
                }

                $photo_album->delete();
                return $this->returnSuccessMessage(trans('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }

    }

    /////////////////////////////////////////////////////////////////////////////////////////
    /// add Other Album Photos
    public function addOtherAlbumPhotos($id = null)
    {

        $title = trans('photoAlbums.add_other_album_photos');

        $photoAlbum = PhotoAlbum::find($id);
        if (!$photoAlbum) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.medias.photo-albums.other-album-photos', compact('title', 'photoAlbum'));
    }

    /////////////////////////////////////////////////////////////////////////////////////////
    /// upload Other Albums Photos function
    public function uploadOtherAlbumPhotos(Request $request, $paid)
    {
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('photo_albums/' . $paid);
            $file = new File();
            $file->file_name = $request->file('file')->getClientOriginalName();
            $file->file_size = $request->file('file')->getSize();
            $file->file_path = 'photo_albums/' . $paid;
            $file->file_after_upload = $request->file('file')->hashName();
            $file->full_path_after_upload = $filePath;
            $file->file_mimes_type = $request->file('file')->getMimeType();
            $file->file_type = 'photo_albums_photos';
            $file->relation_id = $paid;
            $file->save();
        }
        return response(['status' => true, 'id' => $file->id], 200);
    }


    ////////////////////////////////////////////////
    /// delete Other Album Photo function
    public function deleteOtherAlbumPhoto(Request $request)
    {
        if ($request->ajax()) {
            $file = File::find($request->id);
            Storage::delete($file->full_path_after_upload);
            $file->delete();
            return response($file);
        }
    }


    ////////////////////////////////////////////////////////////////////
    /// change Status
    public function changeStatus(Request $request)
    {
        $photoAlbum = PhotoAlbum::find($request->id);

        if ($photoAlbum->status == '1') {
            $photoAlbum->status = '0';
            $photoAlbum->save();
        } else {
            $photoAlbum->status = '1';
            $photoAlbum->save();
        }

        return $this->returnSuccessMessage(trans('general.change_status_success_message'));
    }
}
