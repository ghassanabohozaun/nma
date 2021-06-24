<?php

namespace App\Http\Controllers\Admin\Tests;


use App\Http\Controllers\Controller;
use App\Http\Requests\Tests\TestsRequests;
use App\Http\Requests\Tests\TestsUpdateRequests;
use App\Http\Resources\Tests\TestResource;
use App\Models\Tests\Metric;
use App\Models\Tests\Test;
use App\Models\Tests\TestAnswer;
use App\Models\Tests\TestQuestion;
use App\Traits\GeneralTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestsController extends Controller
{
    use GeneralTrait;

    /////////////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.tests');
        return view('admin.tests.index', compact('title'));
    }
    ////////////////////////////////////////////////////////////////////
    /// get Tests
    public function getTests(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Test::orderByDesc('created_at')->offset($offset)->take($perPage)->get();

        $arr = TestResource::collection($list);
        $recordsTotal = Test::get()->count();
        $recordsFiltered = Test::get()->count();
        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr
        ]);
    }
    ////////////////////////////////////////////////////////////////////
    /// store
    public function store(TestsRequests $request)
    {

        if ($request->hasFile('test_photo')) {
            $photo_path = $request->file('test_photo')->store('TestsPhotos');
        } else {
            $photo_path = '';
        }
        Test::create([
            'language' => $request->language,
            'test_name' => $request->test_name,
            'test_details' => $request->test_details,
            'test_photo' => $photo_path,
            'added_date' => Carbon::now()->format('Y-m-d')
        ]);
        return $this->returnSuccessMessage(trans('general.add_success_message'));
    }

    ////////////////////////////////////////////////////////////////////
    /// edit
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            $test = Test::find($request->id);
            if (!$test) {
                return redirect()->route('admin.not.found');
            }
            return response()->json($test);
        }
    }
    ////////////////////////////////////////////////////////////////////
    /// update
    public function update(TestsUpdateRequests $request)
    {
        $test = Test::find($request->id);
        if (!$test) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('test_photo')) {
            if (!empty($test->test_photo)) {
                Storage::delete($test->test_photo);
                $photo_path = $request->file('test_photo')->store('TestsPhotos');
            } else {
                $photo_path = $request->file('test_photo')->store('TestsPhotos');
            }
        } else {
            if (!empty($test->test_photo)) {
                $photo_path = $test->test_photo;
            } else {
                $photo_path = '';
            }
        }

        $test->update([
            'language' => $request->language,
            'test_name' => $request->test_name,
            'test_details' => $request->test_details,
            'test_photo' => $photo_path,
        ]);
        return $this->returnSuccessMessage(trans('general.update_success_message'));
    }

    ////////////////////////////////////////////////////////////////////
    /// change Status
    public function changeStatus(Request $request)
    {

        $test = Test::find($request->id);

        if ($test->status == '1') {
            $test->status = '0';
            $test->save();
        } else {
            $test->status = '1';
            $test->save();
        }

        return $this->returnSuccessMessage(trans('general.change_status_success_message'));
    }

    ////////////////////////////////////////////////////////////////////
    /// Destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $test = Test::find($request->id);
            if (!$test) {
                return redirect()->route('admin.not.found');
            }
            /// delete all question answers
            $testQuestions = TestQuestion::where('test_id', $test->id)->get();
            foreach ($testQuestions as $testQuestion) {
                $testAnswer = TestAnswer::where('test_question_id', $testQuestion->id);
                $testAnswer->delete();
                $testQuestion->delete();
            }

            /// delete all metric with photos
            $metrics = Metric::where('test_id', $test->id)->get();
            foreach ($metrics as $metric) {
                if (!empty($metric->photo)) {
                    Storage::delete($metric->photo);
                }
            }
            Metric::where('test_id', $test->id)->delete();


            /// delete test with photo
            if (!empty($test->test_photo)) {
                Storage::delete($test->test_photo);
            }
            if (!empty($test->file)) {
                Storage::delete($test->file);
            }
            $test->delete();
            return $this->returnSuccessMessage(trans('general.delete_success_message'));
        }
    }



    ////////////////////////////////////////////////////////////////////
    /// Add Test File
    public function addTestFile(Request $request)
    {
        if ($request->ajax()) {
            $test = Test::find($request->id);

            if ($request->hasFile('file')) {
                if (!empty($test->file)) {
                    Storage::delete($test->file);
                    $file_path = $request->file('file')->store('TestFiles');
                } else {
                    $file_path = $request->file('file')->store('TestFiles');
                }
            } else {
                if (!empty($test->file)) {
                    Storage::delete($test->file);
                    $file_path = null;
                } else {
                    $file_path = null;
                }
            }

            $test->update([
                'file' => $file_path,
            ]);
            return $this->returnSuccessMessage(trans('general.add_success_message'));
        }
    }


}
