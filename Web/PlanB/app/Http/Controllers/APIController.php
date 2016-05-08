<?php

namespace App\Http\Controllers;

use App\Milestone;
use App\Project;
use App\Thema;
use Illuminate\Http\Request;

use App\Http\Requests;

class APIController extends Controller
{
    function getProject($projectid)
    {
        return json_encode(Milestone::where('project_id', $projectid)->orderBy('created_at', 'desc')
            ->with('project')
            ->with(['project.thema' => function ($query) {
                $query->select('id','naam');
            }])
            ->first());
    }

    function getAlleThemas()
    {
        return json_encode(Thema::select('id', 'naam')->get());
    }

    function getProjectenOpThema($themaid)
    {
        return json_encode(Project::where('thema_id', $themaid)->with('milestones')->get());
    }

    function getProjecten()
    {
//        return json_encode(['projecten'=>Project::with(array('thema' => function ($query) {
//            $query->select('id', 'naam');
//        }))->get()]);
        return (['projecten'=>Project::with(array('thema' => function ($query) {
            $query->select('id', 'naam');
        }))->get()]);
    }

    function likeMilestone($milestoneid)
    {
        $milestone = Milestone::find($milestoneid);
        $milestone->likes += 1;
        $milestone->save;
    }

    function dislikeMilestone($milestoneid)
    {
        $milestone = Milestone::find($milestoneid);
        $milestone->dislikes += 1;
        $milestone->save;
    }
}
