<?php

namespace App\Http\Controllers;

use App\Attributes;
use Illuminate\Http\Request;

class LeglengthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leglengths = Attributes::where('leg_length', true)->get();
        return view('leglength.index',compact('leglengths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leglength.create');
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
    
        Attributes::create([
            'name'        => $request->name,
            'leg_length'  => true
        ]);
       return redirect()->route('leglength.index')->with('successMsg','Leg length Successfully Added');
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
        $leglength = Attributes::findOrFail($id);
        return view('leglength.edit',compact('leglength'));
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
        $item = Attributes::find($id);
        $item->name = $request->name;
        $item->save(); 


        return redirect()->route('leglength.index')->with('successMsg','Leglength Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back()->with('successMsg','Deleting is disabled'); 
        $leglength = Attributes::find($id);
         @$leglength->delete();

         return redirect()->back()->with('successMsg','Leg length Deleted successfully');
    }
}
