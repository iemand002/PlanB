<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Milestone;
use App\Project;
use App\Thema;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $themas = Thema::all();

        return view('admin.project.index', compact('projecten', 'themas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themas = Thema::lists('naam', 'id');
        return view('admin.project.create', compact('themas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {
        $project = new Project();
        $project->naam = $request->input('projectnaam');
        $project->beschrijving = $request->input('projectbeschrijving');
        $project->thema_id = $request->input('thema_id');
        $project->user_id = Auth::id();
        $project->publish_from = $request->input('project_publish_from');
        $project->publish_till = $request->input('project_publish_till');
        $project->save();

        $milestone = new Milestone();
        $milestone->naam = $request->input('naam');
        $milestone->locatie = $request->input('locatie');
        $milestone->beschrijving = $request->input('beschrijving');
        $milestone->afbeelding = $request->input('afbeelding');
//        $milestone->publish_from = $request->input('publish_from'); //auto fill
        $milestone->publish_till = $request->input('publish_till');
        $milestone->project_id = $project->id;
        $milestone->user_id = Auth::id();
        $milestone->save();

        if($request->input('submit')=='nieuw'){
            return redirect()->back()->with(['success' => 'Project "' . $project->naam . '" is opgeslagen']);
        }else {
            return redirect(route('admin.projecten.index'))->with(['success' => 'Project "' . $project->naam . '" is opgeslagen']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($project)
    {
        return view('admin.project.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($project)
    {
        $themas = Thema::lists('naam', 'id');
        $project->projectnaam = $project->naam;
        $project->projectbeschrijving = $project->beschrijving;
        $project->project_publish_from=$project->publish_from;
        $project->project_publish_till=$project->publish_till;
        return view('admin.project.edit', compact('project', 'themas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectUpdateRequest $request, $project)
    {
        $project->naam = $request->input('projectnaam');
        $project->beschrijving = $request->input('projectbeschrijving');
        $project->thema_id = $request->input('thema_id');
        $project->user_id = Auth::id();
        $project->publish_from = $request->input('project_publish_from');
        $project->publish_till = $request->input('project_publish_till');
        $project->save();

        return redirect(route('admin'))->with(['success' => 'Project "' . $project->naam . '" is gewijzigd']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
