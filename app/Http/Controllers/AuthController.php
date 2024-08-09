<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | public Function / Admin Login
      |--------------------------------------------------------------------------
     */

     public function AdminLogin(Request $request) {
        try {

            $validation_array = [
                'email' => 'required|max:35',
                'password' => 'required|max:20',
            ];

            $validator = Validator::make($request->all(), $validation_array);

            if ($validator->fails()) {
                return redirect()->back()->with('error', implode(" / ", $validator->messages()->all()));
            }

            $user = User::where('email', $request->email)->where('status', 'admin')->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                //Invalid login username or password!
                return redirect()->back()->with('error', 'Invalid login Email or Password!');
            } else {
                //username & password matches
                $request->session()->put('key', $user->id);
                return redirect('/admin/items')->with('success', 'login Successfully!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'something went wrong');
        }
        
    }

    /*
      |--------------------------------------------------------------------------
      | public Function / Admin Logout
      |--------------------------------------------------------------------------
     */

     public function adminlogout() {
        Session::flush();
        auth()->guard('web')->logout();
        return redirect('/admin-login');
    }

}
