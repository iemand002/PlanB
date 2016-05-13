<?php

namespace App\Http\Controllers;

use App\Milestone;
use App\Project;
use App\Thema;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class APIController extends Controller
{
    function getProject($projectid)
    {
        return json_encode(['milestone'=>[Milestone::where('project_id', $projectid)->orderBy('created_at', 'desc')
//            ->with('project')
//            ->with(['project.thema' => function ($query) {
//                $query->select('id','naam');
//            }])
            ->first()]]);
//        return (['milestone'=>Milestone::where('project_id', $projectid)->orderBy('created_at', 'desc')
//            ->with('project')
//            ->with(['project.thema' => function ($query) {
//                $query->select('id', 'naam');
//            }])
//            ->first()]);
    }

    function getAlleThemas()
    {
        return json_encode(['themas'=>Thema::select('id', 'naam')->get()]);
    }

    function getProjectenOpThema($themaid)
    {
        return json_encode(['projecten'=>Project::where('thema_id', $themaid)->with('milestones')->get()]);
    }

    function getProjecten()
    {
        $sql = "SELECT p.id,p.naam,p.beschrijving,p.slug,p.publish_from,p.publish_till,p.updated_at, m.coordinaten, m.locatie, t.naam thema
                FROM projecten p
                JOIN (
                    select MAX(id) max_id, project_id
                    FROM milestones 
                    GROUP BY project_id
                    ) m_max ON (m_max.project_id = p.id)
                JOIN milestones m ON (m.id = m_max.max_id)
                JOIN themas t ON t.id=p.thema_id";

        return json_encode(['projecten' => DB::select(DB::raw($sql))]);
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
