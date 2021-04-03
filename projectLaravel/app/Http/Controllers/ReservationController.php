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

<<<<<<< HEAD

    
    public function getReservationsManager(Request $request)

    {

        
=======
    public function getClientReservations(Request $request)

    {

        //dd($request);
>>>>>>> 193d6c94528b09c18ab8898ddb44a2ca6b8cb78c

        if ($request->ajax()) {

            $data = Reservation::latest()->get();

            return Datatables::of($data)

                
<<<<<<< HEAD
                ->make(true);

        }

    }


    public function getReservationsReceptionist(Request $request)

    {

        

        if ($request->ajax()) {

            $data = Reservation::latest()->get();

            return Datatables::of($data)

                
                ->make(true);

        }

    }

=======
            ->addColumn('action', 'helper.actionButtonsClientRservations')

                
            ->rawColumns(['action'])

            ->make(true);

        }

    }




    public function reservindex() {
    
        $allreservations = Reservation::all(); //object of elequont collection
        return view('clients.Reservation' , [
            'reservations' =>  $allreservations
         ] );
    }
>>>>>>> 193d6c94528b09c18ab8898ddb44a2ca6b8cb78c
    

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

