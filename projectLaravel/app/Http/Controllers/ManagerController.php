<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Manager;
use App\Models\User;

//use App\Http\Controllers\Requests\StoreManagerRequest; 


 


use DataTables;


class ManagerController extends Controller

{


    public function getManagers(Request $request)

    {

        //dd($request);

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



      // 'users' => User::all()     this related to the create el part bta3 el loop of el drop down list mmkn ybwa managers hna
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
    $requestData = $request->all();
    Manager::create($requestData);

    return redirect()->route('managers.index');
   

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

    return redirect()->route('managers.index') ->with('success','Manager updated successfully');
    
 }






  //remove post
 public function destroy(Manager $manager){
    
     $manager->delete();
     return redirect()->route('managers.index')->with('success','Manager deleted successfully');
                                              
 }                          


 
}

