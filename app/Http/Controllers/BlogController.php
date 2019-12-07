<?php

namespace App\Http\Controllers;

use App\Blog;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        foreach($blogs as &$blog){
            $blog->author_name = Blog::getAuthorName($blog->author_id);
        }
        return view('blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
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
           'title'     => 'required',
           'desc' => 'required',
           'image'     => 'required|mimes:jpeg,jpg,png'
       ]);
     $image = $request->file('image');
     $slug = str_slug($request->title);
        if(null!==($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        if(!file_exists('front/assets/.uploads/blogs')){
            mkdir('front/assets/.uploads/blogs',0777,true);
        }
        $image->move('front/assets/.uploads/blogs',$imageName);
        } else {
            $imageName = 'default.png';
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->desc = $request->desc;
        $blog->image = $imageName;
        $blog->author_id = auth()->user()->id;
        $blog->save();
        
        return redirect()->route('blog.index')->with('successMsg','Blog Successfully Added');
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
        $blog = Blog::findOrFail($id);
        return view('blog.edit',compact('blog'));
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
            'title'     => 'required',
            'desc' => 'required',
            'image'     => 'mimes:jpeg,jpg,png',
        ]);
     
        // $image = $request->file('image');
        // $slug = str_slug($request->title);
        // $blog = Blog::find($id);
        //  if(null!==($image)){
        //      $currentDate = Carbon::now()->toDateString();
        //      $imageName = $slug .'-'.  $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
         
        //     if(!file_exists('uploads/blog')){
        //      mkdir('uploads/blog',0777,true);
        //  }
        //  $image->move('uploads/blog',$imageName);
        //  } else {
        //      $imageName = $blog->image;
        //  }     

        //use File;
       //use Illuminate\Support\Facades\Input;
     
     $blog = Blog::find($id);
    if(Input::hasFile('image'))
            {
                $usersImage = public_path("front/assets/.uploads/blogs/{$blog->image}"); // get previous image from folder
                if (file::exists($usersImage)) { // unlink or remove previous image from folder
                    unlink($usersImage);
                }
                $image = Input::file('image');
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image = $image->move(('front/assets/.uploads/blogs/'), $imageName);
                $blog->image= $imageName;
            }

         $blog->title = $request->title;
         $blog->desc = $request->desc;
        
         $blog->save();
         return redirect()->route('blog.index')->with('successMsg','Blog Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        if(file_exists('front/assets/.uploads/blogs'.$blog->image))
        {
               unlink('front/assets/.uploads/blogs/'.$blog->image);
        }
        $blog->delete();
        return redirect()->back()->with('successMsg','Blog Deleted successfully');

    }
}
