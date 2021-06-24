<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideosRequest;
use App\Http\Resources\VideosResource;
use App\Models\Video;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideosController extends Controller
{
    use GeneralTrait;

    ////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.videos');
        return view('admin.medias.videos.index', compact('title'));
    }

    ////////////////////////////////////////////
    /// get Videos
    public function getVideos(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Video::orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = VideosResource::collection($list);
        $recordsTotal = Video::get()->count();
        $recordsFiltered = Video::get()->count();
        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr
        ]);
    }

    ////////////////////////////////////////////
    /// create
    public function create()
    {
        $title = trans('menu.add_new_video');
        return view('admin.medias.videos.create', compact('title'));
    }

    ////////////////////////////////////////////
    /// store
    public function store(VideosRequest $request)
    {

        try {

            if ($request->has('link')) {

                if (preg_match('@^(?:https://(?:www\\.)?youtube.com/)(watch\\?v=|v/)([a-zA-Z0-9_]*)@', $request->link, $match)) {
                    $VideoLink = $this->getVideoLink($request->link);
                } else {
                    return $this->returnError(trans('videos.url_invalid'), '500');
                }
            }


            if ($request->hasFile('photo')) {
                $photo_path = $request->file('photo')->store('videos_photos');
            } else {
                $photo_path = '';
            }


            if ($request->language == 'ar') {
                Video::create([
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => null,
                    'link' => $VideoLink,
                    'photo' => $photo_path,
                    'duration' => $request->duration,
                    'added_date' => $request->added_date,

                ]);
            } elseif ($request->language == 'en') {
                Video::create([
                    'language' => $request->language,
                    'title_ar' => null,
                    'title_en' => $request->title_en,
                    'link' => $VideoLink,
                    'photo' => $photo_path,
                    'duration' => $request->duration,
                    'added_date' => $request->added_date,
                ]);
            } elseif ($request->language == 'ar_en') {
                Video::create([
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => $request->title_en,
                    'link' => $VideoLink,
                    'photo' => $photo_path,
                    'duration' => $request->duration,
                    'added_date' => $request->added_date,
                ]);
            }
            return $this->returnSuccessMessage(trans('general.add_success_message'));

        } catch (\Exception $exception) {

            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }


    }

    ////////////////////////////////////////////
    /// user define get Video Link function
    protected function getVideoLink($link)
    {
        //// Get YouTube Video Key
        if (strlen($link) > 11) {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                $link, $match)) {
                return $match[1];
            } else
                return '0';
        }
    }

    ////////////////////////////////////////////
    /// edit
    public function edit($id = null)
    {
        $title = trans('videos.video_update');
        $video = Video::find($id);
        if (!$video) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.medias.videos.update', compact('title', 'video'));
    }


    ////////////////////////////////////////////
    /// update
    public function update(VideosRequest $request)
    {

        try {

            $video = Video::find($request->id);
            if (!$video) {
                return redirect()->route('admin.not.found');
            }

            if ($request->has('link')) {

                if (preg_match('@^(?:https://(?:www\\.)?youtube.com/)(watch\\?v=|v/)([a-zA-Z0-9_]*)@', $request->link, $match)) {
                    $VideoLink = $this->getVideoLink($request->link);
                } else {
                    return $this->returnError(trans('videos.url_invalid'), '500');
                }
            }

            if ($request->hasFile('photo')) {
                if (!empty($video->photo)) {
                    Storage::delete($video->photo);
                    $photo_path = $request->file('photo')->store('videos_photos');
                } else {
                    $photo_path = $request->file('photo')->store('videos_photos');
                }
            } else {
                if (!empty($video->photo)) {
                    $photo_path = $video->photo;
                } else {
                    $photo_path = '';
                }
            }


            if ($request->language == 'ar') {
                $video->update([
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => null,
                    'link' => $VideoLink,
                    'photo' => $photo_path,
                    'duration' => $request->duration,
                    'added_date' => $request->added_date,
                ]);
            } elseif ($request->language == 'en') {
                $video->update([
                    'language' => $request->language,
                    'title_ar' => null,
                    'title_en' => $request->title_en,
                    'link' => $VideoLink,
                    'photo' => $photo_path,
                    'duration' => $request->duration,
                    'added_date' => $request->added_date,
                ]);
            } elseif ($request->language == 'ar_en') {
                $video->update([
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => $request->title_en,
                    'link' => $VideoLink,
                    'photo' => $photo_path,
                    'duration' => $request->duration,
                    'added_date' => $request->added_date,
                ]);
            }
            return $this->returnSuccessMessage(trans('general.update_success_message'));

        } catch (\Exception $exception) {

            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }


    }


    ////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {

        try {
            if ($request->ajax()) {
                $video = Video::find($request->id);
                if (!$video) {
                    return redirect()->route('admin.not.found');
                }

                if (!empty($video->photo)) {
                    Storage::delete($video->photo);
                }

                $video->delete();
                return $this->returnSuccessMessage(trans('general.delete_success_message'));

            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }

    }


    ////////////////////////////////////////////
    /// view video
    public
    function viewVideo(Request $request)
    {
        if ($request->ajax()) {
            $video = Video::find($request->id);
            return response()->json(['data' => $video]);
        }
    }


    ////////////////////////////////////////////////////////////////////
    /// change Status
    public function changeStatus(Request $request)
    {
        $video = Video::find($request->id);

        if ($video->status == '1') {
            $video->status = '0';
            $video->save();
        } else {
            $video->status = '1';
            $video->save();
        }
        return $this->returnSuccessMessage(trans('general.change_status_success_message'));
    }

}
