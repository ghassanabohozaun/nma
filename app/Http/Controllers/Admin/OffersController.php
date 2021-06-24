<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Http\Requests\OfferUpdateRequest;
use App\Http\Resources\OfferResource;
use App\Models\Offer;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OffersController extends Controller
{
    use GeneralTrait;

    /////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.offers');
        return view('admin.offers.index', compact('title'));
    }

    /////////////////////////////////////////////////
    /// get offers
    public function getOffers(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Offer::orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = OfferResource::collection($list);
        $recordsTotal = Offer::get()->count();
        $recordsFiltered = Offer::get()->count();
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
        $title = trans('menu.add_new_offer');
        return view('admin.offers.create', compact('title'));
    }
    /////////////////////////////////////////////////
    /// store
    public function store(OfferRequest $request)
    {
        try {
            if ($request->hasFile('photo')) {
                $photo_path = $request->file('photo')->store('Offers');
            } else {
                $photo_path = '';
            }

            if ($request->input('language') == 'ar') {
                Offer::create([
                    'photo' => $photo_path,
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => null,
                    'details_ar' => $request->details_ar,
                    'details_en' => null,
                    'mobile_number' => $request->mobile_number,

                ]);
            } elseif ($request->input('language') == 'en') {
                Offer::create([
                    'photo' => $photo_path,
                    'language' => $request->language,
                    'title_ar' => null,
                    'title_en' => $request->title_en,
                    'details_ar' => null,
                    'details_en' => $request->details_en,
                    'mobile_number' => $request->mobile_number,

                ]);
            } elseif ($request->input('language') == 'ar_en') {
                Offer::create([
                    'photo' => $photo_path,
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => $request->title_en,
                    'details_ar' => $request->details_ar,
                    'details_en' => $request->details_en,
                    'mobile_number' => $request->mobile_number,

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
        $offer = Offer::find($id);
        if (!$offer) {
            return redirect()->route('admin.not.found');
        }
        $title = trans('offers.update_offer');
        return view('admin.offers.update', compact('title', 'offer'));
    }

    /////////////////////////////////////////////////
    /// update
    public function update(OfferUpdateRequest $request)
    {
        try {
            $offer = Offer::find($request->id);

            if (!$offer) {
                return redirect()->route('admin.not.found');
            }

            if ($request->hasFile('photo')) {
                if (!empty($offer->photo)) {
                    Storage::delete($offer->photo);
                    $photo_path = $request->file('photo')->store('trainings');
                } else {
                    $photo_path = $request->file('photo')->store('trainings');
                }
            } else {
                if (!empty($offer->photo)) {
                    $photo_path = $offer->photo;

                } else {
                    $photo_path = '';

                }
            }


            if ($request->input('language') == 'ar') {
                $offer->update([
                    'photo' => $photo_path,
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => null,
                    'details_ar' => $request->details_ar,
                    'details_en' => null,
                    'mobile_number' => $request->mobile_number,

                ]);
            } elseif ($request->input('language') == 'en') {
                $offer->update([
                    'photo' => $photo_path,
                    'language' => $request->language,
                    'title_ar' => null,
                    'title_en' => $request->title_en,
                    'details_ar' => null,
                    'details_en' => $request->details_en,
                    'mobile_number' => $request->mobile_number,

                ]);
            } elseif ($request->input('language') == 'ar_en') {
                $offer->update([
                    'photo' => $photo_path,
                    'language' => $request->language,
                    'title_ar' => $request->title_ar,
                    'title_en' => $request->title_en,
                    'details_ar' => $request->details_ar,
                    'details_en' => $request->details_en,
                    'mobile_number' => $request->mobile_number,

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
                $offer = Offer::find($request->id);
                if (!$offer) {
                    return redirect()->route('admin.not.found');
                }
                if (!empty($offer->photo)) {
                    Storage::delete($offer->photo);
                }
                $offer->delete();

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
        $offer = Offer::find($request->id);

        if ($offer->status == '1') {
            $offer->status = '0';
            $offer->save();
        } else {
            $offer->status = '1';
            $offer->save();
        }

        return $this->returnSuccessMessage(trans('general.change_status_success_message'));
    }
}
