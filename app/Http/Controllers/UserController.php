<?php

namespace App\Http\Controllers;


use App\Models\User;
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
         $users = User::all();
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6'

       ]);
    
         $request['password'] = bcrypt($request->password);
         $user = User::create($request->all());
       
        return redirect(route('user.index'))->with('successMsg','User Added Successfully');
      
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
        $user = User::find($id)->delete();
        return redirect(route('user.index'))->with('successMsg','User Deleted Successfully');
    }

    // Front user dashboard

    public function saveUserInfo(Request $request)
    {
        // dd($request->all());
        // validation


        $userID = \Auth::user()->id;
        $profile = UserProfile::find($userID);
        if($profile){
            $profile->first_name = $request->first_name;
            $profile->last_name = $request->last_name;
            $profile->email = $request->email;
            $profile->phone = $request->phone;
            // $profile->dob = $request->dob;
            $profile->gender = $request->id_gender;
            $profile->save();
            return redirect('/dashboard')->with('success', 'Profile updated');
        } else{
            $profile  = new UserProfile;
            $profile->user_id = $userID;
            $profile->first_name = $request->first_name;
            $profile->last_name = $request->last_name;
            $profile->email = $request->email;
            $profile->phone = $request->phone;
            // $profile->dob = $request->dob;
            $profile->gender = $request->id_gender;
            $profile->save();
            return redirect('/dashboard')->with('success', 'New Profile Created');
        }

        return redirect('/dashboard')->with('error', 'Profile Not Updated');
        
    }
}
