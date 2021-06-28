<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UsersTrashedResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Admin;
use App\Http\Resources\UsersResource;
use Illuminate\Support\Facades\Auth;
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

        $list = Admin::withoutTrashed()->orderByDesc('created_at')->offset($offset)->take($perPage)->get();
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
    /// Get Trashed users index
    public function trashedUser()
    {
        $title = trans('menu.trashed_users');
        return view('admin.users.trashed-users', compact('title'));
    }

    /////////////////////////////////////////
    /// Get Trashed users
    public function getTrashedUsers(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Admin::onlyTrashed()->orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = UsersTrashedResource::collection($list);
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
    /// User create
    public function create()
    {
        $title = trans('menu.add_new_user');
        return view('admin.users.create', compact('title'));
    }
    /////////////////////////////////////////
    /// User store
    public function store(UserRequest $request)
    {

        if ($request->hasFile('photo')) {
            $photo_path = $request->file('photo')->store('Users');
        } else {
            $photo_path = '';
        }

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'photo' => $photo_path,
            'mobile' => $request->mobile,
            'gender' => $request->gender,
        ]);

        return $this->returnSuccessMessage(trans('general.add_success_message'));

    }


    /////////////////////////////////////////
    /// User edit
    public function edit($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }

        $user = Admin::find($id);
        if (!$user) {
            return redirect()->route('admin.not.found');
        }
        $title = trans('users.update_users');

        return view('admin.users.update', compact('title', 'user'));
    }


    /////////////////////////////////////////
    /// User Update
    public function update(UserUpdateRequest $request)
    {
        $user = Admin::find($request->id);

        if ($request->hasFile('photo')) {
            if (!empty($user->photo)) {
                Storage::delete($user->photo);
                $photo_path = $request->file('photo')->store('Users');
            } else {
                $photo_path = $request->file('photo')->store('Users');
            }
        } else {
            if (!empty($user->photo)) {
                $photo_path = $user->photo;
            } else {
                $photo_path = '';
            }
        }


        if (!empty($request->input('password'))) {
            $password = bcrypt($request->password);
        } else {
            $password = $user->password;
        }


        $user->update([
            'name' => $request->name,
            'password' => $password,
            'photo' => $photo_path,
            'mobile' => $request->mobile,
            'gender' => $request->gender,
        ]);

        return $this->returnSuccessMessage(trans('general.update_success_message'));

    }
    /////////////////////////////////////////
    /// User restore
    public function restore(Request $request)
    {
        if ($request->ajax()) {
            $user = Admin::onlyTrashed()->find($request->id);
            if (!$user) {
                return redirect()->route('admin.not.found');
            }
            $user->restore();
            return $this->returnSuccessMessage(trans('general.restore_success_message'));
        }

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
            $user->delete();

            return $this->returnSuccessMessage(trans('general.delete_success_message'));
        }

    }

    /////////////////////////////////////////
    /// user force delete
    public function forceDelete(Request $request)
    {
        if ($request->ajax()) {
            $user = Admin::onlyTrashed()->find($request->id);
            if (!$user) {
                return redirect()->route('admin.not.found');
            }
            if (!empty($user->photo)) {
                Storage::delete($user->photo);
            }
            $user->forceDelete();

            return $this->returnSuccessMessage(trans('general.delete_success_message'));
        }

    }
    /////////////////////////////////////////
    /// change User status
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
