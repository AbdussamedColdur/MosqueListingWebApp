<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\CamiServices;
use App\Models\logModel;
use App\Helpers\UserSystemInfoHelper;

class Camii extends Controller
{
    public function goster2()
    {
        $this->storeLog();
        $camiler = CamiServices::getMosquesByCity2();
        return view('layouts.index',['camiler'=>$camiler]);
    }

    public function detayli($id)
    {
        $this->storeLog();
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
                $this->storeLog();
                return view('layouts.index', ['camiler' => $camiler]);
            }
            else {
                $sehir = null;
                $ilce = null;
                $isim=$data['ad'];
                $camiler = CamiServices::filitreleme($sehir, $ilce,$isim);
                $this->storeLog();
                return view('layouts.index', ['camiler' => $camiler]);
            }
        }
        else{
            $this->storeLog();
            return view('layouts.index');
        }
    }

    public function storeLog(){

        $getip = UserSystemInfoHelper::get_ip();
        $getbrowser = UserSystemInfoHelper::get_browsers();
        $getdevice = UserSystemInfoHelper::get_device();
        $getos = UserSystemInfoHelper::get_os();

        $log = new logModel;
        $log->ip_address = $getip;
        $log->url = url()->current();
        $log->islemTürü = 1;
        $log->platform = $getos;
        $log->device = $getdevice;
        $log->browser = $getbrowser;
        $log->save();

        return 'veri kaydedildi';
    }
}
