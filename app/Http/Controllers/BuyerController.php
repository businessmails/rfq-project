<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\UserDetail;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller 
{


    public function CreateRfq(Request $request)
    {
        $user_detail = User::with(['UserDetail'])->where('id',Auth::user()->id)->first();
        if($request->method() == 'POST') 
        {
        $validator = Validator::make($request->all(), [
                    'phone_number' => 'required|min:10',
                    'rfq_for' => 'required',
                    'state' => 'required',
                    'project_ref' => 'required',
                    'currency' => 'required',
                    'fob_point' => 'required',
                    'freight_quote' => 'required',
                    'publish_date' => 'required',
                    'closing_date' => 'required',
                    'item[]' => 'required',
                    'stock[]' => 'required',
                    'location[]' => 'required',
                    'item_name[]' => 'required',
                    'item_description[]' => 'required',
                    'part_no[]' => 'required',
                    'qty_required[]' => 'required',
                    'unit[]' => 'required',
                    'vendor_remarks' => 'required',
                    'terms' => 'required',
                    'vendor_email' => 'required|email',
                    'is_public' => 'required',
                    'approving_authority' => 'required',
                    'rfq_criteria' => 'required',
                    'scoring_mathalogy' => 'required',
        ]);
        if ($validator->passes())
        { 
            $record = new User();
            $record->name = $request->name;
            $record->email = $request->email;
            $record->password = Hash::make($request->get('password'));
            $record->save();

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
            return view('Buyer.create-rfq')->with(compact('user_detail'));;
        }
    }

}
