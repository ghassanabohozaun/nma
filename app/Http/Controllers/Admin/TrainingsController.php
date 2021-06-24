<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingRequest;
use App\Http\Requests\TrainingReset;
use App\Http\Requests\TrainingUpdateRequest;
use App\Http\Resources\TrainingResource;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class TrainingsController extends Controller
{

    use GeneralTrait;

    //////////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.trainings');
        return view('admin.trainings.index', compact('title'));
    }

    //////////////////////////////////////////////////////
    /// get Training
    public function getTrainings(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Training::orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = TrainingResource::collection($list);
        $recordsTotal = Training::get()->count();
        $recordsFiltered = Training::get()->count();
        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr
        ]);
    }


    //////////////////////////////////////////////////////
    /// create
    public function create()
    {
        $title = trans('menu.add_new_training');
        return view('admin.trainings.create', compact('title'));
    }

    //////////////////////////////////////////////////////
    /// store
    public function store(TrainingRequest $request)
    {

        if ($request->hasFile('photo')) {
            $photo_path = $request->file('photo')->store('trainings');
        } else {
            $photo_path = '';
        }

        if ($request->input('language') == 'ar') {
            Training::create([
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => null,
                'started_date' => $request->started_date,
                'photo' => $photo_path,
            ]);
        } elseif ($request->input('language') == 'en') {
            Training::create([
                'language' => $request->language,
                'title_ar' => null,
                'title_en' => $request->title_en,
                'started_date' => $request->started_date,
                'photo' => $photo_path,
            ]);
        } elseif ($request->input('language') == 'ar_en') {
            Training::create([
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'started_date' => $request->started_date,
                'photo' => $photo_path,
            ]);
        }
        return $this->returnSuccessMessage(trans('general.add_success_message'));
    }

    //////////////////////////////////////////////////////
    /// edit
    public function edit($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }

        $training = Training::find($id);
        if (!$training) {
            return redirect()->route('admin.not.found');
        }

        $title = trans('trainings.update_training');
        return view('admin.trainings.update', compact('title', 'training'));
    }

    //////////////////////////////////////////////////////
    /// update
    public function update(TrainingUpdateRequest $request)
    {

        $training = Training::find($request->id);

        if ($request->hasFile('photo')) {
            if (!empty($training->photo)) {
                Storage::delete($training->photo);
                $photo_path = $request->file('photo')->store('trainings');
            } else {
                $photo_path = $request->file('photo')->store('trainings');
            }
        } else {
            if (!empty($training->photo)) {
                $photo_path = $training->photo;

            } else {
                $photo_path = '';

            }
        }


        if ($request->input('language') == 'ar') {
            $training->update([
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => null,
                'started_date' => $request->started_date,
                'photo' => $photo_path,
            ]);
        } elseif ($request->input('language') == 'en') {
            $training->update([
                'language' => $request->language,
                'title_ar' => null,
                'title_en' => $request->title_en,
                'started_date' => $request->started_date,
                'photo' => $photo_path,
            ]);
        } elseif ($request->input('language') == 'ar_en') {
            $training->update([
                'language' => $request->language,
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'started_date' => $request->started_date,
                'photo' => $photo_path,
            ]);
        }
        return $this->returnSuccessMessage(trans('general.update_success_message'));

    }


    //////////////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $training = Training::find($request->id);
            if (!$training) {
                return redirect()->route('admin.not.found');
            }
            if (!empty($training->photo)) {
                Storage::delete($training->photo);
            }
            $training->delete();
            return $this->returnSuccessMessage(trans('general.delete_success_message'));
        }
    }

    ////////////////////////////////////////////////
    /// change status
    public function changeStatus(Request $request)
    {

        if ($request->ajax()) {
            $training = Training::find($request->id);

            if ($training->status == '1') {
                $training->status = '0';
                $training->save();
            } else {
                $training->status = '1';
                $training->save();
            }

            return $this->returnSuccessMessage(trans('general.change_status_success_message'));
        }
    }

    //////////////////////////////////////////////////////
    /// reset
    public function resetTraining(TrainingReset $request)
    {

        $Training = Training::find($request->id);

        if (!$Training) {
            return redirect()->route('admin.not.found');
        }


        ////////////// Start Copy Photo
        $path_parts = explode('/', $Training->photo);
        $file_parts = explode('.', $path_parts[1]);
        $copy_photo = $path_parts[0] . '/' . $file_parts[0] . '_' . time() . '_' . $request->id . '.' . $file_parts[1];
        Storage::copy($Training->photo, $copy_photo);
        ////////////// Start Copy Photo

        if ($Training->language == trans('general.ar')) {
            Training::create([
                'language' => 'ar',
                'title_ar' => $Training->title_ar,
                'title_en' => null,
                'started_date' => $request->started_date,
                'photo' => $copy_photo,
            ]);
        } elseif ($Training->language == trans('general.en')) {
            Training::create([
                'language' => 'en',
                'title_ar' => null,
                'title_en' => $Training->title_en,
                'started_date' => $request->started_date,
                'photo' => $copy_photo,
            ]);
        } elseif ($Training->language == trans('general.ar_en')) {
            Training::create([
                'language' => 'ar_en',
                'title_ar' => $Training->title_ar,
                'title_en' => $Training->title_en,
                'started_date' => $request->started_date,
                'photo' => $copy_photo,
            ]);
        }
        return $this->returnSuccessMessage(trans('trainings.reset_success_message'));
    }


}
