<?php

namespace App\Providers;

use App\Http\Controllers\Camii;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

use Intervention\Image\Facades\Image;
class CamiServices extends ServiceProvider
{
    public static  function getDetay($id)

    {
        $dnm = file_get_contents("http://localhost:3000/camiler");
  $json = json_decode($dnm, true);


$filteredMosques = [];
foreach ($json as $camii) {
if($camii['Id']==$id){

        $ilceid = $camii['Id'];

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

}




return $filteredMosques;
    }

    public static  function filitreleme($city,$town,$name)
    {
        $dnm = file_get_contents("http://localhost:3000/camiler");
        $json = json_decode($dnm, true);
        $filteredMosques = [];

        foreach($json as $dnm){
            $ilceid=$dnm['Id'];
            $ilcename=DB::table('İlceler')->where('cityid', $ilceid)->get();
            $ilad=DB::table('İlceler')->where('name', $ilceid)->get();
                    }

        if((!empty($city)&&!empty($town))||!empty($name)){


                if ($city == null && $town == null) {

                    $searchName = strtolower(str_replace(' ', '', $name));


                    foreach ($json as $camii) {
                        $ilceid = $camii['Id'];


        $ilcenameResult = DB::table('İlceler')->where('id', $ilceid)->select('name')->get();
        $ilcename = $ilcenameResult[0]->name;


        $ilIdResult = DB::table('İlceler')->where('id', $ilceid)->select('cityid')->get();

        $ilId = $ilIdResult[0]->cityid;


        $ilnameResult = DB::table('il')->where('il_no', $ilId)->select('isim')->get();
        $ilname = $ilnameResult[0]->isim;

        $camii['sehir'] = $ilname;
        $camii['Town'] = $ilcename;

                        $mosqueName = strtolower(str_replace(' ', '', $camii['Name']));

                        if (strpos($mosqueName, $searchName) !== false) {

                            $filteredMosques[] = $camii;

                        }
                    }

                    return $filteredMosques;
                }




            else{
                foreach ($json as $camii) {
                    $ilceid = $camii['Id'];


                    $ilcenameResult = DB::table('İlceler')->where('id', $ilceid)->select('name')->get();
                    $ilcename = $ilcenameResult[0]->name;


                    $ilIdResult = DB::table('İlceler')->where('id', $ilceid)->select('cityid')->get();

                    $ilId = $ilIdResult[0]->cityid;


                    $ilnameResult = DB::table('il')->where('il_no', $ilId)->select('isim')->get();
                    $ilname = $ilnameResult[0]->isim;

                    $camii['sehir'] = $ilname;
                    $camii['Town'] = $ilcename;
                    if ($camii['sehir'] === $city && $camii['Town']===$town||$camii['Name']==$name) {
                        $filteredMosques[] = $camii;
                    }
                }

                return $filteredMosques;

            }
        }
        else{

            return $filteredMosques;
        }

    }


    public static  function getMosquesByCity2()

    {
        $dnm = file_get_contents("http://localhost:3000/camiler");
$json = json_decode($dnm, true);

//dd($json);
$filteredMosques = [];
foreach ($json as $camii) {


        $ilceid = $camii['Id'];

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
