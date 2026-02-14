<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ReservWebsiteController extends controller {
public function reservationStep1(Request $request)
{
  return view('ReservSteps.ReservFromSteps');
}
}