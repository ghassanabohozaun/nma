<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Http\Requests\SectionUpdateRequest;
use App\Http\Resources\SectionResource;
use App\Models\Publication;
use App\Models\Section;
use App\Models\Service;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectionController extends Controller
{
    use GeneralTrait;

    /////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.sections');
        return view('admin.publications.sections.index', compact('title'));
    }
    /////////////////////////////////////////////////
    /// get Sections
    public function getSections(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Section::orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = SectionResource::collection($list);
        $recordsTotal = Section::get()->count();
        $recordsFiltered = Section::get()->count();
        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr
        ]);
    }

    /////////////////////////////////////////////////
    /// create
    public function create()
    {
        $title = trans('menu.add_new_section');
        return view('admin.publications.sections.create', compact('title'));
    }
    /////////////////////////////////////////////////
    /// store
    public function store(SectionRequest $request)
    {
        try {

            if ($request->input('language') == 'ar') {
                Section::create([
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => null,
                ]);
            } elseif ($request->input('language') == 'en') {
                Section::create([
                    'language' => $request->language,
                    'title_ar' => null,
                    'title_en' => $request->title_en,
                ]);
            } elseif ($request->input('language') == 'ar_en') {
                Section::create([
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => $request->title_en,
                ]);
            }

            return $this->returnSuccessMessage(trans('general.add_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }
    }

    /////////////////////////////////////////////////
    /// edit
    public function edit($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }
        $section = Section::find($id);
        if (!$section) {
            return redirect()->route('admin.not.found');
        }

        $title = trans('sections.update_section');
        return view('admin.publications.sections.update', compact('title', 'section'));
    }

    /////////////////////////////////////////////////
    /// update
    public function update(SectionRequest $request)
    {
        $section = Section::find($request->id);
        if (!$section) {
            return redirect()->route('admin.not.found');
        }


        if ($request->input('language') == 'ar') {
            $section->update([
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => null,
            ]);
        } elseif ($request->input('language') == 'en') {
            $section->update([
                'language' => $request->language,
                'title_ar' => null,
                'title_en' => $request->title_en,
            ]);
        } elseif ($request->input('language') == 'ar_en') {
            $section->update([
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
            ]);
        }

        return $this->returnSuccessMessage(trans('general.update_success_message'));
    }

    /////////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $section = Section::find($request->id);
                if (!$section) {
                    return redirect()->route('admin.not.found');
                }

                $publications = Publication::where('section_id', $request->id)->get();

                if ($publications->isEmpty()) {
                    $section->delete();
                    return $this->returnSuccessMessage(trans('general.delete_success_message'));
                } else {
                    return $this->returnError(trans('sections.section_not_empty'), 500);
                }

            }
        } catch
        (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }
    }

}
