<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagersController extends Controller
{
    public function login(Request $request)
    {
        $id=$request->id;
         $password = DB::table('developers')->where('id', '=', $id)->value('password');

        if($password===$request->password){
            return response()->json($request->id, 201);
        }
        else{
            return response()->json(null,201);
        }
    }
}
