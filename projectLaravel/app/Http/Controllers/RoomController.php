<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Floor;

use App\Models\User;

use DataTables;



class RoomController extends Controller

{


    public function getRooms(Request $request)

    {

        //dd($request);

        if ($request->ajax()) {

            $data = Room::latest()->get();

            return Datatables::of($data)

                ->addColumn('action', 'helper.actionButtonsAdminRooms')

                
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




    public function show($roomId) {
 //
    
    }



      // 'users' => User::all()     this related to the create el part bta3 el loop of el drop down list mmkn ybwa managers hna

 public function create() {
    return view('admins.rooms.create',[
        'floors' => Floor::all()
    ]);

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

 


 //'users'=>User::all()  related to edit fun. d bta3t l drop down list bta3t l post creator mmkn n3mlha ll mangers w gwa l []
//  public function edit($room){

//     $room = Room::find($room) ;
//     return view('admins.rooms.edit',['room'=>$room, 'floors'=>Floor::all()]);
 
    // }

    public function edit(Room $room){
        $floors = Floor::all();
        return view('admins.rooms.edit', compact('room', 'floors'));
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





  //remove room
 public function destroy(Room $room){
    
     $room->delete();
     return redirect()->route('adminrooms.index')->with('success','Room deleted successfully');
                                              
 }                          


 
}
