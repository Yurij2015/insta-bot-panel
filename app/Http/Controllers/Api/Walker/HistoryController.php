<?php

namespace App\Http\Controllers\Api\Walker;

use App\Http\Requests\WalkingTaskHistorySaveRequest;
use App\Models\Desktop\WalkingTask;
use App\Models\Desktop\WalkingTaskHistory;
use Illuminate\Http\JsonResponse;

class HistoryController
{
    public function walkerTasksHistory(WalkingTaskHistorySaveRequest $request): JsonResponse
    {
        try {
            $countOfWalkingTaskProfiles = count(json_decode(WalkingTask::find($request->get('walking_task_id'))->profiles_list));
            $countOfTaskInHistory = WalkingTaskHistory::where('walking_task_id', $request->get('walking_task_id'))->count();
            WalkingTaskHistory::create($request->validated());
            if (($countOfTaskInHistory + 1) >= $countOfWalkingTaskProfiles) {
                WalkingTask::where('id', $request->get('walking_task_id'))->update(['status' => 'completed']);
            } else {
                WalkingTask::where('id', $request->get('walking_task_id'))->update(['status' => 'running']);
            }
            return response()->json(['message' => 'Task history created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
