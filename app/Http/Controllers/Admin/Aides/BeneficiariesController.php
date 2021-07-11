<?php

namespace App\Http\Controllers\Admin\Aides;

use App\Http\Controllers\Controller;
use App\Http\Resources\Aides\BeneficiariesResource;
use App\Models\Aides\Beneficiary;
use App\Models\Aides\Beneficiary_Address;
use App\Models\Aides\Beneficiary_Family;
use App\Models\Aides\Beneficiary_Job;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class BeneficiariesController extends Controller
{
    use GeneralTrait;

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

    ///////////////////////////////////////////////////////////////////////////////
    /// store
    public function store(Request $request)
    {

        $beneficiary = Beneficiary::create([
            'first_name' => $request->first_name,
            'father_name' => $request->father_name,
            'grandfather_name' => $request->grandfather_name,
            'family_name' => $request->family_name,
            'personal_id' => $request->personal_id,
            'wife_name' => $request->wife_name,
            'wife_personal_id' => $request->wife_personal_id,
        ]);

        if (!empty($beneficiary->id)) {
            Beneficiary_Address::create([
                'beneficiary_id' => $beneficiary->id,
                'governorate' => $request->governorate,
                'city' => $request->city,
                'neighborhood' => $request->neighborhood,
                'address_details' => $request->address_details,
                'mobile' => $request->mobile,
                'mobile_tow' => $request->mobile_tow,
            ]);

            Beneficiary_Job::create([
                'beneficiary_id' => $beneficiary->id,
                'job_status' => $request->job_status,
                'job_class' => $request->job_class,
                'benefit_from_agency_coupon' => $request->benefit_from_agency_coupon,
                'benefit_from_social_affairs' => $request->benefit_from_social_affairs,
                'is_noor_employee' => $request->is_noor_employee,

            ]);

            Beneficiary_Family::create([
                'beneficiary_id' => $beneficiary->id,
                'family_status' => $request->family_status,
                'family_count' => $request->family_count,
                'family_male_count' => $request->family_male_count,
                'family_female_male_count' => $request->family_female_male_count,
                'family_count_less_than_18' => $request->family_count_less_than_18,
                'family_male_count_less_than_18' => $request->family_male_count_less_than_18,
                'family_female_count_less_than_18' => $request->family_female_count_less_than_18,
                'family_with_disabled' => $request->family_with_disabled,
                'disabled_count' => $request->disabled_count,
                'disabled_less_than_18_count' => $request->disabled_less_than_18_count,
                'family_with_patients' => $request->family_with_patients,
                'patients_count' => $request->patients_count,
            ]);

        }


        return $this->returnSuccessMessage(trans('general.add_success_message'));

    }

    ///////////////////////////////////////////////////////////////////////////////
    /// edit
    public function edit($id = null)
    {
        $title = trans('aides.update_beneficiary');
        if (!$id) {
            return redirect()->route('admin.not.found');
        }
        $beneficiary = Beneficiary::with('beneficiaryAddress')->with('beneficiaryJob')
            ->with('beneficiaryFamily')->find($id);

        if (!$beneficiary) {
            return redirect()->route('admin.not.found');
        }

        return view('admin.aides.beneficiaries.update', compact('title', 'beneficiary'));

    }
    ///////////////////////////////////////////////////////////////////////////////
    /// update
    public function update(Request $request)
    {

        $beneficiary = Beneficiary::find($request->id);

        $beneficiary->update([
            'first_name' => $request->first_name,
            'father_name' => $request->father_name,
            'grandfather_name' => $request->grandfather_name,
            'family_name' => $request->family_name,
            'personal_id' => $request->personal_id,
            'wife_name' => $request->wife_name,
            'wife_personal_id' => $request->wife_personal_id,
        ]);

        if (!empty($beneficiary->id)) {

            $beneficiaryAddress = Beneficiary_Address::where('beneficiary_id',$beneficiary->id)->first();
            $beneficiaryAddress->update([
                'beneficiary_id' => $beneficiary->id,
                'governorate' => $request->governorate,
                'city' => $request->city,
                'neighborhood' => $request->neighborhood,
                'address_details' => $request->address_details,
                'mobile' => $request->mobile,
                'mobile_tow' => $request->mobile_tow,
            ]);

            $beneficiaryJob = Beneficiary_Job::where('beneficiary_id',$beneficiary->id)->first();
            $beneficiaryJob->update([
                'beneficiary_id' => $beneficiary->id,
                'job_status' => $request->job_status,
                'job_class' => $request->job_class,
                'benefit_from_agency_coupon' => $request->benefit_from_agency_coupon,
                'benefit_from_social_affairs' => $request->benefit_from_social_affairs,
                'is_noor_employee' => $request->is_noor_employee,

            ]);

            $beneficiaryFamily = Beneficiary_Family::where('beneficiary_id',$beneficiary->id)->first();

            $beneficiaryFamily->update([
                'beneficiary_id' => $beneficiary->id,
                'family_status' => $request->family_status,
                'family_count' => $request->family_count,
                'family_male_count' => $request->family_male_count,
                'family_female_male_count' => $request->family_female_male_count,
                'family_count_less_than_18' => $request->family_count_less_than_18,
                'family_male_count_less_than_18' => $request->family_male_count_less_than_18,
                'family_female_count_less_than_18' => $request->family_female_count_less_than_18,
                'family_with_disabled' => $request->family_with_disabled,
                'disabled_count' => $request->disabled_count,
                'disabled_less_than_18_count' => $request->disabled_less_than_18_count,
                'family_with_patients' => $request->family_with_patients,
                'patients_count' => $request->patients_count,
            ]);

        }


        return $this->returnSuccessMessage(trans('general.update_success_message'));

    }
    ///////////////////////////////////////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $beneficiary = Beneficiary::find($request->id);
            if (!$beneficiary) {
                return redirect()->route('admin.not.found');
            }

            Beneficiary_Family::where('beneficiary_id', $beneficiary->id)->delete();
            Beneficiary_Job::where('beneficiary_id', $beneficiary->id)->delete();
            Beneficiary_Address::where('beneficiary_id', $beneficiary->id)->delete();
            $beneficiary->delete();
            return $this->returnSuccessMessage(trans('general.delete_success_message'));
        }

    }
}
