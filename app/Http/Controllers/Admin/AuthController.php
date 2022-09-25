<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function index()
    {
      return view('admin.auth.change-password');
    }
    public function edit(Request $request)
    {
        dd('change password');
    }
    public function store(Request $request)
    {
        $old = Input::get('old');
        $new = Input::get('new');
        $confirm=Input::get('confirm');
        $user = User::find(Auth::id());
        if (!Hash::check($old, $user->password)) {
            //return response()->json(['errors' => ['current'=> ['Current password does not match']]], 422);
            Session::flash('message', 'Your currenrt password is incorrect !');
            Session::flash('alert-class', 'alert-danger');
//            return view('auth.change-password');
            return redirect()->route('admin.change-password.index');
        }
        else if($new!=$confirm)
        {
            Session::flash('message', 'Your new password & confirm password mismatched');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('admin.change-password.index');

        }
        else
        {

        $user->password = Hash::make($new);
        $user->save();
        Session::flash('message', 'Your have successfully changeed your password');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('admin.change-password.index');


        }


    }

}
