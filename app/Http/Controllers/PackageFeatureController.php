<?php

namespace App\Http\Controllers;

use App\PackageFeature;
use Illuminate\Http\Request;
use DB;
use Hash;
use Yajra\DataTables\Facades\DataTables;

class PackageFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $packageFeature = PackageFeature::all();
        return view('package-features.index',compact('packageFeature'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getPackageFeatures(){
        $packages = PackageFeature::all();
//        dd($types);
        return Datatables::of($packages)->addColumn('action', function ($package) {
            $re = 'package_features/' . $package->id;
            $sh = 'package_features/' . $package->id.'/edit';
            $del = 'package_features/delete/' . $package->id;
            return '<a class="btn btn-primary" href=' . $re . ' style="margin: 0.4em;"><i class="glyphicon glyphicon-eye-open"></i></a> <a class="btn btn-success" href=' . $sh . ' style="margin: 0.4em;"><i class="glyphicon glyphicon-edit"></i></a><a class="btn btn-danger" href=' . $del . ' style="margin: 0.4em;"><i class="glyphicon glyphicon-trash"></i></a>';
        })
            ->make(true);
    }

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
            $package = PackageFeature::create($request->all());
            DB::commit();
            return redirect('package_features')->with(['status'=>"Package Feature ".$package->feature_name. " saved successfully"]);
        }catch(\Exception $e){
            DB::rollback();
            return redirect('package_features')->with(['error'=>"Error saving package feature".$package->feature_name]);
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
        $package = PackageFeature::where('id',$id)->first();
        return view('package-features.view',compact('package'));
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
        $package = PackageFeature::where('id',$id)->first();
        return view('package-features.edit',compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageFeature $package)
    {
        //
        DB::beginTransaction();
        try{
            $package->update($request->all());
            DB::commit();
            return redirect('package_features')->with(['status'=>"Package Feature ".$package->feature_name. " updated successfully"]);
        }catch(\Exception $e){
            DB::rollback();
            return redirect('package_features')->with(['error'=>"Error updating package ".$package->feature_name]);
        }
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
//        dd($id);
        DB::beginTransaction();
        try{
            $package = PackageFeature::where('id',$id)->first();
            $package->delete();
            DB::commit();
            return redirect('package_features')->with(['status'=>"Package Feature ".$package->feature_name. " deleted successfully"]);
        }catch(\Exception $e){
            DB::rollback();
            return redirect('package_features')->with(['error'=>"Error deleting package feature ".$package->feature_name]);
        }
    }
}
