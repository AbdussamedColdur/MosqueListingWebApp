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
        if( $ilcead = $data['ilce']=="ilce secin"){
            $ld=1;

        }

        $ilce = $data['ilce'];
        $ilce = DB::table("İlceler")->where('name', 'like', "$ilce")->select('id')->get();

$ilceid=$ilce[0]->id;

        $sehir = $data['il'];

        $isim=$data['ad'];

        $camiler = CamiServices::filitreleme($sehir, $ilceid,$isim);


        return view('layouts.index', ['camiler' => $camiler]);
    }

     else {
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
