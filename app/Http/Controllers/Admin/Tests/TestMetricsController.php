<?php

namespace App\Http\Controllers\Admin\Tests;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tests\TestScalesRequest;
use App\Models\Tests\Metric;
use App\Models\Tests\Test;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class TestMetricsController extends Controller
{
    use GeneralTrait;


    /////////////////////////////////////////////////////////////
    /// create
    public function index($id = null)
    {

        if (!$id) {
            return redirect()->route('admin.not.found');
        }

        $test = Test::find($id);
        if (!$test) {
            return redirect()->route('admin.not.found');
        }

        $metrics = Metric::orderBy('id', 'asc')->where('test_id', $id)->get();

        $title = trans('tests.test_metrics_manage');
        return view('admin.tests.metrics.index', compact('title', 'id', 'metrics'));
    }


    ////////////////////////////////////////////////////////////////////
    /// store
    public function store(TestScalesRequest $request)
    {

        Metric::where('test_id', $request->test_id)->delete();

        /////////// Add  metrics
        if ($request->has('statement') && $request->has('evaluation')
            && $request->has('minimum') && $request->has('maximum')) {
            $y = 0;
            foreach ($request->input('statement') as $statement) {
                $metric = new Metric();
                $metric->statement = $statement;
                $metric->evaluation = $request->input('evaluation')[$y];
                $metric->minimum = $request->input('minimum')[$y];
                $metric->maximum = $request->input('maximum')[$y];
                $metric->test_id = $request->test_id;
                $metric->save();
                $y++;
            }
            return $this->returnSuccessMessage(trans('general.update_success_message'));
        }
    }
}
