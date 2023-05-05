<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('pages.admin.customers', [
            'users' => $users
        ]);
    }

    public function changeType(Request $request,$id){
        $request->validate([
           'type' => 'required|in:user,admin'
        ]);
         $user = User::findOrFail($id);
        $user->update($request->only('type'));

        $request->session()->put('message', 'تم تغير نوع المستخدم بنجاح');
        return back()->with('result', "success");

    }
}
