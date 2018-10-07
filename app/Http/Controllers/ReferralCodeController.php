<?php

namespace App\Http\Controllers;

use App\Business;
use App\Jobs\SendReferralCode;
use App\ReferralCode;
use App\User;
use Illuminate\Http\Request;
use DB;
use Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class ReferralCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $code = ReferralCode::all();
        return view('referral-codes.index',compact('code'));
    }

    public function getReferralCodes(){
        $codes = ReferralCode::all();
        return Datatables::of($codes)->addColumn('action', function ($code) {
//            $re = 'referral_codes/' . $code->id;
            $del = 'referral_codes/delete/' . $code->id;
            return '<a class="btn btn-danger" href=' . $del . ' style="margin: 0.4em;"><i class="glyphicon glyphicon-trash"></i></a>';
        })
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        DB::beginTransaction();
        try{
            $existing = ReferralCode::where('email_address',$input['email_address'])->first();
//            dd($existing);
            if(is_null($existing)){
                $code = ReferralCode::create($request->all());
                DB::commit();
                $user = User::where('email',$code->email_address)->first();
                event($user,$code);
                dispatch(new SendReferralCode($user,$code));
                return redirect('referral_codes')->with(['status'=>"Referral Code for ".$code->email_address. " saved successfully"]);
            }else{
                return redirect('referral_codes')->with(['error'=>"There is an existing Referral Code for ".$existing->email_address.", Please resend the existing one"]);
            }

        }catch(\Exception $e){
            throw $e;
            DB::rollback();
            return redirect('referral_codes')->with(['error'=>"Error saving package feature".$code->email_address. ". ".$e->getMessage()]);
        }
    }

    public function verifyCode($code){
        $user = Auth::user();
        $business = Business::where('contact_person_id',$user->id)->first();

        $referral_code = ReferralCode::where('email_address',$user->email)->first();
        if(is_null($referral_code)){
            $referral_code_2 = ReferralCode::where('email_address',$business->business_email)->first();
            $referral_code = $referral_code_2;
        }
        if(is_null($referral_code)){
            return response()->json(["status"=>0,"message"=>"Your account does not have any referral code3232, please contact sales."]);
        }else{
            if($referral_code->generated_code==$code){
                return response()->json(["status"=>1,"message"=>"Referral Code is valid, proceed to click finish."]);
            }else{
                return response()->json(["status"=>0,"message"=>"No match found, please contact sales for assistance."]);
            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::beginTransaction();
        try{
            $code = ReferralCode::where('id',$id)->first();
            $code->delete();
            DB::commit();
            return redirect('referral_codes')->with(['status'=>"Referral code for ".$code->email_address. " deleted successfully"]);
        }catch(\Exception $e){
            DB::rollback();
            return redirect('referral_codes')->with(['error'=>"Error deleting package feature ".$code->email_address]);
        }
    }
}
