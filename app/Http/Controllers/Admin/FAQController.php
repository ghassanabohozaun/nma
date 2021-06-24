<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Http\Resources\FaqResource;
use App\Models\Faq;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class FAQController extends Controller
{

    use GeneralTrait;

    ////////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.faqs');
        return view('admin.faqs.index', compact('title'));
    }

    /////////////////////////////////////////////////
    /// get faqs
    ///
    public function getFaqs(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Faq::orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = FaqResource::collection($list);
        $recordsTotal = Faq::get()->count();
        $recordsFiltered = Faq::get()->count();
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
        $title = trans('menu.add_new_faq');
        return view('admin.faqs.create', compact('title'));
    }

    /////////////////////////////////////////////////
    /// store
    public function store(FaqRequest $request)
    {

        if ($request->input('language') == 'ar') {

            Faq::create([
                'language' => $request->language,
                'question_ar' => $request->question_ar,
                'question_en' => null,
                'answer_ar' => $request->answer_ar,
                'answer_en' => null,
            ]);

        } elseif ($request->input('language') == 'en') {
            Faq::create([
                'language' => $request->language,
                'question_ar' => null,
                'question_en' => $request->question_en,
                'answer_ar' => null,
                'answer_en' => $request->answer_en,
            ]);
        } elseif ($request->input('language') == 'ar_en') {
            Faq::create([
                'language' => $request->language,
                'question_ar' => $request->question_ar,
                'question_en' => $request->question_en,
                'answer_ar' => $request->answer_ar,
                'answer_en' => $request->answer_en,
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

        $faq = Faq::find($id);
        if (!$faq) {
            return redirect()->route('admin.not.found');
        }

        $title = trans('faqs.update_faq');
        return view('admin.faqs.update', compact('title', 'faq'));
    }

    /////////////////////////////////////////////////
    /// update
    public function update(FaqRequest $request)
    {
        $faq = Faq::find($request->id);
        if (!$faq) {
            return redirect()->route('admin.not.found');
        }

        if ($request->input('language') == 'ar') {

            $faq->update([
                'language' => $request->language,
                'question_ar' => $request->question_ar,
                'question_en' => null,
                'answer_ar' => $request->answer_ar,
                'answer_en' => null,
            ]);

        } elseif ($request->input('language') == 'en') {
            $faq->update([
                'language' => $request->language,
                'question_ar' => null,
                'question_en' => $request->question_en,
                'answer_ar' => null,
                'answer_en' => $request->answer_en,
            ]);
        } elseif ($request->input('language') == 'ar_en') {
            $faq->update([
                'language' => $request->language,
                'question_ar' => $request->question_ar,
                'question_en' => $request->question_en,
                'answer_ar' => $request->answer_ar,
                'answer_en' => $request->answer_en,
            ]);
        }

        return $this->returnSuccessMessage(trans('general.update_success_message'));

    }


    /////////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $faq = Faq::find($request->id);
            if (!$faq) {
                return redirect()->route('admin.not.found');
            }
            $faq->delete();
            return $this->returnSuccessMessage(trans('general.delete_success_message'));
        }
    }


    /////////////////////////////////////////////////
    /// destroy
    public function faqChangeStatus(Request $request)
    {
        if ($request->ajax()) {
            $faq = Faq::find($request->id);
            if (!$faq) {
                return redirect()->route('admin.not.found');
            }

            if( $faq->status== '1'){
                $faq->status='0';
                $faq->save();
            }else{
                $faq->status='1';
                $faq->save();
            }

            return $this->returnSuccessMessage(trans('general.change_status_success_message'));
        }
    }
}
