<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manager;
use Illuminate\Support\Facades\DB;

class ManagersController extends Controller
{
    public function login(Request $request)
    {
         $id=$request->id;
         $password = DB::table('managers')->where('id', '=', $id)->value('password');

        if($password===$request->password){
            return response()->json("success", 201);
        }
        else{
            return response()->json("fail",201);
        }
    }
}
