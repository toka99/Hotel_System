<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;

//use App\Http\Controllers\Requests\StoreManagerRequest; 


 


use DataTables;


class ClientController extends Controller

{

   public function getPendingClients(Request $request)

    {

        if ($request->ajax()) {

            $data = Client::latest()->where('status',0);

            return Datatables::of($data)

                ->addColumn('action', 'helper.actionButtonsAdminClients')

                
                ->rawColumns(['action'])

                ->make(true);
               

        }

    }

    
   public function getApprovedClients(Request $request)

   {

       if ($request->ajax()) {

           $data = Client::latest()->where('status',1);

           return Datatables::of($data)

               ->addColumn('action', 'helper.actionButtonsAdminApprovedClients')

               
               ->rawColumns(['action'])

               ->make(true);
              

       }

   }



    public function clientapproval()
    {
        $clients = Client::get();
        return view ('admins.clients.index',compact ('clients'));
    }
    

    public function index() {
    
        $allclients = Client::all(); //object of elequont collection
        return view('admins.clients.index' , [
            'clients' =>  $allclients
         ] );
    }

    public function index2() {
    
        $allclients = Client::all(); //object of elequont collection
        return view('admins.clients.index2' , [
            'clients' =>  $allclients
         ] );
    }

    public function index3() {
    
        // $allreservations = Reservation::all(); //object of elequont collection
        // return view('admins.clients.index3' , [
        //     'reservations' =>  $allreservations
        //  ] );
    }




    public function show($clientId) {
    $client = Client::find($clientId); //object of post model
    return view('admins.clients.show',[
        'client' => $client,
      

    ]);
    }



      // 'users' => User::all()     this related to the create el part bta3 el loop of el drop down list mmkn ybwa managers hna
public function create() {
    return view('admins.clients.create');

 }




 
 public function store(Request $request){

    // $request->validate([

        
    //         'name'              => 'required',
    //         'email'             => 'required|email|unique:clients,email',
    //         'password'          => 'required|min:8',
    //         'national_id'       => 'required|min:14|unique:clients,national_id',
    //         'created_at'        => 'required',
    //         'image'             => 'required',   



    // ]);
    $requestData = $request->all();
    Client::create($requestData);

    return redirect()->route('adminrequestclients.index');
   

 }

 


 //'users'=>User::all()  related to edit fun. d bta3t l drop down list bta3t l post creator mmkn n3mlha ll mangers w gwa l []
 public function edit($client){

    $client = Client::find($client) ;
    return view('admins.clients.edit',['client'=>$client]);
 
    }


   


 public function update(Request $request, Client $client){

    // $request->validate([

    
    //     'name'              => 'required',
    //     'email'             => 'required|email|unique:managers,email,'.$manager->id,
    //     'password'          => 'required|min:8',
    //     'national_id'       => 'required|min:14|unique:managers,national_id,'.$manager->id,
    //     'created_at'        => 'required',
    //     'image'             => 'required',   

    // ]);


    $client->update($request->all());

    return redirect()->route('adminapproveclients.index2') ->with('success','clients updated successfully');
    
 }






  //remove post
 public function destroy(Client $client){
    
     $client->delete();
     return redirect()->route('adminapproveclients.index2')->with('success','clients deleted successfully');
                                              
 }   
 
 

 public function approve($client){
    $client = Client::find($client) ;
    $client->status = 1; //Approved
    $client->save();
    return redirect()->route('adminrequestclients.index'); //Redirect user somewhere
 }
 
 public function decline($client){
    $client = Client::find($client) ;
    $client->status = 0; //Declined
    $client->delete();
    return redirect()->route('adminrequestclients.index');//Redirect user somewhere
 }




 
}

