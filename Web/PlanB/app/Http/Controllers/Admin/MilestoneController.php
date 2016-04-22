<?php

namespace App\Http\Controllers\Admin;
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
    public function store(Request $request, $project)
    {
        $milestone = new Milestone();

        $milestone->naam = $request->input('naam');
        $milestone->locatie = $request->input('locatie');
        $milestone->beschrijving = $request->input('beschrijving');
        $milestone->locatie = $request->input('locatie');
        $milestone->afbeelding = $request->input('afbeelding');
        $milestone->likes = 0;
        $milestone->dislikes = 0;
        $milestone->project_id = $project->id;
        $milestone->thema_id = 1;
        




        // $milestone->locatie = $request->input('locatie');

        $milestone->save();

        return redirect()->back()->with(['success' => 'Project "' . $milestone->naam . '" is opgeslagen']);
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
}
