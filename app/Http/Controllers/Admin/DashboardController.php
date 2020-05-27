<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registerd()
    {

        $users = User::All();
        return view('admin.register')->with('users', $users);
    }

    public function edit(Request $request, $id)
    {

        $users = User::findOrFail($id);
        return view('admin.edit')->with('users', $users);
    }

    public function update(Request $request, $id)
    {

        $users = User::find($id);
        $users->name = $request->input('username');
        $users->user_type = $request->input('user_type');
        $users->update();

        return redirect('/role-register')->with('status', 'Your Date is updated');
    }

    public function delete($id){

        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/role-register')->with('status','Your Date is deleted');
    }
}
