<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Admin;
use App\Models\Manager;
use App\Models\Receptionist;
use App\Models\Client;










use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
   // protected $redirectTo = 'adminreceptionists.store';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:manager');
        $this->middleware('guest:receptionist');
        $this->middleware('guest:client');

    }
    //admin
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }
    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        DB::table('users')->insert([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
             'role'=>'admin'

            ]);
        return redirect()->intended('login/admin');
    }
    //manager
    public function showManagerRegisterForm()
    {
        return view('auth.register', ['url' => 'manager']);
    }
    protected function createManager(Request $request)
    {
        $this->validator($request->all())->validate();
        $manager = Manager::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'image' => $request['image'],
            'national_id' => $request['national_id'],
            'password' => Hash::make($request['password']),
        ]);
        DB::table('users')->insert([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
             'role'=>'manager'

            ]);
        return redirect()->intended('login/manager');
    }

    //receptionist
    public function showReceptionistRegisterForm()
    {
        return view('auth.register', ['url' => 'receptionist']);
    }
    protected function createReceptionist(Request $request)
    {
        $this->validator($request->all())->validate();
        $receptionist = Receptionist::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'image' => $request['image'],
            'manager_name' => $request['manager_name'],
            'national_id' => $request['national_id'],
            'password' => Hash::make($request['password']),
        ]);
        

        DB::table('users')->insert([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
             'role'=>'receptionist'

            ]);
        
       // return redirect()->intended('login/receptionist');
       return redirect()->intended('adminreceptionists.store');
    }
    //client
    public function showClientRegisterForm()
    {
        
        return view('auth.register', ['url' => 'client']);
    }
    protected function createClient(Request $request)
    {
        $this->validator($request->all())->validate();
        $client = Client::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'image' => $request['image'],
            'gender' => $request['gender'],
            'country' => $request['country'],
           // 'status' => $request['status'],
            'password' => Hash::make($request['password']),
        ]);
        DB::table('users')->insert([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
             'role'=>'client'

            ]);
          $name=$request->name;
        return redirect()->intended('login/client');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
 
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Client::create([
        //     'name' => $data['name'],
        //     'image'=>$data['image'],
        //     'email' => $data['email'],
        //     'country' => $data['country'],
        //     'gender' => $data['gender'],

        //     'password' => Hash::make($data['password']),
        // ]);
     
        // return $user;
    }

   
           
            
        
    
}