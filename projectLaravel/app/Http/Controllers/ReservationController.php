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

        //dd($request);

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



      // 'users' => User::all()     this related to the create el part bta3 el loop of el drop down list mmkn ybwa managers hna

 public function create() {
    // return view('admins.clients.create',[
    //     'reservations' => Reservation::all()
    // ]);

    }




 
 public function store(Request $request){

    // $request->validate([

    //     'number'             => 'required|min:4|integer|unique:rooms,number',
    //     'capacity'           => 'required|integer',
    //     'price'              => 'required',
    //     'floor_number'       => 'required',
        
         

    // // ]);
    // $requestData = $request->all();
    // Reservation::create($requestData);

    // return redirect()->route('adminrooms.index');
   

 }

 


 //'users'=>User::all()  related to edit fun. d bta3t l drop down list bta3t l post creator mmkn n3mlha ll mangers w gwa l []
//  public function edit($reservation){

//     // $reservation = Reservation::find($reservation) ;
//     // return view('admins.reservations.edit',['reservation'=>$reservation, 'reservations'=>Reservation::all()]);
 
//     }

    public function edit(Reservation $reservation)
    {
        // $reservations = Reservation::all();
        // return view('admins.reservations.edit', compact('reservation', 'reservations'));
    }

   


 public function update(Request $request, reservation $reservation){

    // $request->validate([

    
    //     'number'             => 'required|min:4|integer|unique:rooms,number,'.$room->id,
    //     'capacity'           => 'required|integer',
    //     'price'              => 'required',
        
        
    // ]);


    $reservation->update($request->all());

    // return redirect()->route('adminreservations.index') ->with('success','Reservation updated successfully');
    
 }





  //remove room
 public function destroy(Reservation $reservation){
    
    //  $reservation->delete();
    //  return redirect()->route('adminreservations.index')->with('success','Reservation deleted successfully');
                                              
 }                          


 
}

