<?php

namespace App\Http\Controllers;

use App\Color;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return view('color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('color.create');
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
           'code' => 'required',
           'image'     => 'required|mimes:jpeg,jpg,png,gif'
       ]);

       $path = "front/assets/.uploads/color";

     $image = $request->file('image');
     $slug = str_slug($request->name);
        if(null!==($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $image->move($path,$imageName);
        } else {
            $imageName = 'default.png';
        }

        $color = new Color();
        $color->name = $request->name;
        $color->code = $request->code;
        $color->image = $imageName;
        $color->save();
        return redirect()->route('color.index')->with('successMsg','Color Successfully Added');
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
        $color = Color::findOrFail($id);
        return view('color.edit',compact('color'));
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
            'code'     => 'required',
            'image'    => 'mimes:jpeg,jpg,png,gif',
        ]);
     
        $path = "front/assets/.uploads/color";
       
        if(!file_exists($path)){
            mkdir($path,0777,true);
        }


         $color = Color::find($id);
        if(Input::hasFile('image'))
    {
        $usersImage = "/".$path; // get previous image from folder
        
        if (file_exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }

        $image = Input::file('image');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image = $image->move(($path), $imageName);
        $color->image = $imageName;
    }

         $color->name = $request->name;
         $color->code = $request->code;
         $color->save();
         return redirect()->route('color.index')->with('successMsg','Color Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $color = Color::find($id);
        if(file_exists('uploads/color'.$color->image))
        {
               unlink('uploads/color/'.$color->image);
        }
        $color->delete();
        return redirect()->back()->with('successMsg','Color Deleted successfully');
    }
}
