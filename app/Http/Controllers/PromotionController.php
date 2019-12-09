<?php

namespace App\Http\Controllers;

use App\Promotion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view('promotion.index',compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotion.create');
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
            'image'     => 'required|mimes:jpeg,jpg,png',
            'slug'     => 'required',
          ]);
       $image = $request->file('image');
       $slug = str_slug($request->slug);
        if(null!==($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        if(!file_exists('front/uploads/promotions')){
            mkdir('front/assets/.uploads/promotions',0777,true);
        }
        $image->move('front/assets/.uploads/promotions',$imageName);
        } else {
            $imageName = 'default.png';
        }

        $promotion = new Promotion();
        $promotion->image = $imageName;
        $promotion->slug = $request->slug;
        $promotion->save();
        return redirect()->route('promotion.index')->with('successMsg','Promotion Successfully Added');
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
        $promotion = Promotion::find($id);
        return view('promotion.edit',compact('promotion'));
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
             'image'     => 'mimes:jpeg,jpg,png',
            'slug'     => 'required',
            ]);

        $promotion = Promotion::find($id);
        
        if(Input::hasFile('image'))
    {
        $usersImage = public_path("front/assets/.uploads/promotions/{$promotion->image}"); // get previous image from folder
        if (file_exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        $image = Input::file('image');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image = $image->move(('front/assets/.uploads/promotions/'), $imageName);
        $promotion->image= $imageName;
    }

         $promotion->slug = $request->slug;
         $promotion->save();
         return redirect()->route('promotion.index')->with('successMsg','Promotion Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
