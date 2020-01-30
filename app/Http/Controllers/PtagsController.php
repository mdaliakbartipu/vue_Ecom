<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ptag;

class PtagsController extends Controller
{

    protected $type = "product";
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ptag.index', [
            'ptags' => Ptag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ptag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);

        $request->request->add(['type' => $this->type]);

        Ptag::create($request->all());
        
        return redirect()->route('ptags.index')->with('success','Done!');
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
    public function edit(Ptag $ptag)
    {
        return view('ptag.edit', [
            'ptag' => $ptag
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ptag $ptag)
    {
        $request->validate(['name'=>'required']);
        $request->request->add(['type' => $this->type]);
        $ptag->update($request->all());

        return redirect()->route('ptags.index')->with('success','Product tag updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ptag $ptag)
    {
        $ptag? $ptag->delete() : '';
        
        return redirect()->route('ptags.index')->with('success','Product tag deleted!');

    }
}
