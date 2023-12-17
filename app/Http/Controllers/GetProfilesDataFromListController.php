<?php

namespace App\Http\Controllers;

use App\Models\GetProfilesDataFromListTask;

class GetProfilesDataFromListController extends Controller
{
    public function index()
    {
        $getProfilesDataFromListTasks = GetProfilesDataFromListTask::paginate(15);
        return view('get-profiles-data-from-list-task.index', compact('getProfilesDataFromListTasks'));
    }
}
