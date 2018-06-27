<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use DB;
use Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function getIndex()
    {

        return view('users.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showUsers()
    {
        $users = User::join('role_user','role_user.user_id','users.id')
            ->join('roles','roles.id','role_user.role_id')
            ->select(['users.id', 'users.name', 'users.email', 'surname','contact_number' ,'users.created_at', 'users.updated_at','display_name']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                $re='users/'.$user->id;
                $sh='users/show/'.$user->id;
                $del='users/delete/'.$user->id;
                return '<a href='.$sh.'><i class="glyphicon glyphicon-eye-open"></i></a> <a href='.$re.'><i class="glyphicon glyphicon-edit"></i></a> <a href='.$del.'><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->make(true);
    }

    public function editUser($id){
        $user=User::find($id);
        $users_roles=DB::table('roles')->get();
        $role=DB::table('role_user')->where('user_id',$id)->first();
        return view('users.edit')->with('user',$user)->with('users_roles',$users_roles)->with('role',$role);
    }
    public function update(Request $request,$id)
    {
        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        DB::table('role_user')->where('user_id',$id)->delete();

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
        return view('users.show',compact('user'));
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
         $roles = Role::pluck('id','display_name');
         return view('users.create',compact('roles'));
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