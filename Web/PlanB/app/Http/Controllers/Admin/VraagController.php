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

        $this->saveVraag($request, $milestone, $vraag);
        for ($i = 1; $i <= $request->input('count'); $i++) {
            if ($request->input('del-' . $i) == false) {
                $antwoord = new Antwoord();
                $this->saveAntwoord($request, $i, $antwoord, $vraag);
            }
        }

        if ($request->input('submit') == 'nieuw') {
            return redirect()->back()->with(['success' => 'Vraag "' . $vraag->vraag . '" is opgeslagen']);
        }
        return redirect(route('admin.milestone.show', [$project->slug,$milestone->slug]))->with(['success' => 'Vraag "' . $vraag->vraag . '" is opgeslagen']);
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
    public function edit($project, $milestone, $vraag)
    {
        return view('admin.vraag.edit', compact('project', 'milestone', 'vraag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(VraagAntwoordRequest $request, $project, $milestone, $vraag)
    {
        $this->saveVraag($request, $milestone, $vraag);
        for ($i = 1; $i <= $request->input('count'); $i++) {
            if ($request->input('id-' . $i) != 0) {
                $antwoord = Antwoord::find($request->input('id-' . $i));
            } else {
                $antwoord = new Antwoord();
            }
            if ($request->input('del-' . $i)) {
                Antwoord::destroy($request->input('id-' . $i));
            } else {
                $this->saveAntwoord($request, $i, $antwoord, $vraag);
            }
        }
        return redirect(route('admin', $project->slug))->with(['success' => 'Vraag "' . $vraag->vraag . '" is gewijzigd']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($vraag)
    {
        foreach ($vraag->antwoorden as $antwoord){
            $antwoord->delete();
        }
        $vraag->delete();
        return redirect(route('admin.milestone.show',[$vraag->milestone->project->slug,$vraag->milestone->slug]))->with(['success' => 'Vraag "' . $vraag->vraag . '", met alle bijhorende antwoorden, verwijderd!']);
    }

    /**
     * @param VraagAntwoordRequest $request
     * @param $milestone
     * @param $vraag
     */
    private function saveVraag(VraagAntwoordRequest $request, $milestone, $vraag)
    {
        $vraag->vraag = $request->input('vraag');
        $vraag->milestone_id = $milestone->id;

        $vraag->save();
    }

    /**
     * @param VraagAntwoordRequest $request
     * @param $i
     * @param $antwoord
     * @param $vraag
     */
    private function saveAntwoord(VraagAntwoordRequest $request, $i, $antwoord, $vraag)
    {
        $antwoord->antwoord = $request->input('antwoord-' . $i);
        $antwoord->vraag_id = $vraag->id;
        $antwoord->save();
    }
}
