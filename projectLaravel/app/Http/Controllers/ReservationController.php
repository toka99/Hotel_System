<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reservation;
use App\Models\User;

//use App\Http\Controllers\Requests\StoreManagerRequest; 

use DataTables;


class ReservationController extends Controller

{


    public function getReservations(Request $request)

    {

        //dd($request);

        if ($request->ajax()) {

            $data = Reservation::latest()->get();

            return Datatables::of($data)

                ->addColumn('action', 'helper.actionButtonsAdminReservations')

                
                ->rawColumns(['action'])

                ->make(true);

        }

    }




    

    public function index() {
    
        $allreservations = Reservation::all(); //object of elequont collection
        return view('admins.clients.index3' , [
            'reservations' =>  $allreservations
         ] );
    }




    public function show($reservationId) {
    // $reservation = Reservation::find($reservationId); //object of post model
    // return view('admins.admins.show',[
    //     'reservation' => $reservation,
      

    // ]);
    }



      // 'users' => User::all()     this related to the create el part bta3 el loop of el drop down list mmkn ybwa managers hna
public function create() {
    // return view('admins.clients.create');

 }




 
 public function store(Request $request){

    // $request->validate([

        
    //         'name'              => 'required',
    //         'email'             => 'required|email|unique:managers,email',
    //         'password'          => 'required|min:8',
    //         'national_id'       => 'required|min:14|unique:managers,national_id',
    //         'created_at'        => 'required',
    //         'image'             => 'required',   



    // ]);
    // $requestData = $request->all();
    // Reservation::create($requestData);

    // return redirect()->route('adminreservationclients.index');
   

 }

 


 //'users'=>User::all()  related to edit fun. d bta3t l drop down list bta3t l post creator mmkn n3mlha ll mangers w gwa l []
 public function edit($reservation){

    // $reservation = Reservation::find($reservation) ;
    // return view('admins.clients.edit',['reservation'=>$reservation]);
 
    }


   


 public function update(Request $request, Reservation $reservation){

    // $request->validate([

    
    //     'name'              => 'required',
    //     'email'             => 'required|email|unique:managers,email,'.$manager->id,
    //     'password'          => 'required|min:8',
    //     'national_id'       => 'required|min:14|unique:managers,national_id,'.$manager->id,
    //     'created_at'        => 'required',
    //     'image'             => 'required',   

    // ]);


    // $manager->update($request->all());

    // return redirect()->route('adminmanagers.index') ->with('success','Manager updated successfully');
    
 }






  //remove post
 public function destroy(Reservation $reservation){
    
    //  $reservation->delete();
    //  return redirect()->route('adminmanagers.index')->with('success','Manager deleted successfully');
                                              
 }                          


 
}


