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
     * @param ThemaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ThemaRequest $request)
    {
        $thema = new Thema();
        $this->saveThema($request, $thema);

        if ($request->input('submit') == 'nieuw') {
            return redirect()->back()->with(['success' => 'Thema "' . $thema->naam . '" is opgeslagen']);
        }
        return redirect(route('admin.thema.index'))->with(['success' => 'Thema "' . $thema->naam . '" is opgeslagen']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $thema
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($thema)
    {
        return view('admin.thema.edit', compact('thema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ThemaRequest|Request $request
     * @param $thema
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(ThemaRequest $request, $thema)
    {
        $this->saveThema($request, $thema);
        return redirect(route('admin.thema.index'))->with(['success' => 'Thema "' . $thema->naam . '" is gewijzigd']);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param $thema
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function destroy($thema)
    {
        if ($thema->projecten->count()==0){
            $thema->delete();
            return redirect(route('admin.thema.index'))->with(['success' => 'Thema "' . $thema->naam . '" verwijderd!']);
        }
        return redirect(route('admin.thema.index'))->withErrors(['Thema "' . $thema->naam . '" heeft nog gekoppelde projecten! Verwijder eerst de projecten...']);
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