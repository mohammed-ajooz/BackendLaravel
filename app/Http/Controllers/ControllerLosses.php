<?php

namespace App\Http\Controllers;

use App\Models\Loss;
use App\Models\lossImage;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;


class ControllerLosses extends Controller
{

    public function createLossItem(Request $request){
        $newItem=new Loss();
        $newItem->dateId=$request->dateid;
        $newItem->itemName=$request->itemname;
        $newItem->itemType=$request->itemtype;
        $newItem->itemDesc=$request->itemdesc;
        $newItem->itemExBottle=$request->itemexbottle;
        $result=$newItem->save();
        if($result){
            return $newItem->lossId;
        }else{
            return false;
        }
    }

    public function getLossItems(){
        $lossItems=Loss::get()->sortBy('dateId');
        return $lossItems;

    }

    public function storeImg(Request $request){

        $lossid=$request->lossid;
        $file=$request->file;

        if (!isset($file)) {
            return response()->json(['error'=>'erroeee'], 401);
        }


        if ($files = $request->file('file')) {

            //store file into document folder
            $file = $request->file->store('public/images');

            //store your file into database
            $img = new lossImage();
            $img->imgSrc = $file;
            $img->lossId = $request->lossId;
            $img->save();

            return response()->json([
                "success" => true
//                ,
//                "message" => "File successfully uploaded",
//                "file" => $file
            ]);

        }

    }

    public function getImgSrc(Request $request)
{
    $lossId = $request->lossid;
    $strPath = lossImage::where('lossId', $lossId)->get('imgSrc');
    return $strPath;
}

Public function getLossImg(Request $request){
        $imgName=$request->imgname;
        return Response()->download(storage_path('app/'.$imgName) );

}

}
