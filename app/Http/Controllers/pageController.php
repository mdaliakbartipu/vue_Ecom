<?php

namespace App\Http\Controllers;

use App\page;

use Carbon\Carbon;
use Illuminate\Http\Request;

class pageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = page::all();
        return view('page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('page.create');
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
           'pageSlug'     => 'required',
           'pageName'      =>  'required'
       ]);
    
        $page = new page();
        $page->pageslug = $request->pageSlug;
        $page->pageName = $request->pageName;
       
        $page->save();
        return redirect()->route('page.index')->with('successMsg','Page Successfully Added');
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
        $page = page::findOrFail($id);
        return view('page.edit',compact('page'));
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
           'pageSlug'     => 'required',
           'pageName'      =>  'required'
        ]);
     
         $page = page::find($id); 
         $page->pageSlug = $request->pageSlug;
         $page->pageName = $request->pageName;
       
        
         $page->save();
         return redirect()->route('page.index')->with('successMsg','Page Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $page = page::find($id);
         $page->delete();
        return redirect()->back()->with('successMsg','Page Deleted successfully');
    }
}
