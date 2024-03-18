<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('admin.modules.user.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.modules.user.create');
    }

    public function store(StoreRequest $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->status = $request->status;
        $user->level = $request->level;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Create user successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        return view('admin.modules.user.edit');
    }

    public function update(UpdateRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}