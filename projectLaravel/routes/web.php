<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FloorController;


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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//admin role

Route::get('/admins',function(){
    return view ("/admins/index" 
);
    });

//admin(receptionists)

Route::get('/adminreceptionists', [ReceptionistController::class, 'index'])->name('adminreceptionists.index');//->middleware('auth');        
Route::get('/adminreceptionists/create', [ReceptionistController::class, 'create'])->name('adminreceptionists.create');//->middleware('auth');  
Route::post('/adminreceptionists', [ReceptionistController::class, 'store'])->name('adminreceptionists.store');//->middleware('auth');
Route::get('/adminreceptionists/{receptionist}/edit', [ReceptionistController::class, 'edit'])->name('adminreceptionists.edit');//->middleware('auth'); 
Route::put('/adminreceptionists/{receptionist}', [ReceptionistController::class, 'update'])->name('adminreceptionists.update');//->middleware('auth'); e::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth'); 
Route::delete('/adminreceptionists/{receptionist}', [ReceptionistController::class, 'destroy'])->name('adminreceptionists.destroy');//->middleware('auth');                              
Route::get('adminreceptionists/list', [ReceptionistController::class, 'getReceptionists'])->name('adminreceptionists.list'); //Data table


//admin(managers)

Route::get('/adminmanagers', [ManagerController::class, 'index'])->name('adminmanagers.index');//->middleware('auth');        
Route::get('/adminmanagers/create', [ManagerController::class, 'create'])->name('adminmanagers.create');//->middleware('auth');  
Route::post('/adminmanagers', [ManagerController::class, 'store'])->name('adminmanagers.store');//->middleware('auth');
Route::get('/adminmanagers/{manager}/edit', [ManagerController::class, 'edit'])->name('adminmanagers.edit');//->middleware('auth'); 
Route::put('/adminmanagers/{manager}', [ManagerController::class, 'update'])->name('adminmanagers.update');//->middleware('auth'); e::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth'); 
Route::delete('/adminmanagers/{manager}', [ManagerController::class, 'destroy'])->name('adminmanagers.destroy');//->middleware('auth');                              
Route::get('adminmanagers/list', [ManagerController::class, 'getManagers'])->name('adminmanagers.list'); //Data table




// admin(rooms)

Route::get('/adminrooms', [RoomController::class, 'index'])->name('adminrooms.index');//->middleware('auth');        
Route::get('/adminrooms/create', [RoomController::class, 'create'])->name('adminrooms.create');//->middleware('auth');  
Route::post('/adminrooms', [RoomController::class, 'store'])->name('adminrooms.store');//->middleware('auth');
Route::get('/adminrooms/{room}/edit', [RoomController::class, 'edit'])->name('adminrooms.edit');//->middleware('auth'); 
Route::put('/adminrooms/{room}', [RoomController::class, 'update'])->name('adminrooms.update');//->middleware('auth'); e::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth'); 
Route::delete('/adminrooms/{room}', [RoomController::class, 'destroy'])->name('adminrooms.destroy');//->middleware('auth');                              
Route::get('adminrooms/list', [RoomController::class, 'getRooms'])->name('adminrooms.list'); //Data table


//admin(floors) 

Route::get('/adminfloors', [FloorController::class, 'index'])->name('adminfloors.index');//->middleware('auth');        
Route::get('/adminfloors/create', [FloorController::class, 'create'])->name('adminfloors.create');//->middleware('auth');  
Route::post('/adminfloors', [FloorController::class, 'store'])->name('adminfloors.store');//->middleware('auth');
Route::get('/adminfloors/{floor}/edit', [FloorController::class, 'edit'])->name('adminfloors.edit');//->middleware('auth'); 
Route::put('/adminfloors/{floor}', [FloorController::class, 'update'])->name('adminfloors.update');//->middleware('auth'); e::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth'); 
Route::delete('/adminfloors/{floor}', [FloorController::class, 'destroy'])->name('adminfloors.destroy');//->middleware('auth');                              
Route::get('adminfloors/list', [FloorController::class, 'getFloors'])->name('adminfloors.list'); //Data table