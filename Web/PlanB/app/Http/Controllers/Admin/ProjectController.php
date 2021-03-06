<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Milestone;
use App\Project;
use App\Section;
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
        $active='a-projecten';

        return view('admin.project.index', compact('projecten', 'themas','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themas = Thema::orderBy('naam')->lists('naam', 'id');
        return view('admin.project.create', compact('themas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {
        $project = new Project();
        $this->saveProject($request, $project);

        $milestone = new Milestone();
        $this->saveMilestone($request, $milestone, $project);

        $positions = explode(',', $request->input('positions'));
        for ($i = 1; $i <= $request->input('count'); $i++) {
            if (!$request->has('del-' . $i)) {
                $section = new Section();
                $this->saveSection($request, $i, $section, $positions, $milestone);
            }
        }

        if($request->input('submit')=='nieuw'){
            return redirect()->back()->with(['success' => 'Project "' . $project->naam . '" is opgeslagen']);
        }else {
            return redirect(route('admin.projecten.index'))->with(['success' => 'Project "' . $project->naam . '" is opgeslagen']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $project
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($project)
    {
        return view('admin.project.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $project
     * @return \Illuminate\Http\Response
     * @internal param int $id
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
     * @param ProjectUpdateRequest|Request $request
     * @param $project
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(ProjectUpdateRequest $request, $project)
    {
        $this->updateProject($request, $project);

        return redirect(route('admin.project.show',$project->slug))->with(['success' => 'Project "' . $project->naam . '" is gewijzigd']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $project
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($project)
    {
        foreach ($project->milestones as $milestone) {
            foreach ($milestone->sections as $section){
                $section->delete();
            }
            foreach ($milestone->vragen as $vraag){
                foreach ($vraag->antwoorden as $antwoord){
                    $antwoord->delete();
                }
                $vraag->delete();
            }
            $milestone->delete();
        }
        $project->delete();

        return redirect(route('admin.projecten.index'))->with(['success' => 'Project "' . $project->naam . '", met alle bijhorende milestones en vragen, verwijderd!']);
    }

    /**
     * @param ProjectStoreRequest $request
     * @param $i
     * @param $section
     * @param $positions
     * @param $milestone
     */
    private function saveSection(ProjectStoreRequest $request, $i, $section, $positions, $milestone)
    {
        $section->tekst = $request->input('tekst-' . $i);
        $section->url = $request->input('url-' . $i);
        $section->position = array_search($i, $positions);
        $section->type_id = $request->input('type_id-' . $i);
        $section->milestone_id = $milestone->id;
        $section->save();
    }

    /**
     * @param ProjectUpdateRequest $request
     * @param $project
     */
    private function updateProject(ProjectUpdateRequest $request, $project)
    {
        $project->naam = $request->input('projectnaam');
        $project->beschrijving = $request->input('projectbeschrijving');
        $project->thema_id = $request->input('thema_id');
        $project->user_id = Auth::id();
        $project->publish_from = $request->input('project_publish_from');
        $project->publish_till = $request->input('project_publish_till');
        $project->save();
    }

    /**
     * @param ProjectStoreRequest $request
     * @param $project
     */
    private function saveProject(ProjectStoreRequest $request, $project)
    {
        $project->naam = $request->input('projectnaam');
        $project->beschrijving = $request->input('projectbeschrijving');
        $project->thema_id = $request->input('thema_id');
        $project->user_id = Auth::id();
        $project->publish_from = $request->input('project_publish_from');
        $project->publish_till = $request->input('project_publish_till');
        $project->save();
    }

    /**
     * @param ProjectStoreRequest $request
     * @param $milestone
     * @param $project
     */
    private function saveMilestone(ProjectStoreRequest $request, $milestone, $project)
    {
        $milestone->naam = $request->input('naam');
        $milestone->locatie = $request->input('locatie');
        $milestone->coordinaten = $request->input('coordinaten');
        $milestone->beschrijving = $request->input('beschrijving');
        $milestone->afbeelding = $request->input('afbeelding');
//        $milestone->publish_from = $request->input('publish_from'); //auto fill
        $milestone->publish_till = $request->input('publish_till');
        $milestone->project_id = $project->id;
        $milestone->user_id = Auth::id();
        $milestone->save();
    }

}
