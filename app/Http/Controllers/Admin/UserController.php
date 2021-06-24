<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Admin;
use App\Http\Resources\UsersResource;
use Illuminate\Support\Facades\Storage;
use App\Traits\GeneralTrait;

class UserController extends Controller
{
    use GeneralTrait;

    /////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.users');
        return view('admin.users.index', compact('title'));
    }
    /////////////////////////////////////////
    /// Get Users
    public function getUsers(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Admin::orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = UsersResource::collection($list);
        $recordsTotal = Admin::get()->count();
        $recordsFiltered = Admin::get()->count();
        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr
        ]);
    }

    /////////////////////////////////////////
    /// User Destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $user = Admin::find($request->id);
            if (!$user) {
                return redirect()->route('admin.not.found');
            }
            if (!empty($user->photo)) {
                Storage::delete($user->photo);
            }
            $user->delete();

            return $this->returnSuccessMessage(trans('general.delete_success_message'));
        }

    }
    /////////////////////////////////////////
    /// chane User status
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {

            $user = Admin::find($request->id);
            if (!$user) {
                return redirect()->route('admin.not.found');
            }
            if ($user->status == '1') {
                $user->status = '0';
                $user->save();
            } else {
                $user->status = '1';
                $user->save();
            }

            return $this->returnSuccessMessage(trans('general.change_status_success_message'));

        }
    }
}
