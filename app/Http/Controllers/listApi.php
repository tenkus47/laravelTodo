<?php

namespace App\Http\Controllers;
use App\Models\item;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class listApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {  $list=DB::table('items')->where('userid',$r->id)->get();
        if($list){
            return $list;
        }else{
            return 0;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $data=new item;
        $no=1;
        while(item::find($no)){
            $no=$no+1;
        }
        $data->id=$no;
        $data->userid=$req->userid;
        $data->name=$req->name;
        $data->price=$req->price;
         $data->save();
      return 'data is saved';
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
        $data=item::find($id);
        return $data;
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
        $data=item::find($id);
        
        return 'data updated';

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        if (item::where('id', $id)->exists()) {
            $student = item::find($id);
            $student->name = is_null($req->name) ? $student->name : $req->name;
            $student->price = is_null($req->price) ? $student->price : $req->price;
            $result=$student->save();
            if($result)
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
            
        }
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
        $data=item::find($id);
        $result=$data->delete();
      if($result){
        return 'deleted';
      }
      else{
          return 'not deleted';
      }
    }
    
    
}
