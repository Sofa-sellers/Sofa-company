<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Role\StoreRequest;
use App\Http\Requests\Admin\Role\UpdateRequest;
use App\Models\AdminPermission;

class RoleController extends Controller
{
    public function index()
    {
        $adminPermissions = AdminPermission::all();
        return view('admin.modules.adminPermission.index', compact('adminPermission'));
    }

    public function create()
    {
        return view('admin.modules.adminPermission.create');
    }

    public function store(StoreRequest $request)
    {
        $adminPermission = new AdminPermission;
        $adminPermission->name = $request->name;
        $adminPermission->save();

        return redirect()->route('admin.adminPermission.index')->with('success', 'create admin permission successfully');
    }

    public function edit($id)
    {
        $adminPermission = AdminPermission::findOrFail($id);
        return view('admin.modules.adminPermission.edit', compact('adminPermission'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $adminPermission = AdminPermission::findOrFail($id);
        $adminPermission->name = $request->name;
        $adminPermission->save();

        return redirect()->route('admin.adminPermission.index')->with('success', 'update admin permission successfully');
    }

    public function destroy($id)
    {
        $adminPermission = AdminPermission::findOrFail($id);
        $adminPermission->delete();

        return redirect()->route('admin.adminPermission.index')->with('success', 'deleted admin permission successfully');
    }
}
