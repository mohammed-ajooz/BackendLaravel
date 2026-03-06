<?php

namespace App\Http\Controllers;

use App\Models\Manifest;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceInfo;

use Illuminate\Support\Facades\Http;

class ControllerInvoices extends Controller
{
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
    public function createInv(Request $request)
    {
        $exsit=Invoice::where('invNumber',$request->invnumber)->get();

       if(!empty($exsit[0])){
           return ['result' => 'exist'];
       }else{
           $inv = new Invoice();

           $inv->dateId=$request->dateid;
           $inv->invNumber=$request->invnumber;
           $inv->invCustomer=$request->invcustomer;
           $inv->invToCity=$request->invtocity;
           $result = $inv->save();

           if($result){
               return ['invId'=>$inv->invId];
           }else{
               return ['result' => false];

           }

       }

    }


    // insert invoice details
    public  function createInvInfo(Request $request){

            $inv = new InvoiceInfo();
            $inv->invId = $request->invid;
            $inv->itemName = $request->itemname;
            $inv->itemDesc = $request->itemdesc;
            $inv->itemQNT = $request->itemqnt;
            $inv->itemExBottle = $request->itemexbottle;
            $result = $inv->save();

        if($result){
           return ['result'=>true];
        }else {
            return ['result'=>false];
       }




    }


    public  function getInvInfo(Request $request){

        $exist=Invoice::where('invId',$request->invid)->get();

        if(!$exist->isEmpty()){
              $result = Invoice::find($request->invid)->inv_info;
                 return $result;
          }else{
        return  false;
     }

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
    public function destroyInv(Request $request)
    {
        $output='';
        $exist=Invoice::where('invId',$request->invid)->get();

        if(!$exist->isEmpty()) {
            $result = InvoiceInfo::destroy($request->invid);
            if ($result) {
                $output='InvInfo +';
            }
            }

         $result2 = Invoice::destroy($request->invid);
           if($result2){
               $output=$output .'invoice is delete';
           }else{
               $output=false;
           }

        return $output;
    }
}
