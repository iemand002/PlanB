<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ThemaRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Thema;

class ThemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themas = Thema::all();
        $active='a-themas';
        return view('admin.thema.index', compact('themas','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.thema.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThemaRequest $request)
    {
        $thema = new Thema();
        $this->saveThema($request, $thema);

        if ($request->input('submit') == 'nieuw') {
            return redirect()->back()->with(['success' => 'Thema "' . $thema->naam . '" is opgeslagen']);
        }
        return redirect(route('admin'))->with(['success' => 'Thema "' . $thema->naam . '" is opgeslagen']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($thema)
    {
        return view('admin.thema.edit', compact('thema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ThemaRequest $request, $thema)
    {
        $this->saveThema($request, $thema);
        return redirect(route('admin'))->with(['success' => 'Thema "' . $thema->naam . '" is gewijzigd']);
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
     * @param ThemaRequest $request
     * @param $thema
     */
    private function saveThema(ThemaRequest $request, $thema)
    {
        $thema->naam = $request->input('naam');
        $thema->beschrijving = $request->input('beschrijving');
        $thema->save();
    }
}
