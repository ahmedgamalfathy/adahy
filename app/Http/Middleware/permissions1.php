<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use session;
use Validator;
use Hash;
use DB;
class permissions1
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       $user = 1;
       $arr = explode("/", $request->path(), 2);
$first = $arr[0];
    if(Auth::user()->id)
{

    $check_path = DB::table('per')->where('u_id' , Auth::user()->id)->where('page',$first)->count();
    if ($check_path > 0)
  {
        return $next($request);
  }else{
    return redirect('permission_denied');  
  }
}else{
    return redirect('login');
}
    }
}
