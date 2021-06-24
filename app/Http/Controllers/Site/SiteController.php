<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunicationRequestsRequest;
use App\Http\Requests\OpinionRequest;
use App\Http\Requests\testimonialRequest;
use App\Models\AboutSPA;
use App\Models\ClientOpinion;
use App\Models\CommunicationRequest;
use App\Models\Faq;
use App\Models\PhotoAlbum;
use App\Models\Publication;
use App\Models\Section;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Tests\Metric;
use App\Models\Tests\Test;
use App\Models\Tests\TestAnswer;
use App\Models\Tests\TestQuestion;
use App\Models\Training;
use App\Models\Video;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class SiteController extends Controller
{
    use GeneralTrait;

    /////////////////////////////////////////////////////////
    /// index
    public function index()
    {
        if (Lang() == 'ar') {
            $title = setting()->site_name_ar;
        } else {
            $title = setting()->site_name_en;
        }

        if (LaravelLocalization::getCurrentLocale() == 'ar') {

            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start sliders ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $sliders = Slider::with('service')->orderBy('order', 'asc')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->get();
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Start Offers Or Treatment Areas ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $offers = Service::orderByDesc('created_at')->where('is_treatment_area', '1')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->get();
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Start Services ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $services = Service:: orderBy('created_at', 'asc')->where('is_treatment_area', '0')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->get();

            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Start Testimonials ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $testimonials = ClientOpinion:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->take(5)->get();

            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Start Publications ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $publications = Publication:: orderByDesc('add_date')->where('section_id', '<>', '4')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->take(2)->get();

            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Start News ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $news = Publication:: orderByDesc('add_date')->where('section_id', '=', '4')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->take(2)->get();
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Tests News ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $tests = Test:: orderByDesc('created_at')->where('language', 'ar')->where('status', '1')->take(5)->get();


            //--**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-///
            //--**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-///
            //--**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-///

        } else {

            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Start Sliders ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $sliders = Slider:: with('service')->orderBy('order', 'asc')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->get();
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Start Offers Or Treatment Areas ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $offers = Service::  orderByDesc('created_at')->where('is_treatment_area', '1')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->get();
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Start Services ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $services = Service::  orderBy('created_at', 'asc')->where('is_treatment_area', '0')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->get();

            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Start Testimonials ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $testimonials = ClientOpinion:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->take(5)->get();

            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Start Publications ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $publications = Publication:: orderByDesc('add_date')->where('section_id', '<>', '4')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->take(2)->get();
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Start News ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $news = Publication:: orderByDesc('add_date')->where('section_id', '=', '4')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->take(2)->get();
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Start Tests ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $tests = Test:: orderByDesc('created_at')->where('language', 'en')->where('status', '1')->take(5)->get();

        }

        return view('site.index', compact('title', 'sliders', 'offers', 'services', 'testimonials',
            'publications', 'news', 'tests'));
    }

    /////////////////////////////////////////////////////////
    /////reloadCaptcha
    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
    /////////////////////////////////////////////////////////
    /// about Spa function
    public function aboutSpa()
    {
        $title = trans('site.about_spa');

        if (LaravelLocalization::getCurrentLocale() == 'ar') {

            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start About SPC Items ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $aboutSpaItems = AboutSPA:: orderBy('created_at', 'asc')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->get();
        } else {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start About SPC Items ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $aboutSpaItems = AboutSPA:: orderBy('created_at', 'asc')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->get();
        }
        return view('site.about-spa', compact('title', 'aboutSpaItems'));
    }

    /////////////////////////////////////////////////////////
    /// faq function
    public function faq()
    {
        $title = trans('site.faqs');

        if (LaravelLocalization::getCurrentLocale() == 'ar') {

            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Faq ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $faqs = Faq:: orderBy('created_at', 'asc')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->take(10)->get();
        } else {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Faq ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $faqs = Faq:: orderBy('created_at', 'asc')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->take(10)->get();
        }
        return view('site.faq', compact('title', 'faqs'));
    }

    //////////////////////////////////////////////////////////
    //~~~~~~~~~~~~~~~~~~ Trainings ~~~~~~~~~~~~~~~~~~~~~~~~//
    /////////////////////////////////////////////////////////
    /// trainings function
    public function trainings()
    {
        $title = trans('site.trainings');

        if (LaravelLocalization::getCurrentLocale() == 'ar') {

            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Trinings  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $trainings = Training:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->paginate(6);
        } else {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Trinings ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $trainings = Training:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->paginate(6);
        }
        return view('site.trainings', compact('title', 'trainings'));
    }

    /////////////////////////////////////////////////////////
    /// trainings paging function
    public function trainingsPaging()
    {
        if (LaravelLocalization::getCurrentLocale() == 'ar') {
            $trainings = Training:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->paginate(6);
        } else {
            $trainings = Training:: orderByDesc('id')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->paginate(6);
        }
        return view('site.trainings-paging', compact('trainings'))->render();
    }


    //////////////////////////////////////////////////////////
    //~~~~~~~~~~~~~~~~~~ Videos ~~~~~~~~~~~~~~~~~~~~~~~~//
    /////////////////////////////////////////////////////////
    /// videos function
    public function videos()
    {
        $title = trans('site.videos');

        if (LaravelLocalization::getCurrentLocale() == 'ar') {

            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Videos  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $videos = Video:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->paginate(9);
        } else {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Videos ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $videos = Video:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->paginate(9);
        }
        return view('site.videos', compact('title', 'videos'));
    }

    /////////////////////////////////////////////////////////
    /// videos paging function
    public function videosPaging()
    {
        if (LaravelLocalization::getCurrentLocale() == 'ar') {
            $videos = Video:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->paginate(9);
        } else {
            $videos = Video:: orderByDesc('id')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->paginate(9);
        }
        return view('site.videos-paging', compact('videos'))->render();
    }

    //////////////////////////////////////////////////////////
    //~~~~~~~~~~~~~~~~~~ photo Albums ~~~~~~~~~~~~~~~~~~~~~~~~//
    /////////////////////////////////////////////////////////
    /// photo Albums function
    public function photoAlbums()
    {
        $title = trans('site.albums');

        if (LaravelLocalization::getCurrentLocale() == 'ar') {

            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Photo Albums ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $photoAlbums = PhotoAlbum:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->paginate(9);
        } else {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Photo Albums ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $photoAlbums = PhotoAlbum:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->paginate(9);
        }
        return view('site.photo-albums', compact('title', 'photoAlbums'));
    }

    /////////////////////////////////////////////////////////
    /// photo Albums paging function
    public function photoAlbumsPaging()
    {
        if (LaravelLocalization::getCurrentLocale() == 'ar') {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Photo Albums ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $photoAlbums = PhotoAlbum:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->paginate(9);
        } else {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Photo Albums ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $photoAlbums = PhotoAlbum:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->paginate(9);
        }
        return view('site.photo-albums-paging', compact('photoAlbums'))->render();
    }

    //////////////////////////////////////////////////////////
    //~~~~~~~~~~~~~~~~~~ publications ~~~~~~~~~~~~~~~~~~~~~~~~//
    /////////////////////////////////////////////////////////
    /// publications  function
    public function publications($val = null)
    {
        if (!$val) {
            return redirect()->route('index');
        }
        // check section exist
        if (LaravelLocalization::getCurrentLocale() == 'ar') {
            $section = Section::where('id', '<>', '4')->where('title_ar', '=', $val)->first();
            if (!$section) {
                return redirect()->route('index');
            }
            $title = $section->title_ar;
        } else {
            $section = Section::where('id', '<>', '4')->where('title_en', '=', $val)->first();
            if (!$section) {
                return redirect()->route('index');
            }
            $title = $section->title_en;
        }

        if (LaravelLocalization::getCurrentLocale() == 'ar') {

            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Publication ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $publications = Publication:: orderByDesc('created_at')->where('section_id', '=', $section->id)->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->paginate(2);

            $latest_news = Publication:: orderByDesc('created_at')->where('section_id', '=', 4)->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->paginate(2);
        } else {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Publication ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $publications = Publication:: orderByDesc('created_at')->where('section_id', '=', $section->id)->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->paginate(2);

            $latest_news = Publication:: orderByDesc('created_at')->where('section_id', '=', 4)->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->paginate(2);
        }
        return view('site.publications', compact('title', 'publications', 'latest_news'));
    }

    /////////////////////////////////////////////////////////
    /// publications paging function
    public function publicationPaging($val = null)
    {
        if (!$val) {
            return redirect()->route('index');
        }
        // check section exist
        if (LaravelLocalization::getCurrentLocale() == 'ar') {
            $section = Section::where('id', '<>', '4')->where('title_ar', '=', $val)->first();
            $title = $section->title_ar;

        } else {
            $section = Section::where('id', '<>', '4')->where('title_en', '=', $val)->first();
            $title = $section->title_en;

        }

        if (!$section) {
            return redirect()->route('index');
        }

        if (LaravelLocalization::getCurrentLocale() == 'ar') {

            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Publications ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $publications = Publication:: orderByDesc('created_at')->where('section_id', '=', $section->id)->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->paginate(2);
        } else {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Publications ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $publications = Publication:: orderByDesc('created_at')->where('section_id', '=', $section->id)->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->paginate(2);
        }
        return view('site.publication-paging', compact('title', 'publications'))->render();
    }

    ///////////////////////////////////////////////////////
    /// publication Function
    public function publication($val = null)
    {
        if (!$val) {
            return redirect()->route('index');
        }

        $OriginalPublicationTitle = str_replace('-', ' ', $val);

        if (LaravelLocalization::getCurrentLocale() == 'ar') {
            $publication = Publication::where('title_ar', '=', $OriginalPublicationTitle)->first();
            if (!$publication) {
                return redirect()->route('index');
            }
            $title = $publication->title_ar;
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Latest News ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $latest_news = Publication:: orderByDesc('created_at')->where('section_id', '=', 4)->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->paginate(2);
        } else {
            $publication = Publication::where('title_en', '=', $OriginalPublicationTitle)->first();
            if (!$publication) {
                return redirect()->route('index');
            }
            $title = $publication->title_en;
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Latest News ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $latest_news = Publication:: orderByDesc('created_at')->where('section_id', '=', 4)->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->paginate(2);
        }
        return view('site.publication', compact('title', 'publication', 'latest_news'));
    }

    //////////////////////////////////////////////////////////
    //~~~~~~~~~~~~~~~~~~ Services ~~~~~~~~~~~~~~~~~~~~~~~~//
    /////////////////////////////////////////////////////////
    /// Services function
    public function services()
    {
        $title = trans('site.services');

        if (LaravelLocalization::getCurrentLocale() == 'ar') {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Services  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $services = Service:: orderBy('created_at', 'asc')->where('is_treatment_area', '0')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->get();
        } else {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Services ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $services = Service:: orderBy('created_at', 'asc')->where('is_treatment_area', '0')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->get();
        }
        return view('site.services', compact('title', 'services'));
    }
    /////////////////////////////////////////////////////////
    /// Services function
    public function service($val = null)
    {
        if (!$val) {
            return redirect()->route('index');
        }

        $OriginalServiceTitle = str_replace('-', ' ', $val);

        /// check Treatment Areas
        if ($OriginalServiceTitle == 'Treatment Areas' || $OriginalServiceTitle == 'مناطق العلاج') {
            $title = $OriginalServiceTitle;
            if (LaravelLocalization::getCurrentLocale() == 'ar') {
                //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start  Treatment Areas  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
                $treatmentAreas = Service:: orderBy('created_at', 'asc')->where('is_treatment_area', '1')->where('status', '1')
                    ->where(function ($q) {
                        $q->where('language', 'ar')
                            ->orWhere('language', 'ar_en');
                    })->get();
            } else {
                //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start  Treatment Areas ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
                $treatmentAreas = Service:: orderBy('created_at', 'asc')->where('is_treatment_area', '1')->where('status', '1')
                    ->where(function ($q) {
                        $q->where('language', 'en')
                            ->orWhere('language', 'ar_en');
                    })->get();
            }
            return view('site.treatment-areas', compact('title', 'treatmentAreas'));

            /// Or if Service
        } else {
            if (LaravelLocalization::getCurrentLocale() == 'ar') {
                $service = Service::where('title_ar', '=', $OriginalServiceTitle)->first();
                if (!$service) {
                    return redirect()->route('index');
                }
                $title = $service->title_ar;
            } else {
                $service = Service::where('title_en', '=', $OriginalServiceTitle)->first();
                if (!$service) {
                    return redirect()->route('index');
                }
                $title = $service->title_en;
            }
            return view('site.service', compact('title', 'service'));
        }


    }
    /////////////////////////////////////////////////////////
    /// Get Treatment Areas function
    public function getTreatmentAreas(Request $request)
    {
        if ($request->ajax()) {
            $treatmentArea = Service::find($request->id);
            return response()->json($treatmentArea);
        }
    }



    //////////////////////////////////////////////////////////
    //~~~~~~~~~~~~~~~~~~ Contact ~~~~~~~~~~~~~~~~~~~~~~~~//
    /////////////////////////////////////////////////////////
    /// contact function
    public function contact()
    {
        $title = trans('site.contact_us');
        return view('site.contact', compact('title'));
    }
    /////////////////////////////////////////////////////////
    /// Send Contact function
    public function sendContact2(CommunicationRequestsRequest $request)
    {
        try {
            CommunicationRequest::create([
                'communication_sender' => $request->communication_sender,
                'communication_email' => $request->communication_email,
                'communication_mobile' => $request->communication_mobile,
                'communication_title' => $request->communication_title,
                'communication_details' => $request->communication_details,
            ]);

            return $this->returnSuccessMessage(trans('general.add_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }
    }
    /////////////////////////////////////////////////////////
    /// Send Contact function
    public function sendContact(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'captcha' => 'required|captcha'
            ]);

            $communication_sender = $request->communication_sender;
            $communication_mobile = $request->communication_mobile;
            $communication_email = $request->communication_email;
            $communication_title = $request->communication_title;
            $communication_details = $request->communication_details;

            $emailData = array('communication_email' => $communication_email, 'communication_title' => $communication_title,
                'communication_details' => $communication_details, 'communication_sender' => $communication_sender,
                'communication_mobile' => $communication_mobile);

            Mail::send('site.emails.contact-email',
                compact('emailData'), function ($message) use ($emailData) {
                    $message->from($emailData['communication_email'], $emailData['communication_sender']);
                    $message->to(config('websiteemail.mail'));
                    $message->subject($emailData['communication_title']);

                });
            return $this->returnSuccessMessage(trans('site.success_send_contact_message'));

        }
    }
    /////////////////////////////////////////////////////////
    /// Appointment function
    public function appointment()
    {
        $title = trans('site.book_an_appointment');
        return view('site.appointment', compact('title'));

    }
    /////////////////////////////////////////////////////////
    /// Booking Appointment function
    public function bookingAppointment(Request $request)
    {
        if ($request->ajax()) {

            $request->validate([
                'captcha' => 'required|captcha'
            ]);

            $full_name = $request->full_name;
            $phone = $request->phone;
            $email = $request->email;
            $preferred_date = $request->preferred_date;
            $details = $request->details;

            $emailData = array('email' => $email, 'title' => 'Booking an appointment', 'details' => $details
            , 'full_name' => $full_name, 'phone' => $phone, 'preferred_date' => $preferred_date);

            Mail::send('site.emails.booking-appointment-email',
                compact('emailData'), function ($message) use ($emailData) {
                    $message->from($emailData['email'], $emailData['full_name']);
                    $message->to(config('websiteemail.mail'));
                    $message->subject($emailData['title']);

                });
            return $this->returnSuccessMessage(trans('site.success_booking_message'));

        }
    }


    /////////////////////////////////////////////////////////
    /// testimonials
    /////////////////////////////////////////////////////////
    /// testimonials function
    public function testimonials()
    {
        $title = trans('site.testimonials');

        if (LaravelLocalization::getCurrentLocale() == 'ar') {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Services  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $clientOpinions = ClientOpinion:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->paginate(3);
        } else {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Services ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $clientOpinions = ClientOpinion:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->paginate(3);
        }
        return view('site.testimonials', compact('title', 'clientOpinions'));
    }

    /////////////////////////////////////////////////////////
    /// testimonials function
    public function testimonialPaging()
    {
        if (LaravelLocalization::getCurrentLocale() == 'ar') {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Services  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $clientOpinions = ClientOpinion:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar')
                        ->orWhere('language', 'ar_en');
                })->paginate(3);
        } else {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Services ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $clientOpinions = ClientOpinion:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en')
                        ->orWhere('language', 'ar_en');
                })->paginate(3);
        }
        return view('site.testimonial-paging', compact('clientOpinions'))->render();
    }
    /////////////////////////////////////////////////////////
    /// testimonials Filter By Year function
    public function testimonialsFilterByYear(Request $request)
    {

        if ($request->ajax()) {
            if ($request->year == null) {
                $data = ClientOpinion::orderByDesc('created_at')->take(3)->get();

            } else {
                $data = ClientOpinion::whereYear('created_at', '=', $request->year)->take(3)->get();
            }

            $output = '';

            if (count($data) > 0) {
                $output = '<div class="testimonial">';

                foreach ($data as $row) {

                    $output .= ' <div class="testimonial-text testimonial-block">';
                    if ($row->photo == null) {
                        if ($row->gender == trans('general.male')) {
                            $output .= '<img src="' . asset('site/assets/images/male.jpeg') . '" alt=""  class="my_testimonial_img">';
                        } elseif($row->gender == trans('general.female')) {
                            $output .= '<img src="' . asset('site/assets/images/female.jpeg') . '" alt=""  class="my_testimonial_img">';
                        }else{
                            $output .= '<img src="' . asset('site/assets/images/others.png') . '" alt=""  class="my_testimonial_img">';
                        }
                    } else {
                        $output .= '<img src="' . asset(Storage::url($row->photo)) . '" alt=""  class="my_testimonial_img">';
                    }
                    if (LaravelLocalization::getCurrentLocale() == 'ar') {
                        $output .= '<p>' . $row->opinion_ar . '</p>
                        <h6>' . $row->client_name_ar . '
                         - <span>' . $row->job_title_ar . '</span></h6>
                        <h6>';
                    } else {
                        $output .= '<p>' . $row->opinion_en . '</p>
                        <h6>' . $row->client_name_en . '
                         - <span>' . $row->job_title_en . '</span></h6>
                        <h6>';
                    }

                    for ($i = 1; $i <= $row->rating; $i++) {
                        $output .= '<img src="' . asset('site/assets/images/icons/star.png') . '">';
                    }
                    $output .= '</h6></div><div class="clearfix"></div>';
                }
                $output .= '</div>';
            } else {

                $output .= '<h2 style="margin-top: 15px" class="text-center text-capitalize text-warning">' . trans('site.no_testimonials') . '</h2>';
            }


            return $output;
        }
    }

    /////////////////////////////////////////////////////////
    /// send testimonials function

    public function sendTestimonial(testimonialRequest $request)
    {
        if ($request->hasFile('photo')) {
            $photo_path = $request->file('photo')->store('Opinions');
        } else {
            $photo_path = '';
        }

        if (LaravelLocalization::getCurrentLocale() == 'ar') {
            ClientOpinion::create([
                'photo' => $photo_path,
                'language' => 'ar',
                'opinion_ar' => $request->opinion_ar,
                'opinion_en' => null,
                'client_name_ar' => $request->client_name_ar,
                'client_name_en' => null,
                'client_age' => $request->client_age,
                'country' => $request->country,
                'gender' => $request->gender,
                'job_title_ar' => $request->job_title_ar,
                'job_title_en' => null,
                'rating' => $request->rating,

            ]);
        } else {
            ClientOpinion::create([
                'photo' => $photo_path,
                'language' => 'en',
                'opinion_ar' => null,
                'opinion_en' => $request->opinion_en,
                'client_name_ar' => null,
                'client_name_en' => $request->client_name_en,
                'client_age' => $request->client_age,
                'country' => $request->country,
                'gender' => $request->gender,
                'job_title_ar' => null,
                'job_title_en' => $request->job_title_en,
                'rating' => $request->rating,

            ]);
        }

        return $this->returnSuccessMessage(trans('general.add_success_message'));
    }

    /////////////////////////////////////////////////////////
    /// Tests
    /////////////////////////////////////////////////////////
    /// Tests function
    public function tests()
    {
        $title = trans('site.tests');
        if (LaravelLocalization::getCurrentLocale() == 'ar') {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Services  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $tests = Test:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar');
                })->paginate(3);
        } else {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Services ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $tests = Test:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en');
                })->paginate(3);
        }
        return view('site.tests.tests', compact('title', 'tests'));
    }
    /////////////////////////////////////////////////////////
    /// Tests function
    public function testsPaging()
    {
        if (LaravelLocalization::getCurrentLocale() == 'ar') {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Services  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $tests = Test:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'ar');
                })->paginate(3);
        } else {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Start Services ~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
            $tests = Test:: orderByDesc('created_at')->where('status', '1')
                ->where(function ($q) {
                    $q->where('language', 'en');
                })->paginate(3);
        }
        return view('site.tests.tests-paging', compact('tests'))->render();
    }
    ///////////////////////////////////////////////////////
    /// get Test Details
    public function getTestDetails($val = null)
    {
        if (!$val) {
            return redirect()->route('tests');
        }
        $OriginalTestName = str_replace('-', ' ', $val);

        $title = trans('site.test_details');
        $test = Test::with('questions')->where('test_name', 'LIKE', '%' . $OriginalTestName . '%')->first();

        if (!$test) {
            return redirect()->route('tests');
        }

        $questions = TestQuestion::orderBy('id', 'asc')->where('test_id', $test->id)->paginate(1);
        $id = $test->id;

        return view('site.tests.test-details', compact('id', 'title', 'test', 'questions'));
    }


    //////////////////////////////////////////////////////////////////////////
    ///
    public function getTestMetric($id = null, $val = null)
    {
        $metric = Metric::where('test_id', $id)->where('minimum', '<=', $val)->where('maximum', '>=', $val)->first();

        $test = Test::find($id);

        $test->update([
            'number_times_of_use' => $test->number_times_of_use + 1,
        ]);

        return response()->json($metric);
    }
    ///////////////////////////////////////////////////////
    /// get Test paging
    public function getTestPaging($id = null)
    {
        $test = Test::with('questions')->find($id);
        $questions = TestQuestion::orderBy('id', 'asc')->where('test_id', $test->id)->paginate(1);
        return view('site.tests.test-paging', compact('test', 'questions'))->render();
    }





    ///////////////////////////////////////////////////////
    ///  Test
    public function test($val = null)
    {
        $title = trans('site.test');

        if (!$val) {
            return redirect()->route('tests');
        }
        $OriginalTestName = str_replace('-', ' ', $val);

        $test = Test::with('questions')->where('test_name', 'LIKE', '%' . $OriginalTestName . '%')->first();

        $questions = TestQuestion::orderBy('id', 'asc')->where('test_id', $test->id)->get();
        $id = $test->id;

        return view('site.tests.test', compact('id', 'title', 'questions', 'test'));
    }

    public function getTestQuestions(Request $request)
    {
        if ($request->ajax()) {
            $testQuestions = TestQuestion::orderBy('id', 'asc')->where('test_id', $request->id)->get();

            foreach ($testQuestions as $testQuestion) {
                $testAnswers = TestAnswer:: orderBy('id', 'asc')->where('test_question_id', $testQuestion->id)->get();
                return response()->json(['questions' => $testQuestions, 'answers' => $testAnswers]);
            }

        }
    }


    public function getQuestionAnswers(Request $request)
    {
        if ($request->ajax()) {
            $testAnswers = TestAnswer::orderBy('id', 'asc')->where('test_question_id', $request->idd)->get();
            return response()->json($testAnswers);
        }
    }

}
