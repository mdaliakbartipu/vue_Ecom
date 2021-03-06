<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $company = Company::first();
        return view('company.index',compact('company'));
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
         $company = Company::first();
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
        // dd($request);
       $this->validate($request,[
           'name'     => 'required|max:190',
           'title'     => 'required|max:190',
           'phone1'     => 'nullable|max:190',
           'fax'     => 'nullable|max:190',
           'email'     => 'required|max:190',
           'facebook'     => 'nullable|max:190',
           'twitter'     => 'nullable|max:190',
           'linkedin'     => 'nullable|max:190',
           'instagram'     => 'nullable|max:190',
            'logo'     => 'nullable'
           
       ]);
     
     $company = Company::find($id);
        if(Input::hasFile('logo'))
    {
        $usersImage = public_path("front/uploads/company/{$company->logo}"); // get previous image from folder
        
        if (file_exists($usersImage)) {
            unlink($usersImage);
        }

        $image = Input::file('logo');
        
        $imageFilePath = "front/assets/.uploads/company";

        if($image){
            if (!file_exists($imageFilePath)) {
                mkdir($imageFilePath, 0777, true);
            }
        }
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image = $image->move(($imageFilePath), $imageName);
    }

          $company->name                = $request->name;
          $company->title                   = $request->title;
          $company->phone1               = $request->phone1;
          $company->fax                     = $request->fax;
          $company->email                 = $request->email;
          $company->address                 = $request->address;
          $company->map                 = $request->map;

          $request->logo?$company->logo= $imageName:null;

          $company->facebook                 = $request->facebook??null;
          $company->twitter                      = $request->twitter??null;
          $company->linkedin                    = $request->linkedin??null;
          $company->instagram                = $request->instagram??null;
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
