<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\users_c;
use App\Models\types;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Session;
class RouteController extends Controller
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
    
    
public function accounts_all(Request $request)
    {
    
$data_all = users_c::where('id','!=',0)->orderBy('id','ASC')->paginate('100');
 
      return view('accounts_all', compact('data_all'));
     
    }
    
    
    public function types_all(Request $request)
    {
    
$data_all = types::where('id','!=',0)->orderBy('id','ASC')->paginate('100');
 
      return view('types_all', compact('data_all'));
     
    }
    
    
    

    
}