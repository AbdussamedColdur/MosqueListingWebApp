<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\CamiServices;

class Camii extends Controller
{
    public function goster2(){

        $camiler = CamiServices::getMosquesByCity2();


        return view('layouts.index',['camiler'=>$camiler]);
    }





    public function detayli($id){

        $camiler = CamiServices::getDetay($id);


        return view('layouts.infoPage',['camiler'=>$camiler]);
    }






    public function goster(Request $request)
    {
        $data = $request->all();


if(!empty($data)){
    if ((!empty($data['il']) && !empty($data['ilce']))) {
        $sehir = $data['il'];
        $ilce = $data['ilce'];
        $isim=$data['ad'];

        $camiler = CamiServices::filitreleme($sehir, $ilce,$isim);


        return view('layouts.index', ['camiler' => $camiler]);
    } else {
        $sehir = null;
        $ilce = null;
        $isim=$data['ad'];

        $camiler = CamiServices::filitreleme($sehir, $ilce,$isim);

        return view('layouts.index', ['camiler' => $camiler]);

    }
}else{


    return view('layouts.index');


}


}
}
