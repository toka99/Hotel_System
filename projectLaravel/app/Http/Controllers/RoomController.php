<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Floor;
use App\Models\Manager;

use App\Models\User;

use DataTables;



class RoomController extends Controller

{


    public function getRooms(Request $request)

    {


        if ($request->ajax()) {

            $data = Room::latest()->get();

            return Datatables::of($data)

                ->addColumn('action', 'helper.actionButtonsAdminRooms')

                
                ->rawColumns(['action'])

                ->make(true);

        }


    }
   


    public function getManagerRooms(Request $request)

    {

       

        if ($request->ajax()) {

            $data = Room::latest()->get();

            return Datatables::of($data)

                ->make(true);

        }

    }


    public function getManagerOwnRooms(Request $request)

    {

        

        if ($request->ajax()) {

            $data = Room::latest()->where('manager_name','ouf');

            return Datatables::of($data)

                ->addColumn('action', 'helper.actionButtonsManagerRooms')

                
                ->rawColumns(['action'])

                ->make(true);

        }

    }


    public function getAvailableRooms(Request $request)

    {

        //dd($request);

        if ($request->ajax()) {

            $data = Room::latest()->where('is_reserved',0);

            return Datatables::of($data)

                ->addColumn('action', 'helper.actionButtonsClientRooms')

                
                ->rawColumns(['action'])

                ->make(true);

        }
        

    }

    public function index() {
    
        $allrooms = Room::all(); //object of elequont collection
        return view('admins.rooms.index' , [
            'rooms' =>  $allrooms
         ] );
    }

    public function indexmanager() {
    
        $allrooms = Room::all(); //object of elequont collection
        return view('managers.rooms.index' , [
            'rooms' =>  $allrooms
         ] );
    }


    public function indexmanagerownroom() {
    
        $allrooms = Room::all(); //object of elequont collection
        return view('managers.rooms.indexmanagerownrooms' , [
            'rooms' =>  $allrooms
         ] );
    }




    public function show($roomId) {
 //
    
    }



      
 public function create() {
    return view('admins.rooms.create',[
        'floors' => Floor::all()
    ]);
    

    }

    
 public function createmanager() {
 
    $managers = Manager::all();
    $floors = Floor::all();
    return view('managers.rooms.create', compact('floors', 'managers'));

    }


 
 public function store(Request $request){

    $request->validate([

        'number'             => 'required|min:4|integer|unique:rooms,number',
        'capacity'           => 'required|integer',
        'price'              => 'required',
        'floor_number'       => 'required',
        
         

    ]);
    $requestData = $request->all();
    Room::create($requestData);

    return redirect()->route('adminrooms.index');
   

 }


 
 public function storemanager(Request $request){

    $request->validate([

        'number'             => 'required|min:4|integer|unique:rooms,number',
        'capacity'           => 'required|integer',
        'price'              => 'required',
        'floor_number'       => 'required',
        
         

    ]);
    $requestData = $request->all();
    Room::create($requestData);

    return redirect()->route('managerrooms.indexmanager');
   

 }



    public function edit(Room $room){
        $floors = Floor::all();
        return view('admins.rooms.edit', compact('room', 'floors'));
    }


    public function editmanager(Room $room){
        $managers = Manager::all();
        $floors = Floor::all();
        return view('managers.rooms.edit', compact('room', 'floors','managers'));
    }

   


 public function update(Request $request, room $room){

    $request->validate([

    
        'number'             => 'required|min:4|integer|unique:rooms,number,'.$room->id,
        'capacity'           => 'required|integer',
        'price'              => 'required',
        
        
    ]);


    $room->update($request->all());

    return redirect()->route('adminrooms.index') ->with('success','Room updated successfully');
    
 }



 
 public function updatemanager(Request $request, room $room){

    $request->validate([

    
        'number'             => 'required|min:4|integer|unique:rooms,number,'.$room->id,
        'capacity'           => 'required|integer',
        'price'              => 'required',
        
        
    ]);


    $room->update($request->all());

    return redirect()->route('managerownrooms.indexmanagerownrooms') ->with('success','Room updated successfully');
    
 }





  //remove room
 public function destroy(Room $room){
    
    if($room->is_reserved == 0 ) {
     $room->delete();
     return redirect()->route('adminrooms.index')->with('success','Room deleted successfully');
      } else {
         
        return redirect()->route('adminrooms.index')->with('reserved', 'Room  reserved'); 
       
     
      }                                     
 }                          

 public function destroymanager(Room $room){
        
        if($room->is_reserved == 0 ) {
        $room->delete();
        return redirect()->route('managerrooms.indexmanager')->with('success','Room deleted successfully');
    } else {
            
        return redirect()->route('managerrooms.indexmanager')->with('reserved', 'Room reserved'); 
    
    
    }                                         
}                          


 
}
