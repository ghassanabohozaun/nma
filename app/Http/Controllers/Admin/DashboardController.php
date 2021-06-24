<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\websiteMainPageRequest;
use App\Models\Setting;
use App\Models\Website_main_page;
use App\Traits\GeneralTrait;
use File;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    use GeneralTrait;

    ////////////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('dashboard.home');
        return view('admin.dashboard', compact('title'));
    }
    ////////////////////////////////////////////////////////
    /// get Settings
    public function getSettings()
    {
        $title = trans('settings.settings');
        return view('admin.settings', compact('title'));
    }
    ////////////////////////////////////////////////////////
    /// store Settings
    protected function storeSettings(SettingRequest $request)
    {

        try {

            $settings = Setting::get();
            if ($settings->isEmpty()) {

                if ($request->hasFile('site_icon')) {
                    $site_icon = $request->file('site_icon')->store('settings');
                }
                if ($request->hasFile('site_logo')) {
                    $site_logo = $request->file('site_logo')->store('settings');
                }


                Setting::create([
                    'site_name_ar' => $request->site_name_ar,
                    'site_name_en' => $request->site_name_en,
                    'site_email' => $request->site_email,
                    'site_gmail' => $request->site_gmail,
                    'site_facebook' => $request->site_facebook,
                    'site_twitter' => $request->site_twitter,
                    'site_youtube' => $request->site_youtube,
                    'site_instagram' => $request->site_instagram,
                    'site_linkedin' => $request->site_linkedin,
                    'site_phone' => $request->site_phone,
                    'site_mobile' => $request->site_mobile,
                    'site_status' => $request->site_status,
                    'site_language' => $request->site_language,
                    'site_description_ar' => $request->site_description_ar,
                    'site_description_en' => $request->site_description_en,
                    'site_keywords_ar' => $request->site_keywords_ar,
                    'site_keywords_en' => $request->site_keywords_en,
                    'site_address_ar' => $request->site_address_ar,
                    'site_address_en' => $request->site_address_en,
                    'site_icon' => $site_icon,
                    'site_logo' => '',
                ]);
                return $this->returnSuccessMessage(trans('general.add_success_message'));


                /////////////////////////////////////////////////////////////////////////////////////
                /// Update Settings
            } else {

                $settings = Setting::orderBy('id', 'desc')->first();
                //////////////////////////////////////////////////////
                /// check and upload icon and logo

                /// Icon
                if ($request->hasFile('site_icon')) {
                    if (!empty($settings->site_icon)) {
                        Storage::delete($settings->site_icon);
                        $site_icon = $request->file('site_icon')->store('settings');
                    } else {
                        $site_icon = $request->file('site_icon')->store('settings');
                    }
                } else {
                    $site_icon = $settings->site_icon;
                }

                /// logo
                if ($request->has('site_logo')) {
                    if (!empty($settings->site_logo)) {
                        Storage::delete($settings->site_logo);
                        $site_logo = $request->file('site_logo')->store('settings');
                    } else {
                        $site_logo = $request->file('site_logo')->store('settings');
                    }
                } else {
                    $site_logo = $settings->site_logo;
                }


                $settings->update([
                    'site_name_ar' => $request->site_name_ar,
                    'site_name_en' => $request->site_name_en,
                    'site_email' => $request->site_email,
                    'site_gmail' => $request->site_gmail,
                    'site_facebook' => $request->site_facebook,
                    'site_twitter' => $request->site_twitter,
                    'site_youtube' => $request->site_youtube,
                    'site_instagram' => $request->site_instagram,
                    'site_linkedin' => $request->site_linkedin,
                    'site_phone' => $request->site_phone,
                    'site_mobile' => $request->site_mobile,
                    'site_status' => $request->site_status,
                    'site_language' => $request->site_language,
                    'site_description_ar' => $request->site_description_ar,
                    'site_description_en' => $request->site_description_en,
                    'site_keywords_ar' => $request->site_keywords_ar,
                    'site_keywords_en' => $request->site_keywords_en,
                    'site_address_ar' => $request->site_address_ar,
                    'site_address_en' => $request->site_address_en,
                    'site_icon' => $site_icon,
                    'site_logo' => $site_logo,
                ]);

                return $this->returnSuccessMessage(trans('general.update_success_message'));
            }


        } catch (\Exception $exception) {

            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }


    }
    ////////////////////////////////////////////////////////
    /// not Found
    public function notFound()
    {
        $title = trans('general.not_found');
        return view('admin.errors.not-found', compact('title'));
    }

    /////////////////////////////////////////////////////////////////////
    /// website main page
    public function websiteMainPage()
    {
        $title = trans('menu.website_main_page');
        return view('admin.website-main-page', compact('title'));
    }
    /////////////////////////////////////////////////////////////////////
    /// store website main page
    public function storeWebsiteMainPage(websiteMainPageRequest $request)
    {

        $Website_main_page = Website_main_page::get();

        if ($Website_main_page->isEmpty()) {
            if ($request->hasFile('counter_one_icon')) {
                $counter_one_icon = $request->file('site_icon')->store('settings');
            }
            if ($request->hasFile('counter_tow_icon')) {
                $counter_tow_icon = $request->file('counter_tow_icon')->store('settings');
            }
            if ($request->hasFile('counter_three_icon')) {
                $counter_three_icon = $request->file('counter_three_icon')->store('settings');
            }
            if ($request->hasFile('counter_four_icon')) {
                $counter_four_icon = $request->file('counter_four_icon')->store('settings');
            }
            Website_main_page::create([
                'counter_one_icon' => $counter_one_icon,
                'counter_one_text_ar' => $request->counter_one_text_ar,
                'counter_one_text_en' => $request->counter_one_text_en,
                'counter_one_number' => $request->counter_one_number,
                'counter_tow_icon' => $counter_tow_icon,
                'counter_tow_text_ar' => $request->counter_tow_text_ar,
                'counter_tow_text_en' => $request->counter_tow_text_en,
                'counter_tow_number' => $request->counter_tow_number,
                'counter_three_icon' => $counter_three_icon,
                'counter_three_text_ar' => $request->counter_three_text_ar,
                'counter_three_text_en' => $request->counter_three_text_en,
                'counter_three_number' => $request->counter_three_number,
                'counter_four_icon' => $counter_four_icon,
                'counter_four_text_ar' => $request->counter_four_text_ar,
                'counter_four_text_en' => $request->counter_four_text_en,
                'counter_four_number' => $request->counter_four_number,
            ]);
            return $this->returnSuccessMessage(trans('general.add_success_message'));

            /////////////////////////////////////////////////////////////////////////////////////
            /// Update Website main page
        } else {

            $Website_main_page = Website_main_page::orderBy('id', 'desc')->first();

            /// counter icon one
            if ($request->hasFile('counter_one_icon')) {
                if (!empty($Website_main_page->counter_one_icon)) {
                    Storage::delete($Website_main_page->counter_one_icon);
                    $counter_one_icon = $request->file('counter_one_icon')->store('settings');
                } else {
                    $counter_one_icon = $request->file('counter_one_icon')->store('settings');
                }
            } else {
                if (!empty($Website_main_page->counter_one_icon)) {
                    $counter_one_icon = $Website_main_page->counter_one_icon;
                } else {
                    $counter_one_icon = '';
                }
            }

            /// counter icon tow
            if ($request->hasFile('counter_tow_icon')) {
                if (!empty($Website_main_page->counter_tow_icon)) {
                    Storage::delete($Website_main_page->counter_tow_icon);
                    $counter_tow_icon = $request->file('counter_tow_icon')->store('settings');
                } else {
                    $counter_tow_icon = $request->file('counter_tow_icon')->store('settings');
                }
            } else {
                if (!empty($Website_main_page->counter_tow_icon)) {
                    $counter_tow_icon = $Website_main_page->counter_tow_icon;
                } else {
                    $counter_tow_icon = '';
                }
            }

            /// counter icon three
            if ($request->hasFile('counter_three_icon')) {
                if (!empty($Website_main_page->counter_three_icon)) {
                    Storage::delete($Website_main_page->counter_three_icon);
                    $counter_three_icon = $request->file('counter_three_icon')->store('settings');
                } else {
                    $counter_three_icon = $request->file('counter_three_icon')->store('settings');
                }
            } else {
                if (!empty($Website_main_page->counter_three_icon)) {
                    $counter_three_icon = $Website_main_page->counter_three_icon;
                } else {
                    $counter_three_icon = '';
                }
            }

            /// counter icon three
            if ($request->hasFile('counter_four_icon')) {
                if (!empty($Website_main_page->counter_four_icon)) {
                    Storage::delete($Website_main_page->counter_four_icon);
                    $counter_four_icon = $request->file('counter_four_icon')->store('settings');
                } else {
                    $counter_four_icon = $request->file('counter_four_icon')->store('settings');
                }
            } else {
                if (!empty($Website_main_page->counter_four_icon)) {
                    $counter_four_icon = $Website_main_page->counter_four_icon;
                } else {
                    $counter_four_icon = '';
                }
            }


            $Website_main_page->update([
                'counter_one_icon' => $counter_one_icon,
                'counter_one_text_ar' => $request->counter_one_text_ar,
                'counter_one_text_en' => $request->counter_one_text_en,
                'counter_one_number' => $request->counter_one_number,
                'counter_tow_icon' => $counter_tow_icon,
                'counter_tow_text_ar' => $request->counter_tow_text_ar,
                'counter_tow_text_en' => $request->counter_tow_text_en,
                'counter_tow_number' => $request->counter_tow_number,
                'counter_three_icon' => $counter_three_icon,
                'counter_three_text_ar' => $request->counter_three_text_ar,
                'counter_three_text_en' => $request->counter_three_text_en,
                'counter_three_number' => $request->counter_three_number,
                'counter_four_icon' => $counter_four_icon,
                'counter_four_text_ar' => $request->counter_four_text_ar,
                'counter_four_text_en' => $request->counter_four_text_en,
                'counter_four_number' => $request->counter_four_number,
            ]);

            return $this->returnSuccessMessage(trans('general.add_success_message'));
        }
    }

}
