<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;
use App\Thema;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projecten = Project::published()->orderBy('publish_from','desc')->get();
        $themas=Thema::has('projecten','>',0)->orderBy('naam')->get();
        $active = 'projecten';
        return view('project.index', compact('projecten','active','themas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($project)
    {
        return view('project.show', compact('project'));
    }
}
