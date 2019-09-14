<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\UserDetail;
use App\Rfq;
use App\RfqDetail;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller 
{


    public function CreateRfq(Request $request)
    {
        $user = User::with(['UserDetail'])->where('id',Auth::user()->id)->first();
        $user_detail=   UserDetail::where('user_id',Auth::user()->id)->first();
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
            $user_detail->phone_number=$request->phone_number;
            $user_detail->save();
            $record = new Rfq();
            $record->rfq_for = $request->rfq_for;
            $record->state = $request->state;
            $record->fob_point = $request->fob_point;
            $record->freight_quote = $request->freight_quote;
            $record->publish_date = $request->publish_date;
            $record->closing_date = $request->closing_date;
            $record->vendor_remarks = $request->vendor_remarks;
            $record->terms = $request->terms;
            $record->terms = $request->terms;
            $record->vendor_email = $request->vendor_email;
            $record->is_public = $request->is_public;
            $record->approving_authority = $request->approving_authority;
            $record->approving_authority = $request->approving_authority;
            $record->rfq_criteria = $request->rfq_criteria;
            $record->scoring_mathalogy = $request->scoring_mathalogy;
            $record->scoring_mathalogy = $request->scoring_mathalogy;
            $record->save();

            foreach($item as $key =>$value){
                $rfq_detail = new RfqDetail();
                $rfq_detail->rfq_id = $record->id;
                $rfq_detail->item_name = $request->item_name[$key];
                $rfq_detail->location = $request->location[$key];
                $rfq_detail->item_description = $request->item_description[$key];
                $rfq_detail->part_no = $request->part_no[$key];
                $rfq_detail->qty_required	 = $request->qty_required[$key]	;
                $rfq_detail->unit	 = $request->unit[$key]	;
                $rfq_detail->save();
            }
          


            return redirect('/')->with(['level' => 'success', 'content' => "Your account has been created successfully, please login with your email address."]);
        } 
        else 
        {
            return back()->withErrors($validator)->withInput($request->all());
        }
        }
        else
        {
            return view('Buyer.create-rfq')->with(compact('user'));;
        }
    }

}
