<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;



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

    Route::get('/editProfile',function(){
        return view ("clients.editProfile");
        });
//client crud on reservation 
//client show available room 
Route::get('/clientreservations', [ClientReservationController::class, 'index'])->name('clientreservation.index');//->middleware('auth');        
Route::get('/clientreservations', [ReservationController::class, 'reservindex'])->name('clientreservation.index');
//Route::get('/clientreservations/create', [ClientReservationController::class, 'create'])->name('clientreservation.create');//->middleware('auth');  
Route::post('/clientreservations', [ClientReservationController::class, 'store'])->name('clientreservation.store');//->middleware('auth');

// Route::put('/clientreservations/{reservation}', [ClientReservationController::class, 'update'])->name('clientreservation.update');//->middleware('auth'); e::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth'); 
 Route::delete('/clientreservations/{reservation}', [ClientReservationController::class, 'destroy'])->name('clientreservation.destroy');//->middleware('auth');                              
 Route::get('clients/list', [ReservationController::class, 'getClientReservations'])->name('clientreservation.list'); //Data table
//Route::get('clientrooms/list', [ClientReservationController::class, 'getClientAvailableRooms'])->name('clientrooms.list'); //Data table
Route::get('/clientreservations/{room}/edit', [ClientReservationController::class, 'edit'])->name('clientreservation.edit');//->middleware('auth'); 
Route::get('clientrooms/list', [RoomController::class, 'getAvailableRooms'])->name('clientrooms.list'); //Data table










    
Auth::routes();




Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
Route::view('/manager', 'manager');
Route::view('/receptionist', 'receptionist');
Route::view('/client', 'client');



//manager Manager
Route::get('/login/manager', [App\Http\Controllers\Auth\LoginController::class,'showManagerLoginForm'])->name('login.manager');
Route::get('/register/manager', [App\Http\Controllers\Auth\RegisterController::class,'showManagerRegisterForm'])->name('register.manager');

Route::post('/login/manager',[App\Http\Controllers\Auth\LoginController::class,'managerLogin']);
Route::post('/register/manager', [App\Http\Controllers\Auth\RegisterController::class,'createManager']);

//admin
Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class,'showAdminLoginForm']);
Route::get('/register/admin', [App\Http\Controllers\Auth\RegisterController::class,'showAdminRegisterForm']);

Route::post('/login/admin',[App\Http\Controllers\Auth\LoginController::class,'adminLogin']);
Route::post('/register/admin', [App\Http\Controllers\Auth\RegisterController::class,'createAdmin']);


 //receptionist
Route::get('/login/receptionist', [App\Http\Controllers\Auth\LoginController::class,'showReceptionistLoginForm'])->name('login.receptionist');  
Route::get('/register/receptionist', [App\Http\Controllers\Auth\RegisterController::class,'showReceptionistRegisterForm'])->name('register.receptionist');

    
Route::post('/login/receptionist',[App\Http\Controllers\Auth\LoginController::class,'receptionistLogin']);
Route::post('/register/receptionist', [App\Http\Controllers\Auth\RegisterController::class,'createReceptionist']);
 //client  Client

Route::get('/login/client', [App\Http\Controllers\Auth\LoginController::class,'showClientLoginForm'])->name('login.client');
Route::get('/register/client', [App\Http\Controllers\Auth\RegisterController::class,'showClientRegisterForm'])->name('register.client');
Route::post('/login/client',[App\Http\Controllers\Auth\LoginController::class,'clientLogin']);
Route::post('/register/client', [App\Http\Controllers\Auth\RegisterController::class,'createClient']);


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


//admin(requestclient)
Route::get('adminpendingclients/list', [ClientController::class, 'getPendingClients'])->name('adminpendingclients.list'); //Data table
Route::get('adminapproveclients/list', [ClientController::class, 'getApprovedClients'])->name('adminapproveclients.list'); //Data table

Route::post('/approve/{client}', [ClientController::class, 'approve'])->name('admin.approve');
Route::post('/decline/{client}', [ClientController::class, 'decline'])->name('admin.decline');


//admin(requests client)
Route::get('/adminrequestclients', [ClientController::class, 'index'])->name('adminrequestclients.index');//->middleware('auth');   

Route::get('/adminapproveclients', [ClientController::class, 'index2'])->name('adminapproveclients.index2');//->middleware('auth');        
Route::get('/adminapproveclients/create', [ClientController::class, 'create'])->name('adminapproveclients.create');//->middleware('auth');  
Route::post('/adminapproveclients', [ClientController::class, 'store'])->name('adminapproveclients.store');//->middleware('auth');
Route::get('/adminapproveclients/{client}/edit', [ClientController::class, 'edit'])->name('adminapproveclients.edit');//->middleware('auth'); 
Route::put('/adminapproveclients/{client}', [ClientController::class, 'update'])->name('adminapproveclients.update');//->middleware('auth'); e::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth'); 
Route::delete('/adminapproveclients/{client}', [ClientController::class, 'destroy'])->name('adminapproveclients.destroy');//->middleware('auth');                              

///////////////////////////////////////////////////////////////////////////////////////////


//routes(admin,clients)
Route::get('/adminreservationclients', [ReservationController::class, 'index'])->name('adminreservationclients.index');//->middleware('auth');        
Route::get('adminreservationclients/list', [ReservationController::class, 'getReservations'])->name('adminreservationclients.list'); //Data table



Route::get('/managers',function(){
    return view ("/managers/index" 
);
    });

//manager(receptionists)

Route::get('/managerreceptionists', [ReceptionistController::class, 'indexmanager'])->name('managerreceptionists.indexmanager');//->middleware('auth');        
Route::get('/managerreceptionists/create', [ReceptionistController::class, 'createmanager'])->name('managerreceptionists.createmanager');//->middleware('auth');  
Route::post('/managerreceptionists', [ReceptionistController::class, 'storemanager'])->name('managerreceptionists.storemanager');//->middleware('auth');
Route::get('/managerreceptionists/{receptionist}/edit', [ReceptionistController::class, 'editmanager'])->name('managerreceptionists.editmanager');//->middleware('auth'); 
Route::put('/managerreceptionists/{receptionist}', [ReceptionistController::class, 'updatemanager'])->name('managerreceptionists.updatemanager');//->middleware('auth'); e::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth'); 
Route::delete('/managerreceptionists/{receptionist}', [ReceptionistController::class, 'destroymanager'])->name('managerreceptionists.destroymanager');//->middleware('auth');                              
Route::get('managerreceptionists/list', [ReceptionistController::class, 'getManagerReceptionists'])->name('managerreceptionists.list'); //Data table

Route::get('/managerownreceptionists', [ReceptionistController::class, 'indexmanagerownreceptionist'])->name('managerownreceptionists.indexmanagerownreceptionist');//->middleware('auth');
Route::get('managerownreceptionists/list', [ReceptionistController::class, 'getManagerOwnReceptionists'])->name('managerownreceptionists.list'); //Data table



// manager(rooms)

Route::get('/managerrooms', [RoomController::class, 'indexmanager'])->name('managerrooms.indexmanager');//->middleware('auth');        
Route::get('/managerrooms/create', [RoomController::class, 'createmanager'])->name('managerrooms.createmanager');//->middleware('auth');  
Route::post('/managerrooms', [RoomController::class, 'storemanager'])->name('managerrooms.storemanager');//->middleware('auth');
Route::get('/managerrooms/{room}/edit', [RoomController::class, 'editmanager'])->name('managerrooms.editmanager');//->middleware('auth'); 
Route::put('/managerrooms/{room}', [RoomController::class, 'updatemanager'])->name('managerrooms.updatemanager');//->middleware('auth'); e::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth'); 
Route::delete('/managerrooms/{room}', [RoomController::class, 'destroymanager'])->name('managerrooms.destroymanager');//->middleware('auth');                              
Route::get('managerrooms/list', [RoomController::class, 'getManagerRooms'])->name('managerrooms.list'); //Data table


Route::get('/managerownrooms', [RoomController::class, 'indexmanagerownroom'])->name('managerownrooms.indexmanagerownrooms');//->middleware('auth');
Route::get('managerownrooms/list', [RoomController::class, 'getManagerOwnRooms'])->name('managerownrooms.list'); //Data table



// manager(floors)

Route::get('/managerfloors', [FloorController::class, 'indexmanager'])->name('managerfloors.indexmanager');//->middleware('auth');        
Route::get('/managerfloors/create', [FloorController::class, 'createmanager'])->name('managerfloors.createmanager');//->middleware('auth');  
Route::post('/managerfloors', [FloorController::class, 'storemanager'])->name('managerfloors.storemanager');//->middleware('auth');
Route::get('/managerfloors/{floor}/edit', [FloorController::class, 'editmanager'])->name('managerfloors.editmanager');//->middleware('auth'); 
Route::put('/managerfloors/{floor}', [FloorController::class, 'updatemanager'])->name('managerfloors.updatemanager');//->middleware('auth'); e::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth'); 
Route::delete('/managerfloors/{floor}', [FloorController::class, 'destroymanager'])->name('managerfloors.destroymanager');//->middleware('auth');                              
Route::get('managerfloors/list', [FloorController::class, 'getManagerFloors'])->name('managerfloors.list'); //Data table

Route::get('/managerownfloors', [FloorController::class, 'indexmanagerownfloor'])->name('managerownfloors.indexmanagerownfloors');//->middleware('auth');
Route::get('managerownfloors/list', [FloorController::class, 'getManagerOwnFloors'])->name('managerownfloors.list'); //Data table


//manager(requestclient)
Route::get('managerpendingclients/list', [ClientController::class, 'getPendingClientsManager'])->name('managerpendingclients.list'); //Data table
Route::get('managerapproveclients/list', [ClientController::class, 'getApprovedClientsManager'])->name('managerapproveclients.list'); //Data table

Route::post('/approvemanager/{client}', [ClientController::class, 'approveManager'])->name('manager.approve');
Route::post('/declinemanager/{client}', [ClientController::class, 'declineManager'])->name('manager.decline');


//manager(manager,client)
Route::get('/managerrequestclients', [ClientController::class, 'indexmanager'])->name('managerrequestclients.indexmanager');//->middleware('auth');   

Route::get('/managerapproveclients', [ClientController::class, 'index2manager'])->name('managerapproveclients.index2manager');//->middleware('auth');        
Route::get('/managerapproveclients/create', [ClientController::class, 'createmanager'])->name('managerapproveclients.createmanager');//->middleware('auth');  
Route::post('/managerapproveclients', [ClientController::class, 'storemanager'])->name('managerapproveclients.storemanager');//->middleware('auth');
Route::get('/managerapproveclients/{client}/edit', [ClientController::class, 'editmanager'])->name('managerapproveclients.editmanager');//->middleware('auth'); 
Route::put('/managerapproveclients/{client}', [ClientController::class, 'updatemanager'])->name('managerapproveclients.updatemanager');//->middleware('auth'); e::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth'); 
Route::delete('/managerapproveclients/{client}', [ClientController::class, 'destroymanager'])->name('managerapproveclients.destroymanager');//->middleware('auth');                              

///////////////////////////////////////////////////////////////////////////////////////////


//routes(manager,clients)
Route::get('/managerreservationclients', [ReservationController::class, 'indexmanager'])->name('managerreservationclients.indexmanager');//->middleware('auth');        
Route::get('managerreservationclients/list', [ReservationController::class, 'getReservationsManager'])->name('managerreservationclients.list'); //Data table

/////////removeeeeeeeee but check 
Route::get('/adminreservationclients/create', [ReservationController::class, 'create'])->name('adminreservationclients.create');//->middleware('auth');  
Route::post('/adminreservationclients', [ReservationController::class, 'store'])->name('adminreservationclients.store');//->middleware('auth');
Route::get('/adminreservationclients/{reservation}/edit', [ReservationController::class, 'edit'])->name('adminreservationclients.edit');//->middleware('auth'); 
Route::put('/adminreservationclients/{reservation}', [ReservationController::class, 'update'])->name('adminreservationclients.update');//->middleware('auth'); e::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth'); 
Route::delete('/adminreservationclients/{reservation}', [ReservationController::class, 'destroy'])->name('adminreservationclients.destroy');//->middleware('auth');                              
Route::get('adminreservationclients/list', [ReservationController::class, 'getReservations'])->name('adminreservationclients.list'); //Data table




//receptionist(requestclient)

Route::get('/receptionists',function(){
    return view ("/receptionists/index" 
);
    });
Route::get('receptionistpendingclients/list', [ClientController::class, 'getPendingClientsReceptionist'])->name('receptionistpendingclients.list'); //Data table
Route::get('receptionistapproveclients/list', [ClientController::class, 'getApprovedClientsReceptionist'])->name('receptionistapproveclients.list'); //Data table

Route::post('/approvereceptionist/{client}', [ClientController::class, 'approvereceptionist'])->name('receptionist.approve');
Route::post('/declinereceptionist/{client}', [ClientController::class, 'declinereceptionist'])->name('receptionist.decline');


//manager(manager,client)
Route::get('/receptionistrequestclients', [ClientController::class, 'indexreceptionist'])->name('receptionistrequestclients.indexreceptionist');//->middleware('auth');   

Route::get('/receptionistapproveclients', [ClientController::class, 'index2receptionist'])->name('receptionistapproveclients.index2receptionist');//->middleware('auth');        


//routes(manager,clients)
Route::get('/receptionistreservationclients', [ReservationController::class, 'indexreceptionist'])->name('receptionistreservationclients.indexreceptionist');//->middleware('auth');        
Route::get('/receptionistreservationclients/list', [ReservationController::class, 'getReservationsReceptionist'])->name('receptionistreservationclients.list');//->middleware('auth');        
