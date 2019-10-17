<?php

namespace App\Http\Controllers;

use App\Fit;
use Illuminate\Http\Request;

class fitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $fits = Fit::all();
        return view('fit.index',compact('fits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fit.create');
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
    
        $fit = new Fit();
        $fit->name = $request->name;
        $fit->save();
        return redirect()->route('fit.index')->with('successMsg','Fit Successfully Added');
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
        $fit = Fit::findOrFail($id);
        return view('fit.edit',compact('fit'));
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
     
         $fit = Fit::find($id); 
        $fit->name = $request->name;
        $fit->save();
        return redirect()->route('fit.index')->with('successMsg','Fit Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fit = Fit::find($id);
        $fit->delete();
         return redirect()->back()->with('successMsg','Fit Deleted successfully');
    }
}
