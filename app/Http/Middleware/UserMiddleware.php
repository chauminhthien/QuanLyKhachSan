<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use App\Quyen;

class UserMiddleware
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
        $root = '/QuanLyKhachSan/';
        $url = $_SERVER["REQUEST_URI"];

        if(Auth::check() && Auth::user()->remove == 0){
            $quyens = Auth::user()->quyen;
            
            $quyen = explode(',', $quyens);
            
            if(count($quyen) > 0){
                $fl = false;
                foreach($quyen as $id){
                    $link = Quyen::find($id);
                    $path = $root . $link->url;
                    $url1 = substr($url, 0, strlen($path));
                    
                    if($url1 == $path){
                        $fl = true;
                        break;
                    }
                }
                if($fl == true){
                    view()->share('userAdmin', Auth::user());
                    return $next($request);
                }else{
                    die();return redirect()->back()->with(['modal-danger' => 'Bạn Chưa Có Quyền Truy Cập']);
                }
            
            }else{
                return redirect()->back()->with(['loi' => 'Bạn Chưa Có Quyền Truy Cập']);
            }

            view()->share('userAdmin', Auth::user());
            return $next($request);
            
        }else{
            return redirect('dang-nhap.html');
        }
    }
}
