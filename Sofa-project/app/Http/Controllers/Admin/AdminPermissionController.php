<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPermission\StoreRequest;
use App\Http\Requests\Admin\AdminPermission\UpdateRequest;
use App\Models\AdminPermission;

class AdminPermissionController extends Controller
{
    public function index()
    {
        $adminPermissions = AdminPermission::orderBy('created_at', 'DESC')->get();
        return view('admin.modules.adminPermission.index', ['adminPermissions' => $adminPermissions]);
    }

    public function create()
    {
        return view('admin.modules.adminPermission.create');
    }

    public function store(StoreRequest $request)
    {
        $adminPermission = new AdminPermission();

        $adminPermission->name = $request->name;

        $adminPermission->save();

        return redirect()->route('admin.adminPermission.index')->with('success', 'Create admin permission successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $adminPermission = AdminPermission::find($id);
        if ($adminPermission == null) {
            abort(404);
        }
        return view('admin.modules.adminPermission.edit', [
            'id' => $id,
            'adminPermission' => $adminPermission
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $adminPermission = AdminPermission::find($id);
        if ($adminPermission == null) {
            abort(404);
        }

        $adminPermission->name = $request->name;

        $adminPermission->save();

        return redirect()->route('admin.adminPermission.index')->with('success', 'Update admin permission successfully');
    }

    public function destroy(string $id)
    {
        $adminPermission = AdminPermission::find($id);
        if ($adminPermission == null) {
            abort(404);
        }

        $adminPermission->delete();
        return redirect()->route('admin.adminPermission.index')->with('success', 'Deleted admin permission successfully');
    }
}
