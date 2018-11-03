<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Package;
use App\PackageFeature;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Hash;
use Yajra\DataTables\Facades\DataTables;

class PackageController extends Controller
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
//        dd($packageFeature);
        return view('packages.index',compact('packageFeature'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getPackages(){
        $packages = Package::all();
//        dd($types);
        return Datatables::of($packages)->addColumn('action', function ($package) {
            $re = 'packages/' . $package->id;
            $sh = 'packages/' . $package->id.'/edit';
            $del = 'packages/delete/' . $package->id;
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
       $features = array_keys($request->except(['package_name','duration','active','package_description','package_price','_token','q']));
        $input = $request->all();
        $input['active'] = $input['active']==1?true:false;
        DB::beginTransaction();
        try{
            $package = Package::create($input);
            foreach ($features as $feature)
            {
               $pack= Feature::create(['package_id'=>$package->id,'package_feature_id'=>$feature]);
            }
            DB::commit();
            return redirect('packages')->with(['status'=>"Package ".$package->name. " saved successfully"]);
        }catch(\Exception $e){
            throw $e;
            DB::rollback();
            return redirect('packages')->with(['error'=>"Error saving package ".$package->name]);
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
        $package = Package::where('id',$id)->first();
        $features = Feature::join('package_features','package_features.id','features.package_feature_id')
                    ->where('package_id',$package->id)
                    ->get();
        return view('packages.view',compact('package','features'));
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
        $packageFeature = PackageFeature::all();
        $package = Package::where('id',$id)->first();
        $features = Feature::where('package_id',$package->id)->get();

        return view('packages.edit',compact('package','packageFeature','features'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        //
        $feature_list = array_keys($request->except(['package_name','active','duration','package_description','package_price','_token','q']));
        $input = $request->all();
        $input['active'] = $input['active']==1?true:false;
        DB::beginTransaction();
        try{
            $package->update($input);
            $deleted_features = Feature::where('package_id',$package->id)->delete();
//            dd($deleted_features);
            foreach ($feature_list as $feature)
            {
                $pack= Feature::create(['package_id'=>$package->id,'package_feature_id'=>$feature]);
            }
            DB::commit();
            return redirect('packages')->with(['status'=>"Package ".$package->name. " updated successfully"]);
        }catch(\Exception $e){

            DB::rollback();
            throw ($e);
            return redirect('packages')->with(['error'=>"Error updating package ".$package->name]);
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
        DB::beginTransaction();
        try{
            $package = Package::where('id',$id)->first();
            $package->delete();
            DB::commit();
            return redirect('packages')->with(['status'=>"Package ".$package->name. " deleted successfully"]);
        }catch(\Exception $e){
            DB::rollback();
            return redirect('packages')->with(['error'=>"Error deleting package ".$package->name]);
        }
    }
}
