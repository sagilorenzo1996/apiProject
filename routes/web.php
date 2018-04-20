<?php

use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{id}', function ($id) {
    $project=App\Project::all();
    $task=DB::table('tasks')
    ->leftJoin('projects', 'projects.id', '=', 'tasks.projectId')
    ->select('tasks.*', 'projects.name')
    ->where('developerId',$id)
    ->get();
    return view('developer',['developerId'=>$id,'project'=>$project,'task'=>$task]);
});
