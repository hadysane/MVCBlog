<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Role_user; 



class AdminController extends Controller
{

    public function __construct() {
        
        $this->middleware(['auth', 'auth.admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = DB::table('users')->orderBy('id', 'desc')->offset(0)->limit(10)->get(); 
        
        $billets = DB::table('billets')
        ->join('users', 'billets.user_id', '=', 'users.id')
        ->select('billets.*', 'users.username')
        ->orderBy('id', 'desc')
        ->offset(0)
        ->limit(10)
        ->get(); 

        $comments= DB::table('comments')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->join('billets', 'comments.billet_id', '=', 'billets.id')
        ->select('comments.*', 'users.username', 'billets.title')
        ->orderBy('id', 'desc')
        ->offset(0)
        ->limit(10)
        ->get(); 
        return view('admin.index', compact('users', 'billets', 'comments'));
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */

    public function users()
    {
        $users = DB::table('users')
        ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
        ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('users.*', 'roles.name AS roleName')
        ->Paginate(10);

        $roles = DB::table('roles')->get(); 
        return view('admin.users', compact('users', 'roles'));
    }

    /**
     * Display a listing of the  billets.
     *
     * @return \Illuminate\Http\Response
     */
    public function billets()
    {
        $billets = DB::table('billets')
        ->join('users', 'billets.user_id', '=', 'users.id')
        ->select('billets.*', 'users.username')
        ->orderBy('id', 'asc')
        ->Paginate(10);

        return view('admin.billets', compact('billets'));
    }

    /**
     * Display a listing of the comments.
     *
     * @return \Illuminate\Http\Response
     */
    public function comments()
    {
        $comments = DB::table('comments')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->join('billets', 'comments.billet_id', '=', 'billets.id')
        ->select('comments.*', 'users.username', 'billets.title')
        ->orderBy('id', 'asc')
        ->Paginate(10);

        return view('admin.comments', compact('comments'));
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
        $validate = $request->validate([
            'role_id'=> 'required',
            'user_id'=> 'required',
            
        ]);

        Role_user::update([
            'role_id' => request('role_id'),
            'user_id' => $id 
        ]);

        return redirect('/admin/users')->with('success', 'role of user is successfully updated');
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
