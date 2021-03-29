<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Receptionist;

use App\Http\Controllers\StoreReceptionistRequest;

use DataTables;


class ReceptionistController extends Controller

{


    public function getReceptionists(Request $request)

    {

        //dd($request);

        if ($request->ajax()) {

            $data = Receptionist::latest()->get();

            return Datatables::of($data)

                // ->addIndexColumn()

                ->addColumn('action',  function($row) 

                {

                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> 
                                <button class="btn-delete" data-remote="/receptionists' . $id->id . '">Delete</button>';
                              
               

                   return $actionBtn;

                 })
   
                //->addColumn('action', 'helper.actionButtons')
                
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
    return view('admins.receptionists.create');

 }


 
 public function store(StoreReceptionistRequest $request){

    $requestData = $request->all();
    receptionist::create($requestData);
    return redirect()->route('admins.receptionists.index');
 }


 //'users'=>User::all()  related to edit fun. d bta3t l drop down list bta3t l post creator mmkn n3mlha ll mangers w gwa l []
 public function edit($receptionist){

    $receptionist = Receptionist::find($receptionist) ;
    return view('admins.receptionists.edit',['receptionist'=>$receptionist]);
 
    }


 public function update(UpdateReceptionistRequest $request, Receptionist $receptionist){


    $receptionist->update($request->all());

    return redirect()->route('admins.receptionists.index') ->with('success','Receptionist updated successfully');
    
 }

  //remove post
 public function destroy(Receptionist $receptionist){

     $receptionist->delete();
     return redirect()->route('admins.receptionists.index')->with('success','Receptionist deleted successfully');
                                              
 }
// public function destroy($id)
// {
// // delete task
// $receptionist=Receptionist::find($id);
// $receptionist->delete();
// return redirect('/receptionists')->with('success','Task deleted successfully');
// }

 
}
