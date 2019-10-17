<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $testimonials = Testimonial::all();
         return view('testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('testimonial.create');
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
            'name'        => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'message'     => 'required'
       ]);
        
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->message = $request->message;
     
        if(Input::hasFile('image'))
          {
               $image = Input::file('image');
               $imageName = time() . '-' . $image->getClientOriginalName();
               $image = $image->move(('uploads/testimonials'), $imageName);
               $testimonial->image= $imageName;
          }

        $testimonial->save();
        return redirect()->route('testimonial.index')->with('successMsg','Testimonial Successfully Added');
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
         $testimonial = Testimonial::find($id);
        return view('testimonial.edit',compact('testimonial'));
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
           'designation' =>  'required',
           'message'   => 'required'
        ]);
     
         $testimonial = Testimonial::find($id); 
         $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->message = $request->message;
       
        
         $testimonial->save();
         return redirect()->route('testimonial.index')->with('successMsg','Testimonial Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $testimonial = Testimonial::find($id);
         $testimonial->delete();
        return redirect()->back()->with('successMsg','Testimonial Deleted successfully');
    }
}
