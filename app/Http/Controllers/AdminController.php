<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\UserDetail;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller 
{

    public function login(Request $request) 
    {
        if($request->method() == 'POST') 
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required ',
        ]);
            if (!$validator->passes()) 
            {
                return back()->withErrors($validator)->withInput($request->all());
            }
            $email = $request->email;
            $password = $request->password;

            $user = User::where('email', '=', $email)->first();
            if (!$user)
            {
                return  back()->with(['level' => 'danger', 'content' => "Warning: No match for E-Mail Address and/or Password."])
                                ->withErrors($validator)->withInput($request->all());
            }
            
    

            $userdata = array('email' => $email, 'password' => $password);

            if (Auth::attempt($userdata))
            {
                return redirect('/admin');
            } 
            else
            {
                return  back()->with(['level' => 'danger', 'content' => "Invalid username or password!!"]);
            }
        }
        return view('Admin.login');
    }


    /**
     * Admin Index
     */
    public function index(Request $request) 
    {
        $records = User::with(['UserDetail'])->where('id','!=',Auth::user()->id)->get();
        // dd($records);
        return view('Admin.index')->with(compact('records'));
    }

    /**
     * Admin Logout
     */
    public function logout(Request $request) 
    {
        Auth::logout();
        return redirect('/');
    }


}
