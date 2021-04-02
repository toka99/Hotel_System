<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Floor;
use App\Models\Room;

use App\Models\User;

use DataTables;



class FloorController extends Controller

{


    public function getFloors(Request $request)

    {

        //dd($request);

        if ($request->ajax()) {

            $data = Floor::latest()->get();

            return Datatables::of($data)

                ->addColumn('action', 'helper.actionButtonsAdminFloors')

                
                ->rawColumns(['action'])

                ->make(true);

        }

    }


    public function getManagerFloors(Request $request)

    {

        //dd($request);

        if ($request->ajax()) {

            $data = Floor::latest()->get();

            return Datatables::of($data)

                ->addColumn('action', 'helper.actionButtonsManagerFloors')

                
                ->rawColumns(['action'])

                ->make(true);

        }

    }





    

    public function index() {
    
        $allfloors = Floor::all(); //object of elequont collection
        return view('admins.floors.index' , [
            'floors' =>  $allfloors
         ] );
    }


    public function indexmanager() {
    
        $allfloors = Floor::all(); //object of elequont collection
        return view('managers.floors.index' , [
            'floors' =>  $allfloors
         ] );
    }




    public function show($floorId) {
 //
    
    }



      // 'users' => User::all()     this related to the create el part bta3 el loop of el drop down list mmkn ybwa managers hna
public function create() {
 
    return view('admins.floors.create');

 }


     
 public function createmanager() {
    return view('managers.floors.create');

    }




 
 public function store(Request $request){

    $request->validate([

        'name'             => 'required|min:4|unique:floors,name',
        'floor_number'       => 'required|unique:floors,floor_number',
           

    ]);
    $requestData = $request->all();
    Floor::create($requestData);

    return redirect()->route('adminfloors.index');
   

 }


 
 public function storemanager(Request $request){

    $request->validate([
        'name'             => 'required|min:4|unique:floors,name',
        'floor_number'       => 'required|unique:floors,floor_number',
           
        
         

    ]);
    $requestData = $request->all();
    Floor::create($requestData);

    return redirect()->route('managerfloors.indexmanager');
   

 }


 


 //'users'=>User::all()  related to edit fun. d bta3t l drop down list bta3t l post creator mmkn n3mlha ll mangers w gwa l []
 public function edit($floor){

    $floor = Floor::find($floor) ;
    return view('admins.floors.edit',['floor'=>$floor]);
 
    }

    
    public function editmanager(Floor $floor){
        $floors = Floor::all();
        return view('managers.floors.edit',['floor'=>$floor]);
    }

   

   


 public function update(Request $request, floor $floor){

    $request->validate([

        'name'               => 'required|min:4|unique:floors,name,' .$floor->id,
        'floor_number'       => 'required|unique:floors,floor_number,'.$floor->id,
           

    ]);


    $floor->update($request->all());

    return redirect()->route('adminfloors.index') ->with('success','Floor updated successfully');
    
 }


 
 public function updatemanager(Request $request, floor $floor){

    $request->validate([
         
        'name'               => 'required|min:4|unique:floors,name,' .$floor->id,
        'floor_number'       => 'required|unique:floors,floor_number,'.$floor->id,
  
    ]);


    $floor->update($request->all());

    return redirect()->route('managerfloors.indexmanager') ->with('success','Floor updated successfully');
    
 }






  //remove floor
 public function destroy(Floor $floor){

     $rooms = Room::all();
     $floors = Floor::all();
     foreach($rooms as $room){
         if($room->floor_number == $floor->floor_number){
             if($room->is_reserved == 1){
    
                return redirect()->route('adminfloors.index')->with('reserved', 'Floor has reserved rooms'); 

             }
             else {
                $room  ->delete();
                $floor ->delete();
                return redirect()->route('adminfloors.index')->with('success','Floor deleted successfully');
           
              }
                     
         }        

     }
                                          
 }    

 
 
 
 public function destroymanager(Floor $floor){
    
    $rooms = Room::all();
    $floors = Floor::all();
     foreach($rooms as $room){
         if($room->floor_number == $floor->floor_number){
             if($room->is_reserved == 1){
                return redirect()->route('managerfloors.indexmanager')->with('reserved', 'Floor has reserved rooms'); 
    
             }
          else{     
                $room->delete();
                $floor->delete();
                return redirect()->route('managerfloors.indexmanager')->with('success','Floor deleted successfully');

         
        }
     }
     

    }
                    


                                             
}                          




 
}

