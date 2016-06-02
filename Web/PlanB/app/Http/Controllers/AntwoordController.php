<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Antwoord;

class AntwoordController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $antwoord=Antwoord::find($id);
        $antwoord->aantal_gekozen+=1;
        $antwoord->save();
    }
}
