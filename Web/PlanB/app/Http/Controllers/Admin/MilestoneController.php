<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\MilestoneRequest;
use App\Milestone;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MilestoneRequest $request, $project)
    {
        $milestone = new Milestone();
        $this->saveMilestone($request, $project, $milestone);

        return redirect()->back()->with(['success' => 'Milestone "' . $milestone->naam . '" is opgeslagen']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
        $milestone->beschrijving = $request->input('beschrijving');
        $milestone->afbeelding = $request->input('afbeelding');
        $milestone->likes = 0;
        $milestone->dislikes = 0;
        $milestone->project_id = $project->id;
        $milestone->save();
    }
}
