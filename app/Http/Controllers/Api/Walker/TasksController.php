<?php

namespace App\Http\Controllers\Api\Walker;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class TasksController extends Controller
{
    public function walkerTasks(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Walker task is running',
        ]);
    }
}
