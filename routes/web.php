<?php

// UI Routes

Route::get('/', 'Front\PagesController@index');
Route::get('/store', 'Front\PagesController@index');
Route::get('/catagoryProducts', 'Front\PagesController@catagoryProducts');
Route::get('/productCart', 'Front\PagesController@cart');
Route::get('/productCheckout', 'Front\PagesController@checkout');
Route::get('/singleProduct', 'Front\PagesController@singleProduct');



// ###################### Admin ROUTE #########################

//Route::get('master', function (){
//   return view('home.home');
//});

//sub-categories



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
    Route::get('/admin', 'HomeController@index')->name('home');
    Route::resource('group', 'GroupController');
    Route::resource('slider','sliderContoller');
	Route::resource('size','SizeController');
	Route::resource('page','pageController');
	Route::resource('user','userController');
	Route::resource('company','companyController');
	Route::resource('category','categoryController');
    Route::resource('testimonial','TestimonialController');
	Route::resource('blog','BlogController');
	Route::resource('promotion','PromotionController');
	Route::resource('color','ColorController');
	Route::resource('sleeve','SleeveController');
	Route::resource('leglength','LeglengthController');
	Route::resource('fit','fitController');
	Route::resource('product','ProductController');
	

	Route::get('/get-sub/ajax/{id}','ProductController@ajaxGetSub');
	Route::get('/get-sub/sub/ajax/{id}','ProductController@ajaxGetSubsub');
	
    
});




