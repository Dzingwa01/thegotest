<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessTemplate;
use App\BusinessType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use DB;
use Hash;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use LasseRafn\Initials\Initials;

class UserController extends Controller
{
    public function getIndex()
    {

        return view('users.index');
    }

    public function getAvatar(){
        $avatar = new LasseRafn\InitialAvatarGenerator\InitialAvatar();
        return $avatar->name('Lasse Rafn')
            ->length(2)
            ->fontSize(0.5)
            ->size(96) // 48 * 2
            ->background('#8BC34A')
            ->color('#fff')
            ->generate()
            ->stream('png', 100);
    }

    public function bussinessTypesIndex()
    {
        return view('bussiness.business_types');
    }

    public function templateSelection(Request $request)
    {
        DB::beginTransaction();
        try {
            $business = Business::where('contact_person_id', Auth::user()->id)->first();
            if (is_null($business)) {
                $business = Business::create($request->all());
            }else{
                $business->update($request->all());
            }
            DB::commit();
            return view('bussiness.template_selection', compact('business'));

        } catch (\Exception $e) {
            dd($e);
        }
    }
    public function templateSelectionBiz(Request $request)
    {
        DB::beginTransaction();
        try {
            $business = Business::where('contact_person_id', Auth::user()->id)->first();
            if (is_null($business)) {
                $business = Business::create($request->all());
            }else{
                $business->update($request->all());
            }

            DB::commit();
            $template = null;
            return view('admin-businesses.template_selection', compact('business','template'));

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function templatePreview(Request $request)
    {
        $business = Business::where('contact_person_id', Auth::user()->id)->first();
        return view('bussiness.template_preview',compact('business'));
    }
    public function templatePreviewBiz()
    {
        $business = Business::where('contact_person_id', Auth::user()->id)->first();
        $template = BusinessTemplate::where('business_id',$business->id)->first();
        return view('admin-businesses.template_preview',compact('business','template'));
    }
    function showBusinessTypes()
    {

        $types = BusinessType::all();
//        dd($types);
        return Datatables::of($types)->addColumn('action', function ($type) {
            $re = 'biz_type/' . $type->id;
            $sh = 'biz_type/show/' . $type->id;
            $del = 'biz_type/delete/' . $type->id;
            return '<a class="btn btn-primary" href=' . $sh . ' style="margin: 0.4em;"><i class="glyphicon glyphicon-eye-open"></i></a> <a class="btn btn-success" href=' . $re . ' style="margin: 0.4em;"><i class="glyphicon glyphicon-edit"></i></a><a class="btn btn-danger" href=' . $del . ' style="margin: 0.4em;"><i class="glyphicon glyphicon-trash"></i></a>';
        })
            ->make(true);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showUsers()
    {
        $users = User::join('role_user', 'role_user.user_id', 'users.id')
            ->join('roles', 'roles.id', 'role_user.role_id')
            ->select(['users.id', 'users.name', 'users.email', 'surname', 'contact_number', 'users.created_at', 'users.updated_at', 'display_name']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                $re = 'users/' . $user->id;
                $sh = 'users/show/' . $user->id;
                $del = 'users/delete/' . $user->id;
                return '<a class="btn btn-primary" href=' . $sh . ' style="margin:0.4em;"><i class="glyphicon glyphicon-eye-open"></i></a> <a class="btn btn-success" style="margin:0.4em;" href=' . $re . '><i class="glyphicon glyphicon-edit"></i></a> <a class="btn btn-danger" style="margin:0.4em;" href=' . $del . '><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->make(true);
    }

    public function addBussinessType(Request $request)
    {
//        dd(BusinessType::all());
//        dd($request->all());
        DB::beginTransaction();
        try {
            $type = BusinessType::create($request->all());
            DB::commit();
            return redirect('biz_types_index')->with(['status' => "Business type " . $type->name . " saved successfully"]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('biz_types_index')->with(['error' => "An error occured please contact admin."]);
        }
    }

    public function editBussinessType(BusinessType $type)
    {
        return view('bussiness.edit_business', compact('type'));
    }

    public function showBussinessType(BusinessType $type)
    {
        return view('bussiness.type_details', compact('type'));
    }

    public function updateBussinessType(Request $request, BusinessType $type)
    {
        DB::beginTransaction();
        try {
            $type->update($request->all());
            DB::commit();
            return redirect('biz_types_index')->with(['status' => "Business type " . $type->name . " updated successfully"]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('biz_types_index')->with(['error' => "Business type " . $type->name . " could not be updated. Please contact Admin."]);
        }
    }

    function destroyBussinessType(BusinessType $type)
    {
//        dd($type);
        $temp_var = $type;
        DB::beginTransaction();
        try {
            $type->delete();
            DB::commit();
            return redirect('biz_types_index')->with(['status' => "Business type " . $temp_var->business_type_name . " deleted successfully"]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('biz_types_index')->with(['error' => "Business type " . $temp_var->business_type_name . " could not be deleted. Contact admin"]);
        }

    }

    public function editUser($id)
    {
        $user = User::find($id);
        $users_roles = DB::table('roles')->get();
        $role = DB::table('role_user')->where('user_id', $id)->first();
        return view('users.edit')->with('user', $user)->with('users_roles', $users_roles)->with('role', $role);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        DB::table('role_user')->where('user_id', $id)->delete();

        $user->roles()->attach($input['user_role']);
        return redirect()->route('users');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index(Request $request)
    // {
    //     $data = User::orderBy('id','DESC')->paginate(5);
    //     return view('users.index',compact('data'))
    //         ->with('i', ($request->input('page', 1) - 1) * 5);
    // }
    //
    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        $roles = Role::pluck('id', 'display_name');
        return view('users.create', compact('roles'));
    }
    //
    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|same:confirm-password',
    //         'roles' => 'required'
    //     ]);
    //
    //     $input = $request->all();
    //     $input['password'] = Hash::make($input['password']);
    //
    //     $user = User::create($input);
    //     foreach ($request->input('roles') as $key => $value) {
    //         $user->attachRole($value);
    //     }
    //
    //     return redirect()->route('users.index')
    //                     ->with('success','User created successfully');
    // }
    //
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */

    //
    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $user = User::find($id);
    //     $roles = Role::lists('display_name','id');
    //     $userRole = $user->roles->lists('id','id')->toArray();
    //
    //     return view('users.edit',compact('user','roles','userRole'));
    // }
    //
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */

    //
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */

}
