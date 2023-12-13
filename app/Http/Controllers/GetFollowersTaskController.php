<?php

namespace App\Http\Controllers;

use App\Models\GetFollowersTask;

class GetFollowersTaskController extends Controller
{
    public function index()
    {
        $getFollowersTasks = GetFollowersTask::paginate(15);
        return view('get-followers-task.index', compact('getFollowersTasks'));
    }
}
