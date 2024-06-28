<?php

namespace App\Http\Controllers\Api\Following;

use App\Http\Controllers\Controller;
use App\Models\Desktop\FollowingTask;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function followingTasks(Request $request): JsonResponse
    {
        $profileId = $request->get('profile_id');
        $walking_tasks = FollowingTask::with('profile')->where('working_profile_id', $profileId)->where('status', 'pending')->get();

        return response()->json($walking_tasks);
    }
}
