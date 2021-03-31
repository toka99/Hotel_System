<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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




    

    public function index() {
    
        $allreceptionists = Receptionist::all(); //object of elequont collection
        return view('admins.receptionists.index' , [
            'receptionists' =>  $allreceptionists
         ] );
    }




    public function show($receptionistId) {
    $receptionist = Receptionist::find($receptionistId); //object of post model
    return view('admins.receptionists.show',[
        'receptionist' => $receptionist,
      

    ]);
    }



      // 'users' => User::all()     this related to the create el part bta3 el loop of el drop down list mmkn ybwa managers hna


 public function create() {
    return view('admins.receptionists.create',[
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
            // 'created_at'        => 'required',
             'image'             => 'required',   



    ]);
    $requestData = $request->all();
    Receptionist::create($requestData);

    return redirect()->route('adminreceptionists.index');
   

 }

 


 //'users'=>User::all()  related to edit fun. d bta3t l drop down list bta3t l post creator mmkn n3mlha ll mangers w gwa l []


    public function edit(Receptionist $receptionist){
        $managers = Manager::all();
        return view('admins.receptionists.edit', compact('receptionist', 'managers'));
    }


   


 public function update(Request $request, Receptionist $receptionist){

    $request->validate([

    
        'name'              => 'required',
        'email'             => 'required|email|unique:receptionists,email,'.$receptionist->id,
        'password'          => 'required|min:8',
        'national_id'       => 'required|min:14|unique:receptionists,national_id,'.$receptionist->id,
        'manager_name'      => 'required',
        // 'created_at'        => 'required',
        'image'             => 'required',   

    ]);


    $receptionist->update($request->all());

    return redirect()->route('adminreceptionists.index') ->with('success','Receptionist updated successfully');
    
 }






  //remove post
 public function destroy(Receptionist $receptionist){
    
     $receptionist->delete();
     return redirect()->route('adminreceptionists.index')->with('success','Receptionist deleted successfully');
                                              
 }                          


 
}
