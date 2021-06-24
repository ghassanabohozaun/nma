<?php

namespace App\Http\Controllers\Admin\Tests;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tests\TestScalesRequest;
use App\Http\Resources\Tests\TestQuestionResource;
use App\Http\Resources\Tests\TestScalesResource;
use App\Models\Tests\Metric;
use App\Models\Tests\Test;
use App\Models\Tests\TestQuestion;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestScalesController extends Controller
{
    use GeneralTrait;

    ////////////////////////////////////////////////////////////////////
    /// index
    public function index($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }
        $title = trans('menu.scales');
        return view('admin.tests.scales.index', compact('title', 'id'));
    }

    ////////////////////////////////////////////////////////////////////
    /// get Test Scales
    public function getTestScales(Request $request, $id = null)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Metric::where('test_id', $id)->orderByDesc('created_at')->offset($offset)->take($perPage)->get();

        $arr = TestScalesResource::collection($list);
        $recordsTotal = Metric::get()->count();
        $recordsFiltered = Metric::get()->count();
        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr
        ]);
    }

    ////////////////////////////////////////////////////////////////////
    /// store Test Scale
    public function store(TestScalesRequest $request, $id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('photo')) {
            $photo_path = $request->file('photo')->store('Scales');
        } else {
            $photo_path = '';
        }

        Metric::create([
            'statement' => $request->statement,
            'evaluation' => $request->evaluation,
            'minimum' => $request->minimum,
            'maximum' => $request->maximum,
            'test_id' => $id,
            'photo' => $photo_path,
        ]);
        return $this->returnSuccessMessage(trans('general.add_success_message'));

    }

    ////////////////////////////////////////////////////////////////////
    /// edit Test scale

    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $scale = Metric::find($request->id);
            if (!$scale) {
                return redirect()->route('admin.not.found');
            }
            return response()->json($scale);
        }
    }

    ////////////////////////////////////////////////////////////////////
    /// update Test Scale
    public function update(TestScalesRequest $request, $id = null)
    {
        $scale = Metric::find($request->id);
        if (!$scale) {
            return redirect()->route('admin.not.found');
        }
        if ($request->hasFile('photo')) {
            if (!empty($scale->photo)) {
                Storage::delete($scale->photo);
                $photo_path = $request->file('photo')->store('Scales');
            } else {
                $photo_path = $request->file('photo')->store('Scales');
            }
        } else {
            if (!empty($scale->photo)) {
                $photo_path = $scale->photo;
            } else {
                $photo_path = '';
            }
        }

        $scale->update([
            'statement' => $request->statement,
            'evaluation' => $request->evaluation,
            'minimum' => $request->minimum,
            'maximum' => $request->maximum,
            'test_id' => $id,
            'photo' => $photo_path,
        ]);
        return $this->returnSuccessMessage(trans('general.update_success_message'));
    }

    ////////////////////////////////////////////////////////////////////
    /// destroy Test Scale
    public function destroy(Request $request)
    {

        if ($request->ajax()) {
            $scale = Metric::find($request->id);
            if (!$scale) {
                return redirect()->route('admin.not.found');
            }

            if (!empty($scale->photo)) {
                Storage::delete($scale->photo);
            }
            $scale->delete();

            return $this->returnSuccessMessage(trans('general.delete_success_message'));
        }

    }
}
