<?php

namespace App\Http\Controllers;

use App\Slider;
use Carbon\Carbon;
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
        $sliders = Slider::all();
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
            'image_1'     => 'mimes:jpeg,jpg,png',
            'image_2'     => 'mimes:jpeg,jpg,png',
       ]);


        if(Input::hasFile('image_1'))
    {        

        $path = "front/assets/.uploads/sliders/";

        if (!file_exists($path)) { // unlink or remove previous image from folder
            mkdir($path,0777,true);
        }


        $image1 = Input::file('image_1');
        $image2 = Input::file('image_2');
        $imageName1 = time() . '-' . $image1->getClientOriginalName();
        $imageName2 = time() . '-' . $image2->getClientOriginalName();
        
        $image1 = $image1->move(('front/assets/.uploads/sliders/'), $imageName1);
        $image2 = $image2->move(('front/assets/.uploads/sliders/'), $imageName2);

        $slider = new Slider;
        $slider->image_1= $imageName1;
        $slider->image_2= $imageName2;
    }

        $slider->title = $request->title;
         $slider->sub_title = $request->sub_title;
         $slider->slug = $request->slug;
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
        $slider = Slider::find($id);
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
        // dd($request);
          $this->validate($request,[
            'title'     => 'required',
            'sub_title' => 'required',
            'image_1'     => 'mimes:jpeg,jpg,png',
            'image_2'     => 'mimes:jpeg,jpg,png',
        ]);
     

         $slider = Slider::find($id);

        if(Input::hasFile('image_1'))
    {        

        $sliderImage1 = public_path("front/assets/.uploads/sliders/{$slider->image_1}"); // get previous image from folder
        $sliderImage2 = public_path("front/assets/.uploads/sliders/{$slider->image_2}"); // get previous image from folder

        if (file_exists($sliderImage1)) { // unlink or remove previous image from folder
            unlink($sliderImage1);
        }

        if (file_exists($sliderImage2)) { // unlink or remove previous image from folder
            unlink($sliderImage2);
        }


        $image1 = Input::file('image_1');
        $image2 = Input::file('image_2');
        $imageName1 = time() . '-' . $image1->getClientOriginalName();
        $imageName2 = time() . '-' . $image2->getClientOriginalName();
        
        $image1 = $image1->move(('front/assets/.uploads/sliders/'), $imageName1);
        $image2 = $image2->move(('front/assets/.uploads/sliders/'), $imageName2);

        $slider->image_1= $imageName1;
        $slider->image_2= $imageName2;
    }

        $slider->title = $request->title;
         $slider->sub_title = $request->sub_title;
         $slider->slug = $request->slug;
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
         $slider = Slider::find($id);
        if(file_exists('uploads/slider'.$slider->image))
        {
               unlink('uploads/slider/'.$slider->image);
        }
        $slider->delete();
        return redirect()->back()->with('successMsg','Slider Deleted successfully');
    }
}
