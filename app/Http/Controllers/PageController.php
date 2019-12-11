<?php

namespace App\Http\Controllers;

use App\Page;
use App\Tags;

use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        
        foreach($pages as &$page){
            $page->tag = Page::getPageTag($page->id);
        }

        return view('page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::forPage();
         return view('page.create', compact('tags'));
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
    
        $page = new Page();
        $page->slug = $request->pageSlug;
        $page->name = $request->pageName;
        $page->content = $request->content;
        $page->tag = $request->tag;
        
        $page->save();

        $tag  = new Tags;
        $tag->type = 'page';
        $tag->tag_id = $request->tag;
        $tag->page_id = $page->id;
        $tag->pin();

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
        $tags = Tags::forPage();
        $page = Page::findOrFail($id);

        return view('page.edit', compact('page' ,'tags'));
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
     
         $page = Page::find($id); 
         $page->slug = $request->pageSlug;
         $page->name = $request->pageName;
         $page->content = $request->content??'Comming Soon...';
         $page->tag = (int)$request->tag;
         $page->save();
        
         $tag = Tags::where('page_id', $page->id);
         $tag? $tag->tag_id = (int)$request->tag:null;

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
         $page = Page::find($id);
         $page->delete();
        return redirect()->back()->with('successMsg','Page Deleted successfully');
    }
}
