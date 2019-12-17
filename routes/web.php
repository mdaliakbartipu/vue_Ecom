<?php
// Should be deleted

Route::get('/catagory_products/', 'Front\PagesController@catagoryProducts');
Route::get('/subcat_products/', 'Front\PagesController@subcatProducts');
Route::get('/subsubcat_products/', 'Front\PagesController@subsubcatProducts');



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('register', function(){
   echo "Deactivated for security reasons. It will Open soon";
});


// UI Routes

Route::get('/', 'Front\PagesController@index');
Route::get('/store', 'Front\PagesController@index');

Route::get('/cart', 'Front\PagesController@cart');
Route::get('/checkout', 'Front\PagesController@checkout');
Route::get('/dashboard', 'Front\PagesController@dashboard');

Route::get('/catagory_products/{id}', 'Front\PagesController@catagoryProducts');
Route::get('/subcat_products/{id}', 'Front\PagesController@subcatProducts');
Route::get('/subsubcat_products/{id}', 'Front\PagesController@subsubcatProducts');

Route::get('/productCart', 'Front\PagesController@cart');
Route::get('/productCheckout', 'Front\PagesController@checkout');
Route::get('/singleProduct/{id}', 'Front\PagesController@singleProduct');
Route::get('/get_product/{id}', 'Front\PagesController@get_product');

Route::get('/pages/{slug}', 'Front\PagesController@pages');


Route::get('/about', 'Front\PagesController@about');
Route::get('/contact', 'Front\PagesController@contact');



// Get Sub category
Route::get('category/{category}/sub-category', 'CategoryController@subCategories')
					->name('sub-category');
// Store Sub category
Route::post('category/{category}/sub-category', 'CategoryController@save')
                     ->name('category.save');
//Edit Sub Category
Route::get('/sub-edit/{id}','CategoryController@subEdit')->name('sub-edit');
 //Update Sub Category
Route::put('category/{id}/sub-category', 'CategoryController@subUpdate')
                    ->name('category.subUpdate');
// Delete Sub Category                    
Route::DELETE('/sub-delete/{id}','CategoryController@subDelete')->name('sub-delete');

 // Store Sub Sub category
Route::post('sub-sub-category/{id}','CategoryController@subSubCategorySave')->name('subSubCategroy.save');
//Get Sub Sub category
Route::get('sub-sub-category/{id}','CategoryController@subSubCategory')->name('sub-sub-cat');  
//Edit Sub sub Category
Route::get('/sub-sub-edit/{id}','CategoryController@subSubCatEdit')->name('sub-sub-edit');
 //Update Sub sub Category
Route::put('category/{id}/sub-sub-category', 'CategoryController@subSubUpdate')
                    ->name('category.subSubUpdate');
// Delete Sub sub Category  
Route::DELETE('sub-sub-delete/{id}','CategoryController@subSubDelete')->name('sub-sub-delete');


Route::get('form', function (){
   return view('form');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function (){

Route::get('/sadmin', 'HomeController@index')->name('home');
Route::resource('group', 'GroupController');
Route::resource('slider','SliderContoller');
Route::resource('size','SizeController');
Route::resource('page','PageController');
Route::resource('user','UserController');
Route::resource('company','CompanyController');
Route::resource('category','CategoryController');
Route::resource('testimonial','TestimonialController');
Route::resource('blog','BlogController');
Route::resource('promotion','PromotionController');
Route::resource('color','ColorController');
Route::resource('sleeve','SleeveController');
Route::resource('leglength','LeglengthController');
Route::resource('fit','FitController');
Route::resource('product','ProductController');
	
Route::get('/get-sub/ajax/{id}','ProductController@ajaxGetSub');
Route::get('/get-sub/sub/ajax/{id}','ProductController@ajaxGetSubsub');	
    
});




