<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\item;
use PDO;

class itemController extends Controller
{
    //
    function showall(){
        return item::all();
    }
    function form(){
        return view('form');
    }
   public function creater(Request $req){
        $data=new item;
        $data->name=$req->name;
        $data->price=$req->price;
        $data->save();
      return 'data is saved';
    }
    function showeach($id){
     $data=item::find($id);
     return $data;
    }
    function deleteone($id){
        $data=item::find($id);
        $result=$data->delete();
      if($result){
        return 'deleted';
      }
      else{
          return 'not deleted';
      }
    }

  function update($id,Request $req){
     $data=item::find($id);
     $data->name=$req->name;
     $data->price=$req->price;
     $data->save();
     return 'data updated';
      }

    }
}
