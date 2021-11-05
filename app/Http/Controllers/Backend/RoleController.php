<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('role-view')) {
            $roles = Role::all();
            return view('backend.roles.index', compact('roles'));
        } else {
            return redirect()->route('admin.401');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('role-create')) {
            $all_permissions = Permission::all();
            return view('backend.roles.create', compact('all_permissions'));
        } else {
            return redirect()->route('admin.401');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('role-create')) {
            $role = Role::create(['name'=> $request->name]);
            $permissions = $request->input('permissions');
            if (!empty($permissions)) {
                $role->syncPermissions($permissions);
            }
            Toastr::success('Role Created Successfully', 'Success');
            return redirect()->route('admin.role.index');
        } else {
            return redirect()->route('admin.401');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('role-create')) {
            $role = Role::findById($id);
            $all_permissions = Permission::all();
            return view('backend.roles.edit', compact('role', 'all_permissions'));
        } else {
            return redirect()->route('admin.401');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->can('role-update')) {
            $role = Role::findById($id);
            $permissions = $request->input('permissions');

            if (!empty($permissions)) {
                $role->name = $request->name;
                $role->save();
                $role->syncPermissions($permissions);
            }
            Toastr::info('Role Updated Successfully', 'Info');
            return redirect()->route('admin.role.index');
        } else {
            return redirect()->route('admin.401');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->can('role-delete')) {
            $role = Role::findById($id);
            $role->delete();
            Toastr::warning('Role Deleted Successfully', 'Danger');
            return back();
        } else {
            return redirect()->route('admin.401');
        }
    }
}
