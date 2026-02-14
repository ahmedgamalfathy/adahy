<?
namespace App\Classes;
use App\Models\User;
use App\Models\users_c;
use DB;

class Getinfo
{
    
 function getnameu($x){
     $c = users_c::where('my_code',$x)->count();
     if($c > 0){
         return users_c::where('my_code',$x)->first()->name;
     }
 }
 
  function getidu($x){
     $c = users_c::where('my_code',$x)->count();
     if($c > 0){
         return users_c::where('my_code',$x)->first()->id;
     }
 } 
    
}
?>