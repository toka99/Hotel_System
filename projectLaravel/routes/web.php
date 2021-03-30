<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\ManagerController;


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

//client role 
Route::get('/rooms',function(){
return view ("clients.rooms");
});

Route::get('/reservation',function(){
    return view ("clients.Reservation");
    });

    
Auth::routes();

// Route::get('/register',function(){
//     return view('auth.register');
// });


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//admin role
// Route::get('/admins',function(){
//     return view ("/admins/index" 
// );
//     });
//admin
Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class,'showAdminLoginForm']);
Route::get('/register/admin', [App\Http\Controllers\Auth\RegisterController::class,'showAdminRegisterForm']);

Route::post('/login/admin',[App\Http\Controllers\Auth\LoginController::class,'adminLogin']);
Route::post('/register/admin', [App\Http\Controllers\Auth\RegisterController::class,'createAdmin']);

//manager Manager
    Route::get('/login/manager', [App\Http\Controllers\Auth\LoginController::class,'showManagerLoginForm']);
    Route::get('/register/manager', [App\Http\Controllers\Auth\RegisterController::class,'showManagerRegisterForm']);
    
    Route::post('/login/manager',[App\Http\Controllers\Auth\LoginController::class,'managerLogin']);
    Route::post('/register/manager', [App\Http\Controllers\Auth\RegisterController::class,'createManager']);


    //receptionist
    Route::get('/login/receptionist', [App\Http\Controllers\Auth\LoginController::class,'showReceptionistLoginForm']);
    Route::get('/register/receptionist', [App\Http\Controllers\Auth\RegisterController::class,'showReceptionistRegisterForm']);
    
    Route::post('/login/receptionist',[App\Http\Controllers\Auth\LoginController::class,'receptionistLogin']);
    Route::post('/register/receptionist', [App\Http\Controllers\Auth\RegisterController::class,'createReceptionist']);
//client  Client

    Route::get('/login/client', [App\Http\Controllers\Auth\LoginController::class,'showClientLoginForm']);
    Route::get('/register/client', [App\Http\Controllers\Auth\RegisterController::class,'showClientRegisterForm']);
    
    Route::post('/login/client',[App\Http\Controllers\Auth\LoginController::class,'clientLogin']);
    Route::post('/register/client', [App\Http\Controllers\Auth\RegisterController::class,'createClient']);


    Route::view('/home', 'home')->middleware('auth');
    Route::view('/admin', 'admin');
    Route::view('/manager', 'manager');
    Route::view('/receptionist', 'receptionist');
    Route::view('/client', 'client');
    
// Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
// Route::get('/receptionists', [ReceptionistController::class, 'index'])->name('receptionists.index');//->middleware('auth');        
// Route::get('/receptionists/create', [ReceptionistController::class, 'create'])->name('receptionists.create');//->middleware('auth');  
// Route::post('/receptionists', [ReceptionistController::class, 'store'])->name('receptionists.store');//->middleware('auth');
// Route::get('/receptionists/{receptionist}/edit', [ReceptionistController::class, 'edit'])->name('receptionists.edit');//->middleware('auth'); 
// Route::put('/receptionists/{receptionist}', [ReceptionistController::class, 'update'])->name('receptionists.update');//->middleware('auth'); e::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth'); 
// Route::delete('/receptionists/{receptionist}', [ReceptionistController::class, 'destroy'])->name('receptionists.destroy');//->middleware('auth'); 
// //Route::get('/receptionists/delete/{id}', 'ReceptionistController@destroy')->name('receptionists.destroy');
// Route::get('receptionists/list', [ReceptionistController::class, 'getReceptionists'])->name('receptionists.list'); //Data table
