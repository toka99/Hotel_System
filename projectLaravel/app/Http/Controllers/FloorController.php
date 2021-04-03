<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Floor;
use App\Models\Room;
use App\Models\Manager;

use App\Models\User;

use DataTables;



class FloorController extends Controller

{


    public function getFloors(Request $request)

    {

        

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

        

        if ($request->ajax()) {

            $data = Floor::latest()->get();

            return Datatables::of($data)


                ->make(true);

        }

    }

    public function getManagerOwnFloors(Request $request)

    {

        

        if ($request->ajax()) {

            $data = Floor::latest()->where('manager_name','ouf');

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
    
    public function indexmanagerownfloor() {
    
        $allfloors = Floor::all(); //object of elequont collection
        return view('managers.floors.indexmanagerownfloors' , [
            'floors' =>  $allfloors
         ] );
    }



    public function show($floorId) {
 
    
    }



     
public function create() {
 
    return view('admins.floors.create');

 }


     
 public function createmanager() {
    $managers = Manager::all();
    return view('managers.floors.create', compact('managers'));

    }




 
 public function store(Request $request){

    $request->validate([

        'name'             => 'required|min:3|unique:floors,name',
        'floor_number'       => 'required|unique:floors,floor_number',
           

    ]);
    $requestData = $request->all();
    Floor::create($requestData);

    return redirect()->route('adminfloors.index');
   

 }


 
 public function storemanager(Request $request){

    $request->validate([
        'name'             => 'required|min:3|unique:floors,name',
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
        $managers = Manager::all();
        $floors = Floor::all();
        return view('managers.floors.edit', compact('floor', 'managers'));
    }

   

   


 public function update(Request $request, floor $floor){

    $request->validate([

        'name'               => 'required|min:3|unique:floors,name,' .$floor->id,
        'floor_number'       => 'required|unique:floors,floor_number,'.$floor->id,
           

    ]);


    $floor->update($request->all());

    return redirect()->route('adminfloors.index') ->with('success','Floor updated successfully');
    
 }


 
 public function updatemanager(Request $request, floor $floor){

    $request->validate([
         
        'name'               => 'required|min:3|unique:floors,name,' .$floor->id,
        'floor_number'       => 'required|unique:floors,floor_number,'.$floor->id,
  
    ]);


    $floor->update($request->all());

    return redirect()->route('managerownfloors.indexmanagerownfloors') ->with('success','Floor updated successfully');
    
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
                return redirect()->route('managerownfloors.indexmanagerownfloors')->with('reserved', 'Floor has reserved rooms'); 
    
             }
          else{     
                $room->delete();
                $floor->delete();
                return redirect()->route('managerownfloors.indexmanagerownfloors')->with('success','Floor deleted successfully');

         
        }
     }
     

    }
                    


                                             
}                          




 
}

