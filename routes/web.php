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
Route::get('/cat', function(){return "not found";});
Route::get('/super', function(){return "not found";});
Route::get('/sub', function(){return "not found";});

Route::get('/cat/{slug}', 'Front\PagesController@cat');
Route::get('/super/{slug}', 'Front\PagesController@super');
Route::get('/sub/{slug}', 'Front\PagesController@sub');

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
Route::get('/get_variant/{id}', 'Front\PagesController@get_variant');


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
Route::resource('brand', 'BrandController');
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

Route::get('/api/get-product/{tag}','ProductController@getProductByTag');
Route::get('/api/get-product-tags','ProductController@getProductTags');
Route::get('/api/get-cart','ProductController@getCart');
Route::get('/api/remove-from-cart/{variant}','ProductController@removeFromCart');
Route::get('/api/get-images','ProductController@getImagesByColor');
Route::post('add-to-cart','ProductController@addToCart');	
Route::get('add-to-cart','ProductController@addToCart');	

Route::get('/api/get-contact-info','Front\PagesController@getContactInfo');
Route::post('/api/submit-form','Front\PagesController@submitForm');
Route::get('/api/test','Front\PagesController@test');
Route::get('/api/get-attributes/{id}','Front\PagesController@getAttributes');
Route::get('/api/delete-image','Front\PagesController@test');
Route::get('/api/cat-products/{slug}','ProductController@apiCatProducts');
Route::get('/api/get-colors','ProductController@apiGetColors');
Route::get('/api/get-sizes','ProductController@apiGetSizes');
Route::get('/api/get-brands','ProductController@apiGetBrands');
Route::get('/api/check-if-size','ProductController@apiCheckIfSize');
Route::get('/api/check-if-color','ProductController@apiCheckIfColor');
Route::post('/save-user-info','UserController@saveUserInfo');

// order
Route::post('/order','OrderController@gotNewOrder');

