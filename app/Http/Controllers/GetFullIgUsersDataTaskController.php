<?php

namespace App\Http\Controllers;

use App\Models\GetFullIgUsersDataTask;
use App\Models\SearchResult;

class GetFullIgUsersDataTaskController extends Controller
{
    public function index()
    {
        $getFullIgUsersDataTasks = GetFullIgUsersDataTask::paginate(15);
        $getFullIgUsersDataTasks->getCollection()->transform(function ($task){
            $task->personalProfileUserName = SearchResult::where('id', $task->search_result_id)->first()['ig_username'];
            return $task;
        });
        return view('get-full-ig-users-data-task.index', compact('getFullIgUsersDataTasks'));
    }
}
