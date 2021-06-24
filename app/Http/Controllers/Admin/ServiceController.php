<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Section;
use App\Models\Service;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    use GeneralTrait;


    /////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.services');
        return view('admin.services.index', compact('title'));
    }
    /////////////////////////////////////////////////
    /// get services
    public function getServices(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Service::where('is_treatment_area', '=', '0')->orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = ServiceResource::collection($list);
        $recordsTotal = Service::get()->count();
        $recordsFiltered = Service::get()->count();
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
        $title = trans('services.add_new');
        return view('admin.services.create', compact('title'));
    }
    /////////////////////////////////////////////////
    /// store
    public function store(ServiceRequest $request)
    {
        try {
            if ($request->hasFile('photo')) {
                $photo_path = $request->file('photo')->store('Services');
            } else {
                $photo_path = '';
            }

            if ($request->input('language') == 'ar') {
                Service::create([
                    'photo' => $photo_path,
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => null,
                    'summary_ar' => $request->summary_ar,
                    'summary_en' => null,
                    'details_ar' => $request->details_ar,
                    'details_en' => null,
                    'is_treatment_area' => $request->is_treatment_area,

                ]);
            } elseif ($request->input('language') == 'en') {
                Service::create([
                    'photo' => $photo_path,
                    'language' => $request->language,
                    'title_ar' => null,
                    'title_en' => $request->title_en,
                    'summary_ar' => null,
                    'summary_en' => $request->summary_en,
                    'details_ar' => null,
                    'details_en' => $request->details_en,
                    'is_treatment_area' => $request->is_treatment_area,
                ]);
            } elseif ($request->input('language') == 'ar_en') {
                Service::create([
                    'photo' => $photo_path,
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => $request->title_en,
                    'summary_ar' => $request->summary_ar,
                    'summary_en' => $request->summary_en,
                    'details_ar' => $request->details_ar,
                    'details_en' => $request->details_en,
                    'is_treatment_area' => $request->is_treatment_area,
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
        $service = Service::find($id);
        if (!$service) {
            return redirect()->route('admin.not.found');
        }

        $title = trans('services.update_service');
        return view('admin.services.update', compact('title', 'service'));
    }

    /////////////////////////////////////////////////
    /// update
    public function update(ServiceUpdateRequest $request)
    {

        $service = Service::find($request->id);
        if (!$service) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('photo')) {
            if (!empty($service->photo)) {
                Storage::delete($service->photo);
                $photo_path = $request->file('photo')->store('Services');
            } else {
                $photo_path = $request->file('photo')->store('Services');
            }
        } else {
            if (!empty($service->photo)) {
                $photo_path = $service->photo;

            } else {
                $photo_path = '';
            }
        }

        if ($request->input('language') == 'ar') {
            $service->update([
                'photo' => $photo_path,
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => null,
                'summary_ar' => $request->summary_ar,
                'summary_en' => null,
                'details_ar' => $request->details_ar,
                'details_en' => null,
                'is_treatment_area' => $request->is_treatment_area,


            ]);
        } elseif ($request->input('language') == 'en') {
            $service->update([
                'photo' => $photo_path,
                'language' => $request->language,
                'title_ar' => null,
                'title_en' => $request->title_en,
                'summary_ar' => null,
                'summary_en' => $request->summary_en,
                'details_ar' => null,
                'details_en' => $request->details_en,
                'is_treatment_area' => $request->is_treatment_area,

            ]);
        } elseif ($request->input('language') == 'ar_en') {
            $service->update([
                'photo' => $photo_path,
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'summary_ar' => $request->summary_ar,
                'summary_en' => $request->summary_en,
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
                'is_treatment_area' => $request->is_treatment_area,
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
                $service = Service::find($request->id);
                if (!$service) {
                    return redirect()->route('admin.not.found');
                }
                if (!empty($service->photo)) {
                    Storage::delete($service->photo);
                }
                $service->delete();

                return $this->returnSuccessMessage(trans('general.delete_success_message'));
            }
        } catch
        (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }
    }


    ////////////////////////////////////////////////////////////////////
    /// change Status
    public function changeStatus(Request $request)
    {
        $service = Service::find($request->id);

        if ($service->status == '1') {
            $service->status = '0';
            $service->save();
        } else {
            $service->status = '1';
            $service->save();
        }

        return $this->returnSuccessMessage(trans('general.change_status_success_message'));
    }


    /////////////////////////////////////////////////
    ///  Treatment Areas
    public function treatmentAreas()
    {
        $title = trans('menu.treatment_areas');
        return view('admin.services.treatment-areas', compact('title'));
    }
    /////////////////////////////////////////////////
    ///  get Treatment Areas
    public function getTreatmentAreas(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Service::where('is_treatment_area', '=', '1')->orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = ServiceResource::collection($list);
        $recordsTotal = Service::get()->count();
        $recordsFiltered = Service::get()->count();
        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr
        ]);
    }
}
