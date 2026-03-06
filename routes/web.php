<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Models\Item;
use App\Models\Date;
use App\Models\Invoice;
Route::get('/', function () {
    return  view('welcome');
});

//test 1
Route::get('getitems', function () {
 $items = Item::orderBy('itemName','desc')->get();
  return  $items;
});

//test 2
Route::get('find', function () {
 $find = Item::where('itemName','hite extra ')->get();
  return  $find;
});

/*
//test 3 insert method 1
Route::get('insert', function () {
$it =new item;
$it->itemName='red label';
$it->itemSize='200';
$it->itemBoxBottles='24';
$it->itemQNT='2349';
$it->itemExBottle='20';
$it->itemLastUpdate='2021-4-23';
$it->save();
});
*/

//test 3 insert method 2
Route::get('insert', function () {
$it =new Item;
$it->itemName='hite extra';
$it->itemSize='500';
$it->itemBoxBottles='24';
$it->itemQNT='1878';
$it->itemExBottle='0';
    $it->itemExpDate='2021-4-28';
$it->itemLastUpdate='2021-4-29';
    $it->itemType='beer';
$it->save();
});

//test 3 ubdate
Route::get('update', function () {
Item::where('itemId','6')->update(['itemQNT'=>'100']);
});

//test 3 delete
Route::get('delete', function () {
//item::destroy(3);
Item::where('itemQNT','>',1000)->delete();

});

//get invoice by date
Route::get('invoice/{id}', function ($id) {
    $result = Date::find($id)->date_invs;
return $result;
});



