<?php

namespace App\Http\Controllers\Api\Following;

use App\Http\Requests\FollowingTaskHistorySaveRequest;
use App\Models\Desktop\FollowingTask;
use App\Models\Desktop\FollowingTaskHistory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HistoryController
{
    public function followingTasksHistory(FollowingTaskHistorySaveRequest $request): JsonResponse
    {
        try {
            $countOfFollowingTaskProfiles = count(json_decode(FollowingTask::find($request->get('following_task_id'))->profiles_list));
            $countOfTaskInHistory = FollowingTaskHistory::where('following_task_id', $request->get('following_task_id'))->count();
            FollowingTaskHistory::create($request->validated());
            if (($countOfTaskInHistory + 1) >= $countOfFollowingTaskProfiles) {
                FollowingTask::where('id', $request->get('following_task_id'))->update(['status' => 'completed']);
            } else {
                FollowingTask::where('id', $request->get('following_task_id'))->update(['status' => 'running']);
            }
            return response()->json(['message' => 'Task history created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function followingTasksHistoryUpdate(Request $request, int $followingTaskId, string $handledProfile): JsonResponse
    {
        try {
            $followingHistoryTask = FollowingTaskHistory::where('following_task_id', $followingTaskId)->where('handled_profile_login', $handledProfile)->first();
            $followingHistoryTask->update($request->validate([
                'count_of_followers' => 'required|integer',
                'count_of_followings' => 'required|integer',
                'count_of_posts' => 'required|integer',
                'count_of_stories' => 'required|integer',
            ]));
            return response()->json(['message' => 'Task history updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
