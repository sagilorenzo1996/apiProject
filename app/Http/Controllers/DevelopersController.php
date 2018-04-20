<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Developer;
use Illuminate\Support\Facades\DB;

class DevelopersController extends Controller
{
    public function show(Developer $developer)
    {
        return $developer;
    }

    public function login(Request $request)
    {
         $id=$request->id;
         $password = DB::table('developers')->where('id', '=', $id)->value('password');

        if($password===$request->password){
            return response()->json("success", 201);
        }
        else{
            return response()->json("fail",201);
        }
    }
}
