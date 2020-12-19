<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;

class EditController extends Controller
{
    //
    function edit($id){
        $data=item::find($id);
        return view('edit',['data'=>$data]);
    }
    function update(Request $req,$id){
        $data=item::find($id);
        $data->name=$req->name;
        $data->price=$req->price;
        $result=$data->save();
        if($result){
            return redirect('/home');
        }
        else{
          return ('error');
        }
    }
}
