<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublicationRequest;
use App\Http\Requests\PublicationUpdateRequest;
use App\Http\Resources\PublicationResource;
use App\Models\Publication;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicationsController extends Controller
{
    use GeneralTrait;

    ///////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.publications');
        return view('admin.publications.index', compact('title'));
    }
    ///////////////////////////////////////////////
    /// index
    public function getPublications(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Publication::orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = PublicationResource::collection($list);
        $recordsTotal = Publication::get()->count();
        $recordsFiltered = Publication::get()->count();
        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr
        ]);
    }

    ///////////////////////////////////////////////
    /// create
    public function create()
    {
        $title = trans('menu.add_new_publications');
        return view('admin.publications.create', compact('title'));
    }

    /////////////////////////////////////////////////
    /// store
    public function store(PublicationRequest $request)
    {

        if ($request->hasFile('photo')) {
            $photo_path = $request->file('photo')->store('Publications');
        } else {
            $photo_path = '';
        }

        if ($request->input('language') == 'ar') {
            Publication::create([
                'photo' => $photo_path,
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => null,
                'details_ar' => $request->details_ar,
                'details_en' => null,
                'add_date' => $request->add_date,
                'section_id' => $request->section_id,
            ]);
        } elseif ($request->input('language') == 'en') {
            Publication::create([
                'photo' => $photo_path,
                'language' => $request->language,
                'title_ar' => null,
                'title_en' => $request->title_en,
                'details_ar' => null,
                'details_en' => $request->details_en,
                'add_date' => $request->add_date,
                'section_id' => $request->section_id,
            ]);
        } elseif ($request->input('language') == 'ar_en') {
            Publication::create([
                'photo' => $photo_path,
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
                'add_date' => $request->add_date,
                'section_id' => $request->section_id,
            ]);
        }

        return $this->returnSuccessMessage(trans('general.add_success_message'));

    }

    /////////////////////////////////////////////////
    /// edit
    public function edit($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }
        $title = trans('publications.update_publication');
        $publication = Publication::find($id);

        if (!$publication) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.publications.update', compact('title', 'publication'));

    }

    /////////////////////////////////////////////////
    /// update
    public function update(PublicationUpdateRequest $request)
    {

        $publication = Publication::find($request->id);
        if (!$publication) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('photo')) {
            if (!empty($publication->photo)) {
                Storage::delete($publication->photo);
                $photo_path = $request->file('photo')->store('Publications');
            } else {
                $photo_path = $request->file('photo')->store('Publications');
            }
        } else {
            if (!empty($publication->photo)) {
                $photo_path = $publication->photo;

            } else {
                $photo_path = '';
            }
        }

        if ($request->input('language') == 'ar') {
            $publication->update([
                'photo' => $photo_path,
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => null,
                'details_ar' => $request->details_ar,
                'details_en' => null,
                'add_date' => $request->add_date,
                'section_id' => $request->section_id,
            ]);
        } elseif ($request->input('language') == 'en') {
            $publication->update([
                'photo' => $photo_path,
                'language' => $request->language,
                'title_ar' => null,
                'title_en' => $request->title_en,
                'details_ar' => null,
                'details_en' => $request->details_en,
                'add_date' => $request->add_date,
                'section_id' => $request->section_id,
            ]);
        } elseif ($request->input('language') == 'ar_en') {
            $publication->update([
                'photo' => $photo_path,
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
                'add_date' => $request->add_date,
                'section_id' => $request->section_id,
            ]);
        }

        return $this->returnSuccessMessage(trans('general.update_success_message'));
    }

    ///////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $publication = Publication::find($request->id);
            if (!$publication) {
                return redirect()->route('admin.not.found');
            }
            if (!empty($publication->photo)) {
                Storage::delete($publication->photo);
            }
            $publication->delete();
            return $this->returnSuccessMessage(trans('general.delete_success_message'));
        }
    }

    ////////////////////////////////////////////////////////////////////
    /// change Status
    public function changeStatus(Request $request)
    {
        $publication = Publication::find($request->id);

        if ($publication->status == '1') {
            $publication->status = '0';
            $publication->save();
        } else {
            $publication->status = '1';
            $publication->save();
        }

        return $this->returnSuccessMessage(trans('general.change_status_success_message'));
    }

}
