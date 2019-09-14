<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\UserDetail;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller 
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
                return redirect('/login')->with(['level' => 'danger', 'content' => "Warning: No match for E-Mail Address and/or Password."])
                                ->withErrors($validator)->withInput($request->all());
            }
            
    

            $userdata = array('email' => $email, 'password' => $password);

            if (Auth::attempt($userdata))
            {
                return redirect('/');
            } 
            else
            {
                return redirect('/login')->with(['level' => 'danger', 'content' => "Invalid username or password!!"]);
            }
        }
        return view('User.login');
    }

    public function SignUp(Request $request)
    {
        if($request->method() == 'POST') 
        {
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|min:6',
                    'confirm_password' => 'required|same:password',
        ]);
        if ($validator->passes())
        { 
            $record = new User();
            $record->fill($request->all());
            $record->password = Hash::make($request->get('password'));
            $record->save();

            $member = Role::where('name', '=', 'vendor')->first();
            $record->attachRole($member);


            return redirect('/')->with(['level' => 'success', 'content' => "Your account has been created successfully, please login with your email address."]);
        } 
        else 
        {
            return back()->withErrors($validator)->withInput($request->all());
        }
        }
        else
        {
            return view('User.signup');
        }
    }

    public function BuyerSignUp(Request $request)
    {
        if($request->method() == 'POST') 
        {
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'company_name' => 'required',
                    'account_type' => 'required',
                    'registration_number' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|min:6',
                    'confirm_password' => 'required|same:password',
        ]);
        if ($validator->passes())
        { 
            $record = new User();
            $record->name = $request->name;
            $record->email = $request->email;
            $record->password = Hash::make($request->get('password'));
            $record->remember_token = $this->_getForgotPasswordVerificationToken();
            $record->save();
            $this->sendEmail($record->email,$record);
            $member = Role::where('name', '=', 'buyer')->first();
            $record->attachRole($member);
            $user_detail = new UserDetail();
            $user_detail->user_id = $record->id;
            $user_detail->company_name = $request->company_name;
            $user_detail->account_type = $request->account_type;
            $user_detail->registration_number = $request->registration_number;
            $user_detail->save();


            return redirect('/')->with(['level' => 'success', 'content' => "Your account has been created successfully, please login with your email address."]);
        } 
        else 
        {
            return back()->withErrors($validator)->withInput($request->all());
        }
        }
        else
        {
            return view('User.buyer-signup');
        }
    }

    public function SellerSignUp(Request $request)
    {
        if($request->method() == 'POST') 
        {
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'company_name' => 'required',
                    'account_type' => 'required',
                    'registration_number' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|min:6',
                    'confirm_password' => 'required|same:password',
        ]);
        if ($validator->passes())
        { 
            $record = new User();
            $record->name = $request->name;
            $record->email = $request->email;
            $record->password = Hash::make($request->get('password'));
            $record->remember_token = $this->_getForgotPasswordVerificationToken();
            $record->save();
            $this->sendEmail($record->email,$record);

            $member = Role::where('name', '=', 'seller')->first();
            $record->attachRole($member);
            $user_detail = new UserDetail();
            $user_detail->user_id = $record->id;
            $user_detail->company_name = $request->company_name;
            $user_detail->account_type = $request->account_type;
            $user_detail->registration_number = $request->registration_number;
            $user_detail->save();


            return redirect('/')->with(['level' => 'success', 'content' => "Your account has been created successfully, please login with your email address."]);
        } 
        else 
        {
            return back()->withErrors($validator)->withInput($request->all());
        }
        }
        else
        {
            return view('User.seller-signup');
        }
    }

    /**
     * User Logout
     */
    public function VerifyEmail($token) 
    {
        $user = User::select('id')->where('remember_token', $token)->first();

                if (empty($user))
                {
                    return view('Error.error')->with(compact('response'));
                }
                
                $user->is_verified =1;
                $user->remember_token = "";
                $user->save();

                return redirect('/login')->with(['level' => 'success',
                            'content' => "Password updated, please login."]);
    }
    /**
     * User Logout
     */
    public function logout(Request $request) 
    {
        Auth::logout();
        return redirect('/');
    }


}
