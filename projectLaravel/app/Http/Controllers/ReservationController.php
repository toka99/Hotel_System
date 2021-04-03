<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reservation;

use App\Models\Client;

use App\Models\User;

use DataTables;



class ReservationController extends Controller

{


    public function getReservations(Request $request)

    {

        

        if ($request->ajax()) {

            $data = Reservation::latest()->get();

            return Datatables::of($data)

                
                ->make(true);

        }

    }

    

    public function index() {
    
        $allreservations = Reservation::all(); //object of elequont collection
        return view('admins.clients.index3' , [
            'reservations' =>  $allreservations
         ] );
    }


    
    public function indexmanager() {
    
      $allreservations = Reservation::all(); //object of elequont collection
      return view('managers.clients.index3' , [
          'reservations' =>  $allreservations
       ] );
  }

  public function indexreceptionist() {
    
    $allreservations = Reservation::all(); //object of elequont collection
    return view('receptionists.clients.index3' , [
        'reservations' =>  $allreservations
     ] );
}


    public function show($reservationId) {
 //
    
    }



      
 public function create() {
    

    }




 
 public function store(Request $request){

    
   

 }

 




    public function edit(Reservation $reservation)
    {
        
    }

   


 public function update(Request $request, reservation $reservation){

   

    $reservation->update($request->all());

    
 }





  //remove room
 public function destroy(Reservation $reservation){
    
                                           
 }                          


 
}

