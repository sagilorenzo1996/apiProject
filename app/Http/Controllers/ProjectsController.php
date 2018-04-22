<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
        // $data=DB::table('contribution')
        // ->whereRaw('managerId = '.$request->id, [200])
        // ->get();
        $data=DB::select(DB::raw("SELECT * FROM contribution"));
        return response()->json($data,200);
    }
}
