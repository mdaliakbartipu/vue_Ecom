<?php

namespace App\Http\Controllers;

use File;
use Carbon\Carbon;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class companyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $companies = Company::all();
        return view('company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //  return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //     $this->validate($request,[
     //       'name'     => 'required',
     //       'head_office' => 'required',
     //       'factory'     => 'required',
     //       'contact_name'     => 'required',
     //       'position'     => 'required',
     //       'phone_number'     => 'required',
     //       'fax'     => 'required',
     //       'email'     => 'required',
     //       'country'     => 'required',
     //       'top_text'     => 'required',
     //       'logo'     => 'required|mimes:jpeg,jpg,png'
     //   ]);
     // $image = $request->file('logo');
     // $slug = str_slug($request->name);
     //    if(null!==($image)){
     //        $currentDate = Carbon::now()->toDateString();
     //        $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
     //    if(!file_exists('uploads/company')){
     //        mkdir('uploads/company',0777,true);
     //    }
     //    $image->move('uploads/company',$imageName);
     //    } else {
     //        $imageName = 'default.png';
     //    }

     
    
        
     //     $company = Company::create($request->all());
     //      $company->save();
       
     //    return redirect(route('company.index'))->with('successMsg','Company Added Successfully');
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
         $company = Company::find($id);
        return view('company.edit',compact('company'));
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
           'head_office' => 'required',
           'factory'     => 'required',
           'contact_name'     => 'required',
           'position'     => 'required',
           'phone_number'     => 'required',
           'fax'     => 'required',
           'email'     => 'required',
           'country'     => 'required',
           'top_text'     => 'required',
            'logo'     => 'required'

           
       ]);
       //use File;
       //use Illuminate\Support\Facades\Input;
     
     $company = Company::find($id);
        if(Input::hasFile('logo'))
    {
        $usersImage = public_path("uploads/company/{$company->logo}"); // get previous image from folder
        if (file::exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        $image = Input::file('logo');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image = $image->move(('uploads/company'), $imageName);
        $company->logo= $imageName;
    }

          $company->name = $request->name;
          $company->head_office = $request->head_office;
          $company->factory = $request->factory;
          $company->contact_name = $request->contact_name;
          $company->position = $request->position;
          $company->phone_number = $request->phone_number;
          $company->fax = $request->fax;
          $company->email = $request->email;
          $company->country = $request->country;
          $company->top_text = $request->top_text;

          $company->save();
         return redirect()->route('company.index')->with('successMsg','Company Successfully Updated');
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
