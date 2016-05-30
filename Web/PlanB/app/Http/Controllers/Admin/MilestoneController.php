<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MilestoneRequest;
use App\Milestone;

use App\Section;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project)
    {
        return view('admin.milestone.create', compact('project'));
    }

    public function create2($project)
    {
        return view('admin.milestone.create2', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MilestoneRequest $request, $project)
    {
        $milestone = new Milestone();
        $this->saveMilestone($request, $project, $milestone);

        if ($request->input('submit') == 'nieuw') {
            return redirect()->back()->with(['success' => 'Milestone "' . $milestone->naam . '" is opgeslagen']);
        }
        return redirect(route('admin.project.show', $project->slug))->with(['success' => 'Milestone "' . $milestone->naam . '" is opgeslagen']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store2(MilestoneRequest $request, $project)
    {
        $milestone = new Milestone();
        $this->saveMilestone($request, $project, $milestone);

        $positions = explode(',', $request->input('positions'));
        for ($i = 1; $i <= $request->input('count'); $i++) {
            if (!$request->has('del-' . $i)) {
                $section = new Section();
                $this->saveSection($request, $i, $section, $positions, $milestone);
            }

        }
        if ($request->input('submit') == 'nieuw') {
            return redirect()->back()->with(['success' => 'Milestone "' . $milestone->naam . '" is opgeslagen']);
        } elseif ($request->input('submit') == 'opslaan') {
            return redirect(route('admin.milestone.edit',[$project->slug,$milestone->slug]))->with(['success' => 'Milestone "' . $milestone->naam . '" is opgeslagen']);
        }
        return redirect(route('admin.project.show', $project->slug))->with(['success' => 'Milestone "' . $milestone->naam . '" is opgeslagen']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($project, $milestone)
    {
        return view('admin.milestone.show', compact('project', 'milestone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($project, $milestone)
    {
        return view('admin.milestone.edit', compact('project', 'milestone'));
    }
    public function edit2($project, $milestone)
    {
        return view('admin.milestone.edit2', compact('project', 'milestone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MilestoneRequest $request, $project, $milestone)
    {
        $this->saveMilestone($request, $project, $milestone);

        return redirect(route('admin.project.show', [$project->slug]))->with(['success' => 'Milestone "' . $milestone->naam . '" van project "' . $project->naam . '" is gewijzigd']);
    }
    public function update2(MilestoneRequest $request, $project, $milestone)
    {
        $this->saveMilestone($request, $project, $milestone);

        $positions = explode(',', $request->input('positions'));
        for ($i = 1; $i <= $request->input('count'); $i++) {
            if (!$request->has('del-' . $i)) {
                if ($request->input('id-'.$i)==0) {
                    $section = new Section();
                }else{
                    $section=Section::find($request->input('id-'.$i));
                }
                $this->saveSection($request, $i, $section, $positions, $milestone);
            }else{
                Section::destroy($request->input('del-'.$i));
            }

        }
        if ($request->input('submit') == 'opslaan') {
            return redirect(route('admin.milestone.edit',[$project->slug,$milestone->slug]))->with(['success' => 'Milestone "' . $milestone->naam . '" is gewijzigd']);
        }
        return redirect(route('admin.project.show', [$project->slug]))->with(['success' => 'Milestone "' . $milestone->naam . '" van project "' . $project->naam . '" is gewijzigd']);
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

    /**
     * @param MilestoneRequest $request
     * @param $project
     * @param $milestone
     */
    public function saveMilestone(MilestoneRequest $request, $project, $milestone)
    {
        $milestone->naam = $request->input('naam');
        $milestone->locatie = $request->input('locatie');
        $milestone->coordinaten = $request->input('coordinaten');
        $milestone->beschrijving = $request->input('beschrijving');
        $milestone->afbeelding = $request->input('afbeelding');
        $milestone->publish_from = $request->input('publish_from');
        $milestone->publish_till = $request->input('publish_till');
        $milestone->project_id = $project->id;
        $milestone->user_id = Auth::id();
        $milestone->save();
    }

    /**
     * @param MilestoneRequest $request
     * @param $i
     * @param $section
     * @param $positions
     * @param $milestone
     */
    private function saveSection(MilestoneRequest $request, $i, $section, $positions, $milestone)
    {
        $section->tekst = $request->input('tekst-' . $i);
        $section->url = $request->input('url-' . $i);
        $section->position = array_search($i, $positions);
        $section->type_id = $request->input('type_id-' . $i);
        $section->milestone_id = $milestone->id;
        $section->save();
    }
}
