<?php

namespace App\Http\Controllers;

use App\Models\görüntülemeLog;
use App\Models\jsonLogModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\CamiServices;
use App\Models\logModel;
use App\Models\filtreLog;
use App\Helpers\UserSystemInfoHelper;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;


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
        $this->jsonLog($camiler);
        $this->görüntülemeLog($isim);
        $this->storeLog();

        return view('layouts.infoPage', ['camiler' => $camiler]);

    }

    public function goster(Request $request)
    {
        $data = $request->all();

        if (!empty($data)) {

            if ((!empty($data['il']) && !empty($data['ilce']))) {
                if ($data['ilce'] == "ilce secin") {
                    $il = $data['il'];
                    $il_no = DB::table("il")->where('isim', 'like', "$il")->select('il_no')->get();
                    $ilno = $il_no[0]->il_no;
                    $camiler = CamiServices::filitreleme2($ilno);

                    return view('layouts.index', ['camiler' => $camiler]);
                } else {

                    $ilce = $data['ilce'];
                    $ilce = DB::table("İlceler")->where('name', 'like', "$ilce")->select('id')->get();

                    $ilceid = $ilce[0]->id;

                    $sehir = $data['il'];

                    $isim = $data['ad'];

                    $camiler = CamiServices::filitreleme($sehir, $ilceid, $isim);


                    return view('layouts.index', ['camiler' => $camiler]);
                }
            } else {
                $sehir = null;
                $ilce = null;
                $isim = $data['ad'];

                $camiler = CamiServices::filitreleme($sehir, $ilce, $isim);

                return view('layouts.index', ['camiler' => $camiler]);

            }
        } else {


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

    public function görüntülemeLog($camiAdi)
    {

        $görüntülemeLog = görüntülemeLog::firstOrCreate(
            ['cami_adi' => $camiAdi],
            ['görüntüleme_sayisi' => 0]
        );

        $görüntülemeLog->increment('görüntüleme_sayisi');

    }

    public function jsonLog($jsonData)
    {
        $log = new jsonLogModel;

        $jsonString = json_encode($jsonData);
        $content = $jsonString;
        $timestamp = now()->format('YmdHis');
        $filePath = storage_path("asset('../../../public/jsonLog/logs.json");

        File::put($filePath, $content);

        $log->log_mesajı = "Json'dan veri çekildi. Çekilen Veriler saklandı.";
        $log->save();

    }
}
