<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Manager;
use App\Models\User;



use DataTables;


class ManagerController extends Controller

{


    public function getManagers(Request $request)

    {

        
        if ($request->ajax()) {

            $data = Manager::latest()->get();

            return Datatables::of($data)

                ->addColumn('action', 'helper.actionButtonsAdminManagers')

                
                ->rawColumns(['action'])

                ->make(true);

        }

    }




    

    public function index() {
    
        $allmanagers = Manager::all(); //object of elequont collection
        return view('admins.managers.index' , [
            'managers' =>  $allmanagers
         ] );
    }




    public function show($managerId) {
    $manager = Manager::find($managerId); //object of post model
    return view('admins.managers.show',[
        'manager' => $manager,
      

    ]);
    }



      
public function create() {
    return view('admins.managers.create');

 }




 
 public function store(Request $request){

    $request->validate([

        
            'name'              => 'required',
            'email'             => 'required|email|unique:managers,email',
            'password'          => 'required|min:8',
            'national_id'       => 'required|min:14|unique:managers,national_id',
            'created_at'        => 'required',
            'image'             => 'required',   



    ]);
    
    $manager = Manager::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'image' => $request['image'],
        'national_id' => $request['national_id'],
        'password' => Hash::make($request['password']),
    ]);

    return redirect()->route('adminmanagers.index');
   

 }

 


 //'users'=>User::all()  related to edit fun. d bta3t l drop down list bta3t l post creator mmkn n3mlha ll mangers w gwa l []
 public function edit($manager){

    $manager = Manager::find($manager) ;
    return view('admins.managers.edit',['manager'=>$manager]);
 
    }


   


 public function update(Request $request, Manager $manager){

    $request->validate([

    
        'name'              => 'required',
        'email'             => 'required|email|unique:managers,email,'.$manager->id,
        'password'          => 'required|min:8',
        'national_id'       => 'required|min:14|unique:managers,national_id,'.$manager->id,
        'created_at'        => 'required',
        'image'             => 'required',   

    ]);


    $manager->update($request->all());

    return redirect()->route('adminmanagers.index') ->with('success','Manager updated successfully');
    
 }






  //remove post
 public function destroy(Manager $manager){
    
     $manager->delete();
     return redirect()->route('adminmanagers.index')->with('success','Manager deleted successfully');
                                              
 }                          


 
}

