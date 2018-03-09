<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DatPhong;

class ThongKeController extends Controller
{
    //
    public function getThongKeDatPhong(){
        //$datphong = DatPhong::where();
        return view('thongke.view');
    }

    public function getThongKeDoanhThu(){
        return view('thongke.doanhThu');
    }

    public function postThongKe(Request $request){
        $ngay =  $request->ngay;
        $ngay = explode(' - ', $ngay);

        $dStar = explode('/', $ngay[0])[1];
        $dEnd = explode('/', $ngay[1])[1];

        $mStar = explode('/', $ngay[0])[0];
        $mEnd = explode('/', $ngay[1])[0];

        $yStar = explode('/', $ngay[0])[2];
        $yEnd = explode('/', $ngay[1])[2];

        $data = [];

        for($i = $yStar; $i <= $yEnd; $i ++){
            for($j = $mStar; $j <= $mEnd; $j ++){
                for($k = $dStar; $k <= $dEnd; $k ++){

                   $d = $i. '-' . $j . '-' . $k;
                   $timeStar = strtotime($d . '00:00:00' );
                   $timeEnd = strtotime($d . '23:59:59' );

                   $dCount = DatPhong::where('tgianden', '>', $timeStar)->Where('tgianden', '<', $timeEnd)->count();
                   $data[] = ['d' => $d , 'w' => $dCount];
                   
                }
            }
        }

        echo json_encode($data);
    }

    public function postThongKeDoanhThu(Request $request){
        $ngay =  $request->ngay;
        $ngay = explode(' - ', $ngay);

        $dStar = explode('/', $ngay[0])[1];
        $dEnd = explode('/', $ngay[1])[1];

        $mStar = explode('/', $ngay[0])[0];
        $mEnd = explode('/', $ngay[1])[0];

        $yStar = explode('/', $ngay[0])[2];
        $yEnd = explode('/', $ngay[1])[2];

        $data = [];

        for($i = $yStar; $i <= $yEnd; $i ++){
            for($j = $mStar; $j <= $mEnd; $j ++){
                for($k = $dStar; $k <= $dEnd; $k ++){

                   $d = $i. '-' . $j . '-' . $k;
                   $timeStar = strtotime($d . '00:00:00' );
                   $timeEnd = strtotime($d . '23:59:59' );

                   $datphong = DatPhong::where('tgianden', '>', $timeStar)->Where('tgianden', '<', $timeEnd)->where('st', 1)->get();
                   $gia = 0;
                   foreach($datphong as $dp){
                    $den = date('d', $dp->tgianden);
                    $di = date('d', $dp->tgiandi);

                    $ngay = $di - $den;
                    if($ngay == 0) $ngay = 1;
                   
                    $gia += ($ngay)*$dp->getPhong->gia;
                   }

                   $data[] = ['d' => $d , 'w' => $gia];
                   
                }
            }
        }

        echo json_encode($data);
    }
}
