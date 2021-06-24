<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunicationRequestsRequest;
use App\Http\Resources\CommunicationResource;
use App\Mail\CommunicationRequestMail;
use App\Models\CommunicationRequest;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommunicationController extends Controller
{

    use GeneralTrait;


    ////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.communication_requests');
        return view('admin.communication-requests.index', compact('title'));
    }
    ////////////////////////////////////////////////
    /// get communication request
    public function getCommunicationRequest(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = CommunicationRequest::orderByDesc('created_at')->offset($offset)->take($perPage)->get();

        $arr = CommunicationResource::collection($list);
        $recordsTotal = CommunicationRequest::get()->count();
        $recordsFiltered = CommunicationRequest::get()->count();
        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr
        ]);
    }

    ////////////////////////////////////////////////
    /// create
    public function create()
    {
        $title = trans('menu.add_new_communication_requests');
        return view('admin.communication-requests.create', compact('title'));
    }

    ////////////////////////////////////////////////
    /// store
    public function store(CommunicationRequestsRequest $request)
    {
        try {
            CommunicationRequest::create([
                'communication_sender' => $request->communication_sender,
                'communication_email' => $request->communication_email,
                'communication_mobile' => $request->communication_mobile,
                'communication_title' => $request->communication_title,
                'communication_details' => $request->communication_details,
                'communication_status' => $request->communication_status,
            ]);

            return $this->returnSuccessMessage(trans('general.add_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }
    }

    /////////////////////////////////////////////////
    /// update status
    public function updateStatus(Request $request)
    {
        $communicationRequest = CommunicationRequest::find($request->id);

        if ($communicationRequest->communication_status == '1') {
            $communicationRequest->communication_status = '0';
            $communicationRequest->save();
        } else {
            $communicationRequest->communication_status = '1';
            $communicationRequest->save();
        }
        return $this->returnSuccessMessage(trans('general.change_status_success_message'));
    }
    ////////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $communicationRequest = CommunicationRequest::find($request->id);
                if (!$communicationRequest) {
                    return redirect()->route('admin.not.found');
                }
                $communicationRequest->delete();
                return $this->returnSuccessMessage(trans('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }
    }

    ////////////////////////////////////////////////
    /// send Message
    public function sendMessage(Request $request)
    {
        if ($request->ajax()) {

            $id = $request->id;
            $title = $request->title;
            $details = $request->details;

            //$email = CommunicationRequest::select('communication_email')->find($request->id);

            $email = CommunicationRequest::where('id','=',$id)->select('communication_email')
                ->first()->communication_email;

            $emailData = array('email' => $email ,  'title' => $title, 'details' => $details);


            //Mail::to($email)->send(new CommunicationRequestMail($emailData));

            Mail::send('admin.emails.communication-request-email',
                compact('emailData'), function($message) use ($emailData){
                $message->from(config('websiteemail.mail')  , 'SPC');
                $message->to($emailData['email']);
                $message->subject($emailData['title']);
            });


            $communicationRequest =  CommunicationRequest::find($id);
            $communicationRequest->communication_status = '1';
            $communicationRequest->update();

            return $this->returnSuccessMessage(trans('communicationRequests.send_message_successfully'));

        }
    }


}
