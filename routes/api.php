<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//test api
Route::get('/test-api',function (){
    return ['message' => 'hello from Ajo'];
});

//
//from Item Table
//

//1-getAllItems

Route::get('/getAllItems',[Controllers\ControllerItems::class,'allItems']);
//insertNewItem
Route::post('/insertNewItem',[Controllers\ControllerItems::class,'store']);
//getItemById
Route::post('/getItemById',[Controllers\ControllerItems::class,'show']);
//getItemByName
Route::post('/getItemByName',[Controllers\ControllerItems::class,'getItemByName']);
//getItemByName
Route::get('/getItemExpire',[Controllers\ControllerItems::class,'getItemExpire']);
//getItemByName size type
Route::get('/getItemByNameSizeT',[Controllers\ControllerItems::class,'getItemByNamSizTyp']);

//getItemByType
Route::post('/getItemByType',[Controllers\ControllerItems::class,'getByType']);
//Update QNT Of Item Using Id
Route::post('/updateItemQnt',[Controllers\ControllerItems::class,'update']);
//getIdByName
Route::post('/getIdByName',[Controllers\ControllerItems::class,'getItemId']);
//delete item by id
Route::post('destroyItem',[Controllers\ControllerItems::class,'destroy']);
//
//   Losses
//Create Loss Item
Route::post('createLossItem',[Controllers\ControllerLosses::class,'createLossItem']);
//gets Items
Route::post('getLossItems',[Controllers\ControllerLosses::class,'getLossItems']);

//save Img for loss bottle
Route::post('storeLossImg',[Controllers\ControllerLosses::class,'storeImg']);
//get lossImg byloosId
Route::post('getImgSrc',[Controllers\ControllerLosses::class,'getImgSrc']);

//get lossImg by src
Route::get('getLossImg',[Controllers\ControllerLosses::class,'getLossImg']);

//
// from Date Table
//
//get All Dates
Route::get('/getAllDates',[Controllers\ControllerDate::class,'getAllDates']);
//get Date Number By Date
Route::post('/getDateNoByDate',[Controllers\ControllerDate::class,'getDateNo']);
//create New Date
Route::post('/createNewDate',[Controllers\ControllerDate::class,'createNewDate']);

//                  invoices

//create new invoice by dateId
Route::post('createInv',[Controllers\ControllerInvoices::class,'createInv']);
//create invoice info by invId
Route::post('createInvInfo',[Controllers\ControllerInvoices::class,'createInvInfo']);
//get invoices by date
Route::post('getInv',[Controllers\ControllerDate::class,'getInvByDate']);
// get invoice info by invId
Route::post('getInvInfo',[Controllers\ControllerInvoices::class,'getInvInfo']);
//get Date Number By Date
Route::post('destroyInv',[Controllers\ControllerInvoices::class,'destroyInv']);


//                   Manifest

//create new manifest by dateId
Route::post('createMFest',[Controllers\ControllerManifests::class,'createMFest']);
//get manifest by dateId
Route::post('getMFest',[Controllers\ControllerDate::class,'getMfByDate']);
//create new maniFestInfo by dateId
Route::post('createMFInfo',[Controllers\ControllerManifests::class,'createMfInfo']);
//get MFestInfo By mfId
Route::post('getMFInfo',[Controllers\ControllerManifests::class,'getMFestInfo']);
//destroy MFest by mfId
Route::post('destroyMFest',[Controllers\ControllerManifests::class,'destroyMFest']);



//
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
