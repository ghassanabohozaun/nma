<?php

namespace App\Http\Controllers\Admin\Aides;

use App\Http\Controllers\Controller;
use App\Http\Resources\Aides\BeneficiariesResource;
use App\Models\Aides\Beneficiary;
use Illuminate\Http\Request;

class BeneficiariesController extends Controller
{
    ///////////////////////////////////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.beneficiaries');
        return view('admin.aides.beneficiaries.index', compact('title'));
    }

    ///////////////////////////////////////////////////////////////////////////////
    /// get Beneficiaries
    public function getBeneficiaries(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Beneficiary::orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = BeneficiariesResource::collection($list);
        $recordsTotal = Beneficiary::get()->count();
        $recordsFiltered = Beneficiary::get()->count();
        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr
        ]);
    }

    ///////////////////////////////////////////////////////////////////////////////
    /// create

    public function create()
    {
        $title = trans('menu.add_new_beneficiary');
        return view('admin.aides.beneficiaries.create', compact('title'));
    }
}
