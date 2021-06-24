<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutWhomRequest;
use App\Http\Requests\BrochureRequest;
use App\Http\Requests\ContactUsRequest;
use App\Http\Requests\WhoAreWeRequest;
use App\Http\Requests\WhomRequest;
use App\Http\Requests\WhyChooseUsRequest;
use App\Models\AboutHoudo;
use App\Models\AboutSite;
use App\Models\WhoAreWe;
use App\Models\WhyChooseUs;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSiteController extends Controller
{
    use GeneralTrait;

    /////////////////////////////////////////////////////
    /// whom
    public function whom()
    {
        $title = trans('menu.whom');
        return view('admin.about-site.whom', compact('title'));
    }
    /////////////////////////////////////////////////////
    /// store whom
    public function storeWhom(AboutWhomRequest $request)
    {

        $boutSite = AboutSite::get();

        if ($boutSite->isEmpty()) {
            AboutSite::create([
                'whom_ar' => $request->whom_ar,
                'whom_en' => $request->whom_en,
            ]);
            return $this->returnSuccessMessage(trans('general.add_success_message'));
        } else {

            $boutSite = AboutSite::orderBy('id', 'desc')->first();

            $boutSite->update([
                'whom_ar' => $request->whom_ar,
                'whom_en' => $request->whom_en,
            ]);

            return $this->returnSuccessMessage(trans('general.update_success_message'));
        }

    }

    /////////////////////////////////////////////////////
    /// downloadBrochure
    public function downloadBrochure($path = null)
    {
        return response()->download($path);
    }
    /////////////////////////////////////////////////////
    /// contact us
    public function contactUs()
    {
        $title = trans('menu.contact_us');
        return view('admin.about-site.contact-us', compact('title'));
    }
    /////////////////////////////////////////////////////
    /// store Contact Us
    public function storeContactUs(ContactUsRequest $request)
    {

        $boutSite = AboutSite::get();

        if ($boutSite->isEmpty()) {
            AboutSite::create([
                'contact_us_ar' => $request->contact_us_ar,
                'contact_us_en' => $request->contact_us_en,
            ]);

            return $this->returnSuccessMessage(trans('general.add_success_message'));

        } else {

            $boutSite = AboutSite::orderBy('id', 'desc')->first();
            $boutSite->update([
                'contact_us_ar' => $request->contact_us_ar,
                'contact_us_en' => $request->contact_us_en,
            ]);

            return $this->returnSuccessMessage(trans('general.update_success_message'));
        }

    }

    /////////////////////////////////////////////////////
    /// Why Choose Us
    public function whyChooseUs()
    {
        $title = trans('menu.why_choose_us');
        return view('admin.about-site.why-choose-us', compact('title'));
    }
    /////////////////////////////////////////////////////
    /// store Why Choose Us
    public function storeWhyChooseUs(WhyChooseUsRequest $request)
    {
        $whyChooseUs = WhyChooseUs::get();

        if ($whyChooseUs->isEmpty()) {

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo')->store('WhyChooseUs');
            }
            WhyChooseUs::create([
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
                'photo' => $photo,
            ]);
            return $this->returnSuccessMessage(trans('general.add_success_message'));

        } else {

            $whyChooseUs = WhyChooseUs::orderBy('id', 'desc')->first();

            if ($request->hasFile('photo')) {
                if (!empty($whyChooseUs->photo)) {
                    Storage::delete($whyChooseUs->photo);
                    $photo = $request->file('photo')->store('WhyChooseUs');
                } else {
                    $photo = $request->file('photo')->store('WhyChooseUs');
                }
            } else {
                if (!empty($whyChooseUs->photo)) {
                    $photo = $whyChooseUs->photo;
                } else {
                    $photo = '';
                }
            }

            $whyChooseUs->update([
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
                'photo' => $photo,
            ]);

            return $this->returnSuccessMessage(trans('general.update_success_message'));
        }


    }



    //////////////////////////////////////////////////////////////////////////
    /// who are We
    public function whoAreWe()
    {
        $title = trans('menu.who_are_we');
        return view('admin.about-site.who-are-we', compact('title'));
    }
    ////////////////////////////////////////////////////////////////////////
    /// store Who Are We
    public function storeWhoAreWe(WhoAreWeRequest $request)
    {
        $whoAreWe = WhoAreWe::get();

        if ($whoAreWe->isEmpty()) {
            WhoAreWe::create([
                'who_are_we_ar' => $request->who_are_we_ar,
                'who_are_we_en' => $request->who_are_we_en,
            ]);
            return $this->returnSuccessMessage(trans('general.add_success_message'));
        } else {

            $whoAreWe = WhoAreWe::orderBy('id', 'desc')->first();

            if ($request->hasFile('brochure')) {
                if (!empty($whoAreWe->brochure)) {
                    Storage::delete($whoAreWe->brochure);
                    $brochure_path = $request->file('brochure')->store('Brochures');
                } else {
                    $brochure_path = $request->file('brochure')->store('Brochures');
                }
            } else {
                if (!empty($whoAreWe->brochure)) {
                    $brochure_path = $whoAreWe->brochure;
                } else {
                    $brochure_path = '';
                }
            }

            $whoAreWe->update([
                'who_are_we_ar' => $request->who_are_we_ar,
                'who_are_we_en' => $request->who_are_we_en,
                'brochure' => $brochure_path,
            ]);

            return $this->returnSuccessMessage(trans('general.update_success_message'));
        }


    }


}
