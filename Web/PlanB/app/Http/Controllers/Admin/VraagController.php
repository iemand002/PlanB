<?php

namespace App\Http\Controllers\Admin;

use App\Antwoord;
use App\Http\Requests\VraagAntwoordRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Vraag;

class VraagController extends Controller
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
    public function create($project, $milestone)
    {
        return view('admin.vraag.create', compact('project', 'milestone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(VraagAntwoordRequest $request, $project, $milestone)
    {
        $vraag = new Vraag();

        $vraag->vraag = $request->input('vraag');
        $vraag->milestone_id = $milestone->id;

        $vraag->save();
        for ($i = 1; $i <= $request->input('count'); $i++) {
            $antwoord = new Antwoord();
            $antwoord->antwoord = $request->input('antwoord-' . $i);
            $antwoord->vraag_id = $vraag->id;
            $antwoord->save();
        }

        return redirect()->back()->with(['success' => 'Vraag "' . $vraag->vraag . '" is opgeslagen']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
