<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;
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
        $projecten = Project::all();
        $active = 'projecten';
        return view('project.index', compact('projecten','active'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($project)
    {
        $milestones = $project->milestones;
        return view('project.show', compact('project', 'milestones'));
    }
}
