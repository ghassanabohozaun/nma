<?php

namespace App\Http\Controllers\Admin\Tests;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tests\TestQuestionsRequest;
use App\Http\Resources\Tests\TestQuestionResource;
use App\Models\Tests\Metric;
use App\Models\Tests\Test;
use App\Models\Tests\TestAnswer;
use App\Models\Tests\TestQuestion;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class TestQuestionsController extends Controller
{
    use GeneralTrait;


    /////////////////////////////////////////////////////////
    /// index
    public function index($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }

        $test = Test::find($id);
        if (!$test) {
            return redirect()->route('admin.not.found');
        }

        $title = trans('tests.questions');
        return view('admin.tests.questions.index', compact('title', 'id'));
    }
    ////////////////////////////////////////////////////////////////////
    /// get Test Questions
    public function getTestQuestions(Request $request, $id = null)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = TestQuestion::where('test_id',$id)->orderByDesc('created_at')->offset($offset)->take($perPage)->get();

        $arr = TestQuestionResource::collection($list);
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
    /// create
    public function create($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }
        $title = trans('tests.add_test_question');
        return view('admin.tests.questions.create', compact('title', 'id'));
    }

    ////////////////////////////////////////////////////////////////////
    /// store
    public function store(TestQuestionsRequest $request)
    {
        $testQuestion = TestQuestion::create([
            'test_question' => $request->test_question,
            'test_id' => $request->test_id,
        ]);

        /////////// Add  Answers
        if ($request->has('answer_text') && $request->has('answer_value')) {
            $i = 0;
            foreach ($request->input('answer_text') as $text) {
                    $testAnswer = new TestAnswer();
                    $testAnswer->test_question_id = $testQuestion->id;
                    $testAnswer->answer_text = $text;
                    $testAnswer->answer_value = $request->input('answer_value')[$i];
                    $testAnswer->save();
                    $i++;
                }
        }
        return $this->returnSuccessMessage(trans('general.add_success_message'));
    }
    ////////////////////////////////////////////////////////////////////
    /// edit
    public function edit(Request $request, $id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }


        $testQuestion = TestQuestion::find($id);
        if (!$testQuestion) {
            return redirect()->route('admin.not.found');
        }

        $testAnswers = TestAnswer::orderBy('id', 'asc')->where('test_question_id', $id)->get();

        $title = trans('tests.update_test_question');
        return view('admin.tests.questions.update', compact('title', 'id', 'testQuestion', 'testAnswers'));
    }

    ////////////////////////////////////////////////////////////////////
    /// update
    public function update(TestQuestionsRequest $request)
    {
        $testQuestion = TestQuestion::find($request->test_question_id);

        $testQuestion->update([
            'test_question' => $request->test_question,
            'test_id' => $request->test_id,
        ]);

        TestAnswer::where('test_question_id', $request->test_question_id)->delete();

        /////////// update  Answers
        if ($request->has('answer_text') && $request->has('answer_value')) {
            $i = 0;
            foreach ($request->input('answer_text') as $text) {
                     $testAnswer = new TestAnswer();
                    $testAnswer->test_question_id = $request->test_question_id;
                    $testAnswer->answer_text = $text;
                    $testAnswer->answer_value = $request->input('answer_value')[$i];
                    $testAnswer->save();
                    $i++;
            }
            return $this->returnSuccessMessage(trans('general.update_success_message'));
        }
    }

    ////////////////////////////////////////////////////////////////////
    /// Destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $testQuestion = TestQuestion::find($request->id);
            if (!$testQuestion) {
                return redirect()->route('admin.not.found');
            }

            TestAnswer::where('test_question_id', $testQuestion->id)->delete();
            $testQuestion->delete();
            return $this->returnSuccessMessage(trans('general.delete_success_message'));
        }
    }


}
