<?php

namespace App\Http\Controllers;


use App\User;
use App\UserProfile;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = User::where('role', '!=', 1)->get();

        return view('user.index',compact('users'));
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

        //Checking if a !admin user is creating an Admin account    
       $loggedUser = \Auth::user()->role;
       if($request->role == 1):
        if($loggedUser!=1):
            return redirect()->back()->with('error', 'Your do not have permisson to Create this type user');
        endif;
       endif;

       $data = $request->all();
    //    dd($data);
       $data->password = bcrypt($data->password);
       $create = User::create($data);

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
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit',compact('user'));
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
         $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255'
            
           
        ]);
       
         $user = User::where('id',$id)->update($request->except('_token','_method'));
       
        return redirect(route('user.index'))->with('successMsg','User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $loggedUser = \Auth::user()->role;
        $user = User::find($id);


        if($loggedUser!=1):
            if($user->role==1):
                return redirect()->back()->with('error', 'Your do not have permisson to delete this user');
            endif;
        endif;

        $user->delete();
        
        return redirect(route('user.index'))->with('successMsg','User Deleted Successfully');
    }

    // Front user dashboard

    public function saveUserInfo(Request $request)
    {
        // validation


        $userID = \Auth::user()->id;

        $profile = UserProfile::where('user_id',$userID)->first();
        $user = User::find($userID);
        $name =  preg_split('/\s+/', $request->name??"No Name");

        if($profile){
            if($user){
                $user->name = $request->name??'No';
                $user->save();
            }
            $profile->update($request->all());
            return redirect('/dashboard')->with('success', 'Profile updated');
        } else{
            if($user){
                $user->name = $request->name??'No';
                if($request->email){
                    $user->email = $request->email??'No';
                }
                $user->save();
            }

            $profile  = new UserProfile;
            $profile->user_id   = \Auth::user()->id;
            $profile->save();
            $profile->update($request->all());

            return redirect('/dashboard')->with('success', 'New Profile Created');
        }

        return redirect('/dashboard')->with('error', 'Profile Not Updated');
        
    }

    public function blocked()
    {
        $users = User::where('role','!=',1)
                        ->where('active', 0)->get();
        return view('user.index', compact('users'));
    }
}
