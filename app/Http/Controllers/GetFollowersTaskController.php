<?php

namespace App\Http\Controllers;

use App\Models\GetFollowersTask;
use App\Models\ProfileInfo;

class GetFollowersTaskController extends Controller
{
    public function index()
    {
        $getFollowersTasks = GetFollowersTask::orderBy('id', 'desc')->paginate(15);
        $getFollowersTasks->getCollection()->transform(function ($task){
            $task->countOfFollowers = ProfileInfo::where('inst_id', $task->profile_id)->first()
                ->edge_followed_by['count'];
            return $task;
        });
        return view('get-followers-task.index', compact('getFollowersTasks'));
    }
}
