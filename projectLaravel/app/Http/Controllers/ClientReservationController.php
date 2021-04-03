<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;


class ClientReservationController extends Controller
{

    
    public function getClientReservations(Request $request)

    {

        //dd($request);

        if ($request->ajax()) {

            $data = Reservation::latest()->get();

            return Datatables::of($data)

                ->addColumn('action', 'helper.actionButtonsClientReservations')

                
                ->rawColumns(['action'])

                ->make(true);

        }
        

    }




    

    public function index() {
    
        $allreservation= Reservation::all(); //object of elequont collection
        return view('clientreservation.list' , [
            'reservations' =>  $allreservation
         ] );
    }




    // public function create() {
    //     return view('clients.create');
    
    //     }

        public function edit(room $room){
            //dd($room);
           // $floors = Floor::all();
            return view('clients.edit',['room'=>$room]);
        }
    
     
    

        public function store(Request $request , Room $room){

            $request->validate([
               // 'capacity'  => 'required|lt:'. $room ["capacity"],
             ]);


            $requestData = $request->all();
            Reservation::create($requestData);
        
            return redirect()->route('clientreservation.index');
           
        
         }

         public function destroy(Reservation $reservation){
    
            $reservation->delete();
            return redirect()->route('clientreservation.index')->with('success','Reservation deleted successfully');
                                                      
         }       
    
}

