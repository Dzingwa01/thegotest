<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessPackage;
use App\BusinessTemplate;
use App\BusinessType;
use App\Jobs\ProcessSignup;
use App\Package;
use Illuminate\Http\Request;
use DB;
use Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

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

    public function getBizTemplate($id){
        $template = BusinessTemplate::where('business_id',$id)->first();
        return response()->json(['template'=>$template]);
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

    public function packagesContracts(Request $request){
        DB::beginTransaction();
        try{
            $user = Auth::user();
            $business = Business::where('contact_person_id', Auth::user()->id)->first();
            $template = BusinessTemplate::where('business_id',$business->id)->first();
            if(is_null($template)){
                $input = $request->all();
                if(array_key_exists("logo",$input)){
                    $file = $input['logo'];
                    $ext  = $file->getClientOriginalExtension();
                    $filename = md5(str_random(5)).'.'.$ext;
                    $name = 'logo_url';
                    if($file->move('business_images/',$filename)){
                        $this->arr[$name] = 'business_images/'.$filename;
                    }
                    $input['logo_url'] = $this->arr[$name];
                }
                if(array_key_exists("banner",$input)){
                    $file = $input['banner'];
                    $ext  = $file->getClientOriginalExtension();
                    $banner_name = md5(str_random(5)).'.'.$ext;
                    $name = 'banner_url';
                    if($file->move('business_images/',$banner_name)){
                        $this->arr[$name] = 'business_images/'.$banner_name;
                    }
                    $input['banner_url'] = $this->arr[$name];
                }
                $businessTemplate = BusinessTemplate::create($input);
                DB::commit();
                event($user,$business);
                dispatch(new ProcessSignup($user,$business));
                return response()->json(["businessTemplate"=>$businessTemplate]);
            }else{
                $input = $request->all();
                if(array_key_exists("logo",$input)){
                    $file = $input['logo'];
                    $ext  = $file->getClientOriginalExtension();
                    $filename = md5(str_random(5)).'.'.$ext;
                    $name = 'logo_url';
                    if($file->move('business_images/',$filename)){
                        $this->arr[$name] = 'business_images/'.$filename;
                    }
                    $input['logo_url'] = $this->arr[$name];
                }
                if(array_key_exists("banner",$input)){
                    $file = $input['banner'];
                    $ext  = $file->getClientOriginalExtension();
                    $banner_name = md5(str_random(5)).'.'.$ext;
                    $name = 'banner_url';
                    if($file->move('business_images/',$banner_name)){
                        $this->arr[$name] = 'business_images/'.$banner_name;
                    }
                    $input['banner_url'] = $this->arr[$name];
                }
                $template->update($input);
                DB::commit();
//                event($user,$business);
//                dispatch(new ProcessSignup($user,$business));
                return response()->json(["businessTemplate"=>$template]);
            }
        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

    public function showBizPortal(){
        $business = Business::where('contact_person_id', Auth::user()->id)->first();
        $template = BusinessTemplate::where('business_id',$business->id)->first();
        return view('business-portal.portal',compact('business','template'));
    }


    public function saveBizPackage($package){

        DB::beginTransaction();
        try{
            $user = Auth::user();
            $business = Business::where('contact_person_id', $user->id)->first();
            $businessPackage = BusinessPackage::create(['package_id'=>(int)$package,"business_id"=> $business->id]);
            DB::commit();
//            event($user,$business);
//            dispatch(new ProcessSignup($user,$business));
            return response()->json(['business_package'=>$businessPackage]);

        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function navigateToPackages(){
        $packages = Package::all();
        $business = Business::where('contact_person_id', Auth::user()->id)->first();
        $template = BusinessTemplate::where('business_id',$business->id)->first();
        return view('bussiness.packages_contracts',compact('packages','template'));
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
