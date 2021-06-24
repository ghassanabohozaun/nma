<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutSpaRequest;
use App\Http\Resources\AboutSpaResource;
use App\Models\AboutSPA;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class AboutSpaController extends Controller
{
    use GeneralTrait;

    ///////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.about_spa');
        return view('admin.about-spa.index', compact('title'));
    }

    //////////////////////////////////////////////////
    ///get About Spa
    public function getAboutSpa(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = AboutSPA::orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = AboutSpaResource::collection($list);
        $recordsTotal = AboutSPA::get()->count();
        $recordsFiltered = AboutSPA::get()->count();
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
        $title = trans('aboutSpa.add_new');
        return view('admin.about-spa.create', compact('title'));
    }

    ///////////////////////////////////////////////
    /// store
    public function store(AboutSpaRequest $request)
    {

        if ($request->input('language') == 'ar') {
            AboutSPA::create([
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => null,
                'details_ar' => $request->details_ar,
                'details_en' => null,
            ]);

        } elseif ($request->input('language') == 'en') {
            AboutSPA::create([
                'language' => $request->language,
                'title_ar' => null,
                'title_en' => $request->title_en,
                'details_ar' => null,
                'details_en' => $request->details_en,
            ]);
        } elseif ($request->input('language') == 'ar_en') {
            AboutSPA::create([
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
            ]);
        }
        return $this->returnSuccessMessage(trans('general.add_success_message'));
    }


    ///////////////////////////////////////////////
    /// edit
    public function edit($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }

        $aboutSpa = AboutSPA::find($id);

        if (!$aboutSpa) {
            return redirect()->route('admin.not.found');
        }

        $title = trans('aboutSpa.update');
        return view('admin.about-spa.update', compact('title', 'aboutSpa'));

    }

    ///////////////////////////////////////////////
    /// update
    public function update(AboutSpaRequest $request)
    {

        $aboutSpa = AboutSPA::find($request->id);

        if ($request->input('language') == 'ar') {
            $aboutSpa->update([
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => null,
                'details_ar' => $request->details_ar,
                'details_en' => null,
            ]);

        } elseif ($request->input('language') == 'en') {
            $aboutSpa->update([
                'language' => $request->language,
                'title_ar' => null,
                'title_en' => $request->title_en,
                'details_ar' => null,
                'details_en' => $request->details_en,
            ]);
        } elseif ($request->input('language') == 'ar_en') {
            $aboutSpa->update([
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
            ]);
        }
        return $this->returnSuccessMessage(trans('general.update_success_message'));
    }
    //////////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {

        if ($request->ajax()) {
            $AboutSpa = AboutSPA::find($request->id);

            if (!$AboutSpa) {
                return redirect()->route('admin.not.found');
            }
            $AboutSpa->delete();
            return $this->returnSuccessMessage(trans('general.delete_success_message'));
        }
    }


    //////////////////////////////////////////////////
    /// change status
    public function changeStatus(Request $request)
    {

        if ($request->ajax()) {
            $AboutSpa = AboutSPA::find($request->id);

            if (!$AboutSpa) {
                return redirect()->route('admin.not.found');
            }

            if ($AboutSpa->status == '1') {
                $AboutSpa->status = '0';
                $AboutSpa->save();
            } else {
                $AboutSpa->status = '1';
                $AboutSpa->save();
            }
            return $this->returnSuccessMessage(trans('general.change_status_success_message'));

        }
    }


}
