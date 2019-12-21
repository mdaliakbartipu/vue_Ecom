<?php

namespace App\Http\Controllers;

use App\Attributes;
use Illuminate\Http\Request;

class FitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $fits = Attributes::where('fit', true)->get();
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
    
       Attributes::create([
        'name'        => $request->name,
        'fit'  => true
    ]);
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
        $fit = Attributes::findOrFail($id);
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
     
           $item = Attributes::find($id);
           $item->name = $request->name;
           $item->save(); 
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
