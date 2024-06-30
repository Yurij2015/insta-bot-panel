<?php

namespace App\Http\Controllers\Api\Liking;

use App\Http\Controllers\Controller;
use App\Models\Desktop\LikingTask;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TasksController extends Controller
{
    public function likingTasks(Request $request): JsonResponse
    {
        $profileId = $request->get('profile_id');
        $liking_tasks = LikingTask::with('profile')->where('working_profile_id', $profileId)->where('status', 'pending')->get();

        return response()->json($liking_tasks);
    }
}
