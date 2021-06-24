<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UploadCenterController extends Controller
{
    use GeneralTrait;

    /////////////////////////////////////////////////////////////////
    /// index
    public function index()
    {

        $title = trans('menu.upload_center');
        return view('admin.upload-center.index', compact('title'));
    }

    /////////////////////////////////////////////////////////////////
    /// index
    public function getUploadCenterFiles()
    {

        $files = File::select('id', 'file_name', 'file_mimes_type')->where('file_type', 'uploadCenter')->get();

        $meta = new \stdClass();
        $meta->page = 1;
        $meta->pages = 2;
        $meta->perpage = 15;
        $meta->total = 16;
        $meta->sort = "des";
        $meta->field = "id";

        return response()->json(['meta' => $meta, 'data' => $files]);

    }
    /////////////////////////////////////////////////////////////////
    /// store
    public function store(Request $request)
    {
        $messages = [
            'file.required' => trans('dashboard.file_required')
        ];

        $validation = Validator::make($request->all(), [
            'file' => 'required'
        ], $messages);

        if ($validation->passes()) {

            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('upload_center');
                $file = new File();
                $file->file_name = $request->file('file')->getClientOriginalName();
                $file->file_size = $request->file('file')->getSize();
                $file->file_path = 'upload_center';
                $file->file_after_upload = $request->file('file')->hashName();
                $file->full_path_after_upload = $filePath;
                $file->file_mimes_type = $request->file('file')->getMimeType();
                $file->file_type = 'uploadCenter';
                $file->relation_id = 'uploadCenter';
                $file->save();
            }
            return $this->returnSuccessMessage(trans('general.upload_success_message'));

        } else {
            return response()->json(['errors' => $validation->errors()]);
        }

    }

    /////////////////////////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
        try {
            $file = File::find($request->id);
            if (!$file) {
                return redirect()->route('admin.not.found');
            }
            if (!empty($file->full_path_after_upload)) {
                Storage::delete($file->full_path_after_upload);
            }
            $file->delete();
            return $this->returnSuccessMessage(trans('general.delete_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }

    }


    /////////////////////////////////////////////////////////////////
    /// get by id
    public function getUploadCenterFileById(Request $request)
    {
        $file = File::find($request->id);
        if (!$file) {
            return redirect()->route('admin.not.found');
        }
        //return response()->json(['data'=>$file]);
        return $this->returnData('OK','data',$file);

    }
}
