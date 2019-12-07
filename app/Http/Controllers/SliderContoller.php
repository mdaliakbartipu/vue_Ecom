<?php

namespace App\Http\Controllers;

use App\slider;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class SliderContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = slider::all();
        return view('slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('slider.create');
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
           'sub_title' => 'required',
           'image'     => 'required|mimes:jpeg,jpg,png'
       ]);
     $image = $request->file('image');
     $slug = str_slug($request->title);
        if(null!==($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        if(!file_exists('uploads/slider')){
            mkdir('uploads/slider',0777,true);
        }
        $image->move('uploads/slider',$imageName);
        } else {
            $imageName = 'default.png';
        }

        $slider = new slider();
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->image = $imageName;
        $slider->save();
        return redirect()->route('slider.index')->with('successMsg','Slider Successfully Added');
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
        $slider = slider::find($id);
        return view('slider.edit',compact('slider'));
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
            'sub_title' => 'required',
            'image'     => 'mimes:jpeg,jpg,png',
        ]);
     

         $slider = slider::find($id);
        if(Input::hasFile('image'))
    {
        $usersImage = public_path("uploads/slider/{$slider->image}"); // get previous image from folder
        if (file::exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        $image = Input::file('image');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image = $image->move(('uploads/slider'), $imageName);
        $slider->image= $imageName;
    }

         $slider->title = $request->title;
         $slider->sub_title = $request->sub_title;
         $slider->save();
         return redirect()->route('slider.index')->with('successMsg','Slider Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $slider = slider::find($id);
        if(file_exists('uploads/slider'.$slider->image))
        {
               unlink('uploads/slider/'.$slider->image);
        }
        $slider->delete();
        return redirect()->back()->with('successMsg','Slider Deleted successfully');
    }
}
