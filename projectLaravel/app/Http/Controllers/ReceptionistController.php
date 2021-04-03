<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Receptionist;

use App\Models\Manager;

use App\Models\User;

//use App\Http\Controllers\Requests\StoreReceptionistRequest; 


 


use DataTables;


class ReceptionistController extends Controller

{


    public function getReceptionists(Request $request)

    {

        //dd($request);

        if ($request->ajax()) {

            $data = Receptionist::latest()->get();

            return Datatables::of($data)

                ->addColumn('action', 'helper.actionButtons')

                
                ->rawColumns(['action'])

                ->make(true);

        }

    }




    public function getManagerReceptionists(Request $request)

    {

        //dd($request);

        if ($request->ajax()) {

            $data = Receptionist::latest()->get();

            return Datatables::of($data)


                ->make(true);

        }

    }

    
    public function getManagerOwnReceptionists(Request $request)

    {

        //dd($request);

        if ($request->ajax()) {

            $data = Receptionist::latest()->where('manager_name','ouf');

            return Datatables::of($data)

                ->addColumn('action', 'helper.actionButtonsManagerReceptionists')

                
                ->rawColumns(['action'])

                ->make(true);

        }

    }



    public function index() {
    
        $allreceptionists = Receptionist::all(); //object of elequont collection
        return view('admins.receptionists.index' , [
            'receptionists' =>  $allreceptionists
         ] );
    }

    
    public function indexmanager() {
    
        $allreceptionists = Receptionist::all(); //object of elequont collection
        return view('managers.receptionists.index' , [
            'receptionists' =>  $allreceptionists
         ] );
    }


    public function indexmanagerownreceptionist() {
    
        $allreceptionists = Receptionist::all(); //object of elequont collection
        return view('managers.receptionists.indexmanagerownreceptionists' , [
            'receptionists' =>  $allreceptionists
         ] );
    }




    public function show($receptionistId) {
    $receptionist = Receptionist::find($receptionistId); //object of post model
    return view('admins.receptionists.show',[
        'receptionist' => $receptionist,
      

    ]);
    }


 public function create() {
    return view('admins.receptionists.create',[
        'managers' => Manager::all()
    ]);

    }

    public function createmanager() {
        return view('managers.receptionists.create',[
            'managers' => Manager::all()
        ]);
    
        }



 
 public function store(Request $request){

    $request->validate([

        
            'name'              => 'required',
            'email'             => 'required|email|unique:receptionists,email',
            'password'          => 'required|min:8',
            'national_id'       => 'required|min:14|unique:receptionists,national_id',
            'manager_name'      => 'required',
             'created_at'        => 'required',
             'image'             => 'required',   



    ]);
    
    $receptionist = Receptionist::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'image' => $request['image'],
        'manager_name' => $request['manager_name'],
        'national_id' => $request['national_id'],
        'password' => Hash::make($request['password']),
    ]);

    return redirect()->route('adminreceptionists.index');
   

 }


 
 public function storemanager(Request $request){

    $request->validate([

        
            'name'              => 'required',
            'email'             => 'required|email|unique:receptionists,email',
            'password'          => 'required|min:8',
            'national_id'       => 'required|min:14|unique:receptionists,national_id',
            'manager_name'      => 'required',
             'created_at'        => 'required',
             'image'             => 'required',   



    ]);
    $requestData = $request->all();
    Receptionist::create($requestData);

    return redirect()->route('managerreceptionists.indexmanager');
   

 }


 


    public function edit(Receptionist $receptionist){
        $managers = Manager::all();
        return view('admins.receptionists.edit', compact('receptionist', 'managers'));
    }
    
    public function editmanager(Receptionist $receptionist){
        $managers = Manager::all();
        return view('managers.receptionists.edit', compact('receptionist', 'managers'));
    }

   


 public function update(Request $request, Receptionist $receptionist){

    $request->validate([

    
        'name'              => 'required',
        'email'             => 'required|email|unique:receptionists,email,'.$receptionist->id,
        'password'          => 'required|min:8',
        'national_id'       => 'required|min:14|unique:receptionists,national_id,'.$receptionist->id,
        'manager_name'      => 'required',
         'created_at'        => 'required',
        'image'             => 'required',   

    ]);


    $receptionist->update($request->all());

    return redirect()->route('adminreceptionists.index') ->with('success','Receptionist updated successfully');
    
 }


 public function updatemanager(Request $request, Receptionist $receptionist){

    $request->validate([

    
        'name'              => 'required',
        'email'             => 'required|email|unique:receptionists,email,'.$receptionist->id,
        'password'          => 'required|min:8',
        'national_id'       => 'required|min:14|unique:receptionists,national_id,'.$receptionist->id,
        'manager_name'      => 'required',
         'created_at'        => 'required',
        'image'             => 'required',   

    ]);


    $receptionist->update($request->all());

    return redirect()->route('managerownreceptionists.indexmanagerownreceptionist') ->with('success','Receptionist updated successfully');
    
 }





  //remove post
 public function destroy(Receptionist $receptionist){
    
     $receptionist->delete();
     return redirect()->route('adminreceptionists.index')->with('success','Receptionist deleted successfully');
                                              
 }     
 
 
 public function destroymanager(Receptionist $receptionist){
    
    $receptionist->delete();
    return redirect()->route('managerreceptionists.indexmanager')->with('success','Receptionist deleted successfully');
                                             
}   


 
}
