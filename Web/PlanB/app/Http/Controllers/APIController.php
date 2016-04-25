<?php

namespace App\Http\Controllers;

use App\Milestone;
use App\Project;
use App\Thema;
use Illuminate\Http\Request;

use App\Http\Requests;

class APIController extends Controller
{
    function getProject($projectid){
        return Milestone::where('project_id',$projectid)->orderBy('created_at','desc')->with('project')->with('project.thema')->first();
    }
    
    function getAlleThemas(){
        return Thema::all();
    }
    
    function getProjectenOpThema($themaid){
        return Project::where('thema_id',$themaid)->with('milestones')->get();
    }
    
    function getProjecten(){
        return Project::with('thema')->get();
    }
    
    function likeMilestone($milestoneid){
        $milestone=Milestone::find($milestoneid);
        $milestone->likes+=1;
        $milestone->save;
    }
    
    function dislikeMilestone($milestoneid){
        $milestone=Milestone::find($milestoneid);
        $milestone->dislikes+=1;
        $milestone->save;
    }
}
