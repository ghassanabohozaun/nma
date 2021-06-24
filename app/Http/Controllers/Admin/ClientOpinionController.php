<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OpinionRequest;
use App\Http\Requests\OpinionUpdateRequest;
use App\Http\Resources\ClientOpinionResource;
use App\Models\ClientOpinion;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientOpinionController extends Controller
{
    use GeneralTrait;

    //////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.clients_opinions');
        return view('admin.opinions.index', compact('title'));
    }
    //////////////////////////////////////////////////
    /// get Clients Opinions
    public function getClientsOpinions(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = ClientOpinion::orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = ClientOpinionResource::collection($list);
        $recordsTotal = ClientOpinion::get()->count();
        $recordsFiltered = ClientOpinion::get()->count();
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
        $title = trans('menu.add_new_client_opinion');
        return view('admin.opinions.create', compact('title'));
    }
    /////////////////////////////////////////////////
    /// store
    public function store(OpinionRequest $request)
    {

            if ($request->hasFile('photo')) {
                $photo_path = $request->file('photo')->store('Opinions');
            } else {
                $photo_path = '';
            }

            if ($request->input('language') == 'ar') {
                ClientOpinion::create([
                    'photo' => $photo_path,
                    'language' => $request->language,
                    'opinion_ar' => $request->opinion_ar,
                    'opinion_en' => null,
                    'client_name_ar' => $request->client_name_ar,
                    'client_name_en' => null,
                    'client_age'=>$request->client_age,
                    'country'=>$request->country,
                    'gender'=>$request->gender,
                    'job_title_ar' => $request->job_title_ar,
                    'job_title_en' => null,
                    'rating'=>$request->rating,

                ]);
            } elseif ($request->input('language') == 'en') {
                ClientOpinion::create([
                    'photo' => $photo_path,
                    'language' => $request->language,
                    'opinion_ar' => null,
                    'opinion_en' => $request->opinion_en,
                    'client_name_ar' => null,
                    'client_name_en' => $request->client_name_en,
                    'client_age'=>$request->client_age,
                    'country'=>$request->country,
                    'gender'=>$request->gender,
                    'job_title_ar' => null,
                    'job_title_en' => $request->job_title_en,
                    'rating'=>$request->rating,

                ]);
            } elseif ($request->input('language') == 'ar_en') {
                ClientOpinion::create([
                    'photo' => $photo_path,
                    'language' => $request->language,
                    'opinion_ar' => $request->opinion_ar,
                    'opinion_en' => $request->opinion_en,
                    'client_name_ar' => $request->client_name_ar,
                    'client_name_en' => $request->client_name_en,
                    'client_age'=>$request->client_age,
                    'country'=>$request->country,
                    'gender'=>$request->gender,
                    'job_title_ar' => $request->job_title_ar,
                    'job_title_en' => $request->job_title_en,
                    'rating'=>$request->rating,
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
        $clientOpinion = ClientOpinion::find($id);
        if (!$clientOpinion) {
            return redirect()->route('admin.not.found');
        }
        $title = trans('opinions.update_opinion');
        return view('admin.opinions.update', compact('title', 'clientOpinion'));
    }

    /////////////////////////////////////////////////
    /// store
    public function update(OpinionRequest $request)
    {
        try {
            $clientOpinion = ClientOpinion::find($request->id);
            if (!$clientOpinion) {
                return redirect()->route('admin.not.found');
            }

            if ($request->hasFile('photo')) {
                if (!empty($clientOpinion->photo)) {
                    Storage::delete($clientOpinion->photo);
                    $photo_path = $request->file('photo')->store('Opinions');
                } else {
                    $photo_path = $request->file('photo')->store('Opinions');
                }
            } else {
                if (!empty($clientOpinion->photo)) {
                    $photo_path = $clientOpinion->photo;

                } else {
                    $photo_path = '';
                }
            }


            if ($request->input('language') == 'ar') {
                $clientOpinion->update([
                    'photo' => $photo_path,
                    'language' => $request->language,
                    'opinion_ar' => $request->opinion_ar,
                    'opinion_en' => null,
                    'client_name_ar' => $request->client_name_ar,
                    'client_name_en' => null,
                    'client_age'=>$request->client_age,
                    'country'=>$request->country,
                    'gender'=>$request->gender,
                    'job_title_ar' => $request->job_title_ar,
                    'job_title_en' => null,
                    'rating'=>$request->rating,

                ]);
            } elseif ($request->input('language') == 'en') {
                $clientOpinion->update([
                    'photo' => $photo_path,
                    'language' => $request->language,
                    'opinion_ar' => null,
                    'opinion_en' => $request->opinion_en,
                    'client_name_ar' => null,
                    'client_name_en' => $request->client_name_en,
                    'client_age'=>$request->client_age,
                    'country'=>$request->country,
                    'gender'=>$request->gender,
                    'job_title_ar' => null,
                    'job_title_en' => $request->job_title_en,
                    'rating'=>$request->rating,

                ]);
            } elseif ($request->input('language') == 'ar_en') {
                $clientOpinion->update([
                    'photo' => $photo_path,
                    'language' => $request->language,
                    'opinion_ar' => $request->opinion_ar,
                    'opinion_en' => $request->opinion_en,
                    'client_name_ar' => $request->client_name_ar,
                    'client_name_en' => $request->client_name_en,
                    'client_age'=>$request->client_age,
                    'country'=>$request->country,
                    'gender'=>$request->gender,
                    'job_title_ar' => $request->job_title_ar,
                    'job_title_en' => $request->job_title_en,
                    'rating'=>$request->rating,
                ]);
            }

            return $this->returnSuccessMessage(trans('general.update_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }
    }

    /////////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $clientOpinion = ClientOpinion::find($request->id);
                if (!$clientOpinion) {
                    return redirect()->route('admin.not.found');
                }
                if (!empty($clientOpinion->photo)) {
                    Storage::delete($clientOpinion->photo);
                }
                $clientOpinion->delete();

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

        $clientOpinion = ClientOpinion::find($request->id);

        if ($clientOpinion->status == '1') {
            $clientOpinion->status = '0';
            $clientOpinion->save();
        } else {
            $clientOpinion->status = '1';
            $clientOpinion->save();
        }

        return $this->returnSuccessMessage(trans('general.change_status_success_message'));
    }
}
