<?php

namespace App\Providers;

use App\Http\Controllers\Camii;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

use Intervention\Image\Facades\Image;
use PhpParser\Node\Stmt\TryCatch;
use Spatie\FlareClient\Http\Exceptions\NotFound;
use Termwind\Components\Dd;

class CamiServices extends ServiceProvider
{
    public static  function getDetay($id)

    {
        $dnm = file_get_contents("http://172.16.106.161/Mosque/GetMosquesAsJson/$id");
        $json = json_decode($dnm, true);


        $filteredMosques = [];


        $ilceid = $json['TownId'];

        $ilcenameResult = DB::table('İlceler')->where('id', $ilceid)->select('name')->get();
        $ilcename = $ilcenameResult[0]->name;


        $ilIdResult = DB::table('İlceler')->where('id', $ilceid)->select('cityid')->get();

        $ilId = $ilIdResult[0]->cityid;


        $ilnameResult = DB::table('il')->where('il_no', $ilId)->select('isim')->get();

        $ilname = $ilnameResult[0]->isim;

        $json['sehir'] = $ilname;
        $json['Town'] = $ilcename;

        $filteredMosques[] = $json;







        return $filteredMosques;
    }

    public static  function filitreleme($city, $town, $name)
    {
        $filteredMosques = [];

        if ((!empty($city) && !empty($town)) || !empty($name)) {


            if ($city == null && $town == null) {
                $url = "http://172.16.106.161/Mosque/GetMosquesByNameAsJson/$name";
                $dnm = @file_get_contents($url);
                if ($dnm == false) {
                    return $filteredMosques;
                } else {
                    $json = json_decode($dnm, true);

                    foreach ($json as $camii) {

                        $ilceid = $camii['TownId'];


                        $ilcenameResult = DB::table('İlceler')->where('id', $ilceid)->select('name')->get();
                        $ilcename = $ilcenameResult[0]->name;


                        $ilIdResult = DB::table('İlceler')->where('id', $ilceid)->select('cityid')->get();

                        $ilId = $ilIdResult[0]->cityid;


                        $ilnameResult = DB::table('il')->where('il_no', $ilId)->select('isim')->get();
                        $ilname = $ilnameResult[0]->isim;

                        $camii['sehir'] = $ilname;
                        $camii['Town'] = $ilcename;

                        $filteredMosques[] = $camii;
                    }

                    return $filteredMosques;
                }
            } else {
                $url = "http://172.16.106.161/Mosque/GetByTownsMosquesAsJson/$town";
                $dnm = @file_get_contents($url);
                if ($dnm == false) {
                    return $filteredMosques;
                } else {

                    $json = json_decode($dnm, true);
                    $filteredMosques = [];

                    foreach ($json as $camii) {



                        $ilcenameResult = DB::table('İlceler')->where('id', $town)->select('name')->get();
                        $ilcename = $ilcenameResult[0]->name;


                        $ilIdResult = DB::table('İlceler')->where('id', $town)->select('cityid')->get();

                        $ilId = $ilIdResult[0]->cityid;


                        $ilnameResult = DB::table('il')->where('il_no', $ilId)->select('isim')->get();
                        $ilname = $ilnameResult[0]->isim;

                        $camii['sehir'] = $ilname;
                        $camii['Town'] = $ilcename;

                        $filteredMosques[] = $camii;
                    }

                    return $filteredMosques;
                }
            }
        } else {

            return $filteredMosques;
        }
    }


    public static  function getMosquesByCity2()

    {
        $dnm = file_get_contents("http://172.16.106.161/Mosque/GetRandomMosquesAsJson/5");
        $json = json_decode($dnm, true);

        //dd($json);
        $filteredMosques = [];
        foreach ($json as $camii) {


            $ilceid = $camii['TownId'];

            $ilcenameResult = DB::table('İlceler')->where('id', $ilceid)->select('name')->get();
            $ilcename = $ilcenameResult[0]->name;


            $ilIdResult = DB::table('İlceler')->where('id', $ilceid)->select('cityid')->get();

            $ilId = $ilIdResult[0]->cityid;


            $ilnameResult = DB::table('il')->where('il_no', $ilId)->select('isim')->get();

            $ilname = $ilnameResult[0]->isim;

            $camii['sehir'] = $ilname;
            $camii['Town'] = $ilcename;

            $filteredMosques[] = $camii;
        }

        return $filteredMosques;
    }
}
