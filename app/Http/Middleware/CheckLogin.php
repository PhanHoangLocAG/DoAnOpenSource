<?php

namespace App\Http\Middleware;

use App\NhanVien;
use Closure;
use Illuminate\Support\Facades\Cookie;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(isset($_COOKIE['pass']) && isset($_COOKIE['name'])){
            if($this->check(Cookie::get('name'),Cookie::get('pass'))){
                return $next($request);
            }
        }else{
            return redirect('admin/login');
        }
    }

    public  function check($email,$pass){
        $nhanvien=NhanVien::getAccountAdmin();
        //dd($nhanvien);
        foreach($nhanvien as $item){
            if($item->email==$email && $item->password==$pass)
            {
                return true;
            }
        }
        return false;
    }
}
