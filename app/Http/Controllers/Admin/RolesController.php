<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\OfferResource;
use App\Http\Resources\RoleResource;
use App\Models\Admin;
use App\Models\Offer;
use App\Models\Role;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class RolesController extends Controller
{

    use GeneralTrait;

    ///////////////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = trans('menu.permissions');
        return view('admin.roles.index', compact('title'));
    }

    /////////////////////////////////////////////////
    /// get roles
    public function getRoles(Request $request)
    {
        $perPage = 10;
        if ($request->has('length')) {
            $perPage = $request->length;
        }

        $offset = 0;
        if ($request->has('start')) {
            $offset = $request->start;
        }

        $list = Role::orderByDesc('created_at')->offset($offset)->take($perPage)->get();
        $arr = RoleResource::collection($list);
        $recordsTotal = Role::get()->count();
        $recordsFiltered = Role::get()->count();
        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr
        ]);
    }


    /////////////////////////////////////////////////
    /// destroy roles
    public function destroy(Request $request)
    {

        try {
            if ($request->ajax()) {
                $role = Role::find($request->id);
                if (!$role) {
                    return redirect()->route('admin.not.found');
                }

                $admins = Admin::where('role_id', $request->id)->get();
                if ($admins->isEmpty()) {
                    $role->delete();
                    return $this->returnSuccessMessage(trans('general.delete_success_message'));
                } else {
                    return $this->returnError(trans('roles.delete_error_message'),500);
                }

            }
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), 500);
        }

    }

    /////////////////////////////////////////////////
    /// create
    public function create()
    {
        $title = trans('menu.add_new_permission');
        return view('admin.roles.create', compact('title'));
    }

    /////////////////////////////////////////////////
    /// Store
    public function store(RoleRequest $request)
    {
        try {
            $permissions = json_encode($request->permissions);
            Role::create([
                'role_name_ar' => $request->role_name_ar,
                'role_name_en' => $request->role_name_en,
                'permissions' => $permissions,
            ]);
            return $this->returnSuccessMessage(trans('general.add_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), 500);
        }//end catch
    }

    /////////////////////////////////////////////////
    /// edit
    public function edit($id = null)
    {
        $title = trans('roles.update_permission');
        if (!$id) {
            return redirect()->route('admin.not.found');
        }

        $role = Role::find($id);
        if (!$role) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.roles.update', compact('title', 'role'));
    }


    /////////////////////////////////////////////////
    /// update
    public function update(RoleRequest $request)
    {
        try {
            $role = Role::find($request->id);
            if (!$role) {
                return redirect()->route('admin.not.found');
            }
            $permissions = json_encode($request->permissions);
            $role->update([
                'role_name_ar' => $request->role_name_ar,
                'role_name_en' => $request->role_name_en,
                'permissions' => $permissions,
            ]);
            return $this->returnSuccessMessage(trans('general.update_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(trans('general.try_catch_error_message'), 500);
        }//end catch
    }


}
