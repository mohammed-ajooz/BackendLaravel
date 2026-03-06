<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class ControllerItems extends Controller
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

    public  function allItems(){
        $items = Item::orderBy('itemType','desc')->get();
        return  $items;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exist=Item::where('itemName',$request->itemname )->where('itemSize',$request->itemsize )->get();
        if (!empty($exist[0])) {

            return 'exist';
        } else {
            $newItem = new Item;
            $newItem->itemName = $request->itemname;
            $newItem->itemSize = $request->itemsize;
            $newItem->itemBoxBottles = $request->itemboxbottles;
            $newItem->itemQNT = $request->itemqnt;
            $newItem->itemExBottle = $request->itemexbottle;
            $newItem->itemExpDate = $request->itemexpdate;
            $newItem->itemLastUpdate = $request->itemlastupdate;
            $newItem->itemType = $request->itemtype;
            $result = $newItem->save();
            if ($result) {
                return true;
            } else {
                return false;

            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $item = Item::find($request->itemid);
        return  $item;
    }
    public function getByType(Request $request)
    {
        $item = Item::where('itemType',$request->itemtype)->orderBy('itemName')->get();
        return  $item;
    }

    public function getItemByNamSizTyp(Request $request)
    {
        $item = Item::where('itemType',$request->itemtype)->where('itemName',$request->itemname )->where('itemSize',$request->itemsize )->get();
        return  $item;
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
    public function update(Request $request)
    {
        $result = Item::where('itemId',$request->itemid)->update(['itemQNT'=>$request->newqnt,'itemExBottle'=>$request->newexbottle]);
        if($result){
            return true;
        }else{
            return false;

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = item::destroy( $request->itemid);
        if($result){
            return true;
        }else{
            return false;

        }
    }

public  function getItemId(Request $request){
        if($request->itemsize != null){
            $id = Item::where('itemName', $request->itemname)
                ->where('itemSize', $request->itemsize)
                ->get('itemId');
            return $id;
        }else {
            $id = Item::where('itemName', $request->itemname)->get('itemId');
            return $id;
        }

}

    public  function getItemByName(Request $request){

            $item = Item::orWhere('itemName','like','%'. $request->itemname .'%')->get();
             return $item;
     }

    public  function getItemExpire( ){

        $item = Item:: Where('itemExpDate','!=',null )->get()->sortBy('itemExpDate');
        return $item;
    }


}

