<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
        public function logout_(Request $request)
    {
          Auth::logout();
             $request->session()->invalidate();

            $request->session()->regenerateToken();
           return redirect()->route('login')->with('error', 'Your session is destory');
    }

    public function dark()
    {
        
        if (Session::has('thems')){
    if(Session::get('thems') == 'dark'){Session::put('thems', 'ndark'); }else{Session::put('thems', 'dark'); }
    }else{
       Session::put('thems', 'dark'); 
    }
      
     return redirect()->back();   
    }






    public function test()
    {
        $pass = user::where('id',1)->first()->password;
        $pass2 = Hash::make('123456789');
        $ch = Hash::check('123456789', $pass);
        if(Hash::check('123456789', $pass)){
            echo "done<br>";
        }else{
            echo "note<br>";
        }
        echo $pass."<br>";
        echo $pass2."<br>";
        echo $ch."<br>";
    }
}
