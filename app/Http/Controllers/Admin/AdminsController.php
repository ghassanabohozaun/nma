<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminsController extends Controller
{
    use GeneralTrait;

    //////////////////////////////////////////////////////////////////////////////
    /// index
    public function index()
    {
        $id = admin()->user()->id;
        $admin = Admin::find($id);
        $title = trans('menu.admin');
        return view('admin.admin.index', compact('title', 'admin'));
    }

    //////////////////////////////////////////////////////////////////////////////
    /// get Admin By Id
    public function getAdminById(Request $request)
    {
        $admin = Admin::find($request->id);
        if (!$admin) {
            return redirect()->route('admin.not.found');
        }
        return $this->returnData('OK', 'data', $admin);
    }
    //////////////////////////////////////////////////////////////////////////////
    /// Admin Update
    public function adminUpdate(AdminUpdateRequest $request)
    {

        try {
            $admin = Admin::find($request->id);
            if (!$admin) {
                return redirect()->route('admin.not.found');
            }

            if ($request->hasFile('photo')) {
                if (!empty($admin->photo)) {
                    Storage::delete($admin->photo);
                    $photo_path = $request->file('photo')->store('admins');
                } else {
                    $photo_path = $request->file('photo')->store('admins');
                }
            } else {
                if (!empty($admin->photo)) {
                    $photo_path = $admin->photo;
                } else {
                    $photo_path = '';
                }
            }


            if (!empty($request->input('password'))) {
                $password = bcrypt($request->password);
            } else {
                $password = $admin->password;
            }


            $admin->update([
                'name' => $request->name,
                'photo' => $photo_path,
                'password' => $password,
            ]);



            return $this->returnSuccessMessage(trans('general.update_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), '500');
        }
    }
}
