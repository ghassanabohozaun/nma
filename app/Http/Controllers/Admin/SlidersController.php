<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlidersRequest;
use App\Http\Requests\SlidersUpdateRequest;
use App\Http\Resources\SliderResource;
use App\Models\Slider;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlidersController extends Controller
{
    use GeneralTrait;

    ////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.sliders');
        return view('admin.medias.sliders.index', compact('title'));
    }
    ////////////////////////////////////////////
    /// get Sliders
    public function getSliders(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Slider::orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = SliderResource::collection($list);
        $recordsTotal = Slider::get()->count();
        $recordsFiltered = Slider::get()->count();
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
        $title = trans('menu.add_new_slider');
        return view('admin.medias.sliders.create', compact('title'));
    }
    ////////////////////////////////////////////
    /// store
    public function store(SlidersRequest $request)
    {

        try {
            $sliderOrderExist = Slider::where('order', $request->order)->get();
            if ($sliderOrderExist->isEmpty()) {
                //////////////////////////////////////////////////////////////////////
                /// user define function
                return $this->storeSlider($request);

            } else {

                $maxSliderOrder = Slider::max('order');

                Slider::where('order', $request->order)->update(['order' => $maxSliderOrder + 1]);
                //////////////////////////////////////////////////////////////////////
                /// user define function
                return $this->storeSlider($request);
            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }

    }
    //////////////////////////////////////////////////////////////////////
    /// user define  Store Slider function

    protected function storeSlider($request)
    {
        try {
            if ($request->hasFile('photo')) {
                $photo_path = $request->file('photo')->store('sliders');
            } else {
                $photo_path = '';
            }

            if ($request->input('language') == 'ar') {
                Slider::create([
                    'title_ar' => $request->title_ar,
                    'title_en' => null,
                    'details_ar' => $request->details_ar,
                    'details_en' => null,
                    'language' => $request->language,
                    'order' => $request->order,
                    'details_status' => $request->details_status,
                    'button_status' => $request->button_status,
                    'service_id' => $request->service_id,
                    'photo' => $photo_path,
                ]);

            } elseif ($request->input('language') == 'en') {
                Slider::create([
                    'title_ar' => null,
                    'title_en' => $request->title_en,
                    'details_ar' => null,
                    'details_en' => $request->details_en,
                    'language' => $request->language,
                    'order' => $request->order,
                    'details_status' => $request->details_status,
                    'button_status' => $request->button_status,
                    'service_id' => $request->service_id,
                    'photo' => $photo_path,
                ]);

            } elseif ($request->input('language') == 'ar_en') {
                Slider::create([
                    'title_ar' => $request->title_ar,
                    'title_en' => $request->title_en,
                    'details_ar' => $request->details_ar,
                    'details_en' => $request->details_en,
                    'language' => $request->language,
                    'order' => $request->order,
                    'details_status' => $request->details_status,
                    'button_status' => $request->button_status,
                    'service_id' => $request->service_id,
                    'photo' => $photo_path,
                ]);

            }
            return $this->returnSuccessMessage(trans('general.add_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');

        }

    }

    ////////////////////////////////////////////
    /// edit
    public function edit($id = null)
    {
        $title = trans('sliders.slider_update');
        $slider = Slider::find($id);
        if (!$slider) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.medias.sliders.update', compact('title', 'slider'));
    }

    ////////////////////////////////////////////
    /// update
    public function update(SlidersUpdateRequest $request)
    {
        try {
            $sliderOrderExist = Slider::where('order', $request->order)->get();
            if ($sliderOrderExist->isEmpty()) {
                //////////////////////////////////////////////////////////////////////
                /// user define function
                return $this->updateSlider($request);

            } else {
                $maxSliderOrder = Slider::max('order');
                Slider::where('order', $request->order)->update(['order' => $maxSliderOrder + 1]);
                //////////////////////////////////////////////////////////////////////
                /// user define function
                return $this->updateSlider($request);

            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }

    }

    //////////////////////////////////////////////////////////////////////
    /// user define  update Slider function
    protected function updateSlider($request)
    {
        $slider = Slider::find($request->id);
        if (!$slider) {
            return redirect()->route('admin.not.found');
        }

        //// check photo
        if ($request->hasFile('photo')) {
            if (!empty($slider->photo)) {
                Storage::delete($slider->photo);
                $photo_path = $request->file('photo')->store('sliders');
            } else {
                $photo_path = $request->file('photo')->store('sliders');
            }
        } else {
            if (!empty($slider->photo)) {
                $photo_path = $slider->photo;
            } else {
                $photo_path = '';
            }
        }

        /////// check service is exists
        if ($request->service_id == null) {
            $service_id = null;
        } else {
            $service_id = $request->service_id;
        }

        if ($request->input('language') == 'ar') {
            $slider->update([
                'title_ar' => $request->title_ar,
                'title_en' => null,
                'details_ar' => $request->details_ar,
                'details_en' => null,
                'language' => $request->language,
                'order' => $request->order,
                'details_status' => $request->details_status,
                'button_status' => $request->button_status,
                'service_id' => $service_id,
                'photo' => $photo_path,
            ]);

        } elseif ($request->input('language') == 'en') {
            $slider->update([
                'title_ar' => null,
                'title_en' => $request->title_en,
                'details_ar' => null,
                'details_en' => $request->details_en,
                'language' => $request->language,
                'order' => $request->order,
                'details_status' => $request->details_status,
                'button_status' => $request->button_status,
                'service_id' => $service_id,
                'photo' => $photo_path,
            ]);

        } elseif ($request->input('language') == 'ar_en') {
            $slider->update([
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
                'language' => $request->language,
                'order' => $request->order,
                'details_status' => $request->details_status,
                'button_status' => $request->button_status,
                'service_id' => $service_id,
                'photo' => $photo_path,
            ]);

        }
        return $this->returnSuccessMessage(trans('general.update_success_message'));
    }

    ////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {

        try {
            if ($request->ajax()) {
                $slider = Slider::find($request->id);
                if (!$slider) {
                    return redirect()->route('admin.not.found');
                }

                if (!empty($slider->photo)) {
                    Storage::delete($slider->photo);
                }
                $slider->delete();
                return $this->returnSuccessMessage(trans('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }

    }

    ////////////////////////////////////////////////////////////////////
    /// change Status
    public function changeStatus(Request $request)
    {
        $slider = Slider::find($request->id);

        if ($slider->status == '1') {
            $slider->status = '0';
            $slider->save();
        } else {
            $slider->status = '1';
            $slider->save();
        }

        return $this->returnSuccessMessage(trans('general.change_status_success_message'));
    }
}
