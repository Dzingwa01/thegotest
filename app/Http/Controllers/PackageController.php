<?php

namespace App\Http\Controllers;

use App\Package;
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
        return view('packages.index');
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
            $del = 'packages_delete/' . $package->id;
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
            $package = Package::create($request->all());
            DB::commit();
            return redirect('packages')->with(['status'=>"Package ".$package->name. " saved successfully"]);
        }catch(\Exception $e){
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
        return view('packages.view',compact('package'));
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
        $package = Package::where('id',$id)->first();
        return view('packages.edit',compact('package'));
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
        DB::beginTransaction();
        try{
            $package->update($request->all());
            DB::commit();
            return redirect('packages')->with(['status'=>"Package ".$package->name. " updated successfully"]);
        }catch(\Exception $e){
            DB::rollback();
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
