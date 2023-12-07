<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\User\DocumentControlleruser;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){
  
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.user.login')->name('login');
          Route::view('/register','dashboard.user.register')->name('register');
          Route::post('/create',[UserController::class,'create'])->name('create');
          Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
          Route::view('/home','dashboard.user.home')->name('home');
          Route::post('/logout',[UserController::class,'logout'])->name('logout');
          Route::get('/add-new',[UserController::class,'add'])->name('add');
    });

});

Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

});

Route::prefix('doctor')->name('doctor.')->group(function(){

       Route::middleware(['guest:doctor','PreventBackHistory'])->group(function(){
            Route::view('/login','dashboard.doctor.login')->name('login');
            Route::view('/register','dashboard.doctor.register')->name('register');
            Route::post('/create',[DoctorController::class,'create'])->name('create');
            Route::post('/check',[DoctorController::class,'check'])->name('check');
       });

       Route::middleware(['auth:doctor','PreventBackHistory'])->group(function(){
            Route::view('/home','dashboard.doctor.home')->name('home');
            Route::post('logout',[DoctorController::class,'logout'])->name('logout');
       });

});

Route::get('/local-documents', function () {
    return view('dashboard.user.userlocal');
})->name('user.userlocal');

Route::get('/public-documents', function () {
    return view('dashboard.user.userpublic');
})->name('user.userpublic');

Route::get('/adddocument', function () {
    return view('dashboard.admin.adddocument');
})->name('admin.adddocument');


Route::get('/userview', function () {
    return view('dashboard.user.userview');
})->name('user.userview');



    // The 'store' method in 'DocumentController' will handle document uploads
Route::post('public/documents', [DocumentController::class, 'store'])->name('admin.documents.store');
Route::get('public/documents', [DocumentController::class, 'store'])->name('admin.documents.store');

// Pour l'affichage des documents
//Route::get('public/documentsindex', [DocumentController::class, 'index'])->name('documents.index');


Route::get('/documents/search', [DocumentController::class, 'index'])->name('documents.search');
Route::get('/local-documents', [DocumentController::class, 'showDocuments'])->name('user.userlocal');
Route::get('/public-documents', [DocumentController::class, 'showDocumentspublic'])->name('user.userpublic');



Route::get('storage/app/public/documents/{id}', [DocumentController::class, 'downloadDocument'])->name('documents.download');
Route::get('/download/remote-document/{id}', [DocumentController::class, 'downloadRemoteDocument'])->name('documents.download.remote');


Route::get('user/home', [DocumentController::class, 'showAllDocuments'])->name('user.home');
