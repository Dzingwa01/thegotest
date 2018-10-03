<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessType;
use App\Package;
use Illuminate\Http\Request;
use DB;
use Hash;
use Yajra\DataTables\Facades\DataTables;

class BussinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $types= BusinessType::all();
        return view('bussiness.bussiness_index',compact('types'));
    }

    public function getBusiness(){
        $businesses = Business::join('business_types','business_types.id','businesses.business_type_id')->select('businesses.*','business_types.business_type_name')->get();
//        dd($types);
        return Datatables::of($businesses)->addColumn('action', function ($business) {
            $re = 'business/' . $business->id;
            $sh = 'business/' . $business->id.'/edit';
            $del = 'business_delete/' . $business->id;
            return '<a class="btn btn-primary" href=' . $re . ' style="margin: 0.4em;"><i class="glyphicon glyphicon-eye-open"></i></a> <a class="btn btn-success" href=' . $sh . ' style="margin: 0.4em;"><i class="glyphicon glyphicon-edit"></i></a><a class="btn btn-danger" href=' . $del . ' style="margin: 0.4em;"><i class="glyphicon glyphicon-trash"></i></a>';
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
        DB::beginTransaction();
        try{
            $business = Business::create($request->all());
            DB::commit();
            return redirect('businesses')->with(['status'=>"Business ".$business->name. " saved successfully"]);
        }catch(\Exception $e){
            DB::rollback();
            return redirect('businesses')->with(['error'=>"Error saving package ".$business->name]);
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

    public function packagesContracts(){
        $packages = Package::all();
        return view('bussiness.packages_contracts',compact('packages'));
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
            $business = Business::where('id',$id)->first();
            $business->delete();
            DB::commit();
            return redirect('businesses')->with(['status'=>"Business ".$business->name. " deleted successfully"]);
        }catch(\Exception $e){
            DB::rollback();
            return redirect('businesses')->with(['error'=>"Error deleting business ".$business->name]);
        }
    }
}
