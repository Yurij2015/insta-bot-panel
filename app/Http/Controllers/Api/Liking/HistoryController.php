<?php

namespace App\Http\Controllers\Api\Liking;

use App\Http\Controllers\Controller;
use App\Http\Requests\LikingTaskHistorySaveRequest;
use App\Models\Desktop\LikingTask;
use App\Models\Desktop\LikingTaskHistory;
use Illuminate\Http\JsonResponse;

class HistoryController extends Controller
{
    public function likingTasksHistory(LikingTaskHistorySaveRequest $request): JsonResponse
    {
        try {
            LikingTaskHistory::create($request->validated());
            LikingTask::where('id', $request->get('liking_task_id'))->update(['status' => 'running']);
            return response()->json(['message' => 'Task history created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
