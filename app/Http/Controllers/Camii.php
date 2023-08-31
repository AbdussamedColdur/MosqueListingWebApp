<?php

namespace App\Http\Controllers;

use App\Models\görüntülemeLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\CamiServices;
use App\Models\logModel;
use App\Models\filtreLog;
use App\Helpers\UserSystemInfoHelper;
use Jenssegers\Agent\Agent;


class Camii extends Controller
{
    public function goster2()
    {
        $this->storeLog();
        $camiler = CamiServices::getMosquesByCity2();
        return view('layouts.index', ['camiler' => $camiler]);
    }

    public function detayli($id)
    {
        $camiler = CamiServices::getDetay($id);
        $isim = $camiler[0]["Name"];

        $this->görüntülemeLog($isim);
        $this->storeLog();

        return view('layouts.infoPage', ['camiler' => $camiler]);
    }

    public function goster(Request $request)
    {
        $data = $request->all();
        dd($data);
        if (!empty($data)) {
            if ((!empty($data['il']) && !empty($data['ilce']))) {
                $sehir = $data['il'];
                $ilce = $data['ilce'];
                $isim = $data['ad'];
                $camiler = CamiServices::filitreleme($sehir, $ilce, $isim);
                $this->storeLog();
                return view('layouts.index', ['camiler' => $camiler]);
            } else {
                $sehir = null;
                $ilce = null;
                $isim = $data['ad'];
                $camiler = CamiServices::filitreleme($sehir, $ilce, $isim);
                $this->storeLog();
                return view('layouts.index', ['camiler' => $camiler]);
            }
        } else {
            $this->storeLog();
            return view('layouts.index');
        }
    }

    public function storeLog()
    {

        $getip = UserSystemInfoHelper::get_ip();
        $getdevice = UserSystemInfoHelper::get_device();
        $getos = UserSystemInfoHelper::get_os();

        $browser = \Agent::browser();

        $log = new logModel;
        $log->ip_address = $getip;
        $log->url = url()->current();
        $log->islemTürü = 1;
        $log->platform = $getos;
        $log->device = $getdevice;
        $log->browser = $browser;
        $log->save();
    }

    public function filtreLog()
    {
        $log = new filtreLog;
        $log->cami_adi = '';
        $log->il_adi = '';
        $log->ilce_adi = '';
        $log->save();
    }

    public function görüntülemeLog($camiAdi)
    {

        $görüntülemeLog = görüntülemeLog::firstOrCreate(
            ['cami_adi' => $camiAdi],
            ['görüntüleme_sayisi' => 0] // Set a default value for görüntüleme_sayisi
        );

        $görüntülemeLog->increment('görüntüleme_sayisi');

    }
}
