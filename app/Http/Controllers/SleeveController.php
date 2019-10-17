<?php

namespace App\Http\Controllers;

use App\Sleeve;
use Illuminate\Http\Request;

class SleeveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sleeves = Sleeve::all();
        return view('sleeve.index',compact('sleeves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sleeve.create');
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
           'name'     => 'required',
          
       ]);
    
        $sleeve = new Sleeve();
        $sleeve->name = $request->name;
        $sleeve->save();
        return redirect()->route('sleeve.index')->with('successMsg','Sleeve Successfully Added');
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
        $sleeve = Sleeve::findOrFail($id);
        return view('sleeve.edit',compact('sleeve'));
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
           'name'     => 'required',
           ]);
     
         $sleeve = Sleeve::find($id); 
        $sleeve->name = $request->name;
        $sleeve->save();
        return redirect()->route('sleeve.index')->with('successMsg','Sleeve Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sleeve = Sleeve::find($id);
        $sleeve->delete();
         return redirect()->back()->with('successMsg','Sleeve Deleted successfully');
    }
}
