<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Manifest;
use App\Models\ManifestInfo;
class ControllerManifests extends Controller
{

    public function getAllMFest(){
        $result='[';
        $date=Date::all()->sortBy('dateDay');
        foreach ($date as $date1){
            $result=$result.'"'.$date1->dateDay.'"';
            $mfs=Manifest::where('dateId',$date1->dateId)->get();
            foreach ($mfs as $mf){
                $result=$result. $mf;

            }

        }
        $result=$result.']';
return $result;

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMFest(Request $request)
    {
        $exsit=Manifest::where('mfNumber',$request->mfnumber)->get();

        if(!empty($exsit[0])){
            return ['result' => 'exist'];
        }else {

            $mnf = new Manifest();
            $mnf->dateId = $request->dateid;
            $mnf->mfNumber = $request->mfnumber;
            $mnf->mfCarCard1 = $request->mfcarcard1;
            $mnf->mfCarCard2 = $request->mfcarcard2;
            $result = $mnf->save();

            if ($result) {
                return ['mfId' => $mnf->mfId];
            } else {
                return false;
            }
        }

    }


    public function createMfInfo(Request $request)
    {
        $mnf = new ManifestInfo();
        $mnf->mfId = $request->mfid;
        $mnf->itemName = $request->itemname;
        $mnf->itemSize = $request->itemsize;
        $mnf->itemBoxBottles = $request->itemboxbottles;
        $mnf->itemQNT = $request->itemqnt;
        $mnf->itemExBottle = $request->itemexbottle;
        $mnf->itemExpDate = $request->itemexpdate;
        $mnf->itemType = $request->itemtype;
        $result = $mnf->save();

        if($result){
            return true;
        }else {
            return false;
        }

    }

    public function getMFestInfo(Request $request){
        $result = Manifest::find($request->mfId)->mf_info;
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMFest(Request $request)
    {
        $output='';
        $exist=Manifest::where('invId',$request->mfid)->get();

        if(!$exist->isEmpty()) {
            $result = ManifestInfo::destroy($request->mfid);
            if ($result) {
                $output='MFestInfo +';
            }
        }

        $result2 = Manifest::destroy($request->invid);
        if($result2){
            $output=$output .'MFest is delete';
        }else{
            $output=false;
        }

        return $output;
    }
}
