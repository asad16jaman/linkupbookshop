<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\DashboardController;


use App\Http\Controllers\Admin\ManagemenController;
use App\Http\Controllers\Admin\PhotoGalleryController;



Route::get("/",[HomeController::class,"index"])->name("home");

Route::prefix('admin')->group(function(){

    Route::get('/login',[DashboardController::class,'login'])->name('admin.login');
    Route::post('/login',[DashboardController::class,'authenticate'])->name('admin.login');
    Route::get('/error',[DashboardController::class,'errorpage'])->name('error');

    // //registring admin/users
    Route::get('/register',[DashboardController::class,'register'])->name('admin.register');
    Route::post('/register',[DashboardController::class,'store'])->name('admin.register');
});

Route::post('/upload-description-image', [ProductController::class, 'uploadDescriptionImage'])->name('upload.description.image');

Route::group(['prefix'=> '/admin','middleware'=>'checkAdminAuth'], function () {
    Route::get('/',[DashboardController::class,'index'])->name('admin');
});

Route::group(['prefix'=> '/admin','middleware'=>'checkAdminAuth','as'=>'admin.'], function () {
    //handling users from admin pannel
    Route::get("/users/{id?}",[UsersController::class,"index"])->name("users");
    Route::post("/users/{id?}",[UsersController::class,"storeUser"])->name("users");
    Route::post("/users/{id}/delete",[UsersController::class,"deleteUser"])->name("user.delete");

    //edit user from user side
    Route::get("/users/{id}/edit",[UsersController::class,"editUser"])->name("user.edit");
    Route::post("/users/{id}/edit",[UsersController::class,"editUserStore"])->name("user.edit");

    //company maintain url
    Route::get("/company",[CompanyController::class,"index"])->name("company");
    Route::post("/company",[CompanyController::class,"create"])->name("company");

    //slider maintaining url
    Route::get("/sliders/{id?}",[SliderController::class,"index"])->name("slider");
    Route::post("/sliders/{id?}",[SliderController::class,"store"])->name("slider");
    Route::post("/sliders/{id}/delete",[SliderController::class,"destroy"])->name("slider.delete");


    //Service url hare
    Route::get("/category/{id?}",[CategoryController::class,"index"])->name("category");
    Route::post("/category/{id?}",[CategoryController::class,"store"])->name("category");
    Route::post("/category/{id}/delete",[CategoryController::class,"destroy"])->name("category.delete");


    // Product url hare
    Route::get("/book/{id?}",[ProductController::class,"index"])->name("book");
    Route::post("/book/{id?}",[ProductController::class,"store"])->name("book");
    Route::post("/book/{id}/delete",[ProductController::class,"destroy"])->name("book.delete");

    //best selling
    Route::get("/bestsells",[ProductController::class,'bestSelling'])->name('getbestsell');
    Route::get("/bestsell/{id}",[ProductController::class,'addBestSelling'])->name('bestsell');
    Route::get("/remove/{id}",[ProductController::class,'removeBestSelling'])->name('removeBestSelling');


    //Photo Gallery url hare
    Route::get("/photogallery/{id?}",[PhotoGalleryController::class,"index"])->name("photogallery");
    Route::post("/photogallery/{id?}",[PhotoGalleryController::class,"store"])->name("photogallery");
    Route::post("/photogallery/{id}/delete",[PhotoGalleryController::class,"destory"])->name("photogallery.delete");

    
    //Managment url hare
    Route::get('/manage/{id?}',[ManagemenController::class,'index'])->name('management');
    Route::post('/manage/{id?}',[ManagemenController::class,'store'])->name('management');
    Route::post('/management/{id}/delete',[ManagemenController::class,'destroy'])->name('management.delete');

    //about url hare
    Route::get('/about',[AboutController::class,'index'])->name('about');
    Route::post('/about',[AboutController::class,'store'])->name('about');

    // faq hare
    Route::get('/faq',[FaqController::class,'index'])->name('faq');
    Route::post('/faq',[FaqController::class,'store'])->name('faq');
    Route::post('/faq/{id}/delete',[FaqController::class,'destroy'])->name('faq.delete');

    // Area hare
    // Route::get('/area',[AreaController::class,'index'])->name('area');
    // Route::post('/area',[AreaController::class,'store'])->name('area');
    // Route::post('/area/{id}/delete',[AreaController::class,'destroy'])->name('area.delete');

   
    //handling apprived dealer
    // Route::get('/delear/aproved/{id?}',[DelearController::class,'index'])->name('delear');
    // Route::post('/delear/aproved/{id?}',[DelearController::class,'store'])->name('delear');
    //handling pending delears
    // Route::get('/delear/pending',[DelearController::class,'pendingDealers'])->name('p_delear');
    // Route::post('/delear/pending/{id}',[DelearController::class,'updatePending'])->name('p_delear.updated');
    //delete deler
    // Route::post('/delear/{id}/delete',[DelearController::class,'destroy'])->name('delear.delete');

    //Contact url hare
    Route::get('/contact',[ContactController::class,'index'])->name('message');
    Route::post('/contact/{id}',[ContactController::class,'destroy'])->name('message.delete');

     //Client url hare
    Route::get('/clients',[ClientController::class,'index'])->name('client');
    Route::post('/clients',[ClientController::class,'store'])->name('client');
    Route::post('/clients/{id}',[ClientController::class,'destroy'])->name('client.delete');

    //feedback maintaining url
    Route::get("/feedback/{id?}",[FeedbackController::class,"index"])->name("feedback");
    Route::post("/feedback/{id?}",[FeedbackController::class,"store"])->name("feedback");
    Route::post("/feedback/{id}/delete",[FeedbackController::class,"destroy"])->name("feedback.delete");
    
    //admin logout
    Route::get('/logout',[DashboardController::class,'logout'])->name('logout');
});



// Route::get('link', function(){
//     Artisan::call('storage:link');
//     return 'Done';
// });


