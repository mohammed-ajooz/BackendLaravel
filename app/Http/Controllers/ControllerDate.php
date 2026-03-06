<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Date;
use function PHPUnit\Framework\isEmpty;

class ControllerDate extends Controller
{

    public  function getAllDates(){
        $dates = Date::all()->sortBy('dateDay');
        return $dates->values();
    }

    public function getDateNo(Request $request){
        $daydate=$request->date;

        $dateno = Date::where('dateDay',$daydate)->get('dateId');
        if(isset($dateno[0])){
            return $dateno;
        }else{
            $dateno=$this->createNewDate($request);
            if($dateno){
                $dateno2 = Date::where('dateDay',$daydate)->get('dateId');
                return $dateno2;
            }
        }

    }
    public function createNewDate(Request $request)
    {
        $exist=Date::where('dateDay',$request->date)->get('dateDay');
        if (!empty($exist[0])) {
            return "EXIST";
        } else {
            $newDate =  new Date();
            $newDate->dateDay=$request->date;
            $result= $newDate->save();

            if($result){
                return ['dateId'=> $newDate->dateId];
            }
            return false;
        }
    }


public  function getInvByDate(Request $request){
    $dateId=$this->getdateno($request);
   if(!empty($dateId)){
       $result = Date::find($dateId[0]->dateId)->date_invs;
       return $result;
   }else{
       return [];
   }

}


public function getMfByDate(Request $request){
        $dateId=$this->getdateno($request);
    if(!empty($dateId[0])) {
        $result = Date::find($dateId[0]->dateId)->date_mfest;

        return $result;
    }else{
        return [];
    }
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
    public function destroy($id)
    {
        //
    }
}
