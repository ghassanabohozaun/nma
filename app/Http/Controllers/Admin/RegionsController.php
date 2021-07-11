<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Regions\CityRequest;
use App\Http\Requests\Regions\GovernorateRequest;
use App\Http\Requests\Regions\NeighborhoodRequest;
use App\Http\Resources\Regions\CityResource;
use App\Http\Resources\Regions\GovernorateResource;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Neighborhood;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class RegionsController extends Controller
{

    use GeneralTrait;

    ////////////////////////////////////////
    /// regions index
    public function index()
    {
        $title = trans('menu.regions');
        $Governorates = Governorate::orderByDesc('created_at')->get();
        $Cities = City::with('governorate')->orderByDesc('created_at')->get();
        $Neighborhoods = Neighborhood::with('city')->orderByDesc('created_at')->get();

        return view('admin.regions.index', compact('title', 'Governorates', 'Cities', 'Neighborhoods'));
    }


    /////////////////////////////////////////////////////////////////////////////////////////////////
    /// Governorates

    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// Store
    public function storeGovernorate(GovernorateRequest $request)
    {
        Governorate::create([
            'governorate_name_ar' => $request->governorate_name_ar,
            'governorate_name_en' => $request->governorate_name_en,
        ]);
        return $this->returnSuccessMessage(trans('general.add_success_message'));
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// get All Governorates
    public function getAllGovernorates()
    {
        $Governorates = Governorate::get();
        return response()->json($Governorates);
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// edit Governorate
    public function editGovernorate(Request $request)
    {
        if ($request->ajax()) {
            $governorate = Governorate::find($request->id);
            return response()->json($governorate);
        }

    }
    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// update Governorate
    public function updateGovernorate(GovernorateRequest $request)
    {
        $governorate = Governorate::find($request->id);
        $governorate->update([
            'governorate_name_ar' => $request->governorate_name_ar,
            'governorate_name_en' => $request->governorate_name_en,
        ]);
        return $this->returnSuccessMessage(trans('general.update_success_message'));
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// destroy Governorate
    public function destroyGovernorate(Request $request)
    {
        if ($request->ajax()) {
            $governorate = Governorate::find($request->id);
            if (!$governorate) {
                return redirect()->route('admin.not.found');
            }

            $cities = City::where('governorate_id', $request->id)->get();
            if ($cities->isEmpty()) {
                $governorate->delete();
                return $this->returnSuccessMessage(trans('general.delete_success_message'));
            } else {
                return $this->returnError(trans('regions.delete_governorate_error_message'), 500);
            }


        }
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////
    /// City
    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// Store
    public function storeCity(CityRequest $request)
    {
        City::create([
            'city_name_ar' => $request->city_name_ar,
            'city_name_en' => $request->city_name_en,
            'governorate_id' => $request->governorate_id,
        ]);
        return $this->returnSuccessMessage(trans('general.add_success_message'));
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// get All City
    public function getAllCities()
    {
        $cities = City::get();
        return response()->json($cities);
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// get City By Governorate ID
    public function getCityByGovernorateID(Request $request)
    {
        $cities = City::where('governorate_id', '=', $request->id)->get();
        return response()->json($cities);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// edit City
    public function editCity(Request $request)
    {
        if ($request->ajax()) {
            $city = City::find($request->id);
            return response()->json($city);
        }

    }
    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// update City
    public function updateCity(CityRequest $request)
    {
        $city = City::find($request->id);
        $city->update([
            'city_name_ar' => $request->city_name_ar,
            'city_name_en' => $request->city_name_en,
            'governorate_id' => $request->governorate_id,
        ]);
        return $this->returnSuccessMessage(trans('general.update_success_message'));
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// destroy City
    public function destroyCity(Request $request)
    {
        if ($request->ajax()) {
            $city = City::find($request->id);
            if (!$city) {
                return redirect()->route('admin.not.found');
            }
            $neighborhoods = Neighborhood::where('city_id', $request->id)->get();
            if ($neighborhoods->isEmpty()) {
                $city->delete();
                return $this->returnSuccessMessage(trans('general.delete_success_message'));
            } else {
                return $this->returnError(trans('regions.delete_city_error_message'), 500);
            }

        }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////
    /// Neighborhood
    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// Store
    public function storeNeighborhood(NeighborhoodRequest $request)
    {
        Neighborhood::create([
            'neighborhood_name_ar' => $request->neighborhood_name_ar,
            'neighborhood_name_en' => $request->neighborhood_name_en,
            'city_id' => $request->city_id,
        ]);
        return $this->returnSuccessMessage(trans('general.add_success_message'));

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// edit Neighborhood
    public function editNeighborhood(Request $request)
    {
        if ($request->ajax()) {
            $neighborhood = Neighborhood::find($request->id);
            return response()->json($neighborhood);
        }

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// get Neighborhood By City ID
    public function getNeighborhoodByCityID(Request $request)
    {
        $neighborhoods = Neighborhood::where('city_id', '=', $request->id)->get();
        return response()->json($neighborhoods);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// update Neighborhood
    public function updateNeighborhood(NeighborhoodRequest $request)
    {
        $neighborhood = Neighborhood::find($request->id);
        $neighborhood->update([
            'neighborhood_name_ar' => $request->neighborhood_name_ar,
            'neighborhood_name_en' => $request->neighborhood_name_en,
            'city_id' => $request->city_id,
        ]);
        return $this->returnSuccessMessage(trans('general.update_success_message'));
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////
    /// destroy neighborhood
    public function destroyNeighborhood(Request $request)
    {
        if ($request->ajax()) {
            $Neighborhood = Neighborhood::find($request->id);
            if (!$Neighborhood) {
                return redirect()->route('admin.not.found');
            }
            $Neighborhood->delete();
            return $this->returnSuccessMessage(trans('general.delete_success_message'));
        }
    }


}
