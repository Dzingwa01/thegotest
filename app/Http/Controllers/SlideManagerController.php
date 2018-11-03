<?php

namespace App\Http\Controllers;

use App\Business;
use App\Slide;
use Illuminate\Http\Request;
use DB;
use Hash;
use Yajra\DataTables\Facades\DataTables;

class SlideManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $businesses = Business::all();
        return view('slide-manager.index',compact('businesses'));
    }

    public function getSlides(){
        $slides = Slide::all();
        return Datatables::of($slides)->addColumn('action', function ($slide) {
            $re = 'slides/' . $slide->id;
            $sh = 'slides/' . $slide->id.'/edit';
            $del = 'slides/delete/' . $slide->id;
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
        $input = $request->all();
        $businesses = array_keys($request->except(['name','description','duration','active','_token','q']));
        DB::beginTransaction();
        try{
            $slide = Slide::create(['name'=>$input['name'],'description'=>$input['description'],'duration'=>$input['duration'],'active'=>$input['active']==1?true:false]);
            $slide->businesses()->attach($businesses);
            DB::commit();
            return redirect('slides')->with(['status'=>"Slide ".$slide->name. " saved successfully"]);
        }catch(\Exception $e){
            throw $e;
            DB::rollback();
            return redirect('slides')->with(['error'=>"Error saving slide ".$slide->name]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
//        dd($slide->businesses);
        return view('slide-manager.view',compact(['slide']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        $businesses = Business::all();
        return view('slide-manager.edit',compact('slide','businesses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        //
        $input = $request->all();
        $businesses = array_keys($request->except(['name','description','duration','active','_token','q']));
        DB::beginTransaction();
        try{
            $slide->update(['name'=>$input['name'],'description'=>$input['description'],'duration'=>$input['duration'],'active'=>$input['active']==1?true:false]);
            $slide->businesses()->sync($businesses);
            DB::commit();
            return redirect('slides')->with(['status'=>"Slide ".$slide->name. " updated successfully"]);
        }catch(\Exception $e){
            throw $e;
            DB::rollback();
            return redirect('slides')->with(['error'=>"Error updating slide ".$slide->name]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
//        dd($slide);
        DB::beginTransaction();
        try{
            $slide->businesses()->detach();
            $slide->delete();
            DB::commit();
            return redirect('slides')->with(['status'=>"Slide ".$slide->name. " deleted successfully"]);
        }catch(\Exception $e){
            DB::rollback();
            return redirect('slides')->with(['error'=>"Error deleting slide ".$slide->name]);
        }
    }
}
