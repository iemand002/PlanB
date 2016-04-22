<?php

namespace App\Http\Controllers;

use App\Milestone;
use App\Project;
use App\Thema;
use Illuminate\Http\Request;

use App\Http\Requests;

class APIController extends Controller
{
    function getProject($id){
        return Milestone::where('project_id',$id)->orderBy('created_at','desc')->with('project')->with('thema')->first();
    }
    
    function getAlleThemas(){
        return Thema::all();
    }
}
