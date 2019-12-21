<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Category;
use Illuminate\Http\Request;
use App\SubCategory;
use App\SubSubCategory;


class CategoryController extends Controller
{


    protected $imagePath = 'front/assets/.uploads/category';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $categories = category::all();

        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        return view('category.create');
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
          
           'image'     => 'nullable'
         ]);

     $image = $request->file('image');
     $slug = str_slug($request->name);
        if(null!==($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        if(!file_exists($this->imagePath)){
            mkdir($this->imagePath,0777,true);
        }
        $image->move($this->imagePath,$imageName);
        } else {
            $imageName = 'default.png';
        }
    
        $category = new Category();
        $category->name = $request->name;
        $category->image = $imageName;
        $category->icon = $request->icon??null;
        $category->slug = $slug;
        $category->save();
        return redirect()->route('category.index')->with('successMsg','Category Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::findOrFail($id);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $this->validate($request,[
           'name'       => 'required',
           'image'      => 'mimes:jpeg,jpg,png',
           'position'  => 'required'
       ]);


        $image = $request->file('image');
        $slug = str_slug($request->name);
        $category = category::find($id);

         if(null!==($image)){
             $currentDate = Carbon::now()->toDateString();
             $imageName = $slug .'-'.  $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
         
            if(!file_exists($this->imagePath)){
             mkdir($this->imagePath,0777,true);
         }
         $image->move($this->imagePath,$imageName);
         } else {
             $imageName = $category->image;
         }     

        $category->image = $imageName;  
        $category->name = $request->name;
        $category->slug = $slug;
        $category->position = $request->position;
        $category->icon = $request->icon??null;
      
       $category->save();
         return redirect()->route('category.index')->with('successMsg','Category Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect()->back()->with('successMsg','Category Deleted successfully');
    }

   
     public function subCategories(Category $category)
    {    
       return view('category.subCategories', compact('category'));
    }

       public function save(Request $request){

            $this->validate($request,[
               'name'  =>  'required',
               'category_id' => 'required'
            ]);

            $slug = str_slug($request->name);
        $subCategory = new SubCategory();
        $subCategory->slug = $slug;
        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        
        
        $subCategory->save();  
       
        return redirect()->back()->with('successMsg','SubCategory Successfully Added');
     }

    //   public function subSubCategories(SubCategory $SubCategory)
    // {    
    //    return view('category.subSubCategories', compact('category'));
    // }

// ['subCategory' => $id]

    public function subSubCategory($id){
        $subCategory = SubCategory::find($id);
        return view('category.subSubCategories',compact('subCategory'));
    }

    public function subSubCategorySave(Request $request, $id){
            $this->validate($request,[
               'name'  =>  'required',
               'sub_category_id' => 'required'
            ]);
            $slug = str_slug($request->name);
        $subSubCategory = new subSubCategory();
        $subSubCategory->slug = $slug;
        $subSubCategory->sub_category_id = $request->id;
        $subSubCategory->name = $request->name;

        $subSubCategory->save();  
       
        return redirect()->back()->with('successMsg','SubCategory Successfully Added');
     }

     public function subEdit($id)
    {
        $subCategory = SubCategory::find($id);
        $category_id = $subCategory->category_id;
      
        return view('category.subedit', compact('subCategory','category_id'));
    }

     public function subUpdate(Request $request, $id){
        // return $request->all();
         $this->validate($request,[
               'name'  =>  'required',
               'category_id' => 'required'
            ]);
            $slug = str_slug($request->name);
          $subCategory = SubCategory::find($id);
          $subCategory->category_id = $request->category_id;
          $subCategory->name = $request->name;
          $subCategory->slug = $slug = str_slug($request->name);
          $subCategory->save();
         return redirect()->back()->with('successMsg','Sub Category Successfully Updated');
     }

      public function subDelete($id)
    {
       // $category = category::find($id);
        $subCategory = SubCategory::find($id);
        $category_id = $subCategory->category_id;
        $subCategory->delete();
        return redirect()->back()->with('successMsg','Sub Category Deleted successfully');
    }

       public function subSubCatEdit($id){

        $sub_sub_categories = subSubCategory::find($id);
        $sub_category_id = $sub_sub_categories->sub_category_id;
         return view('category.subSubedit', compact('sub_sub_categories','sub_category_id'));

       }

       public function subSubUpdate(Request $request, $id){

        // return $request->all();
         $this->validate($request,[
               'name'  =>  'required',
               'sub_category_id' => 'required'
            ]);
            $slug = str_slug($request->name);
          $subSubCategory = subSubCategory::find($id);
          $subSubCategory->sub_category_id = $request->sub_category_id;
          $subSubCategory->name = $request->name;
          $subSubCategory->slug = $slug;
          $subSubCategory->save();
         return redirect()-> route('sub-sub-cat',$subSubCategory->sub_category_id)->with('successMsg','Sub Sub Category Successfully Updated');

       }

       public function subSubDelete($id){
        $subSubCategory = subSubCategory::find($id);
        $sub_category_id = $subSubCategory->sub_category_id;
        $subSubCategory->delete();
        return redirect()->back()->with('successMsg','Sub Sub Category Deleted successfully');
       }
}
