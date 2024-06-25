<?php

namespace App\Http\Controllers\Api\Walker;

use App\Http\Controllers\Controller;
use App\Models\Desktop\WalkingTask;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function walkerTasks(Request $request): JsonResponse
    {
        $profileId = $request->get('profile_id');
        $walking_tasks = WalkingTask::with('profile')->where('working_profile_id', $profileId)->where('status', 'pending')->get();

        return response()->json($walking_tasks);
    }
}
