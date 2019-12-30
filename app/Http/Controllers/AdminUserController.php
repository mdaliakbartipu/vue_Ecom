<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserProfile;


class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role',1)->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users',
            'password'              => 'required|confirmed|string|min:6',
            'password_confirmation' => 'min:6',
            'role'                  => 'required',
            'active'                => 'required'

       ]);

        //Checking if a normal user is creating an Admin account    
        $loggedUser = \Auth::user()->role;
        if($request->role == 1):
         if($loggedUser!=1):
             return redirect()->back()->with('error', 'Your do not have permisson to Create this type user');
         endif;
        endif;

       $create = User::create($request->all());
       if($create):
            if($create->role==1):
                return redirect(route('admin-user.index'))->with('successMsg','User Added Successfully');         
            else:
                return redirect(route('user.index'))->with('successMsg','User Added Successfully');         
            endif;
        endif;
       return redirect()->back()-with("error", 'Something went wrong.User could not be saved');
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
    public function edit($id=null)
    {
        if($id){
            $id = (int)$id;
            $user = User::find($id);
            return view('user.edit',compact('user'));
        } else{
            return view('user.index')->with('error','User not found to edit');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id =null)
    {
        if($id):
            // validate request
            $request->validate([
                'name'      => 'required',
                'email'     => 'email|required',
                'active'    => 'required',
                'role'      => 'required'
            ]);

            $user = User::find((int)$id);
            $user->name     = $request->name;

            if( $user->email   != $request->email):
                $oldUser = User::where('email',$request->email)->first();
                if($oldUser):
                    return redirect()->route('admin-user.edit', $user->id)->with('error',"Email is associated with another account.Try different email.");    
                endif;
            endif;

            $user->email   = $request->email;
            $user->active   = $request->active;
            $user->role     = $request->role;
            $user->save();
            if($user->role==1):
                return redirect()->route('admin-user.index', $user->id)->with('success',"User information is saved");
            else:
                return redirect()->route('user.index', $user->id)->with('success',"User information is saved");
            endif;
            
        endif;

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = null)
    {

        // Normal and Admin user deletion should be passed to this for adding future security
        $loggedUser = \Auth::user()->role;

        if($loggedUser!=1):
            return redirect()->back()->with('error', 'Your do not have permisson to delete this user');
        endif;

        if($id):
            $user = User::find((int)$id);
            if($user):
                if($user->role==1):
                    $user->delete();
                    return redirect('admin-user')->with('success','Success!'.$user->name.' deleted from admin list');
                else:
                    $user->delete();
                    return redirect('user')->with('success','Success!'.$user->name.' deleted from user list');
                endif;
            else:
                return redirect()->back()->with('error', 'User not found so that i could not delete it');
            endif;
        endif;
    }

    public function blocked()
    {
        $users = User::where(['role'=>1,'active'=> 0])->get();
        return view('user.index', compact('users'));
    }

    public function all()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
}
